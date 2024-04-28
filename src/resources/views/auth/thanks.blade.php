@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks_card">
    <p class="thanks_message">会員登録ありがとうございます</p>
    <div class="login__link">
        <a class="login__button-submit" href="/login">ログインする</a>
    </div>
</div>
@endsection