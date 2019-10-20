<div class="main__left">
  <h2 class="main__left-title">{{ $page->h1 }}</h2>
  <div class="main__left-text">
    {!! $page->puzzles_description !!}
  </div>
  @include('main.main-left.main-tabs.main-tabs')
  @include('main.main-left.methods-laboratories')
  @include('main.main-left.home-news')
</div>
