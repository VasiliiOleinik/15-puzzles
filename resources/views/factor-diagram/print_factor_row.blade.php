@foreach($factors as $factor )
    <div class="table_row" id="row{{$factor->id}}">
        <div class="table-column first">
            <p class="table-text cell-factor-name">{{isset($factor->name) ? $factor->name : false}}</p>
        </div>
        <div class="table-column first">
            <p class="table-text cell-group-name">{{ isset($factor->typeLanguage->name) ? $factor->typeLanguage->name : false}}</p>
        </div>
        <div class="table-column first">
            <p class="table-text">{{str_limit(strip_tags($factor->typeLanguage->normal_condition), 200, '...')}}</p>
            @if(mb_strlen(strip_tags($factor->typeLanguage->normal_condition),'UTF-8') > 200)
                <a data-src="#hidden-content" href="javascript:;" class="table-method show_norm_condition" data-id="{{$factor->typeLanguage->id}}">Показать больше</a>
            @endif
        </div>
        <div class="table-column third">
            <p class="table-text">{{str_limit(strip_tags($factor->typeLanguage->abnormal_condition), 200, '...')}}</p>
            @if(mb_strlen(strip_tags($factor->typeLanguage->abnormal_condition),'UTF-8') > 200)
                <a  data-src="#hidden-content" href="javascript:;" class="table-method show_abnorm_condition" data-id="{{$factor->typeLanguage->id}}">Показать больше</a>
            @endif
        </div>
        <div class="table-column fourth">
            @foreach($factor->factor->protocols as $protocol)
                <a data-src="#hidden-content" href="javascript:;" class="table-method show_protocol" data-id="{{$protocol->protocolLanguages->id}}">
                    {{$protocol->protocolLanguages->name}}
                </a>
            @endforeach
        </div>
        <div class="table-column fifth">
            @foreach($factor->factor->markers as $markers)
                <a  data-src="#hidden-content" href="javascript:;" class="table-method show_marker" data-id="{{$markers->markerLanguage->id}}">
                    {{optional($markers->markerLanguage)->name ? $markers->markerLanguage->name : false}}
                </a>
            @endforeach
        </div>
    </div>
@endforeach

