@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="news-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="home.html">Main</a></li>
                  <li class="breadcrumbs__element divider"><img src="img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">Lierature</a></li>
                </ul>
              </div>
              <div class="main-content">
                <h1 class="title">Literature</h1>
                <div class="post_container">
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
                </div>
                <div class="more-info-book-modal" id="more-info-book-modal-js">
                  <div class="book-modal-container">
                    <div class="book-modal-container__main-info">
                      <div class="main-info-image"><img class="book-img" src="img/books/book1.jpg" alt="Book img"></div>
                      <div class="main-info-text"><span class="book-name">Users` guides to the medical literature</span><span class="book-author">JAMAevedince</span></div>
                    </div>
                    <div class="book-modal-container__review">
                      <p class="book-review">This second edition is even better than the original. Information is easier to find and the additional resources that will be available at www.JAMAevidence.com will provide readers with a one-stop source for evidence-based medicine. 5 Stars</p>
                    </div>
                    <div class="book-modal-container__adress"><span class="shops-list">Shops list:</span>
                      <ol class="adress-list">
                        <li> <a href="">145 Country Club Dr, Rockwall, TX, 75032</a></li>
                        <li> <a href="">707 13th St SE #275, Salem, OR, 97301</a></li>
                        <li> <a href="">10869 Alana Ct, Willis, MI, 48191</a></li>
                        <li> <a href="">289 Mount Hope Ave #M10, Dover, NJ, 07801</a></li>
                      </ol>
                    </div>
                  </div>
                </div>
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
              </div>
            </div>
            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">Literature categories</p>
                <ul class="categories__list">
                  <li class="item"><a href="javascript:void(0)">Category #1</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #2</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #3</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #4</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #5</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #6</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #7</a></li>
                  <li class="item"><a href="javascript:void(0)">Category #8</a></li>
                </ul>
              </div>
              <div class="tags">
                <p class="news-right__title">Literature tags</p>
                <ul class="tags__list">
                  <li class="item"><a href="#item">Oxygen metabolism change</a></li>
                  <li class="item"><a href="#item">Cellular</a></li>
                  <li class="item"><a href="#item">Dr. Rath protocol</a></li>
                  <li class="item"><a href="#item">Cancer</a></li>
                  <li class="item"><a href="#item">Nutrition</a></li>
                  <li class="item"><a href="#item">Reactivation of immune system</a></li>
                </ul>
              </div>
              <div class="search">
                <p class="news-right__title">Search in literature</p>
                <form class="search__input">
                  <input class="search-news" type="text" placeholder="Search">
                  <button class="search-news-btn"><img src="img/svg/search_news.svg" alt="Search news"></button>
                </form>
              </div>
              <div class="subscribe">
                <p class="news-right__title">Take latest news from 15-Puzzle</p>
                <form class="subscribe__input">
                  <input class="subscribe-field" type="text" placeholder="Your Email Address">
                  <button class="subscribe-btn"><img src="img/svg/envelope.svg" alt="Subscribe"></button>
                </form>
              </div>
            </div>
          </div>
        </main>
@endsection
