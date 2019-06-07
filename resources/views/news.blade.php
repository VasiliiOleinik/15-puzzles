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
                        <div class="article" obj-id="{{$article->id}}">
                            <h2>{{$article->title}}</h2>
                            <section class="article_content">
                                @php
                                  $article_short_content = substr($article->content, 0, 200);
                                @endphp
                                {{$article_short_content}}
                            </section>
                            <img src="/images/articles/{{$article->img}}" width="100%">
                            <small class="article_data">{{$article->updated_at->format('d.m.Y')}}</small>                            
                        </div>
                    @endforeach
                </div>
                <div id="news_right_side" class="col-sm-6">
                    <label>SEARCH IN NEWS</label><br>
                    <input type="text" id="tags" class="form-control d-none"/>
                </div>
            </div>
    </div>
@endsection

@section('news-js')
    <script src="{{ asset('js/backend/tags search/typeahead.js') }}" defer></script>
    <script src="{{ asset('js/backend/tags search/bootstrap-tagsinput.js') }}" defer></script>


    <script defer>
    document.addEventListener("DOMContentLoaded", function (event) {

         var tags_count = 0;
        
         tags_ajax = $.ajax({
            type: "GET",
            url: "/tag_names",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            complete: function (result) {               

                if (result.responseText.length != 0) {

                   json = jQuery.parseJSON(result.responseText);
                   json_length = Object.keys(json).length;

                   data = formTheCorrectDataFormat(json, json_length);

                   tagsInputInit(data);
                }
            },
            error: function (err) {

            }
        });


        function formTheCorrectDataFormat(json, json_length){

            var data = '[';

            for (tag_id = 1; tag_id < json_length; tag_id++) {
                data += '{"tag_id":'+tag_id+', "text":"'+json[tag_id]+'" }, ';
            }
            data = data.slice(0, -2);
            data += ']';

            return data;
        }
        

        function tagsInputInit(data){

        //var data ='[{ "tag_id": 1, "text": "Task 1" }, { "tag_id": 2, "text": "Task 2" }]';

            var tags = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace("text"),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: jQuery.parseJSON(data) //your can use json type
            });

            tags.initialize();

            var tags_input = $("#tags");
            tags_input.tagsinput({
                itemValue: "tag_id",
                itemText: "text",
                typeaheadjs: {                
                name: "tags",
                displayKey: "text",
                source: tags.ttAdapter()
                }
            });

            tags_input.tagsinput({
                
            });

            //In search field changed count of tags
            $('.bootstrap-tagsinput').bind("DOMSubtreeModified",function(){
                _tags_count = $('.bootstrap-tagsinput').find('.tag').length;
                if(_tags_count != tags_count){
                    tags_count = _tags_count;
                    //console.log(tags_count);


                }
            });
        }
    });
        

    </script>     
@endsection
