@extends('layouts.app')
@section('verify-css')
    <link href="{{ asset('css/backend/verify.css') }}" rel="stylesheet">
@endsection
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('verify.title')</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('verify.notification')
                            </div>
                        @endif

                        @lang('verify.message') <a href="{{ route('verification.resend', app()->getLocale()) }}">@lang('verify.link_title')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
