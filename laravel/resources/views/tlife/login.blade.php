@extends ('layouts.plane')
@section ('body')

<link rel="stylesheet" href="{{ "assets/stylesheets/login.css" }}" />

<h2 align="center" ><i>If you ever wonder how to make a difference...
just touch one life</i></h2>
<form action="/action_page.php">

  <div class="imgcontainer">
    <img src={{ "assets/img/logo.jpg" }} alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <a href="{{ url ('/profile') }}" class="btn btn-lg btn-success btn-block">Login</a>
    {{-- <button type="submit">Login</button> --}}
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn">Cancel</button>
  </div>
</form>

{{-- <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('login_panel_title','Please Sign In')
               @section ('login_panel_body')
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="{{ url ('') }}" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form> --}}
                    
                {{-- @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div> --}}
@stop