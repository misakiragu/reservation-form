@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<body>
    <h1>{{ $user->name }}さんのマイページ</h1>
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
</body>
@endsection