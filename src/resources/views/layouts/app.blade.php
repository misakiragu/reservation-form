<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="hamburger-menu" onclick="toggleMenu()">
                <div class="hamburger-menu-line line-top"></div>
                <div class="hamburger-menu-line line-middle"></div>
                <div class="hamburger-menu-line line-bottom"></div>
            </div>
            <p class="header__logo">Rese</p>
        </div>
        <div class="menu-content" id="menuContent" style="display: none;">
            <button class="close-btn" onclick="toggleMenu()">&#x2715;</button>
            <ul>
                @auth
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
                <li><a href="/mypage">Mypage</a></li>
                @else
                <li><a href="/">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
                @endauth
            </ul>
        </div>
        @yield('header-form')
    </header>


    <main>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @yield('content')
    </main>

    <script>
        function toggleMenu() {
            var menuContent = document.getElementById('menuContent');
            if (menuContent.style.display === "block") {
                menuContent.style.display = "none";
            } else {
                menuContent.style.display = "block";
            }
        }
    </script>
</body>

</html>