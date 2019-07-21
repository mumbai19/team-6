<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use App\roles;
use Session;
class AdminController extends Controller
{
    public function assign(Request $request)
    {
        if(isset($request))
            return view('faculty.admin.admin');
        else
        {
            return $request->faculty;
        }
    }

    public function displayFaculty(Request $request)
    {
        $faculty = Staff::where("staff_id","=",1)->first();
        $roles = roles::where("staff_id","=",1)->get();
        return view('faculty.admin.admin')->with('faculty',$faculty)->with('roles',$roles);
    }

    // Insert a Role in the database
    public function insertRole(Request $request)
    {
        return "Role Assigned";
        $new_role = json_decode($request->hidden_role);
        
        
        if( count($new_role)>0 )
        {   
            foreach($new_role as $newrole){
                 
                $duplicate_check = Role::where("roles_id","=",$newrole)->where("e_id","=",$request->hidden_eid_new)->first();
                
                if(!count($duplicate_check)>0){
                    $role_object = new Role;
                    $role_object->roles_id = $newrole;
                    $role_object->e_id = $request->hidden_eid_new;
                    $role_object->save();    
                }
                else
                 { 
                     Session::flash('status', 'Role '.$newrole.' is already assigned');
                                
                }
            }
            return redirect('staff/admin')->with('success','Roles Assigned Successfully');
        }
        else
        {
            return redirect('staff/admin')->with('success','Changes made Successfully!');
        }
       

    }

    // Remove a role from the database
    public function removeRole(Request $request)
    {
        //return $request->role." ".$request->eid;
        $role = Role::where("roles_id","=",$request->role)->where("e_id","=",$request->eid)->delete();
        //$role->delete();
        return "The staff has been relieved of the role";
    }
}
