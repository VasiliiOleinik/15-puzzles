<div class="puzzle-15">
  <div class="puzzle-15__category resons"><span></span>@lang('main.reasons')</div>
  <div class="puzzle-15__category conditions"><span></span>@lang('main.conditions')</div>
  <div class="puzzle-15__category defence"><span></span>@lang('main.defence')</div>
  <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
  <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
  <div class="puzzle-15__category dangers"><span></span>@lang('main.dangers')</div>
  @foreach($factors as $factor)

    <div class="puzzle-15__item-outer" obj-id="{{$factor->factor_id}}">
      <div class="puzzle-15__item {{$factor->factor->type->name}}"><img class="factors-check"
                                                                    src="img/svg/factors-check.svg" alt=""><img
                src="{{$factor->factor->img}}">
        <h6 class="puzzle-15__item-title">{{$factor->name}}</h6>
      </div>
    </div>
  @endforeach
</div>           
