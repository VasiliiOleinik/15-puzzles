                <h1 class="title">@lang('literature.title_literature')</h1>
                <div class="post_container">
                  @foreach($books as $book)                  
                  <div class="book" obj-id={{$book->id}}>
                    <div class="book__image-block"><img class="book-img" src="/{{$book->img}}" alt=""></div>
                    <div class="book__info-block">
                      <h3 class="book-name">{{$book->title}}</h3>
                      <h4 class="book-author">{{$book->author}}</h4>
                      <p class="book-review">{{$book->description}}</p><a class="show-more-info-book" data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  @endforeach                  
                </div>
                <div class="more-info-book-modal" id="more-info-book-modal-js">                
                </div>
                <div class="pagination">
                    {{$books->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}                 
                </div>                
