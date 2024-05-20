@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="{{ route('shop.search') }}" method="GET" class="search-form">
        <div class="form-group">
            <label for="area">エリア:</label>
            <select name="area" id="area">
                <option value="">選択してください</option>
                <option value="北海道">北海道</option>
                <option value="東京">東京</option>
                <option value="大阪">大阪</option>
                <!-- 他のエリア -->
            </select>
        </div>
        <div class="form-group">
            <label for="genre">ジャンル:</label>
            <select name="genre" id="genre">
                <option value="">選択してください</option>
                <option value="和食">和食</option>
                <option value="イタリアン">イタリアン</option>
                <option value="フレンチ">フレンチ</option>
                <!-- 他のジャンル -->
            </select>
        </div>
        <div class="form-group">
            <label for="keyword">フリーワード:</label>
            <input type="text" name="keyword" id="keyword" placeholder="キーワードで検索">
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>
</div>
<div class="cards-container">
    @foreach ($shops as $shop)
    <div class="card">
        <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}" class="card-img">
        <div class="card-content">
            <h2 class="card-title">{{ $shop->name }}</h2>
            <p class="card-address">{{ $shop->area->name ?? '' }}</p>
            <p class="card-genre">{{ $shop->genre->name ?? '' }}</p>
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
                <i class="fas fa-heart"></i> ログインしてお気に入りに追加
            </a>
            @endauth
        </div>
    </div>
    @endforeach
</div>
@endsection