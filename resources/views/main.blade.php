@extends('layouts.app')

@section('content')

    <div class="container">        
            
            <div class="row">
                <div id="main_tabs" class="col-sm-6 py-5">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li id="tab-factors" class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#factors">Factors</a>
                    </li>
                    <li id="tab-diseases" class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#diseases">Diseases</a>
                    </li>
                    <li id="tab-protocols" class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#protocols">Protocols</a>
                    </li>
                    <li id="tab-remedies" class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#remedies">Remedies</a>
                    </li>
                    <li id="tab-markers" class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#markers">Markers</a>
                    </li>
                  </ul>

                  <!-- Tags div -->
                  <div id="tags_container">
                    <span class="badge badge-secondary mr-1 mb-1"></span>
                  </div>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="factors" class="container tab-pane active">
                        <div class="card">
                            <div class="card-body items">
                                <div id="factors_ajax_container" class="tab-pane active">
                                    @foreach($pieces as $piece)
                                    <div class="factors_element d-none" obj-id="{{$piece->id}}">
                                        <h4> {{$piece->name}} </h4>;
                                        {{$piece->content}}
                                    </div>                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="diseases" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-body items">
                                <div id="diseases_ajax_container" class="tab-pane active">
                                    @foreach($diseases as $disease)
                                    <div class="diseases_element d-none" obj-id="{{$disease->id}}">
                                        <h4> {{$disease->name}} </h4>;
                                        {{$disease->content}}
                                    </div>                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  id="protocols" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-body items">
                                <ul id="protocols_ajax_container" class='list-group'>
                                    @foreach($protocols as $protocol)
                                        <li class='protocol list-group-item list-group-item-action p-0' obj-id="{{$protocol->id}}" style="cursor:pointer;">{{$protocol->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Tab details -->
                        <div class="tab-details">
                        <div class="card">
                                <div class="card-body items">
                                    <div id="" class="details_ajax_container tab-pane active">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="remedies" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-body items">
                                <div id="remedies_ajax_container" class="tab-pane active">
                                </div>
                            </div>
                        </div>
                         <!-- Tab details -->
                        <div class="tab-details">
                        <div class="card">
                                <div class="card-body items">
                                    <div id="" class="details_ajax_container tab-pane active">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="markers" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-body items">
                                <div id="markers_ajax_container" class="tab-pane active">
                                </div>
                            </div>
                        </div>
                         <!-- Tab details -->
                        <div class="tab-details">
                        <div class="card">
                                <div class="card-body items">
                                    <div id="" class="details_ajax_container tab-pane active">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div id="pieces_and_diseases" class="col-sm-6 py-5">
                    @php
                        $piece_count = 1;
                    @endphp

                    @foreach($pieces as $piece)

                        @if($piece_count == 1)
                            <div class="row" style="margin-left: 10px;">
                        @endif                            
                                <div class="col-sm-3 text-left piece" name="piece" obj-id="{{$piece->id}}">

                                    <div class="piece_img p-0 bp-{{$piece->img}}">
                                        <!--<img src="/images/{{$piece->img}}" class="w-25">-->
                                        
                                        <!--<img src="/images/piece_1.png" class="w-25">-->
                                    </div>                                
                                
                                    <label>
                                        {{$piece->name}}
                                    </label>
                                                                                                                             
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

                    @foreach($diseases as $disease)
                        
                        @if($piece_count == 1)
                            <div class="row">
                        @endif                            
                            <div class="col-sm-3 text-left disease" name="disease" obj-id="{{$disease->id}}">
                                
                                    <div class="disease_img p-0 bp-{{$disease->img}}">
                                        <!--<img src="/images/{{$disease->img}}" class="w-25">-->
                                        <!--<img src="/images/disease_1.png" class="w-25">-->
                                    </div>                                
                                
                                    <label>
                                        {{$disease->name}}
                                    </label>
                                                                                                                             
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
        
    </div>
@endsection
