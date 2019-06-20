@extends('layouts.app')

@section('content')

     <div class="container">
            <div class="row">
                <div id="personal_cabinet-left_side" class="col-sm-6 py-4 pl-5 pr-5">
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
                             <div class="col-sm-4 imgUp">
                                <div class="imagePreview">
								    <input type="file" accept="image/*" class="uploadFile img">                                    
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
                                    <div class="col-10 fileUp row">
                                         
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
                    </form>
                    <hr>
                    <div>
                        <h5 class="mb-4"><strong>Search by analisis history</strong></h5>
                        
                        <form method="get" action="{{ route('file.personal_cabinet.index') }}" enctype="multipart/form-data">                          
                            <div class="row">
                                <div class="col-4">
                                    <input id="search_file_by_name" type="text" placeholder="Search by name" class="form-control" name="search_file_by_name" value="{{$search_file_by_name}}" autofocus>
                                </div>
                                <div class="col-4">
                                    search by date FROM
                                </div>
                                <div class="col-4">
                                    search by date TO
                                </div>

                                <br>
                                <!-- upload button -->
                                <button type="submit" class="btn btn-primary r-15">
                                search
                                </button>
                                <!- - ->
                            </div>
                        </form>
                        
                       <div id="file_explorer">
                        @foreach($user_files as $user_file)
                            <label class="d-flex">{{$user_file->name}}.{{$user_file->type}}<span class="close delete_file" obj-id="{{$user_file->id}}"> x</span></label>
                        @endforeach
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

    <script defer>
        document.addEventListener("DOMContentLoaded", function (event) {

            $(".delete_file").click(function () {
                var id = $(this).attr('obj-id');
                $(this).parent().remove();

                $.ajax({
                    type: "POST",
                    url: '{{ route('file.personal_cabinet.destroy','id')}}',
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        _method:"delete",
                        id: id,
                    },
                    complete: function (result) {
                        //console.log(result.responseText)              
                        
                    },
                    error: function (result) {
                        ;
                    }
                });
            });

            var base64_img = {!! json_encode(Auth::user()->img) !!};

            setUserAvatar(base64_img);           

           
        });
    </script>
@endsection
