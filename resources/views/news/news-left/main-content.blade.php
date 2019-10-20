<h1 class="title">{{ $page->h1 }}</h1>
<div class="post_container">
  @foreach($articles as $article)
  <div class="post">
    <a class="post__image" href="{{ url(app()->getLocale().'/news') }}/{{ $article->article->alias }}"
                           obj-id="{{$article->article_id}}">
      <img class="post__img" src="{{asset($article->article->img)}}" alt="Post img">
    </a>
    <a class="post__date" href="javascript:void(0)">{{$article->article->updated_at->format('d.m.Y')}}</a>
    <a class="post__title" href="{{ url(app()->getLocale().'/news') }}/{{ $article->article->alias }}">
      {{$article->title}}<span class="post__arrow"></span>
    </a>
    <p class="post__description">{!!$article->description!!}</p>
  </div>
  @endforeach
</div>
<div class="pagination">
    {{$articles->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}
</div>
