@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box about">
            <div class="main__left">
              <div class="title-container"><img src="{{ Illuminate\Support\Facades\Config::get('puzzles.about_img') }}" alt="About BG">
                <h2 class="main__left-title">@lang('about.title_about')<span class="title-line"></span><span class="title-text">@lang('about.title_text_about')</span></h2>
              </div>
              <div class="main__left-subtitle">@lang('about.subtitle_about')</div>
              <div class="main__left-text">@lang('about.text_about')</div>
            </div>
            <div class="main__right">
              <div class="main__video">
                <div class="main__video-overlay"></div>
                <video poster="/img/Video.png">
                  <source src="{{ Illuminate\Support\Facades\Config::get('puzzles.video_url') }}" type="video/mp4">
                </video>
              </div>
              <div class="puzzle-15">
                <div class="puzzle-15__category resons"><span></span>@lang('main.reasons')</div>
                <div class="puzzle-15__category conditions"><span></span>@lang('main.conditions')</div>
                <div class="puzzle-15__category defence"><span></span>@lang('main.defence')</div>
                <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
                <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
                <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
                @foreach($factors as $factor)
                  <div class="puzzle-15__item-outer" obj-id="{{$factor->factor_id}}">
                    <a href="{{ url('/?factor='.$factor->factor_id, app()->getLocale() )}}">
                        <div class="puzzle-15__item {{$factor->type->name}}">                      
                          <img class="factors-check" src="/img/svg/factors-check.svg" alt="">
                          <img src="/{{$factor->factor->img}}">
                          <h6 class="puzzle-15__item-title">{{$factor->name}}</h6>                      
                        </div>
                    </a>
                  </div>
                @endforeach
              </div>                  
              <div class="main__right-note">@lang('about.text_puzzles')</div>
              <ul class="main__books">
                <li><img src="/img/svg/book.svg">Detoxifying for cancer (by dr. George Andonevris)
                </li>
                <li><img src="/img/svg/book.svg">Using bioresonance for cancer (by dr. George Andonevris)
                </li>
                <li><img src="/img/svg/book.svg">Spiritual and psychoemotional causes of cancer (by dr. George Andonevris)
                </li>
                <li><img src="/img/svg/book.svg">Holistic model of cancer (by dr. George Andonevris)
                </li>
                <li><img src="/img/svg/book.svg">Be healthy (by dr. Pokrywka)
                </li>
                <li><img src="/img/svg/book.svg">Antioxidant curing of cancer (by dr. Garbuzov)
                </li>
              </ul><a class="arrow-link" href="#" target="_blank">@lang('about.button_literature')</a>
            </div>
          </div>
        </main>      
@endsection
