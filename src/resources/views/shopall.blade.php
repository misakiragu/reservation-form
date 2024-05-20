@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="{{ route('shop.search') }}" method="GET" class="search-form">
        <div class="form-group">
            <select name="area" id="area">
                <option value="">All area</option>
                <option value="1">東京都</option>
                <option value="2">福岡県</option>
                <option value="3">大阪府</option>
            </select>
        </div>
        <div class="form-group">
            <select name="genre" id="genre">
                <option value="">All genre</option>
                <option value="1">寿司</option>
                <option value="2">イタリアン</option>
                <option value="3">ラーメン</option>
                <option value="4">居酒屋</option>
                <option value="5">焼肉</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="keyword" id="keyword" placeholder="Search...">
        </div>
    </form>
</div>
<div class="cards-container">
    @foreach ($shops as $shop)
    <div class="card">
        <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}" class="card-img">
        <div class="card-content">
            <h2 class="card-title">{{ $shop->name }}</h2>
            <p class="card-address">#{{ $shop->area->name ?? '' }}</p>
            <p class="card-genre">#{{ $shop->genre->name ?? '' }}</p>
            <a href="{{ route('shop', ['shop_id' => $shop->id]) }}" class="details-link">詳しくみる</a>

            @auth
            @php
            $isFavorited = Auth::user()->favorites()->where('shop_id', $shop->id)->exists();
            @endphp

            @if ($isFavorited)
            <form action="{{ route('favorite.remove', $shop->id) }}" method="POST" class="favorite-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="favorite-button active">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
            @else
            <form action="{{ route('favorite.add', $shop->id) }}" method="POST" class="favorite-form">
                @csrf
                <button type="submit" class="favorite-button">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
            @endif
            @else
            <a href="{{ route('login') }}" class="favorite-button">
                <i class="fas fa-heart"></i>
            </a>
            @endauth
        </div>
    </div>
    @endforeach
</div>
@endsection