@extends('layouts.app')

@section('content')
    <h1>Выберите фильм и сеанс</h1>
    
    <form action="{{ route('book-ticket') }}" method="post">
        @csrf
        <label for="movie">Выберите фильм:</label>
        <select name="movie" id="movie">
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
            @endforeach
        </select>

        <label for="session">Выберите сеанс:</label>
        <select name="session" id="session">
            @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->start_time }}</option>
            @endforeach
        </select>

        <button type="submit">Забронировать билет</button>
    </form>
@endsection
