<header class="header">
  <div class="box">
    <div class="header__body">
      <div class="header__logo logo"><img src="/img/svg/logo.svg"></div>
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url('/', app()->getLocale() )}}" target="_self">Main</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/member_cases') }}" target="_self">Member&apos;s cases</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/factor_diagram') }}" target="_self">Factor diagram</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/about') }}" target="_self">About</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/news') }}" target="_self">News</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/literature') }}" target="_self">Literature</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="#" target="_self">FAQ</a></li>
        </ul>
      </nav>
      <div class="header__langs">
      @foreach (config('app.available_locales') as $locale)
        <a class="header__lang" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}">{{ strtoupper($locale) }}</a><span class="header__lang-devider"></span>
        
      @endforeach
      </div>
      <div class="header__login">
        
          @guest
          <button id="login-btn" data-fancybox data-src="#header-login-modal-js"><img src="/img/svg/user.svg" alt="User">
            <span>Login</span>
          </button>
          @endguest
        
        @auth
          <button ><img src="/img/svg/user.svg" alt="User"></button>
          <a class="logout" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @endauth
      </div>
      <div class="header__search-block">
        <button class="search-btn" id="search-btn-js"><img src="/img/svg/search.svg" alt="Search"></button>
        <form class="header__search">
          <input class="header__search-input" type="text" placeholder="Search">
          <button class="header__search-btn"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</header>
