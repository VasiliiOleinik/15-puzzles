<header class="header">
  <div class="box">
    <div class="header__body">
      <div class="header__logo logo"><a href="{{ url('/', app()->getLocale() )}}"> <img src="{{ config('puzzles.options.logo') }}"></div>
      <nav class="header__nav">
        <ul class="header__nav-list">
          {{-- <li class="header__nav-li"><a class="header__nav-link" href="{{ url('/', app()->getLocale() )}}" target="_self">@lang('header.main')</a></li> --}}
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/member_cases') }}" target="_self">@lang('header.member_cases')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/factor_diagram') }}" target="_self">@lang('header.factor_diagram')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/about') }}" target="_self">@lang('header.about')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/news') }}" target="_self">@lang('header.news')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/literature') }}" target="_self">@lang('header.literature')</a></li>
          <li class="header__nav-li"><a class="header__nav-link" href="{{ url(app()->getLocale().'/faq') }}" target="_self">@lang('header.faq')</a></li>
        </ul>
      </nav>
      <div class="header__langs">
      @php
        $localeCount = 0;
      @endphp
      @foreach (config('app.available_locales') as $locale)
        @php
            $localeCount ++;
        @endphp
        @if(ctype_digit(substr(url()->current(), strrpos(url()->current(), '/') + 1)) && (int) substr(url()->current(), strrpos(url()->current(), '/') + 1) > 0 || strpos(url()->current(), csrf_token()) !== false || \Request::route()->getName() == "news_category" || \Request::route()->getName() == "literature_category" || \Request::route()->getName() == "news_show" || \Request::route()->getName() == "news.show"|| \Request::route()->getName() == "member_cases.show")
          <a class="header__lang" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, substr(url()->current(), strrpos(url()->current(), '/') + 1)]) }}">{{ strtoupper($locale) }}</a>
        @else
          <a class="header__lang" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale]) }}">{{ strtoupper($locale) }}</a>
        @endif
        @if( $localeCount < count( config('app.available_locales') ) )
          <span class="header__lang-devider"></span>
        @endif
      @endforeach
      </div>
      <div class="header__login">
          @guest
          <button id="login-btn" data-fancybox data-src="#header-login-modal-js"><img src="/img/svg/user.svg" alt="User">
            <span>@lang('header.login')</span>
          </button>
          @endguest
          @auth
          <button >
          @if( Auth::user()->img==null )
            <img src="{{ asset('images/no_avatar.png') }}" alt="User">
          @else
            <img src="{{Auth::user()->img}}" alt="User">
          @endif
          </button>
          <a class="logout" href="{{ route('logout', app()->getLocale() ) }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{Auth::user()->nickname}}</a>
          <form id="logout-form" action="{{ route('logout', app()->getLocale() ) }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endauth
          <div class="login-modal">
            <a href="{{ url(app()->getLocale().'/personal_cabinet') }}" class="login-modal__link">@lang('header.personal')</a>
            @auth
            <a class="login-modal__link" href="{{ route('logout', app()->getLocale() ) }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('header.logout')</a>
            @endauth
          </div>
      </div>
      <div class="header__search-block">
        <button class="search-btn" id="search-btn-js"><img src="/img/svg/search.svg" alt="@lang('header.placeholder_search')"></button>
        <form action="{{ route( 'search', app()->getLocale() ) }}" method="GET" class="header__search">
            <input class="header__search-input" type="text" placeholder="@lang('header.placeholder_search')" name="q" value="{{ old('q') }}">
            <button class="header__search-btn"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</header>
