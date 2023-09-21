@extends('layouts.app')

@section('content')
    <h1>Prices</h1>

    <!-- Place code to display the current prices here -->
    <form method="POST" action="{{ url('/admin/prices/update') }}">
        @csrf
        <!-- Place code for the update form here -->
        <button type="submit" class="btn btn-primary">Update Prices</button>
    </form>
@endsection