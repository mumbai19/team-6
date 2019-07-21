<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\Data;
class StudentController extends Controller
{
    public function addAttendanceOnDate(Request $request){
        $date = $request->date;
        $data = Data::all();
        
        return view('addAttendanceOnDate')->with('data',$data)->with('date',$date);        
    
    }


    public function addnewRecord(Request $request){

        return $request;

    }
}
