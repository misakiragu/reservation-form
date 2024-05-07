@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')
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