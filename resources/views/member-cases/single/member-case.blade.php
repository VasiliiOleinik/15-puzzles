@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.member_cases.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.member_cases._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('content')
        <main class="main">
          <div class="box">
            <div class="member-case">
              <div class="member-case__left">
                <div class="breadcrumbs">
                  <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
                    <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url(app()->getLocale().'/member_cases') }}">@lang('breadcrumbs.member_cases')</a></li>
                    <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">{{$memberCase->title}}</a></li>
                  </ul>
                </div>
                <div class="main-content">
                  <h1 class="title">{{$memberCase->title}}</h1>
                  <div class="case-info"><span class="case-info-text">{{$memberCase->updated_at->format('d.m.Y')}}</span>
                    @if($memberCase->anonym == 0)
                    <span class="case-info-text">{{$memberCase->user->first_name}} {{$memberCase->user->last_name}}</span>
                    @else
                    <span class="case-info-text">@lang('member_cases.anonimous')</span>
                    @endif
                  </div>
                  <div class="case-container">
                    @if( $memberCase->img==null )
                      <img class="case-container__img" src="/img/med-history.png" alt="">
                    @else
                      <img class="case-container__img" src="{{ asset($memberCase->img) }}" alt="">
                    @endif
                    <span class="case-container__text">
                      {!!$memberCase->content!!}
                    </span>
                  </div>
                </div>
              </div>
              <div class="member-case__right">
                <div class="sticky-right">
                  <div class="case-tags"><span class="case-info-title">@lang('member_cases.tags')</span>
                    <ul class="case-tags__list">
                      @foreach($tags as $tag)
                      <li class="item" obj-id="{{$tag->tag_id}}"><a>{{$tag->name}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="case-share"><span class="case-info-title">@lang('member_cases.share')</span>
                    <ul class="case-share-links">
                      <li><a href="{{Share::load(url()->current(), $memberCase->title)->linkedin()}}" target="_blank"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a></li>
                      <li><a href="{{Share::load(url()->current(), $memberCase->title)->facebook()}}" target="_blank"><i class="fab fa-facebook-square"></i><span>Facebook</span></a></li>
                      <!--<li><a href="" target="_blank"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>-->
                      <li><a href="{{Share::load(url()->current(), $memberCase->title)->twitter()}}" target="_blank"><i class="fab fa-twitter-square "></i><span>Twitter</span></a></li>
                      <li><a href="https://telegram.me/share/url?url={{url()->current()}}&text='{{$memberCase->title}}'" target="_blank"><i class="fab fa-telegram"></i><span>Telegram</span></a></li>
                      <li><a href="{{Share::load(url()->current(), $memberCase->title)->pinterest()}}" target="_blank"><i class="fab fa-pinterest-square"></i><span>Pinterest</span></a></li>
                    </ul>
                  </div>
                  @auth
                  <div class="case-add-comm"><span class="case-info-title">@lang('member_cases.add_comment')</span>
                    <form id="add-comment-form" method="get">
                      <input type="hidden" name="member-case-id" value="{{ $memberCase->id }}">
                      <div class="label">
                        <textarea class="dinamic-input-js" id="add-comment-text" name="add-comm" type="text" value="value"></textarea>
                        <label for="add-comm" class="dinamic-label-js">@lang('member_cases.add_comment')</label>
                      </div>
                      <label id="add-comm-error" class="invalid" for="add-comm"></label>
                      <button id="send-comment" class="send-comment" type="submit">@lang('member_cases.send_comment')</button>
                    </form>
                  </div>
                  @endauth
                  <div class="case-comm-list"><span class="case-info-title">@lang("member_cases.comments")</span>
                    @foreach($comments as $comment)
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="{{ $comment->user->img ? asset($comment->user->img) : asset('images/no_avatar.png')}}">
                        <div class="item-header-info">
                          <p class="comm-author">{{$comment->user->nickname}}</p><span class="comm-date">{{$comment->updated_at->format('d.m.Y')}}</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">{{$comment->content}}</p>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection
