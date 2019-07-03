@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="news-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="home.html">Main</a></li>
                  <li class="breadcrumbs__element divider"><img src="img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">News</a></li>
                </ul>
              </div>
              <div class="main-content">
                <h1 class="title">News and Articles</h1>
                <div class="post_container">
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="img/post_1.png" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">Theory behind this project is that there are total of 15 &quot;pieces&quot; (systemic factors)<span class="post__arrow"></span></a>
                    <p class="post__description">We take the position of looking at cancer not as a tumor that has to be removed,rather as a consequence of number of individual systemic imbalances in differenorgans leading to formation of a malignant tumor. (see &quot;holistic approach to cancer&quot;).</p>
                  </div>
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="img/post_2.png" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">Theory behind this project is that there are total of 15 &quot;pieces&quot; (systemic factors)<span class="post__arrow"></span></a>
                    <p class="post__description">We take the position of looking at cancer not as a tumor that has to be removed,rather as a consequence of number of individual systemic imbalances in differenorgans leading to formation of a malignant tumor. (see &quot;holistic approach to cancer&quot;).</p>
                  </div>
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="img/post_3.png" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">Theory behind this project is that there are total of 15 &quot;pieces&quot; (systemic factors)<span class="post__arrow"></span></a>
                    <p class="post__description">We take the position of looking at cancer not as a tumor that has to be removed,rather as a consequence of number of individual systemic imbalances in differenorgans leading to formation of a malignant tumor. (see &quot;holistic approach to cancer&quot;).</p>
                  </div>
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="img/post_4.png" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">Theory behind this project is that there are total of 15 &quot;pieces&quot; (systemic factors)<span class="post__arrow"></span></a>
                    <p class="post__description">We take the position of looking at cancer not as a tumor that has to be removed,rather as a consequence of number of individual systemic imbalances in differenorgans leading to formation of a malignant tumor. (see &quot;holistic approach to cancer&quot;).</p>
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
                <p class="news-right__title">News categories</p>
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
                <p class="news-right__title">News categories</p>
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
                <p class="news-right__title">Search in news</p>
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
