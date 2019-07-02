<div id="tab-5">
  <div class="tab-list main-scroll markers" id="tabListMarkers">
    @foreach($markers as $marker)
      <div class="tab-item markers">
        <div class="tab-head-markers">
          <p class="title">{{$marker->name}}</p>
          <div class="arrow markers"><img src="img/svg/dropdown-ico.svg" alt=""></div>
        </div>
        <div class="tab-item__content markers">
          <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3>
          <span class="methods">Methods</span>
          <div class="method-list">
            @foreach($marker->methods as $method)
              <div class="method-item">
                <label class="method-item__head">
                  <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
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
  @endforeach
  </div>
</div>
