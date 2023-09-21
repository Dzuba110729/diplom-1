@extends('layouts.app')

@section('content')
    <h1>Schedule</h1>

    <!-- Place code to display the schedule here -->
    <form method="POST" action="{{ url('/admin/schedule/update') }}">
        @csrf
        <!-- Place code for the update form here -->
        <button type="submit" class="btn btn-primary">Update Schedule</button>
    </form>
@endsection