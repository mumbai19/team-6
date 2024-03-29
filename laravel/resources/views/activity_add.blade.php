@extends ('layouts.dashboard')
@section('page_heading','Activities')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<link href='custom.css' rel='stylesheet' type='text/css'>


@section('section')

<div class="container">

            <div class="row">

                <div class="col-xl-8 offset-xl-2 py-5">


					<form id="contact-form" method="post" action="{{action('ApiController@addActivity')}}" role="form">
                    {{ csrf_field() }}

    <div class="messages"></div>

    <div class="controls">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name *</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Enter Activity Name" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Theme *</label>
                    <input id="theme" type="text" name="theme" class="form-control" placeholder="Enter Theme of the Activity" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Description *</label>
                    <input id="description" type="text" name="description" class="form-control" placeholder="Please enter a short description" required="required">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>

        <div >
            
        </div>
        
     <!-- Select a photo:<br><br> <input type="file" name="myFile"> -->
    



        <div style="margin-top: 10px;" class="row">
            <div class="col-md-6">
                <p class="text-muted">
                    <strong>*</strong> These fields are required.</p>
            </div>
        </div>
		 <div class="row">
			<div class="col-md-6">
                <input type="submit" class="btn btn-success btn-send" value="Create"">
            </div>
		</div>
    </div>


					</form> 

                </div>

            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="contact.js"></script>
        <script>
            // function create_activity(id) {
            //     var theme = document.getElementById("theme").value;
            //     var activity_name = document.getElementById("name").value;
            //     var activity_description = document.getElementById("description").value;
            //     var p_id = 1;
            //     var staff_id = 1;
            //     axios.post('http://127.0.0.1:8000/api/addActivity', {
            //             "p_id": p_id,
            //             "staff_id": staff_id,
            //             "theme": theme,
            //             "activity_name": activity_name,
            //             "activity_description": activity_description
            //     });
            // }
        </script>


@stop