
<h2 class="pb-2">News and Articles</h2>
@foreach($articles as $article)
    <div class="article" obj-id="{{$article->id}}">
        <img src="/images/articles/{{$article->img}}" width="100%">
        <small class="article_data">{{$article->updated_at->format('d.m.Y')}}</small>
        <h5 class="mt-3">{{$article->title}}</h5>
        <section class="article_content pb-3">
            @php
                $article_short_content = substr($article->content, 0, 200);
            @endphp
            {{$article_short_content}}
        </section>
    </div>
@endforeach

 

