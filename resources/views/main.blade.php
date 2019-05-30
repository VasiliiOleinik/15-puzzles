@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div style="float:right;">
{{--                @if($role)--}}
{{--                    <br><br>LOGGED IN WITH ROLE:<h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$role->name}}</h5>--}}
{{--                    <br><br>ROLE PERMISSIONS:--}}
{{--                    @foreach($permissions as $permission)--}}
{{--                        <h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> {{$permission->name}}</h5><br>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <br><br>ROLE:<h5 style="float: right; margin:0; padding-left:20px; padding-right: 25px;"> quest</h5>--}}
{{--                @endif--}}
            </div>
        @endif
    </div>
    <div class="container">        
            
            <div class="row">            
                <div id="main_tabs" class="col-sm-6">
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
      
                    </div>
                    <div  id="protocols" class="container tab-pane fade"><br>
                    <div class="card">
                        <div class="card-body">
                            <ul id="protocols_ul" class='list-group'>
                                @foreach($protocols as $protocol)
                                    <li class='list-group-item p-0' style="cursor:pointer;">{{$protocol->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                            <div class="col-sm-3 text-left piece" name="piece" piece-id="{{$piece->id}}" style="border:1px solid #ddd; padding: 5px;height:100px; cursor:pointer;">
                                
                                    <div class="p-0" style="height:45px;">
                                        <!--<img src="/images/{{$piece->img}}" class="w-25">-->
                                    </div>                                
                                
                                    <label style="position:relative;line-height: 1;bottom:0;">
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
