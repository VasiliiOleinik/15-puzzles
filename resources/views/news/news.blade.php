@extends('layouts.app')

@section('news-js')
    <!--  scripts you need to search for tags   -->
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>

    <script src="{{ asset('js/backend/news.js') }}" defer></script>
 
@endsection

@section('news-css')
    <link href="{{ asset('css/backend/tags search/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/tags search/typeaheadjs.css') }}" rel="stylesheet">
@endsection

@section('content')

     <div class="container">
            <div class="row">
                <div id="articles" class="col-sm-6 py-4 pl-5 pr-5">
                    <h2 class="pb-2">News and Articles</h2>
                    @foreach($articles as $article)
                        <div class="article" obj-id="{{$article->id}}">
                            <img src="/images/articles/{{$article->img}}" width="100%">
                            <small class="article_data">{{$article->updated_at->format('d.m.Y')}}</small>
                            <h5 class="mt-3">{{$article->title}}</h5>
                            <section class="article_content pb-3">
                                @php
                                  $article_short_content = substr($article->content, 0, 200);
                                @endphp
                                {{$article_short_content}}
                            </section>
                        </div>
                    @endforeach
                </div>
                <div id="news_right_side" class="col-sm-6 py-4">
                    <label>SEARCH IN NEWS</label><br>
                    <input type="text" id="tags" class="form-control d-none"/>
                </div>
            </div>
    </div>
@endsection


