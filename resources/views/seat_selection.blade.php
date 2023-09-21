@extends('layouts.app')

@section('content')
<div class="cinema-seats">
	<img src="public/img/схема.jpg" alt="Схема кинозала">
	<div class="seat available" id="seat-1-1"></div>
	<div class="seat occupied" id="seat-1-2"></div>
	<!-- Другие места -->
</div>
<button id="continue-button">Продолжить</button>
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection
@section('scripts')
<script src="public/js/script.js"></script>
@endsection