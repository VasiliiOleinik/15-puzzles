@extends('layouts.app')

@section('personal_cabinet-css')
    <link href="{{ asset('css/backend/personal_cabinet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/bootstrap datepicker/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
@endsection

@section('content')

     <div class="container">
            <div class="row">
                <div id="personal_cabinet-left_side" class="col-sm-6 py-4">
                    @if(Session::get('status-user_update'))
                   <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Info!</strong> {{Session::get('status-user_update')}}
                   </div>
                   @endif
                   <h4 class="mb-3"><strong>Personal cabinet</strong></h4>

                   <form method="POST" action="{{ route('user.update',$user)}}">
                   @csrf
                   <input name="_method" type="hidden" value="PUT">
                       <!-- UPLOAD AVATAR -->
                          <div class="row">
                             <div class="col-lg-4 col-sm-12 col-12 imgUp">
                                <div class="imagePreview">
								    <input type="file" accept="image/*" class="uploadFile img">                                    
                                </div>                        
                             </div>
                      
                       <!-- -- -->
                       <!-- USER PERSONAL DATA -->

                                <div class="col-lg-4 col-sm-6 col-12" style="left:5px;">

                                    <!-- nickname -->
                                    <div class="form-group row mr-1">
                                        <input id="nickname" type="text" placeholder="Nickname" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{Auth::user()->nickname}}" autocomplete="nickname" autofocus>

                                        @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->

                                    <!-- first name -->
                                    <div class="form-group row mr-1">
                                        <input id="first_name" type="text" placeholder="Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->

                                    <!-- middle name -->
                                    <div class="form-group row mr-1">
                                        <input id="middle_name" type="text" placeholder="Middle name" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" autofocus>

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->

                                    <!-- password -->
                                    <!--
                                    <div class="form-group row mr-1">
                                        <input id="password" type="text" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{Auth::user()->password}}" autocomplete="password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->
                                    -->
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12" style="left:5px;">
                                     <!-- email -->
                                    <div class="form-group row mr-1">
                                        <input id="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->

                                    <!-- last name -->
                                    <div class="form-group row mr-1">
                                        <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!- - ->

                                    <!-- birthday -->
                                    <!--<div class="form-group row mr-1">
                                        <input id="password" type="text" placeholder="Date of Birth" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>-->
                                    <!- - ->           
                                </div>
                            </div>

                            <hr>
                            <!-- save changes button -->
                            <button id="save_changes" type="submit" class="btn btn-primary r-50">
                                Save changes
                            </button>
                            <!- - ->

                            <!-- avatar image hidden data -->
                            <input id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" hidden>
                            <!- - ->
                       <!-- -- -->
                    </form>
                            
                    <form method="POST" action="{{ route('file.personal_cabinet.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                                            
                                <!--<input class="form-control" type="file" name="upload_file" id="upload_file">-->
                                <div class="row">
                                    @if(Session::get('status-file_upload'))
                                               <div class="alert alert-info alert-dismissible fade show">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>Info!</strong> {{Session::get('status-file_upload')}}
                                               </div>
                                         @endif
                                    <div class="col-12 col-sm-12 fileUp">
                                         <div class="row">
                                            <h5 class="mb-4"><strong>History of analyzes</strong></h5>
                                            <p>You can add file formats: PDF and Office files.<p>

                                            <div class="col-6">
                                                 
                                                <!-- preview -->
                                                <div class="filePreview">
                                                <input type="file" accept=".xlsx, .xls, .doc, .docx, .txt, .pdf" class="uploadFile file"  name="upload_file" id="upload_file" required>
                                                </div>
                                                <!- - ->
                                            </div>
                                            <div class="col-6">
                                                <!-- file name -->
           

                                                <input id="file_name" type="text" placeholder="File Name" class="form-control @error('file_name') is-invalid @enderror" name="file_name" value="" autocomplete="file_name" autofocus required>
                                                <input id="file_type" type="hidden" name="file_type" required>
                                                <input id="file_size" type="hidden" name="file_size" required>

                                                @error('file_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <!- - ->
                                                <br>
                                                <!-- upload button -->
                                                <button type="submit" class="btn btn-primary r-15">
                                                upload
                                                </button>
                                                <!- - ->
                                            </div>
                                        </div>
                                    </div>   
                                </div>                            
                        </div>
                    </form>
                    <hr>
                    <div>
                        <h5 class="mb-4"><strong>Search by analisis history</strong></h5>
                        
                        <form method="get" action="{{ route('file.personal_cabinet.index') }}" enctype="multipart/form-data">                          
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <input id="search_file_name" type="text" placeholder="Search by name" class="form-control" name="search_file_name" value="{{$search_file['name']}}" autofocus>
                                </div>
                                <div class="col-lg-4 col-sm-6">

                                      <div class="input-group date">
                                          <input type="text" class="form-control search_file_date" id="search_file_date_from" name="search_file_date_from" value="{{$search_file['date_from']}}" placeholder="dd.mm.yyyy">
                                      </div>

                                </div>
                                <div class="col-lg-4 col-sm-6">

                                      <div class="input-group date">
                                          <input type="text" class="form-control search_file_date" id="search_file_date_to" name="search_file_date_to" value="{{$search_file['date_to']}}" placeholder="dd.mm.yyyy">
                                      </div>

                                </div>                                                            
                            </div>
       
                            <!-- search file button -->
                            <button type="submit" class="btn btn-primary mt-2 mb-4">
                                search
                            </button>
                            <!- - ->    
                        </form>
                        
                       <div id="file_explorer">

                       <div class="row">
                           @foreach($user_files as $user_file)

                                @php
                                    $img_count = 0;                                
                                @endphp

                                @if($user_file->type == "doc")
                                    @php $img_count = 1; @endphp
                                @elseif($user_file->type == "xlsx")
                                    @php $img_count = 2; @endphp
                                @elseif($user_file->type == "xls")
                                    @php $img_count = 3; @endphp
                                @elseif($user_file->type == "pdf")
                                    @php $img_count = 4; @endphp
                                @elseif($user_file->type == "txt")
                                    @php $img_count = 5; @endphp
                                @endif                       

                                <!--<label class="d-flex">{{$user_file->name}}.{{$user_file->type}}<span class="close delete_file" obj-id="{{$user_file->id}}"> x</span></label>-->
                                <div class="file col-lg-4 col-sm-6 col-11">
                                    <div class="row overflow-hidden">
                                        <div class="col-4">
                                            <div class="file_img p-0 bp-{{$img_width * $img_count}}">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <small> {{$user_file->name}}.{{$user_file->type}} </small>
                                            <span class="close delete_file" obj-id="{{$user_file->id}}"> x</span>
                                            <small> {{$user_file->updated_at->format('d.m.Y')}} </small>                                                
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>

                       </div>
                    </div>
                       <!-- -- -->
                </div>
                <div id="news_right_side" class="col-sm-6 py-4">
                   <h4>Personal cabinet<h4>
                   <?php
                        $filePath="./images/test.pdf";
                        $filename="test.pdf";
                        /*
                        $filePath="./images/logo.png";
                        $filename="logo.png";
                        */
                   ?>
                   <!--FOR PDF-->
                   <!--<iframe src="{{ $filePath }}" frameborder="0" style="width:100%;min-height:640px;"></iframe>-->

                   <!--FOR IMAGES-->
                   <!--F <img src="{{$filePath}}"/>-->
                </div>
            </div>
    </div>
@endsection

@section('personal_cabinet-js')

    <script src="{{ asset('js/backend/personal_cabinet.js') }}" defer></script>
    <script src="{{ asset('js/backend/bootstrap datepicker/bootstrap-datepicker.min.js') }}" defer></script>

    <script defer>
        document.addEventListener("DOMContentLoaded", function (event) {
        
            var base64_img = {!! json_encode(Auth::user()->img) !!};

            setUserAvatar(base64_img);           
          
        });
    </script>
@endsection
