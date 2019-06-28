<div class="home-news">
  <h3 class="home-news__title">News</h3>
  <div class="home-news__list">
    @foreach($newsLatest as $news)
    <div class="home-news__item"><img class="news-image" src="{{$news->img}}" alt="">
      <div class="news-detail"><a class="news-name" href="javascript:void(0)">{{$news->title}}</a><a class="news-date" href="javascript:void(0)">{{$news->updated_at->format('d.m.Y')}}</a><a class="news-text " href="javascrtip:void(0)">{{substr($news->content, 0, 200)}}<span class="news-arrow">   </span></a></div>
    </div>
    @endforeach
  </div><a class="all-news" href="javascript:void(0)">All news</a>
</div>
