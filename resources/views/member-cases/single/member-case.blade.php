@extends('layouts.app')
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
                    @if($memberCase->anonym == 1)
                    <span class="case-info-text">{{$memberCase->user->first_name}} {{$memberCase->user->last_name}}</span>
                    @else
                    <span class="case-info-text">User wished to remain anonymous</span>
                    @endif
                  </div>
                  <div class="case-container">
                    @if( $memberCase->img==null )
                      <img class="case-container__img" src="/img/med-history.png" alt="">
                    @else
                      <img class="case-container__img" src="{{$memberCase->img}}" alt="">
                    @endif  
                    <p class="case-container__title">
                      {{$memberCase->description}}
                    </p>
                    <span class="case-container__text">
                      {{$memberCase->content}}
                    </span>
                  </div>
                </div>
              </div>
              <div class="member-case__right">
                <div class="sticky-right">
                  <div class="case-tags"><span class="case-info-title">Tags</span>
                    <ul class="case-tags__list">
                      @foreach($memberCase->tags as $tag)
                      <li class="item" obj-id="{{$tag->id}}"><a>{{$tag->name}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="case-share"><span class="case-info-title">Share</span>
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
                  <div class="case-add-comm"><span class="case-info-title">Add comment</span>
                    <form method="get" action="{{ route('comment.create') }}">
                      <input type="hidden" name="member-case-id" value="{{ $memberCase->id }}">
                      <div class="label">                        
                        <textarea name="add-comm" type="text"></textarea>
                        <label for="add-comm">Add comment</label>
                      </div>
                      <button class="send-comment">Send comment</button>
                    </form>
                  </div>
                  @endauth
                  <div class="case-comm-list"><span class="case-info-title">Comments</span>
                    @foreach($comments as $comment)
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="{{$comment->user->img}}">
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
