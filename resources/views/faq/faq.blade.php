@extends('layouts.app')
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
              @foreach($questions as $question)
              <div id="faq-{{ $question->question_id }}">
                <div class="tab-faq-list">
                  <div class="tab-faq-item">
                    <h4 class="tab-faq-title">{{ $question->name }}</h4>
                    <p class="tab-faq-text">{{ $question->content }}</p>
                  </div>
                </div>
              </div>
              @endforeach             
              <div class="add-faq-letter">
                <form method="post" action= "{{ route('letter', app()->getLocale() ) }}" >
                  @csrf
                  <div class="add-faq-letter-row">
                    <div class="label">
                      @auth
                        @if($user->first_name != null || $user->last_name != null)
                        <input type="text" name="name" value="{{ $user->first_name }} {{ $user->last_name }}" required>
                        @else
                        <input type="text" name="name" required>
                        @endif
                      @endauth
                      @guest
                      <input type="text" name="name" required>
                      @endauth
                      <label for="name">Your name</label>
                    </div>
                    <div class="label">
                      <input type="text" name="phone">
                      <label for="phone">Your phone</label>
                    </div>                    
                    <div class="label">
                      @auth
                      <input type="text" name="email" value="{{ $user->email }}" required>
                      @endauth
                      @guest
                      <input type="text" name="email" required>                      
                      @endauth
                      <label for="email">Your e-mail<span class="required">*</span></label>                      
                    </div>
                  </div>
                  <div class="label">
                    <textarea name="letter" required></textarea>
                    <label for="letter">Write your letter<span class="required">*</span></label>
                  </div>
                  <button class="add-faq-letter-send-btn">Send letter</button>
                </form>
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
