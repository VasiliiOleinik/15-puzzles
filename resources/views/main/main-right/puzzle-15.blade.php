<div class="puzzle-15">
    @foreach($typeFactors as $typeFactor)
        <div class="wrapp-for_category">
            <div class="puzzle-15__category">
                <span></span>{{isset($typeFactor->groupLanguage->name) ? $typeFactor->groupLanguage->name :false}}</div>
            @foreach ($typeFactor->factors as $factor)
                <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
                    <div class="puzzle-15__item {{$factor->type->name}}">
                        <img class="factors-check" src="/img/svg/factors-check.svg" alt="">
                        <img src="{{$factor->img}}">
                        <h6 class="puzzle-15__item-title">{{$factor->factorLanguage->name}}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
