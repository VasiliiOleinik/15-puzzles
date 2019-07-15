@extends('layouts.app')
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
                <h1 class="title">Member's cases</h1>
                <div class="post_container">
                  @foreach($memberCases as $memberCase)
                  <div class="post"><a class="post__image" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->id}}"> <img class="post__img" src="/{{$memberCase->img}}" alt=""></a><a class="post__date" href="javascript:void(0)">{{$memberCase->updated_at->format('d.m.Y')}}</a><a class="post__title" href="{{ url(app()->getLocale().'/member_cases') }}/{{$memberCase->id}}">{{$memberCase->title}}<span class="post__arrow"></span></a>
                    <p class="post__description">{{$memberCase->description}}</p>
                  </div> 
                  @endforeach
                </div>
                <div class="pagination">
                {{$memberCases->appends(request()->except('page'))->links('vendor.pagination.15-puzzle')}}
                </div>
              </div>
            </div>
            <div class="cases-right">
              <div class="tags">
                <h3 class="news-right__title">Tag cloud</h3>
                <ul class="tags__list">
                  <li class="item"><a href="#item">Oxygen metabolism change</a></li>
                  <li class="item"><a href="#item">Cellular</a></li>
                  <li class="item"><a href="#item">Dr. Rath protocol</a></li>
                  <li class="item"><a href="#item">Cancer</a></li>
                  <li class="item"><a href="#item">Nutrition</a></li>
                  <li class="item"><a href="#item">Reactivation of immune system</a></li>
                </ul>
              </div>
              <div class="subscribe">
                <h3 class="news-right__title">Take latest news from 15-Puzzle</h3>
                <form class="subscribe__input">
                  <input class="subscribe-field" type="text" placeholder="Your Email Address">
                  <button class="subscribe-btn"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                </form>
              </div>
              <div class="add-story">
                <h3 class="add-story__title">Add your story</h3>
                <form class="add-story__form" action="">
                  <div class="labels">
                    <input class="headline inp" type="text" name="headline">
                    <label for="headline">Headline</label>
                  </div>
                  <div class="labels">
                    <textarea class="story inp" name="your-story"></textarea>
                    <label class="textarea" for="your-story">Your story</label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">Add image</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input class="file-input" type="file" placeholder="Choose File">
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="labels">
                    <input class="add-tags inp" name="add-tags" type="text">
                    <label for="add-tags">Add tags. Tags must be separated by a comma.</label>
                  </div>
                  <div class="footer-form">
                    <label>
                      <input class="checkbox" name="checkbox-test" type="checkbox"><span class="checkbox-custom"></span><span class="label">Do not publish my data. Publish case anonymously</span>
                    </label>
                    <input class="submit-form" type="submit" value="Submit for moderation">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </main>      
@endsection
@section('news-js')
    <script src="{{ asset('js/backend/memberCases.js') }}" defer></script>
@endsection
