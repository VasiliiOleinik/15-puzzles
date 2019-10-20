@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.main.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.main._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('main-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/main.css') }}">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIjlu9ia5rqM9wTiQmXFKRCUiXH4wrjRs"></script>
@endsection
@section('content')
  <main class="main">
    <div class="box">
      @include('main.main-left.main-left')
      @include('main.main-right.main-right')
      @include('main.tabs-modal')
    </div>
  </main>
  <div style="display: none;" id="hidden-content">
      <div class="factor-diagrams_modal">
          <div class="factor-diagrams_modal-content">
              <h2>@lang('error_find_lab')</h2>
              <p>Malignant cell recognition by immune system cells (NK-cell, T-cytotoxic cells, macrophages
                  and neutrophils) Malignant cell recognition by
                  immune system cells (NK-cell, T-cytotoxic cells, macrophages and neutrophils) Malignant cell
                  recognition by immune system cells
                  (NK-cell, T-cytotoxic cells, macrophages and neutrophils) Malignant cell recognition by
                  immune system cells (NK-cell,
                  T-cytotoxic cells, macrophages and neutrophils) Malignant cell recognition by immune system
                  cells (NK-cell, T-cytotoxic cells,
                  macrophages and neutrophils)
              </p>
          </div>
      </div>
  </div>
@endsection
@section('main-js')
  <script src="{{ asset('js/backend/main.js') }}" defer></script>
@endsection

