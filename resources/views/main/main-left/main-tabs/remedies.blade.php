<div id="tab-4">
  <div class="tab-list main-scroll" id="tabListRemedies">
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
          <a class="show-more" href="javascript:void(0)">Show more</a><a class="link"
                                                                         href="javascript:void(0)">{{$remedy->url}}</a>
        </div>
      </div>
  @endforeach
  </div>
</div>
