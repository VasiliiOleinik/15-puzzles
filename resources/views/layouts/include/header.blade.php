<header class="header">
  <div class="box">
    <div class="header__body">
      <div class="header__logo logo"><img src="/img/svg/logo.svg"></div>
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url('/', app()->getLocale() )}}" target="_self">@lang('header.main')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/member_cases') }}" target="_self">@lang('header.member_cases')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/factor_diagram') }}" target="_self">@lang('header.factor_diagram')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/about') }}" target="_self">@lang('header.about')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/news') }}" target="_self">@lang('header.news')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/literature') }}" target="_self">@lang('header.literature')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="#" target="_self">@lang('header.faq')</a></li>
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
            <span>@lang('header.login')</span>
          </button>
          @endguest
        
        @auth
          <button ><img src="/img/svg/user.svg" alt="User"></button>
          <a class="logout" href="{{ route('logout', app()->getLocale() ) }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('header.logout')</a>
          <form id="logout-form" action="{{ route('logout', app()->getLocale() ) }}" method="POST" style="display: none;">
            @csrf
          </form>
        @endauth
      </div>
      <div class="header__search-block">
        <button class="search-btn" id="search-btn-js"><img src="/img/svg/search.svg" alt="@lang('header.placeholder_search')"></button>
        <form class="header__search">
          <input class="header__search-input" type="text" placeholder="@lang('header.placeholder_search')">
          <button class="header__search-btn"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</header>
