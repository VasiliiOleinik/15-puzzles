@extends('layouts.app')

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

