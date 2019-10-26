@extends('layouts.app')
@section('title')
    <title>{{ $page->title }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.faq._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('faq-css')
    <link href="{{ asset('css/backend/faq.css') }}" rel="stylesheet">
@endsection
@section('content')
        <main class="main">
          <div class="box">
            <div class="faq-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">@lang('breadcrumbs.faq')</a></li>
                </ul>
              </div>
              <div id="faq-left-sticky"></div>
              <div>
                @foreach($questions as $question)
                <div id="faq-{{ $question->question_id }}" class="r-tabs-state-default r-tabs-panel">
                  <div class="tab-faq-list">
                    <div class="tab-faq-item">
                      <h4 class="tab-faq-title">{{ $question->name }}</h4>
                      <p class="tab-faq-text">{!! $question->content !!}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="add-faq-letter">
                  <form method="post" id="faq-form">
                    @csrf
                    <div class="add-faq-letter-row">
                      <div class="label">
                        @auth
                          @if($user->first_name != null || $user->last_name != null)
                            <input id="faq-name" type="text" name="name" value="{{ $user->first_name }} {{ $user->last_name }}" class="dinamic-input-js">
                          @else
                            <input id="faq-name" type="text" name="name" class="dinamic-input-js">
                          @endif
                        @endauth
                        @guest
                          <input id="faq-name" type="text" name="name" class="dinamic-input-js">
                        @endauth
                          <label for="name" class="dinamic-label-js">@lang('faq.your_name')<span class="required">*</span></label>
                          <label id="faq-name-error" class="invalid" for="name"></label>
                      </div>
                      <div class="label">
                        <input id="faq-phone" type="text" name="phone" class="dinamic-input-js">
                        <label for="phone" class="dinamic-label-js">@lang('faq.your_phone')</label>
                        <label id="faq-phone-error" class="invalid" for="phone"></label>
                      </div>
                      <div class="label">
                        @auth
                          <input id="faq-email" type="text" name="email" value="{{ $user->email }}" class="dinamic-input-js">
                        @endauth
                        @guest
                          <input id="faq-email" type="text" name="email" class="dinamic-input-js">
                        @endauth
                          <label for="email" class="dinamic-label-js">@lang('faq.your_email')<span class="required">*</span></label>
                          <label id="faq-email-error" class="invalid" for="email"></label>
                      </div>
                    </div>
                    <div class="label">
                      <textarea id="faq-letter" name="letter" class="dinamic-input-js"></textarea>
                      <label for="letter" class="dinamic-label-js">@lang('faq.write_letter')<span class="required">*</span></label>
                      <label id="faq-letter-error" class="invalid" for="letter"></label>
                    </div>
                    <button class="add-faq-letter-send-btn" id="send-form-btn">@lang('faq.send_letter')</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="faq-right">
              <div class="faq__tabs" id="faqTabs">
                <ul class="faq__tabs-nav">
                  @foreach($questions as $question)
                  <li class="faq__tabs-nav-item"><a href="#faq-{{$question->question_id}}">{{$question->name}}</a></li>
                  @endforeach

                </ul>
              </div>
            </div>
          </div>
        </main>
@endsection
