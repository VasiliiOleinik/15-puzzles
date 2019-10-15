<div class="table_row">
    <div class="table-column first">
        <p class="table-text cell-factor-name">{{$factor->name}}</p>
    </div>
    <div class="table-column first">
        <p class="table-text cell-group-name">{{$factor->typeLanguage->name}}</p>
    </div>
    <div class="table-column first">
        <p class="table-text">{{$factor->typeLanguage->normal_condition}}</p>
    </div>
    <div class="table-column third">
        <p class="table-text">{{$factor->typeLanguage->abnormal_condition}}</p>
    </div>
    <div class="table-column fourth">
        @foreach($factor->factor->protocols as $protocol)
            <a data-fancybox data-src="#hidden-content" href="javascript:;" class="table-method">
                {{$protocol->protocolLanguages->name}}
            </a>
        @endforeach
    </div>
    <div class="table-column fifth">
        @foreach($factor->factor->markers as $markers)
            <a data-fancybox data-src="#hidden-content" href="javascript:;" class="table-method">
                {{optional($markers->markerLanguage)->name ? $markers->markerLanguage->name : false}}
            </a>
        @endforeach
    </div>
</div>

