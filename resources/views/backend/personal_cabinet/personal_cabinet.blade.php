@extends('layouts.app')

@section('personal_cabinet-css')
    <link href="{{ asset('css/backend/personal_cabinet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend/bootstrap datepicker/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
@endsection

@section('content')   

   <div class="container">

        @include('personal_cabinet.flash_messages')

        <div class="row">

            @include('personal_cabinet.left_side.left_side')
            @include('personal_cabinet.right_side.right_side')
                
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
