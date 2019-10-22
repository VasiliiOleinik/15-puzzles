<div class="methods-laboratories">
  <h3 class="methods-laboratories__title">@lang('main.title_methods')</h3><span class="methods-laboratories__intruction">@lang('main.subtitle_methods')</span>
  <div class="methods-laboratories__inputs">
    <div class="methods-select" id="select-method" name="method"><span class="current-value" data-value="">@lang('main.select_methods')</span>
      <ul class="methods-select-list">
        @foreach($methods as $method)
        <li obj-id="{{$method->method_id}}" data-value="{{$method->method->name}}">{{$method->name}}</li>
        @endforeach
      </ul>
    </div>
    <div class="methods-select" id="select-country" name="country"><span class="current-value country">@lang('main.select_country')</span>
      <ul class="methods-select-list">@lang('main.select_country')
        @foreach($countries as $country)
        <li obj-id="{{$country->id}}" class="list_country">{{$country->name}}</li>
        @endforeach
      </ul>
    </div>
    <input class="methods-input" style="visibility:hidden;" type="text" pattern="[0-9]{5}" placeholder="@lang('main.select_zip_code')">
    <button class="methods-btn">@lang('main.button_find_lab') </button>
  </div>
   @include('main.main-left.map')
   <div class="methods-laboratories-table">
      <div class="methods-laboratories-table__head">
        <div class="methods-table-cell name">Название лаборатории</div>
        <div class="methods-table-cell adress">Адрес</div>
        <div class="methods-table-cell site">Сайт</div>
        <div class="methods-table-cell phone">Телефон</div>
      </div>
      <div class="methods-laboratories-table__body">
        <div class="table__body-row">
          <div class="methods-table-cell name">Payton O'Connell</div>
          <div class="methods-table-cell adress">860 Fairfield St.Zanesville, OH 43701</div>
          <div class="methods-table-cell site"><a href="/link" class="methods-table-cell__link" target="_blank">Site</a></div>
          <div class="methods-table-cell phone">919319697947</div>
        </div>
        <div class="table__body-row">
          <div class="methods-table-cell name">Payton O'Connell</div>
          <div class="methods-table-cell adress">860 Fairfield St.Zanesville, OH 43701</div>
          <div class="methods-table-cell site"><a href="/link" class="methods-table-cell__link" target="_blank">Site</a></div>
          <div class="methods-table-cell phone">919319697947</div>
        </div>
      </div>
    </div>
</div>
<div class="markers-message">
  <h3 class="methods-laboratories__title">По вашим критериям не найдено ни одной лаборатории</h3>
</div>
