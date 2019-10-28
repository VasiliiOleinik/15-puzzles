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
                            <input class="checkbox" type="radio" name="method" id="method_check" data-id="{{$method->id}}"><span class="checkbox-custom"></span>
                            <p class="title">{{$method->methodLang->name}}</p>
                        </label>
                        <div class="method-item__content">
                            <div class="text markers">
                                <p>{{$method->methodLang->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

