@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.member_cases.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.member_cases._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('literature-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
    <script src="{{ asset('js/backend/memberCases.js') }}" defer></script>
@endsection
@section('literature-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/memberCases.css') }}" rel="stylesheet">
@endsection
@section('content')
        <main class="main">
          <div class="box">
            <div class="cases-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">@lang('breadcrumbs.member_cases')</a></li>
                </ul>
              </div>
              <div class="main-content">
                <h1 class="title">@lang('member_cases.title_member_cases')</h1>
                <div class="post_container">
                  @foreach($memberCases as $memberCase)
                  <div class="post">
                    @php
                      //форматируем
                      $memberCaseTitle = mb_strtolower($memberCase->title);
                      $memberCaseTitle = preg_replace('#[[:punct:]]#', '', $memberCaseTitle);
                      $memberCaseTitle = str_replace(' ', '-', $memberCaseTitle);
                    @endphp
                    <a class="post__image" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $memberCaseTitle }}">
                      @if( $memberCase->img==null )
                        <img class="post__img" src="/img/med-history.png" alt="">
                      @else
                        <img class="post__img" src="{{$memberCase->img}}" alt="" >
                      @endif
                    </a>
                    <a class="post__date" href="javascript:void(0)">{{$memberCase->updated_at->format('d.m.Y')}}</a>
                    <a class="post__title" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $memberCaseTitle }}">{!!$memberCase->title!!}
                      <span class="post__arrow"></span>
                    </a>
                    <p class="post__description">{!!$memberCase->description!!}</p>
                  </div>
                  @endforeach
                </div>
                <div class="pagination">
                {{$memberCases->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}
                </div>
              </div>
            </div>
            <div class="cases-right">
              <div class="subscribe">
                <h3 class="news-right__title">@lang('member_cases.title_subscribe')</h3>
                <form id="member-cases-subscribe-form" class="subscribe__input" method="get">
                  @auth
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('member_cases.placeholder_subscribe')" value="{{ Auth::user()->email }}">
                  @endauth
                  @guest
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('member_cases.placeholder_subscribe')">
                  @endguest
                  <button class="subscribe-btn" type="submit"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                  <label id="member-cases-email-subscribe-error" class="invalid" for="email-subscribe"></label>
                </form>
              </div>
              @auth
              <div class="add-story">
                <h3 class="add-story__title">Add your story</h3>
                <form class="add-story__form"  method="post" action="{{ route('create_post', app()->getLocale()) }}">
                  @csrf

                  <input id="img" type="hidden" name="img">
                  <div class="labels">
                    <input class="headline inp" type="text" name="headline" required>
                    <label for="headline">Headline <span class="required">*</span></label>
                  </div>
                  <div class="labels">
                    <textarea class="story inp" name="your-story" required></textarea>
                    <label class="textarea" for="your-story">Your story <span class="required">*</span></label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">Add image</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input class="file-input" type="file" placeholder="Choose Image" >
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="tag-search">
                      <div class="labels" style="padding: 0; min-height:48px;">
                          <input id="story-tags" required>
                          <input class="add-tags inp" type="text" name="story-tags" id="tags">
                          <label class="place">Add your story tags <span class="required">*</span></label>
                      </div>
                  </div>
                  <div class="footer-form">
                    <label>
                      <input class="checkbox" name="anonym" type="checkbox"><span class="checkbox-custom"></span><span class="label">Do not publish my data. Publish case anonymously</span>
                    </label>
                    <input class="submit-form" type="submit" value="Submit for moderation">
                  </div>
                </form>
              </div>
              @endauth
              <div class="tags" obj-route="member_cases">
                <h3 class="news-right__title">Tag cloud</h3>
                <ul class="tags__list">
                </ul>
              </div>
            </div>
          </div>
        </main>
@endsection
