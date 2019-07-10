    @foreach($protocols as $protocol)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id={{$protocol->id}} obj-type="protocol"><span class="checkbox-custom"></span>
            <p class="title">{{$protocol->name}}<span class="evidence {{$protocol->evidence->name}}"><span
                        class="evidence__detail">Level of evidence:<span
                          class="evidence__level proven">proven</span></span></span></p>
          </label>
          <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p class="subtitle">{{$protocol->subtitle}}</p>
            <p>{{$protocol->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">Show more</a><a class="link protocols" target="_blank"
                                                                         href="{{$protocol->url}}">{{$protocol->url}}</a>
        </div>
      </div>
  @endforeach
