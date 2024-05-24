@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')

<body>
    <div class="shop">
        <a href="/"> ＜ </a>
        <h1>{{ $shop->name }}</h1>
        @if ($shop->image_url)
        <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
        @endif
        <p>#{{ $shop->area->name }}</p>
        <p>#{{ $shop->genre->name }}</p>
        <p>{{ $shop->overview }}</p>
    </div>
    <div class="reservation">
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            <label for="date">予約日:</label>
            <input type="date" id="reservation_date" name="reservation_date">
            <label for="time">予約時間:</label>
            <input type="time" id="reservation_time" name="reservation_time">
            <label for="people">予約人数:</label>
            <input type="number" id="reservation_number" name="reservation_number" min="1">
            <button type="submit">予約する</button>
        </form>

        @if (session('selectedShop'))
        <table>
            <tr>
                <th>Shop</th>
                <td>{{ session('selectedShop') }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ session('selectedDate') }}</td>
            </tr>
            <tr>
                <th>Time</th>
                <td>{{ session('selectedTime') }}</td>
            </tr>
            <tr>
                <th>Number</th>
                <td>{{ session('selectedNumber') }}</td>
            </tr>
        </table>
        @endif
    </div>
</body>
@endsection