@extends('layouts.app')
@section('title')
    <title>{{$page->pageLang->title}}</title>
@endsection
@section('description')
    <meta content="{!! isset($page->pageLang->description) ? $page->pageLang->description : false !!}"
          name="description">
@endsection
@section('content')
    <main class="main">
        <div class="box about">
            <div class="main__left">
                <div class="title-container">
                    @if(isset($dataPage->page->img))
                        <img src="{{ asset($dataPage->page->img)  }}" alt="About BG">
                    @endif
                    <h2 class="main__left-title">
                        {{ isset($page->pageLang->h1) ? $page->pageLang->h1 : false  }}
                        <span class="title-line"></span>
                        <span
                            class="title-text">{!!  isset($page->pageLang->short_description) ? $page->pageLang->short_description : false  !!}</span>
                    </h2>
                </div>
                <div
                    class="main__left-text">{!! isset($page->pageLang->description) ? $page->pageLang->description : false  !!}</div>
            </div>
            <div class="main__right">
                <div class="">
                    <iframe
                        width="100%"
                        height="450px"
                        src="{{ $dataPage->page->video }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    >
                    </iframe>
                </div>
                <div class="puzzle-15">
                    @foreach($typeFactors as $key => $typeFactor)
                        @if(count($typeFactor[0])>0)
                            @foreach($typeFactor[0] as $factors)
                                <div class="wrapp-for_category {{$key}}">
                                    <div class="wrapp-for_cat-items">
                                        @foreach ($factors as $factor)
                                            <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
                                                <a href="{{ url('/?factor='.$factor->id, app()->getLocale() )}}">
                                                    <div class="puzzle-15__item {{isset($factor->type->name) ? $factor->type->name : false  }}">
                                                        <img class="factors-check" src="/img/svg/factors-check.svg" alt="">
                                                        <img src="{{$factor->img}}">
                                                        <h6 class="puzzle-15__item-title">{{$factor->factorLanguage->name}}</h6>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="category">
                                        <span></span>{{$typeFactor['nameTypeLang']}}</div>
                                </div>
                            @endforeach
                        @else
                            <div class="wrapp-for_category {{$key}}">
                                <div class="category">
                                    <span></span>{{$typeFactor['nameTypeLang']}}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div
                    class="main__right-note">{!! isset($page->pageLang->puzzles_description ) ? $page->pageLang->puzzles_description : false!!}</div>
                <ul class="main__books">
                    @foreach($lits as $lit)
                        <li><a href="{{ url(app()->getLocale().'/literature#book-'.$lit->book_id) }}"><img
                                    src="{{ asset('img/svg/book.svg') }}">{{$lit->title}}</a></li>
                    @endforeach
                </ul>
                <a class="arrow-link" href="{{ url(app()->getLocale().'/literature') }}"
                   target="_self">@lang('about.button_literature')</a>
            </div>
        </div>
    </main>
@endsection
