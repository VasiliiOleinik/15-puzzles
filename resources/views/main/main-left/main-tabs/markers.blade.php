    @php
      $count = 0;
    @endphp
    @foreach($markers as $marker)
      <div class="tab-item markers">
        <div class="tab-head-markers">
            <div class="tab-name">
              <p class="title">{{$marker->name}}</p>
              <div class="arrow markers"><img src="img/svg/dropdown-ico.svg" alt=""></div>
            </div>
        </div>
        <div class="tab-item__content markers">
          <h3 class="content-markers-title">@lang('main.subtitle_markers')</h3>
          <span class="methods">@lang('main.methods')</span>
          <div class="method-list">
          @foreach($markerMethods[$count]->marker->methods as $method)
              <div class="method-item">
                <label class="method-item__head">
                  <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                  <p class="title">{{$method->methodLanguage->first()->name}}</p>
                </label>
                <div class="method-item__content">
                  <div class="text markers">
                    <p>{{$method->methodLanguage->first()->content}}</p>
                  </div>
                </div>
              </div>
          @endforeach
          @php
            $count ++;
          @endphp
          </div>
        </div>
      </div>
  @endforeach
