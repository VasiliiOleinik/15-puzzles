@extends('layouts.app')
@section('news-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
    <script src="{{ asset('js/backend/news.js') }}" defer></script>
@endsection
@section('news-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/news.css') }}" rel="stylesheet">
@endsection
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
                  @foreach($articles as $article)                  
                  <div class="post"><a class="post__image" href="javascript:void(0)"> <img class="post__img" src="{{$article->img}}" alt="Post img"></a><a class="post__date" href="javascript:void(0)">19.10.2019</a><a class="post__title" href="javascript:void(0)">{{$article->title}}<span class="post__arrow"></span></a>
                    <p class="post__description">{{$article->description}}</p>
                  </div>
                  @endforeach                                   
                </div>
                <div class="pagination">
                    {{$articles->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}                 
                </div>
              </div>
            </div>
            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">News categories</p>
                <ul class="categories__list">
                  @foreach($categories as $category)
                  <li class="item"><a href="javascript:void(0)" obj-id={{$category->id}}>{{$category->name}}</a></li>
                  @endforeach                  
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
              <div id="news_right_side" class="search">
                    <p class="news-right__title">Search in news</p>                    
                    <form class="search__input">
                      <input class="search-news" type="text" placeholder="Search" id="tags">
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
