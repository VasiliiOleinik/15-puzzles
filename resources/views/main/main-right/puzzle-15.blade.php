<div class="puzzle-15">
    @foreach($typeFactors as $key => $typeFactor)
        @if(count($typeFactor[0])>0)
            @foreach($typeFactor[0] as $factors)
                <div class="wrapp-for_category {{$key}}">
                    <div class="wrapp-for_cat-items">
                        @foreach ($factors as $factor)
                            <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
                                <div class="puzzle-15__item {{isset($factor->type->name) ? $factor->type->name : false  }}">
                                    <img class="factors-check" src="/img/svg/factors-check.svg" alt="">
                                    <img src="{{$factor->img}}">
                                    <h6 class="puzzle-15__item-title">{{$factor->factorLanguage->name}}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="category">
                        <span></span>{{$typeFactor['nameTypeLang']}}</div>
                </div>
            @endforeach
        @else
            <div class="wrapp-for_category {{$key}}">
                <div class="category">
                    <span></span>{{$typeFactor['nameTypeLang']}}</div>
            </div>
        @endif
    @endforeach
</div>