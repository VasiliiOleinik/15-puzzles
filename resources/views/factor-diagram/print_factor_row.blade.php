<div class="table_row">
        <div class="table-column first">
            <p class="table-text">{{$factor->typeLanguage->normal_condition}}</p>
        </div>
        <div class="table-column second">
            <div class="table_image">{{$factor->typeLanguage->name}}</div>
        </div>
        <div class="table-column third">
            <p class="table-text">{{$factor->typeLanguage->abnormal_condition}}</p>
        </div>
        <div class="table-column fourth">
            @foreach($factor->factor->protocols as $protocol)
                <div class="table-method">{{$protocol->protocolLanguages->name}}</div>
            @endforeach
        </div>
        <div class="table-column fifth">
            @foreach($factor->factor->markers as $markers)
                <p class="table-text">{{$markers->name}}</p>
                <a class="table-link" href="javascript:void(0);">Test link</a>
            @endforeach
        </div>
    </div>

