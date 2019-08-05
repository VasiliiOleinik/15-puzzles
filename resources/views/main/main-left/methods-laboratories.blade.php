<div class="methods-laboratories">
  <h3 class="methods-laboratories__title">@lang('main.title_methods')</h3><span class="methods-laboratories__intruction">@lang('main.subtitle_methods')</span>
  <div class="methods-laboratories__inputs">
    <div class="methods-select" id="select-method" name="method"><span class="current-value" data-value="">@lang('main.select_methods')</span>
      <ul class="methods-select-list">
        @foreach($methods as $method)
        <li data-value="{{$method->method->name}}">{{$method->name}}</li>
        @endforeach
      </ul>
    </div>
    <div class="methods-select" id="select-country" name="country"><span class="current-value country">@lang('main.select_country')</span>
      <ul class="methods-select-list">@lang('main.select_country')
        <li data-value="ru">Russia</li>
        <li data-value="ua">Ukraine</li>
        <li data-value="usa">USA</li>
      </ul>
    </div>
    <input class="methods-input" type="text" placeholder="@lang('main.select_zip_code')">
    <button class="methods-btn">@lang('main.button_find_lab') </button>
  </div>
  <div class="methods-laboratories__map"><img src="img/map.png" alt=""></div>
</div>
