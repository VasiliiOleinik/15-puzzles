@if($diseases)
    @php
    $count = 1;
    @endphp
@foreach($diseases as $disease)
      <div class="tab-item">
        <div class="tab-item__head">
          <label class="tab_head_check">
            <input class="checkbox" type="checkbox" obj-id="{{$disease->disease_id}}" obj-type="disease"><span
                    class="checkbox-custom"></span>
          </label>
          <div class="tab-name">
            <p class="title">@lang('main.tabs_title_diseases') #{{$count}}: {{$disease->name}}</p>
            <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
          </div>
        </div>
        <div class="tab-item__content">
          <div class="text">
            <p>{{$disease->content}}</p>
          </div>
          <a class="show-more" href="javascript:void(0)">@lang('main.show_more')</a>
        </div>
      </div>
    @php
        $count++
    @endphp
    @endforeach
@endif
