                <h1 class="title">Literature</h1>
                <div class="post_container">
                  @foreach($books as $book)                  
                  <div class="book" obj-id={{$book->id}}>
                    <div class="book__image-block"><img class="book-img" src="{{$book->img}}" alt="Book img"></div>
                    <div class="book__info-block">
                      <h3 class="book-name">{{$book->title}}</h3>
                      <h4 class="book-author">{{$book->author}}</h4>
                      <p class="book-review">{{$book->description}}</p><a class="show-more-info-book" data-fancybox data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  @endforeach
                  <!--
                  <div class="book">
                    <div class="book__image-block"><img class="book-img" src="img/books/book1.jpg" alt="Book img"></div>
                    <div class="book__info-block">
                      <h3 class="book-name">Users` guides to the medical literature</h3>
                      <h4 class="book-author">JAMAevedince</h4>
                      <p class="book-review">This second edition is even better than the original. Information is easier to find and the additional resources that will be available at www.JAMAevidence.com will provide readers with a one-stop source for evidence-based medicine. 5 Stars</p><a class="show-more-info-book" data-fancybox data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  <div class="book">
                    <div class="book__image-block"><img class="book-img" src="img/books/book2.jpg" alt="Book img"></div>
                    <div class="book__info-block">
                      <h3 class="book-name">A new medical dictionary</h3>
                      <h4 class="book-author">George Milbry Gould</h4>
                      <p class="book-review">It is a useful health dictionary for you to quickly find information on medical terms. The medical dictionary covers terminology of over 16,000 healthcare words including diseases, medical jargon, and abbreviations.</p><a class="show-more-info-book" data-fancybox data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  <div class="book">
                    <div class="book__image-block"><img class="book-img" src="img/books/book3.jpg" alt="Book img"></div>
                    <div class="book__info-block">
                      <h3 class="book-name">Molecular Cloning</h3>
                      <h4 class="book-author">Sambrook and Russel</h4>
                      <p class="book-review">Praise for the previous edition: &quot;Any basic research laboratory using molecular biology techniques will benefit from having a copy on hand of the newly published Third Edition of Molecular Cloning: A Laboratory Manual...the first two editions of this book have been staples of molecular biology with a proven reputation for accuracy and thoroughness</p><a class="show-more-info-book" data-fancybox data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  <div class="book">
                    <div class="book__image-block"><img class="book-img" src="img/books/book4.jpg" alt="Book img"></div>
                    <div class="book__info-block">
                      <h3 class="book-name">Plastic Surgery. Third edition</h3>
                      <h4 class="book-author">Petter C. Neligan</h4>
                      <p class="book-review">Each chapter follow an outline that aims to be consistent  throughout the volume. This format ensures that the topics are covered in an organized and comprehensive manner... The entire textbook is available in an accompanying online version. Additionally, there are certain parts of the chapters that are only available on-line including the historical perspective section, some figures, the complete references... In summary, Plastic Surgery, 3rd Edition,  remains a pillar of any plastic surgeons library. Volume Two is no exception and is a must have for any practicing plastic surgeon or trainee with an interest in aesthetic plastic surgery</p><a class="show-more-info-book" data-fancybox data-src="#more-info-book-modal-js">Где купить</a>
                    </div>
                  </div>
                  -->
                </div>
                <div class="more-info-book-modal" id="more-info-book-modal-js">
                
                </div>
                <div class="pagination">
                    {{$books->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}                 
                </div>
                <!--
                <div class="pagination">
                  <ul class="pagination__list">
                    <li class="pagination__page prev disabled"><a href="javascript:void(0)"><img src="img/svg/arrow.svg" alt="Prev arrow"></a></li>
                    <li class="pagination__page active"><a href="javascript:void(0)">1</a></li>
                    <li class="pagination__page"><a href="javascript:void(0)">2</a></li>
                    <li class="pagination__page"><a href="javascript:void(0)">...</a></li>
                    <li class="pagination__page"><a href="javascript:void(0)">6</a></li>
                    <li class="pagination__page next"><a href="javascript:void(0)"><img src="img/svg/arrow.svg" alt="Prev arrow"></a></li>
                  </ul>
                </div>
                -->
