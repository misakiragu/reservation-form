@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')

<body>
    <div class="shop-container">
        <div class="shop">
            <div class="header-content">
                <a href="/"> ＜ </a>
                <h1>{{ $shop->name }}</h1>
            </div>
            @if ($shop->image_url)
            <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
            @endif
            <div class="shop-tag">
                <p>#{{ $shop->area->name }}</p>
                <p>#{{ $shop->genre->name }}</p>
            </div>
            <p>{{ $shop->overview }}</p>
        </div>
        <div class="reservation">
            <h2>予約</h2>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="date" id="reservation_date" name="reservation_date">
                <input type="time" id="reservation_time" name="reservation_time">
                <input type="number" id="reservation_number" name="reservation_number" min="1">

                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{ $shop->name }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="display_date"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="display_time"></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td id="display_number"></td>
                    </tr>
                </table>
                <button type="submit">予約する</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to update display fields in real-time
        document.getElementById('reservation_date').addEventListener('input', function() {
            document.getElementById('display_date').textContent = this.value;
        });

        document.getElementById('reservation_time').addEventListener('input', function() {
            document.getElementById('display_time').textContent = this.value;
        });

        document.getElementById('reservation_number').addEventListener('input', function() {
            document.getElementById('display_number').textContent = this.value;
        });
    </script>
</body>
@endsection