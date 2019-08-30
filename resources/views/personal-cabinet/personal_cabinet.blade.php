@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.personal_cabinet.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.personal_cabinet._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('personal_cabinet-css')
    <link href="{{ asset('css/backend/personal_cabinet.css') }}" rel="stylesheet">    
@endsection
@section('content')
        <main class="main">
          <div class="box">
            @include('personal-cabinet.personal-left.personal-left')
            @include('personal-cabinet.personal-right.personal-right')              
          </div>
        </main>
@endsection
@section('news-js')
    <script src="{{ asset('js/backend/personal_cabinet.js') }}" defer></script>
@endsection
