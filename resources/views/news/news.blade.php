@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.news.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.news._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('news-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
    <script src="{{ asset('js/backend/news.js') }}" defer></script>
@endsection
@section('news-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/news.css') }}" rel="stylesheet">
@endsection
@section('content')
        <main class="main">
          <div class="box">
            @include('news.news-left.news-left')
            @include('news.news-right.news-right')            
          </div>
        </main>
@endsection
