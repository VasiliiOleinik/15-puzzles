              <div class="methods-laboratories">
                <h3 class="methods-laboratories__title">Find nearest laboratories to check this marker</h3><span class="methods-laboratories__intruction">Enter your country name and your zip code</span>
                <div class="methods-laboratories__inputs">
                  <div class="methods-select" id="select-method" name="method"><span class="current-value" data-value="">Select method</span>
                    <ul class="methods-select-list">
                      @foreach($methods as $method)  
                      <li data-value="{{$method->name}}">{{$method->name}}</li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="methods-select" id="select-country" name="country"><span class="current-value country">You country</span>
                    <ul class="methods-select-list">Select method
                      <li data-value="ru">Russia</li>
                      <li data-value="ua">Ukraine</li>
                      <li data-value="usa">USA</li>
                    </ul>
                  </div>
                  <input class="methods-input" type="text" placeholder="Your ZIP code">
                  <button class="methods-btn">Find lab </button>
                </div>
                <div class="methods-laboratories__map"><img src="img/map.png" alt=""></div>
              </div>
