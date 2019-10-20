<div class="news-left">
  <div class="breadcrumbs">
    <ul class="breadcrumbs__list">
      <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
      <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
      <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="{{ url(app()->getLocale().'/news') }}">@lang('breadcrumbs.news')</a></li>
    </ul>
  </div>
  <div class="main-content">
    @include('news.news-left.main-content')
  </div>
</div>
