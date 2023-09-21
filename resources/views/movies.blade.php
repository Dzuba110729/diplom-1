@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список фильмов</h1>
    <ul class="list-group">
        @foreach($movies as $movie)
        <li class="list-group-item">
            <h3>{{ $movie->title }}</h3>
            <p>{{ $movie->description }}</p>
            <p>Рейтинг: {{ $movie->rating }}</p>
            <p>Продолжительность: {{ $movie->duration }} минут</p>
				<a href="{{ route('select.session', ['movie_id' => $movie->id]) }}" class="btn btn-primary">Выбрать сеанс</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
