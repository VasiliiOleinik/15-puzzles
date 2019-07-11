                <h1 class="title">Member's cases</h1>
                <div class="post_container">
                  @foreach($member_cases as $member_case)
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="/{{$member_case->img}}" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">Fight history<span class="post__arrow"></span></a>
                    <p class="post__description">{{$member_case->description}}</p>
                  </div> 
                  @endforeach
                </div>
                <div class="pagination">
                {{$member_cases->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}
                </div>           
