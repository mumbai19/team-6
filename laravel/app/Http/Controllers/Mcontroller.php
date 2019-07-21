<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\student;

class Mcontroller extends Controller
{
    public function login(){
        return view('tlife.login');
    }
    public function check(Request $request){
        return $request->input('email');
        // $staff = staff::where('email',$request->input('email'));
        
        // if (Hash::check('plain-text', $request->input('password')) {
        //     return view('tlife.profile');
        // }
    }
    public function attendance(){
        $stud = student::all();
        return view('tlife.attendance')->with('students',$stud);
    }
}
