@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="thanks_card">
    <p class="thanks_message">ご予約ありがとうございます</p>
    <div class="login__link">
        <a class="login__button-submit" href="/">戻る</a>
    </div>
</div>
@endsection