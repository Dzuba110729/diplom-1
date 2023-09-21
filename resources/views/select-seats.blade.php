@extends('layouts.app')

@section('content')
    <h1>Выберите места в кинозале</h1>
    
    <h2>Фильм: {{ $movie->title }}</h2>
    <h3>Сеанс: {{ $session->start_time }}</h3>

    <div class="cinema-hall">
        <!-- Здесь добавьте графическую схему кинозала с отмеченными доступными и занятыми местами -->
        @foreach ($availableSeats as $seat)
            <div class="seat available" data-seat="{{ $seat->id }}">Место {{ $seat->number }}</div>
        @endforeach
        @foreach ($occupiedSeats as $seat)
            <div class="seat occupied">Место {{ $seat->number }}</div>
        @endforeach
    </div>

    <form action="{{ route('checkout') }}" method="post">
        @csrf
        <label for="seat">Выберите место:</label>
        <select name="seat" id="seat">
            @foreach ($availableSeats as $seat)
                <option value="{{ $seat->id }}">Место {{ $seat->number }} - {{ $seat->price }} руб.</option>
            @endforeach
        </select>

        <label for="quantity">Количество билетов:</label>
        <input type="number" name="quantity" id="quantity" min="1" max="{{ count($availableSeats) }}" value="1">

        <button type="submit">Продолжить</button>
    </form>
@endsection
