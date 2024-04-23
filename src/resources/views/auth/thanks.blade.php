@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="login__link">
    <a class="login__button-submit" href="/login">ログインの方はこちら</a>
</div>
@endsection