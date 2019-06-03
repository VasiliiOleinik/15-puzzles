@extends('layouts.app')

@section('content')

    <div class="container">        
            
            <div class="row">            
                <div id="main_tabs" class="col-sm-6">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li id="tab-understanding_the_15" class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#understanding_the_15">Understanding the 15</a>
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

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="understanding_the_15" class="container tab-pane active"><br>
                        <div class="card">
                            <div class="card-body">
                                <div id="understanding_the_15_ajax_container" class="container tab-pane active">
                                    @foreach($pieces as $piece)
                                    <div class="understanding_the_15_element d-none" obj-id="{{$piece->id}}">
                                        <h4> {{$piece->name}} </h4>;
                                        {{$piece->content}}
                                    </div>                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  id="protocols" class="container tab-pane fade"><br>
                        <div class="card">
                            <div class="card-body">
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
                                <div class="card-body">
                                    <div id="" class="container details_ajax_container tab-pane active">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="remedies" class="container tab-pane fade"><br>
                        <div class="card">
                            <div class="card-body">
                                <div id="remedies_ajax_container" class="container tab-pane active">
                                </div>
                            </div>
                        </div>
                         <!-- Tab details -->
                        <div class="tab-details">
                        <div class="card">
                                <div class="card-body">
                                    <div id="" class="container details_ajax_container tab-pane active">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="markers" class="container tab-pane fade"><br>
                        <div class="card">
                            <div class="card-body">
                                <div id="markers_ajax_container" class="container tab-pane active">
                                </div>
                            </div>
                        </div>
                         <!-- Tab details -->
                        <div class="tab-details">
                        <div class="card">
                                <div class="card-body">
                                    <div id="" class="container details_ajax_container tab-pane active">

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
                <div id="pieces" class="col-sm-6">
                    @php
                        $piece_count = 1;
                    @endphp

                    @foreach($pieces as $piece)

                        @if($piece_count == 1)
                            <div class="row">
                        @endif                            
                            <div class="col-sm-3 text-left piece" name="piece" piece-id="{{$piece->id}}">
                                
                                    <div class="piece_img p-0">
                                        <!--<img src="/images/{{$piece->img}}" class="w-25">-->
                                        <img src="/images/piece_1.png" class="w-25">
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
                </div>
            </div>
        
    </div>
@endsection

<script>

</script>
