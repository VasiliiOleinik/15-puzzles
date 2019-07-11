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
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">Main</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url(app()->getLocale().'/news') }}">News</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">{{ $article->title }}</a></li>
                </ul>
              </div>
              <div class="main-content">
                <h1 class="title">News and Articles</h1>
                <div class="post_container">
                  <div class="post news-full"><img class="post__img" src="/{{$article->img}}" alt="Post img">
                    <span class="post__description">
                      {{$article->content}}
                    </span>
                    <div class="post__footer"><a class="post__date" href="javascript:void(0)">{{$article->updated_at->format('d.m.Y')}}</a><a class="post__author" href="javascript:void(0)">Ryan B. Corcoran, M.D., Ph.D., and Bruce A. Chabner, M.D.</a></div>
                  </div>
                </div>
              </div>
            </div>
            @include('news.news-right.news-right')   
          </div>
        </main>
@endsection
