

<style type="text/css">
	table{
		border-collapse: collapse;


	}

	th,td{
		border: 1px solid black;
	}
</style>

<div class="container">
<h3> Members Details </h3>
<table class="table table-striped">
<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Email</th>
	
		</tr>
	</thead>
	<tbody>
	@foreach($members as $member)
		<tr>
			<td>{{ $member->id }}</td>
			<td>{{ $member->name }}</td>
			<td>{{ $member->address }}</td>
			<td>{{ $member->email }}</td>
			
		</tr>

@endforeach
				
</tbody>
</table>
</div>
