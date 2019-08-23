<script src="{{ asset('js/frontend/libs.min.js') }}"></script>
<script src="{{ asset('js/frontend/common.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/frontend/jquery-ui.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js"></script>
<script src="{{ asset('js/backend/backend.js') }}"></script>
<script src="{{ asset('js/backend/auth.js') }}"></script>
@yield('main-js')
@yield('member_cases-js')
@yield('news-js')
@yield('literature-js')
@yield('personal_cabinet-js')
