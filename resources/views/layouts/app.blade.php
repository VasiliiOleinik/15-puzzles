<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="http://15-puzzle.dev-team.su/assets/img/favicon.ico" rel="shortcut icon">-->
    @yield('news-css')
    @yield('personal_cabinet-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/fonts/1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/libs.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery-ui.min.css') }}">
    <!--
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/libs.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery-ui.min.css') }}">
    
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/css.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/css(1).css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/fonts/1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/fonts/2.css') }}">    
    -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>15-puzzle</title>
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
                  <li class="header__nav-li"><a class="header__nav-link" href="/" target="_self">Main</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="/member_cases" target="_self">Member's cases</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="/factor_diagram" target="_self">Factor diagram</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="/about" target="_self">About</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="/news" target="_self">News</a></li>
                </ul>
              </nav>
              <div class="header__langs"><a class="header__lang" href="http://15-puzzle.dev-team.su/home.html#">ENG</a><span class="header__lang-devider"></span><a class="header__lang" href="http://15-puzzle.dev-team.su/home.html#">RU</a></div>
              <form class="header__mobile_search">
                <button class="header__search-btn"><i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>
        </header>
        <main class="main">
          @yield('content')
        </main>
      </div>
      <div class="footer-wrapper" id="footerWrapper">
        <footer class="footer">
          <div class="box">
            <div class="footer__items">
              <div class="footer__left footer__item">
                <div class="footer__logo logo"><img src="/images/main/logo.svg"></div>
                <ul class="footer__list">
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">letter to the editor</a></li>
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Privacy Policy</a></li>
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">terms of service</a></li>
                </ul>
              </div>
              <div class="footer__middle footer__item">
                <h6 class="footer__h6">Disclaimer:</h6>
                <p class="footer__disclaimer">None of the above-stated protocols o r supplements have been evaluated or approved by FDA to diagnose or treat cancer. The website collects and presents information "as-is" about protocols used and developed by third-party individual doctors or scientific organizations worldwide, who did not undergo formal 1-2-3 stage clinical trials required to formally prove the efficacy of methods, drugs and supplements used. All efficacy information is given based on proprietary evidence data presented by the relevant authors of the protocols and individual patients website members.</p>
              </div>
              <div class="footer__right footer__item">
                <h6 class="footer__h6">Take latest news from 15-Puzzle:</h6>
                <form class="footer__subscribe">
                  <input type="email" placeholder="Your Email Address">
                  <button type="button">Subscribe</button>
                </form>
                <h6 class="footer__h6 evidence-title">Levels of evidence:</h6>
                <ul class="footer__evidence">
                  <li class="proven">Proven</li>
                  <li class="average">Average</li>
                  <li class="low">Low</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="footer__copirate">Copyright © 2019 15Puzzle Company. All rights reserved.
              <div class="footer__socs"><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/youtube.svg"></a><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/facebook.svg"></a><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/insta.svg"></a></div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{ asset('js/frontend/libs.min.js') }}"></script>
    <script src="{{ asset('js/frontend/common.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery-ui.min.js') }}"></script>
  
</body></html>
