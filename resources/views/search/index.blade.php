@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="search">
              <form action="{{ route( 'search', app()->getLocale() ) }}" method="GET">
                <div class="search__top">
                  <div class="label">
                    <input class="search__input" name="q" type="text" value="{{ $query }}">
                    <label for="q">@lang('search.placeholder_search')</label>
                  </div>
                  <button class="search__btn">@lang('search.title_search')</button>
                </div>
              </form>
              <div class="search__content"><span class="search-result-info">@lang('search.title_result_before_count') {{$count}} @lang('search.title_result_after_count')</span>
                <div class="search__content-items">
                @foreach($results as $collection)
                  @foreach($collection as $result)
                    @php
                      //форматируем
                      $resultTitle = mb_strtolower($result->title);
                      $resultTitle = preg_replace('#[[:punct:]]#', '', $resultTitle);
                      $resultTitle = str_replace(' ', '-', $resultTitle);
                    @endphp
                    @if($result->getTable() == "article_languages")
                    <div class="search-item"><a href="{{ url(app()->getLocale().'/news') }}/{{ $resultTitle }}"><img class="search-item-img" src="{{$result->article->img }}"></a>
                      <div class="search-item-detail"><a class="search-item-detail-date" href="{{ url(app()->getLocale().'/news') }}/{{ $resultTitle }}">{{$result->article->updated_at->format('d.m.Y')}}</a><a class="search-item-detail-section" href="{{ url(app()->getLocale().'/news') }}/{{ $resultTitle }}">@lang('search.label_news')</a></div><a class="search-item-name" href="{{ url(app()->getLocale().'/news') }}/{{ $resultTitle }}">{{$result->title }}</a>
                    </div> 
                    @elseif($result->getTable() == "member_cases")
                    <div class="search-item"><a href="{{ url(app()->getLocale().'/member_cases') }}/{{ $resultTitle }}"><img class="search-item-img" src="{{$result->img }}"></a>
                      <div class="search-item-detail"><a class="search-item-detail-date" href="{{ url(app()->getLocale().'/member_cases') }}/{{$result->id}}">{{$result->updated_at->format('d.m.Y')}}</a><a class="search-item-detail-section" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $resultTitle }}">@lang('search.label_member_cases')</a></div><a class="search-item-name" href="{{ url(app()->getLocale().'/member_cases') }}/{{ $resultTitle }}">{{$result->title }}</a>
                    </div> 
                    @endif                  
                  @endforeach
                @endforeach 
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection
