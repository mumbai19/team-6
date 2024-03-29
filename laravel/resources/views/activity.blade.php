@extends ('layouts.dashboard')
@section('page_heading','Activities')


<style type="text/css">
    #myBtn {
  border-radius: 30px;
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  width: 48px;
  height: 48px;
  font-size: 20px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
</style>

<title>Activities</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@section('section')
<div class="container">
  <h2>Past Activities</h2>
  <ul class="list-group">
  @foreach($data as $item)
    <li  class="list-group-item">{{$item->activity_name}}</li>
    @endforeach
  </ul>
</div>

<div class="container">
  <a href="{{ url ('activity_add') }}"><button id="myBtn" title="Go to top"><span class="glyphicon glyphicon-plus"></span></button></a>
</div>

<script type="text/javascript">
  // window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     document.getElementById("myBtn").style.display = "block";
//   } else {
//     document.getElementById("myBtn").style.display = "none";
//   }
// }
document.getElementById("myBtn").style.display = "block";

// When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//   // document.body.scrollTop = 0; // For Safari
//   // document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
// }
</script>


@stop