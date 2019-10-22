<div class="methods-laboratories-table">
    <div class="methods-laboratories-table__head">
        <div class="methods-table-cell name">@lang('main.name_lab')</div>
        <div class="methods-table-cell adress">@lang('main.address_lab')</div>
        <div class="methods-table-cell site">@lang('main.site')</div>
        <div class="methods-table-cell phone">@lang('main.phone_lab')</div>
    </div>
    <div class="methods-laboratories-table__body">
        @foreach($labs as $lab)
        <div class="table__body-row">
            <div class="methods-table-cell name">{{$lab->name}}</div>
            <div class="methods-table-cell adress">{{$lab->address}}</div>
            <div class="methods-table-cell site"><a href="{{$lab->link}}" class="methods-table-cell__link" target="_blank">@lang('main.site')</a></div>
            <div class="methods-table-cell phone">{{$lab->phone}}</div>
        </div>
        @endforeach
    </div>
</div>
