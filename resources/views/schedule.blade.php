@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Расписание сеансов</h1>
	<table class="table">
		<thead>
			<tr>
				<th>Фильм</th>
				<th>Дата и время сеанса</th>
				<th>Доступные места</th>
				<th>Цена билета</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			@foreach($schedule as $session)
			<tr>
				<td>{{ $session->movie->title }}</td>
				<td>{{ $session->date_time }}</td>
				<td>{{ $session->available_seats }}</td>
				<td>{{ $session->ticket_price }}</td>
				<td>
					<a href="{{ route('select.seat', ['session_id' => $session->id]) }}" class="btn btn-primary">Выбрать сеанс</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection