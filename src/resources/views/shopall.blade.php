@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shopall.css') }}">
@endsection

@section('content')
<div class="card">
    @foreach ($shops as $shop)
    <div class="card__img">
        @if ($shop->image_url)
        <img src="{{ asset($shop->image_url) }}" alt="{{ $shop->name }}">
        @endif
    </div>
    <div class="card__shop">
        <h2 class="card__shop-name">
            {{ $shop->name }}
        </h2>
        <div class="card__content-tag">
            <p class="card__content-tag-item">
                #{{ $shop->address }}</p>
            <p class="card__content-tag-item">
                #{{ $shop->genre }}
            </p>
        </div>
        <a href="{{ route('shops.show', ['id' => $shop->id]) }}">詳しくみる</a>
    </div>
    @endforeach
</div>
@endsection