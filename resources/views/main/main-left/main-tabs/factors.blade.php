    @foreach($factors as $factor)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$factor->id}}" obj-type="factor"><span
                    class="checkbox-custom"></span>
            <p class="title">Factor #{{$factor->id}}: {{$factor->name}}</p>
          </label>
          <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$factor->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">Show more</a>
        </div>
      </div>
    @endforeach
