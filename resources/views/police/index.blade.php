@extends('layouts.app')
@section('title')
    <title>{{ $polices->title }}</title>
@endsection
@section('description')
    <meta content="{{ $polices->description }}" name="description">
@endsection

@section('content')
    <main class="main">
        <div class="box">
            <div class="privacy-policy">
                {!! $polices->content !!}
            </div>
        </div>
    </main>
@endsection
