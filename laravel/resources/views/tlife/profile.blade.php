{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body> --}}
@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')

<div class="container">
  <h2>Basic List Group</h2>
  <ul class="list-group">
  <li class="list-group-item">Beginner<span class="glyphicon glyphicon-ok"> </li>
    <li class="list-group-item">Foundation<span class="glyphicon glyphicon-ok"> </li>
    <li class="list-group-item">Transit<span class="glyphicon glyphicon-ok"> </li>
	<li class="list-group-item">Discovery<span class="glyphicon glyphicon-ok"> </li>
	<li class="list-group-item">Dream<span class="glyphicon glyphicon-ok"> </li>
  </ul>
</div>

@stop

{{-- 
</body>
</html> --}}
