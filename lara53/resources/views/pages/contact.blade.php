@extends('layouts.layout')
@section('title')
Contact Us
@stop
@section('body')
<div class="container" >
<div class="well">
<form method="" action="/contact">

<div class="form-group">
<label for="email">Email:</label>
<input type="email" class="form-control" name="email" id="email">
</div>

<div class="form-group">
<label for="name">Full Name:</label>
<input type="text" class="form-control" name="name" id="name">
</div>


<div class="form-group">
<label for="mobile_num">Mobile Number:</label>
<input type="number" class="form-control" name="mobile_num" id="mobile_num">
</div>

<div class="form-group">
<label class="radio-inline"><input type="radio" name="gender" > Male</label>
<label class="radio-inline"><input type="radio" name="gender" > Female</label>
</div>

<div class="form-group">
<label for="message">Your Message:</label>
<textarea class="form-control" name="message" id="message" rows="5"></textarea>
</div>

<div class="form-group">
<label for="inputFile">Upload: </label>
<input type="file" id="inputFile" name="inputFile">

</div>

<button type="submit" class="btn btn-success"> Submit</button>
</form>
</div>
</div>

@stop