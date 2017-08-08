@extends('layouts.layout')
@section ('title')
add member
@stop
@section ('body')
<div class="container">

<h3>Edit Member</h3>
<form  action="{{ route('members.update',$members->id) }}" method="POST">

    {{ csrf_field() }}
    {{ method_field('PUT')}}
      

    	<div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $members->name }}">
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address"  name="address"  value="{{ $members->address }}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email"  name="email" value="{{ $members->email }}">
    </div>
    <button type="submit" class="btn btn-default" >Update</button>
  </form>

</div>
@stop
