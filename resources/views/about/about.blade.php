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
                  @if(isset($dataPage->page->img))
                    <img src="{{ asset($dataPage->page->img)  }}" alt="About BG">
                  @endif
                <h2 class="main__left-title">{{ $dataPage->h1 }}<span class="title-line"></span><span class="title-text">{{ $dataPage->short_description }}</span></h2>
              </div>

              <div class="main__left-text">{!! isset($dataPage->description) ? $dataPage->description : false  !!}</div>
            </div>
            <div class="main__right">
              <div class="">
                {!! $dataPage->page->video !!}
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
                    @foreach($lits as $lit)
                    <li><a href="{{ url(app()->getLocale().'/literature#book-'.$lit->book_id) }}"><img src="{{ asset('img/svg/book.svg') }}">{{$lit->title}}</a></li>
                    @endforeach
                </ul>
                <a class="arrow-link" href="{{ url(app()->getLocale().'/literature') }}" target="_self">@lang('about.button_literature')</a>
            </div>
          </div>
        </main>
@endsection
