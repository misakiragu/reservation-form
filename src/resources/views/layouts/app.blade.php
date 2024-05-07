<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="hamburger-menu">
                <div class="hamburger-menu-line line-top"></div>
                <div class="hamburger-menu-line line-middle"></div>
                <div class="hamburger-menu-line line-bottom"></div>
            </div>
            <p class="header__logo">Rese</p>
        </div>
        <div class="nav-menu">
            <ul>
                <li><a href="/shopall">Home</a></li>
                <li><a href="/register">Registration</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
    </header>


    <main>
        @yield('content')
    </main>

    <script>
        function toggleMenu() {
            var menu = document.querySelector('.nav-menu');
            menu.classList.toggle('is-active');
        }
    </script>
</body>

</html>