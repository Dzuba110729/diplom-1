@extends('layouts.app')

@section('content')
<h1>Edit Schedule</h1>

<form method="POST" action="{{ url('/admin/schedule/update') }}">
	 @csrf
	 <div class="form-group">
		  <label for="session_id">Session ID:</label>
		  <select name="session_id" id="session_id" class="form-control">
				@foreach ($schedule as $session)
					 <option value="{{ $session->id }}">{{ $session->movie->title }} - {{ $session->date }} - {{ $session->time }}</option>
				@endforeach
		  </select>
	 </div>
	 <div class="form-group">
		  <label for="new_date">New Date:</label>
		  <input type="date" name="new_date" id="new_date" class="form-control">
	 </div>
	 <div class="form-group">
		  <label for="new_time">New Time:</label>
		  <input type="time" name="new_time" id="new_time" class="form-control">
	 </div>
	 <!-- Другие поля для обновления, если необходимо -->
	 <button type="submit" class="btn btn-primary">Update Schedule</button>
</form>
@endsection