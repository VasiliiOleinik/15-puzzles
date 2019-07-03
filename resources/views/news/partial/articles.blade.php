                <h1 class="title">News and Articles</h1>
                <div class="post_container">
                  @foreach($articles as $article)                  
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="{{$article->img}}" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">{{$article->title}}<span class="post__arrow"></span></a>
                    <p class="post__description">{{$article->description}}</p>
                  </div>
                  @endforeach                  
                </div>
                <div class="pagination">
                {{$articles->links('vendor.pagination.15-puzzle')}}
                </div>
              </div>

