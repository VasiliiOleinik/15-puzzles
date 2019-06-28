<div class="puzzle-15">
  <div class="puzzle-15__category resons"><span></span>resons</div>
  <div class="puzzle-15__category conditions"><span></span>conditions</div>
  <div class="puzzle-15__category defence"><span></span>defence</div>
  <div class="puzzle-15__category dangers"><span></span>dangers</div>
  <div class="puzzle-15__category dangers"><span></span>dangers</div>
  <div class="puzzle-15__category dangers"><span></span>dangers</div>
  @foreach($factors as $factor)
    <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
      <div class="puzzle-15__item {{$factor->category->name}}"><img class="factors-check"
                                                                    src="img/svg/factors-check.svg" alt=""><img
                src="{{$factor->img}}">
        <h6 class="puzzle-15__item-title">{{$factor->name}}</h6>
      </div>
    </div>
@endforeach
                
