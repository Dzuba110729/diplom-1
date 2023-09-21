@extends('layouts.app')

@section('content')
<h1>Prices</h1>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Value</th>
			<!-- Другие заголовки столбцов, если необходимо -->
		</tr>
	</thead>
	<tbody>
		@foreach ($prices as $price)
		<tr>
			<td>{{ $price->id }}</td>
			<td>{{ $price->name }}</td>
			<td>{{ $price->value }}</td>
			<!-- Другие столбцы, если необходимо -->
		</tr>
		@endforeach
	</tbody>
</table>
@endsection