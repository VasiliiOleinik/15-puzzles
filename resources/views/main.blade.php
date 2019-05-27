@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div style="float:right;">
                @auth
{{--                @else--}}
{{--                    <a href="{{ route('login') }}">Login</a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}">Register</a>--}}
{{--                    @endif--}}
                @endauth
                @if($role)
                    <br><br>LOGGED IN WITH ROLE:<h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$role->name}}</h5>
                    <br><br>ROLE PERMISSIONS:
                    @foreach($permissions as $permission)
                        <h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$permission->name}}</h5><br>
                    @endforeach
                @else
                    <br><br>ROLE:<h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> quest</h5>
                @endif
            </div>
        @endif
    </div>
    <div class="container">        
            
            <div class="row">            
                <div class="col-sm-6">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#understanding_the_15">Understanding the 15</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#protocols">Protocols</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#remedies">Remedies</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#markers">Markers</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="understanding_the_15" class="container tab-pane active"><br>
                      <h3>Understanding the 15</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="protocols" class="container tab-pane fade"><br>
                      <h3>Protocols</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="remedies" class="container tab-pane fade"><br>
                      <h3>Remedies</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="markers" class="container tab-pane fade"><br>
                      <h3>Markers</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                  </div>

                    <!--<div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="col-sm-6">
                    @php
                        $piece_count = 1;
                    @endphp

                    @foreach($pieces as $piece)

                        @if($piece_count == 1)
                            <div class="row">
                        @endif                            
                            <div class="col-sm-3 p-0 text-center" style="border:1px solid #ddd; cursor:pointer;">
                                
                                    <div class="p-0">
                                        <img src="/images/{{$piece->img}}" class="w-100">
                                    </div>                                
                                
                                    <span>
                                        {{$piece->name}}
                                    </span>
                                                                                                                             
                            </div>
                                                   
                            @if($piece_count == 4)
                                @php
                                    $piece_count = 1;
                                @endphp
                            @endif
                        @if(@piece_count == 1)
                            </div>
                        @endif

                        @php
                            $piece_count = $piece_count + 1;                            
                        @endphp
                    @endforeach
                </div>
            </div>
        
    </div>
@endsection



{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--        <title>Laravel</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

{{--        <!-- Styles -->--}}
{{--        <style>--}}
{{--            html, body {--}}
{{--                background-color: #fff;--}}
{{--                color: #636b6f;--}}
{{--                font-family: 'Nunito', sans-serif;--}}
{{--                font-weight: 200;--}}
{{--                height: 100vh;--}}
{{--                margin: 0;--}}
{{--            }--}}

{{--            .full-height {--}}
{{--                height: 100vh;--}}
{{--            }--}}

{{--            .flex-center {--}}
{{--                align-items: center;--}}
{{--                display: flex;--}}
{{--                justify-content: center;--}}
{{--            }--}}

{{--            .position-ref {--}}
{{--                position: relative;--}}
{{--            }--}}

{{--            .top-right {--}}
{{--                position: absolute;--}}
{{--                right: 10px;--}}
{{--                top: 18px;--}}
{{--            }--}}

{{--            .content {--}}
{{--                text-align: center;--}}
{{--            }--}}

{{--            .title {--}}
{{--                font-size: 84px;--}}
{{--            }--}}

{{--            .links > a {--}}
{{--                color: #636b6f;--}}
{{--                padding: 0 25px;--}}
{{--                font-size: 13px;--}}
{{--                font-weight: 600;--}}
{{--                letter-spacing: .1rem;--}}
{{--                text-decoration: none;--}}
{{--                text-transform: uppercase;--}}
{{--            }--}}

{{--            .m-b-md {--}}
{{--                margin-bottom: 30px;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </head>--}}
{{--    <body>--}}
{{--        <div class="flex-center position-ref full-height">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}"  style="float:right;">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--					@if($role)--}}
{{--						<br><br>LOGGED IN WITH ROLE:<h4 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$role->name}}</h4>--}}
{{--						<br><br>ROLE PERMISSIONS:--}}
{{--						@foreach($permissions as $permission)--}}
{{--							<h4 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$permission->name}}</h4><br>--}}
{{--						@endforeach--}}
{{--					@endif--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="content">--}}
{{--                <div class="title m-b-md">--}}
{{--                    Laravel--}}
{{--					<!-- <img src="\images\piece_1.png" width="38" height="38"> -->--}}
{{--                </div>--}}

{{--                <div class="links">--}}
{{--                    <a href="https://laravel.com/docs">Docs</a>--}}
{{--                    <a href="https://laracasts.com">Laracasts</a>--}}
{{--                    <a href="https://laravel-news.com">News</a>--}}
{{--                    <a href="https://blog.laravel.com">Blog</a>--}}
{{--                    <a href="https://nova.laravel.com">Nova</a>--}}
{{--                    <a href="https://forge.laravel.com">Forge</a>--}}
{{--                    <a href="https://github.com/laravel/laravel">GitHub</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}