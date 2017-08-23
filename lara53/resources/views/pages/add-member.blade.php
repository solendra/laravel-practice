@extends('layouts.layout')
@section ('title')
add member
@stop
@section ('body')
<div class="container">


<form  action="/members" method="POST">
      {{ csrf_field() }}

    

       @include('pages.errors')

    	<div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">


    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder=" Enter Address" name="address">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder=" Enter Email" name="email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

   

  </form>

</div>
@stop
