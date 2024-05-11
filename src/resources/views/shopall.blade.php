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
            <p class="card-address">
                #{{ $shop->address }}
            </p>
            <p class="card-address">
                #{{ $shop->genre }}
            </p>
            <a href="{{ route('shop', ['shop_id' => $shop->id]) }}" class="details-link">詳しくみる</a>
            <form action="{{ route('favorite.add', $shop->id) }}" method="POST">
                @csrf
                <button type="button" class="favorite-button">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<script>
    console.log('Script is loaded');
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Document is ready');
        var favoriteButtons = document.querySelectorAll('.favorite-button');
        favoriteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                console.log('Button was clicked.'); // コンソールにクリック確認のメッセージを出力
            });
        });
    });
</script>
@endsection