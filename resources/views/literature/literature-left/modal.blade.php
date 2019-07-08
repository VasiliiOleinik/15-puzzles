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
                        <li> <a href="{{$link->url}}">{{$link->title}}</a></li>
                        @endforeach
                        <!--
                        <li> <a href="">145 Country Club Dr, Rockwall, TX, 75032</a></li>
                        <li> <a href="">707 13th St SE #275, Salem, OR, 97301</a></li>
                        <li> <a href="">10869 Alana Ct, Willis, MI, 48191</a></li>
                        <li> <a href="">289 Mount Hope Ave #M10, Dover, NJ, 07801</a></li>
                        -->
                      </ol>
                    </div>
                  </div>
