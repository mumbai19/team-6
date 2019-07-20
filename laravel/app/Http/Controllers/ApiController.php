<?php

namespace App\Http\Controllers;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Resources\General as GeneralResource;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\student;
use App\student_attendance;
use Session;
use Auth;


class ApiController extends Controller
{
    public function allStudents()
    {
        return student::all();
    }

    public function addAttendance(Request $request){
       
        
            $s_id = $request->s_id;
            $staff_id = $request->staff_id; 	
            $p_id = $request->p_id;
            $is_present = $request->is_present;
            $date = $request->date;
        
       
        $st = new student_attendance();
        $st->s_id = $s_id;
        $st->staff_id = $staff_id;
        $st->p_id = $p_id;
        $st->is_present = $is_present;
        $st->date = $date;
        $st->save();
        
        $dataModel['data'] = [];
        $dataModel['message'] = "Attendance Record Added Successfully";
        $dataModel['error'] = false;
        return new GeneralResource($dataModel);
    }

}
