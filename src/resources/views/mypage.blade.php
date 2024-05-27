@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<body>
    <h1>{{ $user->name }}さん</h1>
    <div class="container">
        <div class="left-column reservation">
            <h2>予約一覧</h2>

            @if($reservations->isEmpty())
            <p>予約がありません。</p>
            @else
            <table border="1">
                <thead>
                    <tr>
                        <th>店舗名</th>
                        <th>予約日</th>
                        <th>予約時間</th>
                        <th>予約人数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->shop->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->reservation_time }}</td>
                        <td>{{ $reservation->reservation_number }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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