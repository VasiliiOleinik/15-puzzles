@extends('layouts.app')
@section('title')
    <title>{{ isset($dataPage->title) ? $dataPage->title : false }}</title>
@endsection
@section('description')
    <meta content="{{ isset($dataPage->description) ? $dataPage->description : false }}" name="description">
@endsection
@section('content')
        <main class="main">
          <div class="box about">
            <div class="main__left">
              <div class="title-container">
                  @if(isset($dataPage->img))
                    <img src="{{ asset($dataPage->img)  }}" alt="About BG">
                  @endif
                <h2 class="main__left-title">@lang('about.title_about')<span class="title-line"></span><span class="title-text">@lang('about.title_text_about')</span></h2>
              </div>

              <div class="main__left-text">{!! isset($dataPage->description) ? $dataPage->description : false  !!}</div>
            </div>
            <div class="main__right">
              <div class="main__video">
                <div class="main__video-overlay"></div>
                  @if(isset($dataPage->video))

                  <iframe width="640" height="360" src="{{$dataPage->video}}" frameborder="0" autoplay=0
                          allow="autoplay=0; encrypted-media" allowfullscreen>
                  </iframe>


                  @endif
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
                          <img src="{{$factor->factor->img}}">
                          <h6 class="puzzle-15__item-title">{{$factor->name}}</h6>                      
                        </div>
                    </a>
                  </div>
                @endforeach
              </div>                  
              <div class="main__right-note">{!! isset($dataPage->puzzles_description) ? $dataPage->puzzles_description : false!!}</div>
              <ul class="main__books">
                <li><a href=""><img src="/img/svg/book.svg">Detoxifying for cancer (by dr. George Andonevris)</a></li>
                <li><a href=""><img src="/img/svg/book.svg">Using bioresonance for cancer (by dr. George Andonevris)</a></li>
                <li><a href=""><img src="/img/svg/book.svg">Spiritual and psychoemotional causes of cancer (by dr. George Andonevris)</a></li>
                <li><a href=""><img src="/img/svg/book.svg">Holistic model of cancer (by dr. George Andonevris)</a></li>
                <li><a href=""><img src="/img/svg/book.svg">Be healthy (by dr. Pokrywka)</a></li>
                <li><a href=""><img src="/img/svg/book.svg">Antioxidant curing of cancer (by dr. Garbuzov)</a></li>
              </ul><a class="arrow-link" href="#" target="_blank">@lang('about.button_literature')</a>
            </div>
          </div>
        </main>      
@endsection
