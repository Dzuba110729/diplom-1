@extends('layouts.app')

@section('content')
<h1>Halls</h1>

<table class="table">
	 <thead>
		  <tr>
				<th>ID</th>
				<th>Name</th>
				<th>Capacity</th>
				<!-- Другие заголовки столбцов, если необходимо -->
		  </tr>
	 </thead>
	 <tbody>
		  @foreach ($halls as $hall)
				<tr>
					 <td>{{ $hall->id }}</td>
					 <td>{{ $hall->name }}</td>
					 <td>{{ $hall->capacity }}</td>
					 <!-- Другие столбцы, если необходимо -->
				</tr>
		  @endforeach
	 </tbody>
</table>
@endsection