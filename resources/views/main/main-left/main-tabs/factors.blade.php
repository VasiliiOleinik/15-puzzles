@php
    $count = 1;
@endphp
    @foreach($factors as $factor)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$factor->factor_id}}" obj-type="factor"><span
                    class="checkbox-custom"></span>
          </label>
          <div class="tab-name">
            <p class="title">@lang('main.tabs_title_factors') #{{$count}}: <span>{{$factor->name}}</span></p>
            <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
          </div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$factor->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">@lang('main.show_more')</a>
        </div>
      </div>
        @php
            $count++
        @endphp
    @endforeach
