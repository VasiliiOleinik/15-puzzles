              <div class="main__tabs" id="mainTabs">
                <ul class="main__tabs-nav">
                  <li><a href="#tab-1"> Factors<span class="count">[200]</span></a></li>
                  <li><a href="#tab-2"> Diseases<span class="count">[200]</span></a></li>
                  <li><a href="#tab-3"> Protocols <span class="count">[200]</span></a></li>
                  <li><a href="#tab-4"> Remedies<span class="count">[200]</span></a></li>
                  <li class="markers"><a href="#tab-5"> Markers<span class="count">[200]</span></a></li>
                </ul>
                <div class="tags">
                  <div class="tags__list">
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>
                  </div>
                </div>
                @include('main.main-left.main-tabs.factors')
                @include('main.main-left.main-tabs.diseases')
                @include('main.main-left.main-tabs.protocols')
                @include('main.main-left.main-tabs.remedies')
                @include('main.main-left.main-tabs.markers')
              </div>
