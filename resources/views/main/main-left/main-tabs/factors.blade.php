    @foreach($factors as $factor)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$factor->id}}" obj-type="factor"><span
                    class="checkbox-custom"></span>
            <p class="title">@lang('main.tabs_title_factors') #{{$factor->id}}: {{$factor->name}}</p>
          </label>
          <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$factor->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">@lang('main.show_more')</a>
        </div>
      </div>
    @endforeach
