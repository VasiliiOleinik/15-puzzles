@extends('layouts.app')

@section('content')

     <div class="container">
            <div class="row">
                <div id="articles" class="col-sm-6 py-4 pl-5 pr-5">
                    @if(Session::get('status'))
                   <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Info!</strong> You have successfully updated your personal data.
                   </div>
                   @endif
                   <h4>Personal cabinet<h5>

                   <form method="POST" action="{{ route('user_edit') }}">
                   @csrf
                       <!-- UPLOAD AVATAR -->
                          <div class="row">
                             <div class="col-sm-4 imgUp">
                                <div class="imagePreview">
								    <input type="file" class="uploadFile img">                                    
                                </div>                        
                             </div>
                      
                       <!-- -- -->
                       <!-- USER PERSONAL DATA -->

                                <div class="col-sm-4">

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
                                <div class="col-sm-4">
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
                            <button id="save_changes" type="submit" class="btn btn-primary float-right">
                                Save changes
                            </button>

                            <input id="img" type="text" class="form-control @error('img') is-invalid @enderror" name="img" hidden>
                       <!-- -- -->
                    </form>
                    <!-- UPLOAD FILE (MEDICINE) -->
                          <!--
                          <div class="row">
                             <div class="col-sm-4 fileUp">
                                <div class="filePreview">
								    <input type="file" class="uploadFile file">                                    
                                </div>                        
                             </div>
                          </div>
                          -->
                          <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                     <label for="upload_file" class="control-label col-sm-3">Upload File</label>
                                     <div class="col-sm-9">
                                          <input class="form-control" type="file" name="upload_file" id="upload_file">
                                     </div>

                                     <button type="submit" class="btn btn-primary float-right">
                                        upload
                                    </button>
                              </div>
                          </form>
                       <!-- -- -->
                </div>
                <div id="news_right_side" class="col-sm-6 py-4">
                   <h4>Personal cabinet<h5>
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

    <script defer>
        document.addEventListener("DOMContentLoaded", function (event) {

            var base64_img = {!! json_encode(Auth::user()->img) !!};

            setUserAvatar(base64_img);           

           
        });
    </script>
@endsection
