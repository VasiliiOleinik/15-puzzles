@extends('layouts.app')

@section('news-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
@endsection

@section('content')

     <div class="container">                   
            <div class="row">            
                <div id="articles" class="col-sm-6">
                    @foreach($articles as $article)
                        <div class="article">
                            <h2>{{$article->title}}</h2>
                            <section class="article_content">
                                @php
                                  $article_short_content = substr($article->content, 0, 200);
                                @endphp
                                {{$article_short_content}}
                            </section>
                            <img src="/images/articles/{{$article->img}}" width="100%">
                            <small class="article_data">12.06.2019</small>
                        </div>
                    @endforeach
                </div>
                <div id="news_right_side" class="col-sm-6">
                
                </div>
            </div>
    </div>
@endsection

@section('news-js')
     <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
     <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>
@endsection
