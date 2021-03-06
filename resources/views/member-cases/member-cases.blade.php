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
                <h1 class="title">{{ $page->h1 }}</h1>
                <div class="post_container">
                  @foreach($memberCases as $memberCase)
                  <div class="post">
                    <a class="post__image" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $memberCase->alias }}">
                      @if( $memberCase->img==null )
                        <img class="post__img" src="/img/med-history.png" alt="">
                      @else
                        <img class="post__img" src="{{ asset($memberCase->img) }}" alt="" >
                      @endif
                    </a>
                    <a class="post__date" href="javascript:void(0)">{{$memberCase->updated_at->format('d.m.Y')}}</a>
                    <a class="post__title" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $memberCase->alias }}">{!!$memberCase->title!!}
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
                  <div class="label">
                    @auth
                    <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe" value="{{ Auth::user()->email }}">
                    <label for="email-subscribe" class="dinamic-label-js">@lang('member_cases.placeholder_subscribe')</label>
                    @endauth
                    @guest
                    <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe">
                    <label for="email-subscribe" class="dinamic-label-js">@lang('member_cases.placeholder_subscribe')</label>
                    @endguest
                  </div>
                  <button class="subscribe-btn" type="submit" id="send-form-btn"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                  <label id="member-cases-email-subscribe-error" class="invalid" for="email-subscribe"></label>
                </form>
              </div>
              @auth
              <div class="add-story">
                <h3 class="add-story__title">@lang('member_cases.add_your_story')</h3>
                <form class="add-story__form" id="add-member-case__form" method="post" enctype="multipart/form-data">
                  @csrf

                  <input id="img" type="hidden" name="img">
                  <div class="label">
                      <input class="headline inp dinamic-input-js" type="text" name="headline">
                      <label for="headline" class="dinamic-label-js">@lang('member_cases.headline') <span class="required">*</span></label>
                      <label id="add-member-case-headline-error" class="invalid" for="headline"></label>
                  </div>
                    <h3 class="add-images__title">@lang('member_cases.your_story')</h3>
                  <div class="label">
                      <textarea id="ckeditor_add_member_case" class="story inp dinamic-input-js" name="your-story"></textarea>
                      <label id="add-member-case-your-story-error" class="invalid" for="your-story"></label>
                  </div>
                  <div class="add-images">
                    <h3 class="add-images__title">@lang('member_cases.add_image')</h3>
                    <div class="images-container">
                      <div class="item-img">
                        <div class="imageWrapper"><img class="image" src="/img/upload.png"></div>
                        <button class="file-upload">
                          <input name="image-file" class="file-input" type="file" placeholder="Choose Image" >
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="member-case-tags__cloud">
                      <span class="member-case-tags__cloud-text">@lang('member_cases.your_story_tags')</span>
                      <select class="js-example-basic-multiple" name="story-tags[]" multiple="multiple" style="width: 100%">
                          @foreach($member_cases_tags as $member_cases_tag)
                              <option value='{{ $member_cases_tag->tag_id }}'>{{ $member_cases_tag->name }}</option>
                          @endforeach
                      </select>
                      <label id="add-member-case-story-tags-error" class="invalid" for="your-story"></label>
                  </div>
                  <div class="footer-form">
                    <label>
                      <input class="checkbox" name="anonym" type="checkbox"><span class="checkbox-custom"></span><span class="label">@lang('member_cases.do_not_publish')</span>
                    </label>
                    <input class="submit-form" type="submit" value="@lang('member_cases.submit_for_moderation')">
                  </div>
                </form>
              </div>
              @endauth
              <div class="tags" obj-route="member_cases">
                <h3 class="news-right__title">@lang('member_cases.tag_cloud')</h3>
                <ul class="tags__list">
                </ul>
              </div>
            </div>
          </div>
        </main>

        <script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

        <script>
            CKEDITOR.replace( 'ckeditor_add_member_case' );
        </script>
@endsection
