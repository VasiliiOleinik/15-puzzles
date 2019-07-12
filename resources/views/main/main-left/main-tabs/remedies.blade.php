    @foreach($remedies as $remedy)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
            <p class="title">{{$remedy->name}}</p>
          </label>
          <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$remedy->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">@lang('main.show_more')</a><a class="link" target="_blank"
                                                                         href="{{$remedy->url}}">{{$remedy->url}}</a>
        </div>
      </div>
  @endforeach
