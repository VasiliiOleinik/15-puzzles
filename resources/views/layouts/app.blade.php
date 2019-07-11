<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  @include('layouts.include.meta')
  @include('layouts.include.css')
  <title>15-puzzle</title>
</head>
<body>
<div class="content-wrapper" id="contentWrapper">
  <div class="page-wrapper" id="pageWrapper">
    @include('layouts.include.login-modal.login-modal')
    @include('layouts.include.header')
    @yield('content')
  </div>
  <div class="footer-wrapper" id="footerWrapper">
    @include('layouts.include.footer')
  </div>
</div>
@include('layouts.include.scripts')
</body>
</html>
