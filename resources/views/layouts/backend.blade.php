<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '15 Pazzles') }}</title>

    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    <!-- Styles -->

    @yield('news-css')
    @yield('personal_cabinet-css')
    <link href="{{ asset('css/backend/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <!--include _preloader-->
    <div class="content-wrapper" id="contentWrapper">
        <div class="page-wrapper" id="pageWrapper">
        
        
            <header class="header">
              <div class="box">
                <div class="header__body">
                  <div class="header__logo logo"><img src="/images/logo.svg"></div>
                  <form class="header__search">
                    <input class="header__search-input" placeholder="Search" type="text">
                    <button class="header__search-btn"><i class="fas fa-search"></i></button>
                  </form>
                  <nav class="header__nav">
                    <ul class="header__nav-list">
                      <li class="header__nav-li">
                        <a class="header__nav-link" href="/"  target="_self">Main</a>
                      </li>
                      <li class="header__nav-li">
                        <a class="header__nav-link" href="/"  target="_self">Member's cases</a>
                      </li>
                      <li class="header__nav-li">
                        <a class="header__nav-link" href="/"  target="_self">Factor diagram</a>
                      </li>
                      <li class="header__nav-li">
                        <a class="header__nav-link" href="/"  target="_self">About</a>
                      </li>
                      <li class="header__nav-li">
                        <a class="header__nav-link" href="/"  target="_self">News</a>
                      </li>
                      
                      <!--
                      <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/members_cases.html#" target="_blank">Main</a></li>
                      <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/members_cases.html#" target="_blank">Member's cases</a></li>
                      <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/members_cases.html#" target="_blank">Factor diagram</a></li>
                      <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/members_cases.html#" target="_blank">About</a></li>
                      <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/members_cases.html#" target="_blank">News</a></li>
                      -->
                    </ul>
                  </nav>
                  <div class="header__langs"><a class="header__lang" href="http://15-puzzle.dev-team.su/members_cases.html#">ENG</a><span class="header__lang-devider"></span><a class="header__lang" href="http://15-puzzle.dev-team.su/members_cases.html#">RU</a></div>
                  <form class="header__mobile_search">
                    <button class="header__search-btn"><i class="fas fa-search"></i></button>
                  </form>
                </div>
              </div>
            </header>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->

    <script src="{{ asset('js/backend/backend.js') }}" defer></script>
    @yield('main-js')
    @yield('news-js')
    @yield('personal_cabinet-js')
    @yield('personal_cabinet-js')
    <!--
    @if(Route::currentRouteName() == "news")
       
    @endif
    -->
    
</body>
</html>
