@extends('layouts.app')
@section('literature-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
    <script src="{{ asset('js/backend/literature.js') }}" defer></script>
@endsection
@section('literature-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
   <!--<link href="{{ asset('css/backend/literature.css') }}" rel="stylesheet">-->
@endsection
@section('content')
        <main class="main">
          <div class="box">            
            @include('literature.literature-left.literature-left')
            @include('literature.literature-right.literature-right')   
          </div>
        </main>
@endsection
