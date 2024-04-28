<nav>
    <ul class="header-nav">
        @if (Auth::check())
        <li class="header-nav__item">
            <a class="header-nav__link" href="/mypage">マイページ</a>
        </li>
        <li class="header-nav__item">
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
            </form>
        </li>
    </ul>
</nav>