<nav class="main_nav">
    <img class="main_logo" src="{{ asset('images/logo.png') }}" alt="Логотип">
    <div class="nav_search">
        <img class="search_icon" src="{{ asset('images/icons/search.png') }}" alt="search">
        <input class="input_search" type="text" placeholder="Поиск...">
    </div>
    <div class="nav_panel">
        <div class="account"><img class="account_logo" src="{{ asset('images/icons/account.png') }}" alt="account"><a href="{{ route('register') }}">Войти</a></div>
        <div class="basket"><img class="basket_logo" src="{{ asset('images/icons/basket.svg') }}" alt="basket"></div>
    </div>
</nav>