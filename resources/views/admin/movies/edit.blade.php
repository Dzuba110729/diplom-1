@extends('layouts.app')

@section('content')
<h1>Edit Movie</h1>

<form method="POST" action="{{ url('/admin/movies/update') }}">
	@csrf
	<input type="hidden" name="movie_id" value="{{ $movie->id }}">
	<div class="form-group">
		<label for="movie_title">Title:</label>
		<input type="text" name="movie_title" id="movie_title" value="{{ $movie->title }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="movie_release_date">Release Date:</label>
		<input type="date" name="movie_release_date" id="movie_release_date" value="{{ $movie->release_date }}" class="form-control">
	</div>
	<!-- Другие поля для редактирования, если необходимо -->
	<button type="submit" class="btn btn-primary">Update Movie</button>
</form>
@endsection