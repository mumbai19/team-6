@extends ('layouts.dashboard')
@section('page_heading','Add Attendance')

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
	src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@section('section')
   <!--Card content-->
   <div class="card-block">

   <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link active" href="">Program 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">program 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">program 3</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Add attendance for Date:</h5> -->
    <p class="card-text">
	</p>
    <!-- <a href="{{url('/addAttendanceOnDate')}}" class="btn btn-primary">Submit</a> -->
  
  
  
  
	<div class="col-sm-10 col-sm-offset-1">
			{!! Form::open(['action'=>'StudentController@addAttendanceOnDate', 'method'=>'POST']) !!}
				<div class="col-sm-offset-2 col-sm-4">
					<div class="form-group ">
					<input class="form-control text-center  input-lg" onkeydown="return false" id="date" name="date" max="" min="" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="ENTER DATE" value="" required/>
					</div>
				</div>
				<div class="col-sm-2">
					<button type="submit" name="next" class="btn btn-danger btn-lg" value="submit">Next</button>
				</div>	
			{!! Form::close() !!}
  
	</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
</div>
</div>

@stop
