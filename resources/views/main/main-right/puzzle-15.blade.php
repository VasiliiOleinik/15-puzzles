<div class="puzzle-15">
    @foreach($typeFactors as $typeFactor)
        <div class="wrapp-for_category {{isset($typeFactor->groupEng->name) ? $typeFactor->groupEng->name : false}}">
            <div class="wrapp-for_cat-items">
                @foreach ($typeFactor->factors as $factor)
                    <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
                        <div class="puzzle-15__item {{$factor->type->name}}">
                            <h6 class="puzzle-15__item-title">{{$factor->factorLanguage->name}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="category">
                <span></span>{{isset($typeFactor->groupLanguage->name) ? $typeFactor->groupLanguage->name :false}}
            </div>
        </div>
    @endforeach
</div>

