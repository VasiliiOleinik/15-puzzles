<div class="main__left">
  <h2 class="main__left-title">{{ config('puzzles.main.h1_'.app()->getLocale()) }}</h2>
  <div class="main__left-text">
    {!! config('puzzles.main.description_'.app()->getLocale()) !!}
  </div>
  @include('main.main-left.main-tabs.main-tabs')
  @include('main.main-left.methods-laboratories')
  @include('main.main-left.home-news')
</div>
