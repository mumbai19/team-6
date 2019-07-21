@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
    
<link rel="stylesheet" href="{{ "assets/stylesheets/attendance.css" }}" />

@foreach ($students as $stud)
    <ul class="list-group"> 
  <div class="row">
    <div class="col-10"><li style="font-size: 25px; outline: none; border: none;" class="list-group-item">{{$stud->f_name}}." ".{{$stud->f_name}}</li></div>
    <div class="col-2"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label></div>
  </div>   
  </ul>
@endforeach


{{--      
 <div class="row">
    <div class="col-10"><li style="font-size: 25px; outline: none; border: none;" class="list-group-item itemlist">Vestibulum at eros</li></div>
    <div class="col-2"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label></div>
  </div>

  <div class="row">
    <div class="col-10"><li style="font-size: 25px; outline: none; border: none;" class="list-group-item">Vestibulum at eros</li></div>
    <div class="col-2"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label></div>
  </div>

  <div class="row">
    <div class="col-10"><li style="font-size: 25px; outline: none; border: none;" class="list-group-item">Vestibulum at eros</li></div>
    <div class="col-2"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label></div>
  </div> --}}
     <!-- <div>
      <ul class="list-group">  
  <li class="list-group-item" style="font-size: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>Vestibulum at eros</li>

<li class="list-group-item" style="font-size: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>Vestibulum at eros</li>

<li class="list-group-item" style="font-size: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>Vestibulum at eros</li>

<li class="list-group-item" style="font-size: 20px;"><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>Vestibulum at eros</li> -->


@stop