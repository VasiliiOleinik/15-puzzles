@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="search">
              <form action="{{ route( 'search', app()->getLocale() ) }}" method="GET">
                <div class="search__top">
                  <div class="label">
                    <input class="search__input" name="q" type="text" value="{{ $query }}">
                    <label for="q">Enter your request here</label>
                  </div>
                  <button class="search__btn">Search</button>
                </div>
              </form>
              <div class="search__content"><span class="search-result-info">По вашему запросу найдено {{$results->count()}} элементов:</span>
                <div class="search__content-items">
                @foreach($results as $result)
                  @if($result->getTable() == "articles")
                  <div class="search-item"><a href="{{ url(app()->getLocale().'/news') }}/{{$result->id}}"><img class="search-item-img" src="/{{$result->img }}"></a>
                    <div class="search-item-detail"><a class="search-item-detail-date" href="{{ url(app()->getLocale().'/news') }}/{{$result->id}}">{{$result->updated_at->format('d.m.Y')}}</a><a class="search-item-detail-section" href="{{ url(app()->getLocale().'/news') }}/{{$result->id}}">news</a></div><a class="search-item-name" href="{{ url(app()->getLocale().'/news') }}/{{$result->id}}">{{$result->title }}</a>
                  </div> 
                  @elseif($result->getTable() == "member_cases")
                  <div class="search-item"><a href="{{ url(app()->getLocale().'/member_cases') }}/{{$result->id}}"><img class="search-item-img" src="/{{$result->img }}"></a>
                    <div class="search-item-detail"><a class="search-item-detail-date" href="{{ url(app()->getLocale().'/member_cases') }}/{{$result->id}}">{{$result->updated_at->format('d.m.Y')}}</a><a class="search-item-detail-section" href="{{ url(app()->getLocale().'/member_cases') }}/{{$result->id}}">member's case</a></div><a class="search-item-name" href="{{ url(app()->getLocale().'/member_cases') }}/{{$result->id}}">{{$result->title }}</a>
                  </div> 
                  @endif                  
                @endforeach                  
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection
