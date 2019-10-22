<div id="tabListMarkers">
    <div class="tab-item markers">
        {{--    <div class="tab-head-markers">--}}
        {{--        <div class="tab-name">--}}
        {{--        </div>--}}
        {{--    </div>--}}
        <div class="tab-item__content markers">
            {{--        <h3 class="content-markers-title">@lang('main.subtitle_markers')</h3>--}}
            {{--        <span class="methods">@lang('main.methods')</span>--}}
            <div class="method-list">
                @foreach($marker->methods as $method)
                    <div class="method-item">
                        <label class="method-item__head" >
                            <input class="checkbox" type="radio" name="method" id="method_check" data-id="{{$method->method_id}}"><span class="checkbox-custom"></span>
                            <p class="title">{{$method->name}}</p>
                        </label>
                        <div class="method-item__content">
                            <div class="text markers">
                                <p>{{$method->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{--<div class="methods-laboratories">--}}
{{--    <h3 class="methods-laboratories__title">@lang('main.title_methods')</h3><span class="methods-laboratories__intruction">@lang('main.subtitle_methods')</span>--}}
{{--    <div class="methods-laboratories__inputs">--}}
{{--        <div class="methods-select" id="select-method" name="method"><span class="current-value" data-value="">@lang('main.select_methods')</span>--}}
{{--            <ul class="methods-select-list">--}}
{{--                @foreach($methods as $method)--}}
{{--                    <li obj-id="{{$method->method_id}}" data-value="{{$method->method->name}}">{{$method->name}}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="methods-select" id="select-country" name="country"><span class="current-value country">@lang('main.select_country')</span>--}}
{{--            <ul class="methods-select-list">@lang('main.select_country')--}}
{{--                @foreach($countries as $country)--}}
{{--                    <li obj-id="{{$country->id}}">{{$country->name}}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <input class="methods-input" style="visibility:hidden;" type="text" pattern="[0-9]{5}" placeholder="@lang('main.select_zip_code')">--}}
{{--        <button class="methods-btn">@lang('main.button_find_lab') </button>--}}
{{--    </div>--}}
{{--    @include('main.main-left.map')--}}
{{--</div>--}}
{{--<div class="markers-message">--}}
{{--    <h3 class="methods-laboratories__title">По вашим критериям не найдено ни одной лаборатории</h3>--}}
{{--</div>--}}


