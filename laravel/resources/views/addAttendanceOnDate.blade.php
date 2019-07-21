@extends ('layouts.dashboard')
@section('page_heading','Add Attendance')
<style>
.attendance-card {
  margin: 3px;
  padding: 1px;
  border-radius: 5px;
  height: 110px;
}

.attendance-card .roll-no {
  font-size: 3em;
}

.attendance-card span {
  position: absolute;
  top: 5px;
  left: 5px;
}

.attendance-card .name {
  text-transform: capitalize;
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
.onoffswitch {
    position: relative; width: 130px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "All Absent";
    padding-left: 10px;
    background-color: #d9534f; color: #FFFFFF;
}
.onoffswitch-inner:after {
    content: "All Present";
    padding-right: 10px;
    background-color: #5cb85c; color: #FFFFFF;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 96px;
    border: 2px solid #999999; border-radius: 20px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}
</style>
@section('section')

<div class="col-md-offset-5 col-xs-offset-4 onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" onclick="changeall()">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>

{!! Form::open(['action' => 'StudentController@addnewRecord','method'=>'post']) !!}
    <div class="page-container">
        @if(count($data)>0)
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="Date" value="{{ $date }}">

            <div class="row">
            
                @foreach($data as $dataa)
                    <button type="button" id="{{$dataa->s_id}}"  class="attendance-card col-xs-2 col-sm-2 col-md-1 btn-success" onclick="toggle({{ $dataa->s_id }} )" value="1">
                        <span id="info{{ $dataa->roll_no }}" class="state">P</span>
                        <div class="roll-no text-center">{{ $dataa->s_id }}</div>
                        <div class="text-center name">{{ strtolower($dataa->f_name) }}</div>

                        <input type="hidden" name="UIDs[]" value="{{ $dataa->s_id }}">
                    </button>
                @endforeach
            </div>
        @endif
    </div>
    <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
        <div class="row">
            <input class="btn btn-info btn-lg btn-block" type="submit" value="Save" name="submit"> 
        </div>
    </div>
{!! Form::close() !!}


<script>
    //Changeall function is used by the toggle checkbox to mark all students as absentor present.
    function changeall(){
        var attendancegg = document.getElementsByClassName("attendancegg");
        var state = document.getElementsByClassName("state");
        var myonoffswitch = document.getElementById('myonoffswitch');
        var temp;


        for(var i = 0; i < attendancegg.length; i++){

          if(myonoffswitch.checked){
                attendancegg[i].value = "0";
                state[i].innerHTML = "A";
                state[i].parentElement.setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
         }else{
                attendancegg[i].value = "1";
                state[i].innerHTML = "P";
                state[i].parentElement.setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
            }
        }
        
    }
    //Toggle function changes the status(absent-A, present-P) of a roll number button.
    function toggle(roll_no){

        var status = document.getElementById(roll_no).value;
        document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");

        if(status=="1"){
            status="0";
            att_status = "A";
            document.getElementById('info'+roll_no).innerHTML = att_status;
           document.getElementById(roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-danger");
            console.log("test");
            console.log(roll_no);
      
          }else if(status=="0"){
          console.log("out"); 
          status="1";
            att_status = "P";
            document.getElementById('info'+roll_no).innerHTML = att_status;
            document.getElementById(roll_no).value = status;
            document.getElementById(roll_no).setAttribute("class","attendance-card col-xs-2 col-sm-2 col-md-1 btn-success");
        }
    }
    //This jquery ensures that the Save attendance is not pressed more than ones. As we dont want multiple attendance to be inserted in the database of the same student and having same contach_head_meeting_index/chmi/lecture_number. This usually occurs due to hyper active staff, faulty appliances (mouse) or demonic possession.
    $("form").submit(function() {
        $(this).submit(function() {
            return false;
        });
        return true;
    });

</script>
@stop







