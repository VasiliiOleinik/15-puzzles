<div class="main__right">
  <div class="main__video">
    <div class="main__video-overlay"><!--<img class="main__video-logo" src="img/svg/logo.svg">--></div>
    <video poster="img/Video.png">
      <source src="{{ Illuminate\Support\Facades\Config::get('puzzles.video_url') }}" type="video/mp4">
    </video>
  </div>
  @include('main.main-right.puzzle-15')
  <div class="main__right-note">@lang('main.text_puzzles')</div>
  @include('main.main-right.books')
</div>
