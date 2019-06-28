<div id="tab-2">
  <div class="tab-list main-scroll" id="tabListDiseases">
    @foreach($diseases as $disease)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$disease->id}}" obj-type="disease"><span
                    class="checkbox-custom"></span>
            <p class="title">Diseases #{{$disease->id}}: {{$disease->name}}</p>
          </label>
          <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$disease->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">Show more</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
