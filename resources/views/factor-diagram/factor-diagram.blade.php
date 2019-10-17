@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.factor_diagram.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.factor_diagram._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('main-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/backend/main.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIjlu9ia5rqM9wTiQmXFKRCUiXH4wrjRs"></script>
@endsection
@section('content')
    <main class="main">
        <div class="box diagram">
            <div class="diagram__container">
                <div class="diagram__left">
                    @foreach($type1 as $type)
                        <div class="diagram__group">
                            <label class="group_title"><img src="{{$type->img}}"
                                                            alt="Cancerogenesis" width="50px">
                                <input class="group_title_checkbox" type="checkbox"><span
                                    class="checkbox-custom"></span><span class="label">{{$type->typesLang->name}}</span>
                            </label>
                            <div class="group_content">
                                @foreach($type->factors as $factor)
                                    <div class="group_item js-item reverse" id="{{$factor->factorLanguage->id}}"
                                         data-json='{{$factor->organ}}'>
                                        <p>{{$factor->factorLanguage->name}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="diagram__center">
                    <h2 class="diagram__center-title">Reasons of cancer development</h2>
                    <div class="diagram__center-circle-container">
                        <div class="circle" id="organ_system">
                            <img class="grey" src="/../img/diagram_ico/bg-grey.jpg" alt="">
                            <img class="color" src="/../img/diagram_ico/bg-color.jpg" alt="">
                        </div>
                        <div class="circle" id="organ">
                            <img class="grey" src="/../img/diagram_ico/organ-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/organ-color.png" alt="" class="">
                        </div>
                        <div class="circle" id="matrix">
                            <img class="grey" src="/../img/diagram_ico/matrix-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/matrix-color.png" alt="" class="">
                        </div>
                        <div class="circle" id="cell">
                            <img class="grey" src="/../img/diagram_ico/cell-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/cell-color.png" alt="" class="">
                        </div>
                    </div>
                </div>
                <div class="diagram__right">
                    @foreach($type2 as $type)
                        <div class="diagram__group">
                            <label class="group_title"><img src="{{$type->img}}" alt="Elimination"
                                                            width="50px">
                                <input class="group_title_checkbox" type="checkbox"><span
                                    class="checkbox-custom"></span><span class="label">{{$type->typesLang->name}}</span>
                            </label>
                            <div class="group_content">
                                @foreach($type->factors as $factor)
                                    <div class="group_item js-item reverse" id="{{$factor->factorLanguage->id}}" data-json='{{$factor->organ}}'>
                                        <p>{{$factor->factorLanguage->name}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="diagram__info">
                <div class="diagram__info-title">Processes in which factors are involved</div>
                <div class="diagram__info-selected">
                    <div class="diagram__info-selected-title">Selected factors:</div>
                    <div class="diagram__info-selected-list"></div>
                </div>
                <div class="diagram__info-table">
                    <div class="table_row head">
                        <div class="table-column first">
                            <p class="table-text">Name</p>
                        </div>
                        <div class="table-column second">
                            <p class="table-text">Groups of related factors</p>
                        </div>
                        <div class="table-column first">
                            <p class="table-text">Norm</p>
                        </div>
                        <div class="table-column third">
                            <p class="table-text">Patalogy</p>
                        </div>
                        <div class="table-column fourth">
                            <p class="table-text">Pathology correction methods</p>
                        </div>
                        <div class="table-column fifth">
                            <p class="table-text">Testing</p>
                        </div>
                    </div>
                    <div id="table-body">

                    </div>
                </div>
            </div>
            <div style="display: none;" id="hidden-content">
                <div class="factor-diagrams_modal">
                    <div class="factor-diagrams_modal-content">
                        <h2>Header</h2>
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
        </div>
    </main>
@endsection
@section('main-js')
    <script src="{{ asset('js/backend/main.js') }}" defer></script>
@endsection
