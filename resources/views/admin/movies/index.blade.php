@extends('layouts.app')

@section('content')
<h1>Movies</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Release Date</th>
			<!-- Другие заголовки столбцов, если необходимо -->
		</tr>
	</thead>
	<tbody>
		@foreach ($movies as $movie)
		<tr>
			<td>{{ $movie->id }}</td>
			<td>{{ $movie->title }}</td>
			<td>{{ $movie->release_date }}</td>
			<!-- Другие столбцы, если необходимо -->
		</tr>
		@endforeach
	</tbody>
</table>
@endsection