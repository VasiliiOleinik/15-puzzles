@foreach($factors as $factor)
    <div class="table_row" id="row{{$factor->factor}}">
        <div class="table-column first">
            <p class="table-text cell-factor-name">{{isset($factor->factor_name) ? $factor->factor_name : false}}</p>
        </div>
        <div class="table-column first">
            @foreach($factor->group_factor as $item)
                <p class="table-text cell-group-name">{{$item}}</p>
            @endforeach
        </div>
        <div class="table-column first">
            <p class="table-text">{{str_limit(strip_tags($factor->normal_condition), 200, '...')}}</p>
            @if(mb_strlen(strip_tags($factor->normal_condition),'UTF-8') > 200)
                <a data-src="#hidden-content" href="javascript:;" class="table-method show_norm_condition" data-id="{{$factor->factor}}">@lang('main.show_more')</a>
            @endif
        </div>
        <div class="table-column third">
            <p class="table-text">{{str_limit(strip_tags($factor->abnormal_condition), 200, '...')}}</p>
            @if(mb_strlen(strip_tags($factor->abnormal_condition),'UTF-8') > 200)
                <a  data-src="#hidden-content" href="javascript:;" class="table-method show_abnorm_condition" data-id="{{$factor->factor}}">@lang('main.show_more')</a>
            @endif
        </div>
        <div class="table-column fourth">
            @foreach($factor->protocols_id as $key => $protocol_id)
                <a data-src="#hidden-content" href="javascript:;" class="table-method show_protocol" data-id="{{$protocol_id}}">
                    {{isset($factor->protocols_name[$key]) ? $factor->protocols_name[$key] : false }}
                </a>
            @endforeach
        </div>
        <div class="table-column fifth">
            @if($factor->markers_id)
                @foreach($factor->markers_id as $key => $markers_id)
                    <a  data-src="#hidden-content" href="javascript:;" class="table-method show_marker" data-id="{{$markers_id}}">
                        {{isset($factor->markers_name[$key]) ? $factor->markers_name[$key] : false }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endforeach

