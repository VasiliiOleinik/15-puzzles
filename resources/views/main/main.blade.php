@extends('layouts.app')

@section('content')

    <div class="box">
        @include('main.main-left.main-left')
        @include('main.main-right.main-right')
        @include('main.tabs-modal')
    </div>

@endsection

@section('main-js')
    <script src="{{ asset('js/backend/main.js') }}" defer></script>
@endsection

