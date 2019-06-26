<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/libs.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery-ui.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;display=swap&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/main.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('news-css')
    @yield('personal_cabinet-css')
    <title>15-puzzle</title>
  </head>
  <body>
    <div class="content-wrapper" id="contentWrapper">
      <div class="page-wrapper" id="pageWrapper">
        <div class="header-login-modal" id="header-login-modal-js">
          <div class="header-login-modal__container">
            <button class="header-login-modal__close"><img src="img/svg/close-modal.svg" alt=""></button>
            <div class="container-authorization">
              <div class="container-authorization__tabs">
                <div class="authorization-tab active" id="tabs-login">Authorization</div>
                <div class="authorization-tab" id="tabs-registration">Registration</div>
              </div>
              <div class="container-authorization__login">
                <div class="login-inputs">
                  <form action="">
                    <input name="login" type="text" placeholder="Login">
                    <input name="password" type="password" placeholder="Password">
                    <button class="modal-login-btn">Login</button>
                  </form>
                </div>
                <div class="login-footer"><a class="forgot-pass" id="forgot-pass-js" href="javascript:void(0);">Forgot you password? <img src="img/svg/arrow.svg" alt=""></a></div>
              </div>
              <div class="container-authorization__reg">
                <div class="reg-inputs">
                  <form action="">
                    <input name="login" type="text" placeholder="Login">
                    <input name="email" type="email" placeholder="Email">
                    <input name="password" type="password" placeholder="Password">
                    <input name="congirm-password" type="password" placeholder="Confirm password">
                    <button class="modal-reg-btn">Registration</button>
                  </form>
                </div>
                <div class="reg-footer">
                  <p class="reg-footer__term">By clicking on the "Registration" button, I agree that I have read and accepted the <a href="javascript:void(0)">Terms of Use.</a></p>
                </div>
              </div>
            </div>
            <div class="container-recovery-pass">
              <div class="recovery-pass-header"><span>recovery password</span></div>
              <div class="recovery-pass-inputs">
                <form action="">
                  <input name="email" type="email" placeholder="Email">
                  <button class="recovery-pass-btn" id="recovery-pass-js">Recovery</button>
                </form><span class="recovery-success">Password reset link sent to your email</span>
              </div>
              <div class="recovery-pass-footer"><a class="recovery-pass-footer-link" id="back-to-login-js" href="javascript:void(0);"> <img src="img/svg/arrow.svg" alt="">Back to login</a><a class="recovery-pass-footer-link close" id="close-recovery-js" href="javascript:void(0);">Close</a></div>
            </div>
          </div>
        </div>
        <header class="header">
          <div class="box">
            <div class="header__body">
              <div class="header__logo logo"><img src="img/svg/logo.svg"></div>
              <nav class="header__nav">
                <ul class="header__nav-list">
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">Main</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">Member&apos;s cases</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">Factor diagram</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">About</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">News</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">Literature</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="#" target="_blank">FAQ</a></li>
                </ul>
              </nav>
              <div class="header__langs"><a class="header__lang" href="#">ENG</a><span class="header__lang-devider"></span><a class="header__lang" href="#">RU</a></div>
              <div class="header__login">
                <button id="login-btn" data-fancybox data-src="#header-login-modal-js"><img src="img/svg/user.svg" alt="User"><span>Login</span></button>
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
        <main class="main">
          @yield('content')
        </main>
      </div>
      <div class="footer-wrapper" id="footerWrapper">
        <footer class="footer">
          <div class="box">
            <div class="footer__items">
              <div class="footer__left footer__item">
                <div class="footer__logo logo"><img src="img/svg/logo.svg"></div>
                <ul class="footer__list">
                  <li class="footer__li"><a class="footer__link" href="#" target="_blank">letter to the editor</a></li>
                  <li class="footer__li"><a class="footer__link" href="#" target="_blank">Privacy Policy</a></li>
                  <li class="footer__li"><a class="footer__link" href="#" target="_blank">terms of service</a></li>
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
              <div class="footer__socs"><a class="footer__soc" href="#" target="_blank"><img src="img/svg/youtube.svg"></a><a class="footer__soc" href="#" target="_blank"><img src="img/svg/facebook.svg"></a><a class="footer__soc" href="#" target="_blank"><img src="img/svg/insta.svg"></a></div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script src="{{ asset('js/frontend/libs.min.js') }}"></script>
    <script src="{{ asset('js/frontend/common.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body></html>
