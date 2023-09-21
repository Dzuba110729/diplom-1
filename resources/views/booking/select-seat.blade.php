@extends('layouts.app') {{-- Используйте ваш макет страницы, если есть --}}

@section('content')
    <div class="container">
        <h2>Выбор места и бронирование билета</h2>

        {{-- Информация о фильме --}}
        <div class="movie-info">
            <h3>{{ $movie->title }}</h3>
            <p>{{ $movie->description }}</p>
            <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }} Poster">
        </div>

        {{-- Информация о сеансе --}}
        <div class="session-info">
            <h4>Сеанс:</h4>
            <p>Дата: {{ $session->date }}</p>
            <p>Время: {{ $session->time }}</p>
            <p>Зал: {{ $session->hall->name }}</p>
        </div>

        {{-- Форма для выбора места и бронирования --}}
        <form action="{{ route('book.ticket', ['session_id' => $session->id]) }}" method="POST">
            @csrf
            {{-- Здесь добавьте поля для выбора мест и информации о билете --}}
            {{-- Например, список доступных мест --}}
            <div class="seat-selection">
                <label for="seat">Выберите место:</label>
                <select name="seat" id="seat">
                    @foreach($seats as $seat)
                        <option value="{{ $seat->id }}">{{ $seat->name }} ({{ $seat->type }}) - {{ $seat->price }} руб.</option>
                    @endforeach
                </select>
            </div>

            {{-- Другие поля формы --}}
            <div class="payment-info">
                <h4>Информация о платеже:</h4>
                {{-- Добавьте поля для ввода информации о платеже (номер кредитной карты, срок действия, CVV и т. д.) --}}
            </div>

            {{-- Кнопка для бронирования --}}
            <button type="submit">Забронировать билет</button>
        </form>
    </div>
@endsection
