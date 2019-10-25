@extends('layouts.app')
@section('title')
    <title>{{ $page->pageLang->title }}</title>
@endsection
@section('description')
    <meta content="{!! $page->pageLang->description !!}" name="description">
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
                                                            alt="img" width="50px">
                                <input class="group_title_checkbox" type="checkbox"><span
                                    class="checkbox-custom"></span><span class="label">{{isset($type->typesLang->name) ? $type->typesLang->name : false }}</span>
                            </label>
                            <div class="group_content">
                                @foreach($type->factors as $factor)
                                    <div class="group_item js-item reverse" id="{{isset($factor->factorLanguage->id) ? $factor->factorLanguage->id : false}}"
                                         data-json=@foreach($factor->organ as $organ){!!$organ->name!!},@endforeach>
                                        <p>{{isset($factor->factorLanguage->name) ? $factor->factorLanguage->name : false}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="diagram__center">
                    <h2 class="diagram__center-title">{{ $page->h1 }}</h2>
                    <div class="diagram__center-circle-container">
                        <div class="circle" id="organ_system">
                            <img class="grey" src="/../img/diagram_ico/bg-grey.jpg" alt="">
                            <img class="color" src="/../img/diagram_ico/bg-color.jpg" alt="">
                            <div class="target organ_system">
                                <span class="target__span">target organ system</span><span class="treangle treangle-organ_system"></span>
                            </div>
                        </div>
                        <div class="circle" id="organ">
                            <img class="grey" src="/../img/diagram_ico/organ-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/organ-color.png" alt="" class="">
                            <div class="target organ">
                                <span class="target__span">target organ</span><span class="treangle treangle-organ"></span>
                            </div>
                        </div>
                        <div class="circle" id="matrix">
                            <img class="grey" src="/../img/diagram_ico/matrix-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/matrix-color.png" alt="" class="">
                            <div class="target matrix">
                                <span class="target__span">target matrix</span><span class="treangle treangle-matrix"></span>
                            </div>
                        </div>
                        <div class="circle" id="cell">
                            <img class="grey" src="/../img/diagram_ico/cell-grey.png" alt="" class="">
                            <img class="color" src="/../img/diagram_ico/cell-color.png" alt="" class="">
                            <div class="target cell">
                                <span class="target__span">target cell</span><span class="treangle treangle-cell"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="diagram__right">
                    @foreach($type2 as $type)
                        <div class="diagram__group">
                            <label class="group_title"><img src="{{$type->img}}"
                                                            alt="img" width="50px">
                                <input class="group_title_checkbox" type="checkbox"><span
                                    class="checkbox-custom"></span><span class="label">{{isset($type->typesLang->name) ? $type->typesLang->name : false }}</span>
                            </label>
                            <div class="group_content">
                                @foreach($type->factors as $factor)
                                    <div class="group_item js-item reverse" id="{{isset($factor->factorLanguage->id) ? $factor->factorLanguage->id : false}}"
                                         data-json=@foreach($factor->organ as $organ){!!$organ->name!!},@endforeach>
                                        <p>{{isset($factor->factorLanguage->name) ? $factor->factorLanguage->name : false}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="diagram__info">
                <div class="diagram__info-title">{{$page->pageLang->h1}}</div>
                <div class="diagram__info-selected">
                    <div class="diagram__info-selected-title">@lang('factor_diagram.select_factors')</div>
                    <div class="diagram__info-selected-list"></div>
                </div>
                <div class="diagram__info-table">
                    <div class="table_row head">
                        <div class="table-column first">
                            <p class="table-text">{{$colNames->langCols->col1}}</p>
                        </div>
                        <div class="table-column second">
                            <p class="table-text">{{$colNames->langCols->col2}}</p>
                        </div>
                        <div class="table-column first">
                            <p class="table-text">{{$colNames->langCols->col3}}</p>
                        </div>
                        <div class="table-column third">
                            <p class="table-text">{{$colNames->langCols->col4}}</p>
                        </div>
                        <div class="table-column fourth">
                            <p class="table-text">{{$colNames->langCols->col5}}</p>
                        </div>
                        <div class="table-column fifth">
                            <p class="table-text">{{$colNames->langCols->col6}}</p>
                        </div>
                    </div>
                    <div id="table-body">

                    </div>
                </div>
            </div>
            <div style="display: none;" id="hidden-content">
                <div class="factor-diagrams_modal">
                    <div class="factor-diagrams_modal-content">
                        <div class="methods-laboratories-table">
                            <div class="methods-laboratories-table__head">
                                <div class="methods-table-cell name">Название лаборатории</div>
                                <div class="methods-table-cell adress">Адрес</div>
                                <div class="methods-table-cell site">Сайт</div>
                                <div class="methods-table-cell phone">Телефон</div>
                            </div>
                            <div class="methods-laboratories-table__body">
                                <div class="table__body-row">
                                    <div class="methods-table-cell name">Payton O'Connell</div>
                                    <div class="methods-table-cell adress">860 Fairfield St.Zanesville, OH 43701</div>
                                    <div class="methods-table-cell site"><a href="/link" class="methods-table-cell__link" target="_blank">Site</a></div>
                                    <div class="methods-table-cell phone">919319697947</div>
                                </div>
                                <div class="table__body-row">
                                    <div class="methods-table-cell name">Payton O'Connell</div>
                                    <div class="methods-table-cell adress">860 Fairfield St.Zanesville, OH 43701</div>
                                    <div class="methods-table-cell site"><a href="/link" class="methods-table-cell__link" target="_blank">Site</a></div>
                                    <div class="methods-table-cell phone">919319697947</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('main-js')
    <script src="{{ asset('js/backend/main.js') }}" defer></script>
@endsection
