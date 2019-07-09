                  <div class="book-modal-container">
                    <div class="book-modal-container__main-info">
                      <div class="main-info-image"><img class="book-img" src="{{$img}}" alt="Book img"></div>
                      <div class="main-info-text"><span class="book-name">{{$title}}</span><span class="book-author">{{$author}}</span></div>
                    </div>
                    <div class="book-modal-container__review">
                      <p class="book-review">{{$description}}</p>
                    </div>
                    <div class="book-modal-container__adress"><span class="shops-list">Shops list:</span>
                      <ol class="adress-list">
                        @foreach($links as $link)
                        <li> <a href="{{$link->url}}" target="_blank">{{$link->title}}</a></li>
                        @endforeach
                      </ol>
                    </div>
                  </div>
