<header class="header">
  <div class="box">
    <div class="header__body">
      <div class="header__logo logo"><img src="img/svg/logo.svg"></div>
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-li"><a class="header__nav-link" href="/" target="_self">Main</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="/member_cases" target="_self">Member&apos;s cases</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="/factor_diagram" target="_self">Factor diagram</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="/about" target="_self">About</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="/news" target="_self">News</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="/literature" target="_self">Literature</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="#" target="_self">FAQ</a></li>
        </ul>
      </nav>
      <div class="header__langs"><a class="header__lang" href="#">ENG</a><span class="header__lang-devider"></span><a
                class="header__lang" href="#">RU</a></div>
      <div class="header__login">
        <button id="login-btn" data-fancybox data-src="#header-login-modal-js"><img src="img/svg/user.svg" alt="User">
          @guest
            <span>Login</span>
          @endguest
        </button>
        @auth
          <a class="logout" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @endauth
      </div>
      <div class="header__search-block">
        <button class="search-btn" id="search-btn-js"><img src="img/svg/search.svg" alt="Search"></button>
        <form class="header__search">
          <input class="header__search-input" type="text" placeholder="Search">
          <button class="header__search-btn"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</header>
