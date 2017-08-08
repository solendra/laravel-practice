@extends('layouts.layout')
@section('title')
Log In Here
@stop

@section('body')
<div class="container" style="width: 500px; height:50px;">
<div class="panel panel-header ">
<h2>Login Here</h2>
</div>
<div class="panel-body ">
<form action="" method="POST">
<div class="form-group">
<label for="username">User Name:</label>
    <input type="text" class="form-control" id="username">
  </div>
<div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password">
  </div>

  <div class="g-recaptcha" data-sitekey="6LcoHSsUAAAAANqrgrpIasCSbw-IJKkc8XGKlqfv"></div>

  <div class="form-group">
  <button type="submit" class="btn btn-default">Submit</button>
  </div>

</form>

</div>
</div>
@stop