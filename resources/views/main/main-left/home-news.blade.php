<div class="home-news">
  <h3 class="home-news__title">@lang('main.title_news')</h3>
  <div class="home-news__list">
    @foreach($newsLatest as $news)
    <div class="home-news__item"><img class="news-image lazy" data-src="{{$news->article->img}}" alt="">
      <div class="news-detail">
        <a class="news-name" href="{{ url(app()->getLocale().'/news') }}/{{$news->article->alias}}">{{$news->title}}</a>
        <a class="news-date" href="{{ url(app()->getLocale().'/news') }}/{{$news->article->alias}}">{{$news->article->updated_at->format('d.m.Y')}}</a>
        <a class="news-text " href="{{ url(app()->getLocale().'/news') }}/{{$news->article->alias}}">{{$news->description}}
          <span class="news-arrow"></span>
        </a>
      </div>
    </div>
    @endforeach
  </div><a class="all-news" href="{{ url(app()->getLocale().'/news') }}">@lang('main.button_all_news')</a>
</div>
