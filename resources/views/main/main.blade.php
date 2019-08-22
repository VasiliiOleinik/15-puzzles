@extends('layouts.app')

@section('main-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/main.css') }}">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIjlu9ia5rqM9wTiQmXFKRCUiXH4wrjRs"></script>
@endsection

@section('content')
  <main class="main">
    <div class="box">
      @include('main.main-left.main-left')
      @include('main.main-right.main-right')
      @include('main.tabs-modal')
    </div>
  </main>
@endsection

@section('main-js')  
  <script src="{{ asset('js/backend/main.js') }}" defer></script>
@endsection

