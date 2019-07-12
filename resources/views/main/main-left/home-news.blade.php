<div class="home-news">
  <h3 class="home-news__title">@lang('main.title_news')</h3>
  <div class="home-news__list">
    @foreach($newsLatest as $news)
    <div class="home-news__item"><img class="news-image" src="{{$news->img}}" alt="">
      <div class="news-detail"><a class="news-name" href="/news/{{$news->id}}">{{$news->title}}</a><a class="news-date" href="javascript:void(0)">{{$news->updated_at->format('d.m.Y')}}</a><a class="news-text " href="/news/{{$news->id}}">{{substr($news->content, 0, 200)}}<span class="news-arrow">   </span></a></div>
    </div>
    @endforeach
  </div><a class="all-news" href="/news">@lang('main.button_all_news')</a>
</div>
