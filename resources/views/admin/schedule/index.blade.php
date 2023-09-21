@extends('layouts.app')

@section('content')
<h1>Schedule</h1>

<table class="table">
	 <thead>
		  <tr>
				<th>ID</th>
				<th>Movie</th>
				<th>Date</th>
				<th>Time</th>
				<!-- Другие заголовки столбцов, если необходимо -->
		  </tr>
	 </thead>
	 <tbody>
		  @foreach ($schedule as $session)
				<tr>
					 <td>{{ $session->id }}</td>
					 <td>{{ $session->movie->title }}</td>
					 <td>{{ $session->date }}</td>
					 <td>{{ $session->time }}</td>
					 <!-- Другие столбцы, если необходимо -->
				</tr>
		  @endforeach
	 </tbody>
</table>
@endsection