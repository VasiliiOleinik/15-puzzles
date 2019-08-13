<div class="main__left">
  <h2 class="main__left-title">{{ config('puzzles.main.h1_'.app()->getLocale()) }}</h2>
  <div class="main__left-subtitle">@lang('main.subtitle_main')
  </div>
  <div class="main__left-text">
    @lang('main.text_main')
  </div>
  @include('main.main-left.main-tabs.main-tabs')
  @include('main.main-left.methods-laboratories')
  @include('main.main-left.home-news')
</div>
