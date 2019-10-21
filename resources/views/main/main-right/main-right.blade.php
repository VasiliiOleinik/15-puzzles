<div class="main__right">
  <div class="main__video">
    {{-- {!! $page->page->video !!} --}}
    <iframe 
      width="100%"
      height="100%" 
      src="https://www.youtube.com/embed/VQerrbCqpIY" 
      frameborder="0" 
      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen
    >
    </iframe>
  </div>
  @include('main.main-right.puzzle-15')
  <div class="main__right-note">@lang('main.text_puzzles')</div>
  @include('main.main-right.books')
</div>
