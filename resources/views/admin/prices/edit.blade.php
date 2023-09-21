@extends('layouts.app')

@section('content')
    <h1>Edit Prices</h1>

    <form method="POST" action="{{ url('/admin/prices/update') }}">
        @csrf
        <div class="form-group">
            <label for="price_id">Price ID:</label>
            <select name="price_id" id="price_id" class="form-control">
                @foreach ($prices as $price)
                    <option value="{{ $price->id }}">{{ $price->name }} - {{ $price->value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="new_price_value">New Price Value:</label>
            <input type="text" name="new_price_value" id="new_price_value" class="form-control">
        </div>
        <!-- Другие поля для обновления, если необходимо -->
        <button type="submit" class="btn btn-primary">Update Price</button>
    </form>
@endsection