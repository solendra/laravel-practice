@extends('layouts.layout')
@section('title')
Members
@stop

@section('body')

<div class="container">

<div class="panel panel-body">

@if (session()->has('notify_created'))
<div class="row">
<div class="alert alert-success alert-dismissable fade in">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    
    <strong>Success!</strong>{{ session()->get('notify_created') }} 
  </div>
</div>
@endif 

@if(session()->get('notify_deleted'))
<div class="row">
 <div class="alert alert-danger alert-dismissable fade in">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    
    <strong>Deleted!</strong>{{ session()->get('notify_deleted') }} 
  </div>
</div>
@endif

@if(session()->get('notify_updated'))
<div class="row">
 <div class="alert alert-info alert-dismissable fade in">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    
    <strong>Updated!</strong>{{ session()->get('notify_updated') }} 
  </div>
</div>
@endif


<div class="row" style="float:right">


<div class="col-lg-6">
<form method="POST" action="/importexcel" enctype="multipart/form-data">
{{ csrf_field() }}
  <label class="btn btn-info btn-file">
       <input type="file" name="file_upload" style="display: none; float:right"> Browse File 
    </label>
    <button type="submit" class="btn btn-success" style="float:left">Upload</button>
   
    @include('pages.errors')
</form>

</div>

<div class="col-lg-2">
<form method="get" action="/export" enctype="multipart/form-data">
<button type=" submit" class="btn btn-info" style="float:right; margin-right:25px;" > Download Excel </button>
</form>
</div>

<div class="col-lg-2">
<form method="get" action="/exportcsv/" enctype="multipart/form-data">
<button type=" submit" class="btn btn-info" style="float:right;" > Download CSV</button>
</form>
</div>



<div class="col-lg-2" >
<form method="get" action="/pdf" >
<button type="submit" class="btn btn-info" style="float:left; ">Download PDF</button>
</form>
</div> 

</div>



<div class="row">
<div class="col-sm-12">
<a href="/members/create" class="btn btn-info btn-md" role="button">Add New Member</a>
</div>
</div>
<div class="row">
 <div class="col-lg-6">

<h3>Members Details</h3>
</div>	



	<div class="col-lg-6">
	<form method="GET" action="/members" >
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search Here">
      <span class="input-group-btn">
      <button class="btn btn-default" type="submit"> Search </button>
      </span>
    </div><!-- /input-group -->
    </form>
  </div><!-- /.col-lg-6 -->
</div>
<table class="table table-striped">
<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Email</th>
		<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($members as $member)
		<tr>
		
			<td>{{ $member->id }}</td>
			<td>{{ $member->name }}</td>
			<td>{{ $member->address }}</td>
			<td>{{ $member->email }}</td>

			<td>
			<div class="form-group">
			<form method="GET" action="{{ route('members.edit', $member->id) }}">
				{{ csrf_field() }}
			{{ method_field('PUT')}}
		
			<button type="submit" class="btn btn-success">Edit</button>
			</form>	
			</div>	
			</td>

			<td>
			<div class="form-group">
			<form  action="{{route('members.destroy', $member->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE')}}
			<button type="submit" class="btn btn-danger">Delete</button>
			</form>	
			</div>	
			</td>

			
		</tr>

@endforeach
				
</tbody>
</table>
<p>{{ $members->count() }} members showing out of {{ $members->total() }} total entries</p>
{{ $members->links() }}
</div>


</div>
@stop
