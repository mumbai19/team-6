<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Resources\General as GeneralResource;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\student;
use App\students_enrolled_programs;
use App\student_attendance;
use App\activity_log;
use App\programs;
use App\savings;
use App\star_chart;
use Illuminate\Support\Facades\DB;
use DateTime;
use Session;
use Auth;


class ApiController extends Controller
{
    public function allStudents()
    {
        return student::all();
    }

    public function addAttendance(Request $request){
       
        foreach(json_decode($request->data) as $obj) {
            $s_id = $obj->s_id;
            $staff_id = $obj->staff_id; 	
            $p_id = $obj->p_id;
            $is_present = $obj->is_present;
            $date = date("Y-m-d");
        
       
            $st = new student_attendance();
            $st->s_id = $s_id;
            $st->staff_id = $staff_id;
            $st->p_id = $p_id;
            $st->is_present = $is_present;
            $st->date = $date;
            $st->save();
        }
        $dataModel['data'] = [];
        $dataModel['message'] = "Attendance Records Added Successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }

    public function addActivity(Request $request) {

        // foreach(json_decode($request->data) as $obj) {

            $st = new activity_log();
            $st->p_id = 1;
            $st->staff_id = 1;
            $st->theme = $request->input('theme');
            $st->activity_name = $request->input('name');
            // $st->date = date("Y/m/d");
            $st->activity_description = $request->input('description');
            // return $request->input('description');
         
            $st->save();
        // }

        // $dataModel['data'] = [];
        // $dataModel['message'] = "Activity Record Added Successfully";
        // $dataModel['error'] = false;

        // return new GeneralResource($dataModel);
        return redirect('/');
    }

    public function getProgram() {
        return programs::all();
    }

    public function addSavings(Request $request) {

        foreach(json_decode($request->data) as $obj) {
            $st = new savings();
            $st->s_id = (int)$obj->s_id;
            $st->staff_id = (int)$obj->staff_id;
            $st->amount = $obj->amount;
            $st->save();
        }

        $dataModel['data'] = [];
        $dataModel['message'] = "Savings record created successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }


    public function addStarChart(Request $request) {

        foreach(json_decode($request->data) as $obj) {
            $st = new star_chart();
            $st->s_id = (int)$obj->s_id;
            $st->staff_id = (int)$obj->staff_id;
            $st->p_id = $obj->p_id;
            $st->criteria_id = $obj->criteria_id;
            $st->save();
        }

        $dataModel['data'] = [];
        $dataModel['message'] = "Star Chart record created successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }

    public function generateAttendanceReport(Request $request) {
        
        $final_arr = array();

        foreach(student::all() as $student) {
            $s_id = $student->s_id;
            $staff_id = $request->staff_id; 	
            $p_id = $request->p_id;
            $from_date = $request->from_date;
            $to_date = $request->to_date;

            $fetched = DB::select('select * from student_attendance where s_id = :s_id and staff_id = :staff_id and p_id = :p_id and date > :from_date and date < :to_date', ['s_id' => $s_id, 'staff_id' => $staff_id, 'p_id' => $p_id, 'from_date' => $from_date, 'to_date' => $to_date]);

            $count = 0;
            foreach($fetched as $fetch) {
                if($fetch->is_present == true) {
                    $count += 1;
                }
            }

            $final = collect();

            $final = collect($s_id)->merge([$count]);

            array_push($final_arr, $final);
        }

        $dataModel['data'] = $final_arr;
        $dataModel['message'] = "Attendence report generated successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }

    public function studentsByProgram($program)
    {
        $allEnrolled = students_enrolled_programs::where('p_id',$program)->get();
        
        $data = collect();

        foreach($allEnrolled as $enrolled){
            $student_info = student::where('s_id', $enrolled->s_id)->first();
            $data = collect($data)->merge([$student_info]);
        }

        $dataModel['data'] = $data;
        $dataModel['message'] = "API call successful";
        $dataModel['error'] = false;
        return new GeneralResource($dataModel);

    }

    public function generateAttendanceReportDetailed(Request $request) {
        
        $final_arr = array();

        $from_date = new DateTime($request->from_date);
        $to_date = new DateTime($request->to_date);

        $final_arr = array();
        for($i = $from_date; $i <= $to_date; $i = $i->modify('+1 day')) {
            $date = $i->format('Y-m-d');
            $staff_id = $request->staff_id; 	
            $p_id = $request->p_id;

            $temp = array();
            foreach(student::all() as $student) {
                $s_id = $student->s_id;

                $fetched = DB::select('select * from student_attendance where s_id = :s_id and staff_id = :staff_id and p_id = :p_id and date = :date', ['s_id' => $s_id, 'staff_id' => $staff_id, 'p_id' => $p_id, 'date' => $date]);

                if(empty($fetched)) {
                    array_push($temp, 0);
                }
                else {
                    array_push($temp, 1);
                }
            }


            array_push($final_arr, [$date, $temp]);
        }

        $dataModel['data'] = $final_arr;
        $dataModel['message'] = "Attendence report generated successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }

    public function addStudents(Request $request){
       
        foreach(json_decode($request->data) as $obj) {
       
            $st = new student();
            $st->f_name = $obj->f_name;
            $st->l_name = $obj->l_name;
            $st->address = $obj->address;
            $st->phone = $obj->phone;
            $st->save();
        }
        $dataModel['data'] = [];
        $dataModel['message'] = "Student Records Added Successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }

    public function generateActivityReport(Request $request){
       
        $final_arr = array();
        $activity_logs = DB::select('select * from activity_log WHERE p_id = :p_id and staff_id = :staff_id', ['p_id' => $request->p_id, 'staff_id' => $request->staff_id]);
        foreach($activity_logs as $activity) {
       
            $theme = $activity->theme;
            $activity_name = $activity->activity_name;
            $activity_description = $activity->activity_description;

            array_push($final_arr, [$theme, $activity_name, $activity_description]);
        }
        $dataModel['data'] = $final_arr;
        $dataModel['message'] = "Generated Activity report Successfully";
        $dataModel['error'] = false;

        return new GeneralResource($dataModel);
    }
}
