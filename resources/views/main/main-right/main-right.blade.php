<div class="main__right">
  <div class="main__video">
    <div class="main__video-overlay"></div>
    <video class="lazy" poster="img/Video.png">
      <source data-src="{{ config('puzzles.main.link_video') }}" type="video/mp4">
    </video>
  </div>
  @include('main.main-right.puzzle-15')
  <div class="main__right-note">@lang('main.text_puzzles')</div>
  @include('main.main-right.books')
</div>
