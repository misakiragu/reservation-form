@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<body>
    <h1>{{ $user->name }}さん</h1>
    <div class="container">
        <div class="left-column reservation">
            <h2>予約状況</h2>

            @if($reservations->isEmpty())
            <p>予約がありません。</p>
            @else
            @foreach($reservations as $reservation)
            <div class="reservation-card">
                <h3>予約{{ $reservation->id }}</h3>
                <p>Shop:{{ $reservation->shop->name }}</p>
                <p>Date: {{ $reservation->reservation_date }}</p>
                <p>Time: {{ $reservation->reservation_time }}</p>
                <p>Number: {{ $reservation->reservation_number }}</p>
            </div>
            @endforeach
            @endif
        </div>

        <div class="right-column">
            <h2>お気に入り店舗</h2>
            <div class="favorite">
                @if($favorites->isEmpty())
                <p>お気に入りがありません。</p>
                @else
                @foreach ($favorites as $favorite)
                @if ($favorite->shop)
                <div class="card">
                    <img src="{{ asset($favorite->shop->image_url) }}" alt="{{ $favorite->shop->name }}" class="card-img">
                    <div class="card-content">
                        <h2 class="card-title">{{ $favorite->shop->name }}</h2>
                        <p class="card-address">#{{ $favorite->shop->area->name ?? '' }}</p>
                        <p class="card-genre">#{{ $favorite->shop->genre->name ?? '' }}</p>
                        <a href="{{ route('shop', ['shop_id' => $favorite->shop->id]) }}" class="details-link">詳しくみる</a>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
@endsection