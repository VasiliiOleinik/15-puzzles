                <h1 class="title">Member's cases</h1>
                <div class="post_container">
                  @foreach($memberCases as $memberCase)
                  <div class="post"><a class="post__image" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->id}}"> <img class="post__img" src="/{{$memberCase->img}}" alt=""></a><a class="post__date" href="javascript:void(0)">{{$memberCase->updated_at->format('d.m.Y')}}</a><a class="post__title" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->id}}">{{$memberCase->title}}<span class="post__arrow"></span></a>
                    <p class="post__description">{{$memberCase->description}}</p>
                  </div> 
                  @endforeach
                </div>
                <div class="pagination">
                {{$memberCases->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}
                </div>           
