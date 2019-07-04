@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            @include('personal-cabinet.personal-left.personal-left')
            @include('personal-cabinet.personal-right.personal-right')              
          </div>
        </main>
@endsection
