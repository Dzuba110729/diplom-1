@extends('layouts.app')

@section('content')
<h1>Edit Hall</h1>

<form method="POST" action="{{ url('/admin/halls/update') }}">
	@csrf
	<input type="hidden" name="hall_id" value="{{ $hall->id }}">
	<div class="form-group">
		<label for="hall_name">Name:</label>
		<input type="text" name="hall_name" id="hall_name" value="{{ $hall->name }}" class="form-control">
	</div>
	<div class="form-group">
		<label for="hall_capacity">Capacity:</label>
		<input type="number" name="hall_capacity" id="hall_capacity" value="{{ $hall->capacity }}" class="form-control">
	</div>
	<!-- Другие поля для редактирования, если необходимо -->
	<button type="submit" class="btn btn-primary">Update Hall</button>
</form>
@endsection