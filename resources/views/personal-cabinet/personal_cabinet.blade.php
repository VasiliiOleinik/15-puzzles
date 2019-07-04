@extends('layouts.app')
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
