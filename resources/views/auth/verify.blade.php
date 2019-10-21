@extends('layouts.app')
@section('verify-css')
    <link href="{{ asset('css/frontend/verify.css') }}" rel="stylesheet">
@endsection
@section('content')
<main>
    <div class="container">
            <div class="verify-content">
                    <div class="verify-content-header">@lang('verify.title')</div>
                    <div class="verify-content-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('verify.notification')
                            </div>
                        @endif

                        @lang('verify.message') <a href="{{ route('verification.resend', app()->getLocale()) }}" class="verify-content-body-link">@lang('verify.link_title')</a>
                    </div>
                </div>
    </div>
</main>
@endsection
