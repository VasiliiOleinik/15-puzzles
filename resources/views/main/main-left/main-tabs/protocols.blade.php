@if($protocols)
@foreach($protocols as $protocol)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$protocol->protocol_id}}" obj-type="protocol"><span class="checkbox-custom"></span>
          </label>
          <div class="tab-name">
            <p class="title">{{$protocol->name}}<span class="evidence {{$protocol->protocol->evidence->name}}"><span
              class="evidence__detail">Level of evidence:<span
                class="evidence__level proven">proven</span></span></span></p>
            <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
          </div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p class="subtitle">{{$protocol->subtitle}}</p>
            <p>{!! $protocol->content !!}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">@lang('main.show_more')</a><a class="link protocols" target="_blank"
                                                                         href="{{$protocol->protocol->url}}">{{$protocol->protocol->url}}</a>
        </div>
      </div>
  @endforeach
    @endif
