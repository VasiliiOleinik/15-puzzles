              <div class="main__tabs" id="mainTabs">
                <ul class="main__tabs-nav">
                  <li><a href="#tab-1" id="tabFactors"> Factors<span id="countFactors" class="count">[{{count($pieces)}}]</span></a></li>
                  <li><a href="#tab-2" id="tabDiseases"> Diseases<span id="countDiseases" class="count">[{{count($diseases)}}]</span></a></li>
                  <li><a href="#tab-3" id="tabProtocols"> Protocols <span id="countProtocols" class="count">[{{count($protocols)}}]</span></a></li>
                  <li><a href="#tab-4" id="tabRemedies"> Remedies<span id="countRemedies" class="count">[{{$countRemedies}}]</span></a></li>
                  <li class="markers"><a href="#tab-5" id="tabMarkers"> Markers<span id="countMarkers" class="count">[{{$countMarkers}}]</span></a></li>
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
