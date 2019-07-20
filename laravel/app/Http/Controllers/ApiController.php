<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Resources\General as GeneralResource;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\student;
use App\students_enrolled_programs;
use App\student_attendance;
use Session;
use Auth;


class ApiController extends Controller
{
    public function allStudents()
    {
        return student::all();
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

    public function addAttendance(Request $request){
        $st->s_id = $request->s_id;
        $st->staff_id = $request->staff_id;
        $st->date = $request->date;

       foreach($request->students as $student){
        $st = new student_attendance();
        $st->p_id = $student->p_id;
        $st->is_present = $student->is_present;
        $st->save();
       }
        $dataModel['data'] = [];
        $dataModel['message'] = "Attendance Record Added Successfully";
        $dataModel['error'] = false;
        return new GeneralResource($dataModel);
    }

}
