              <div class="main__tabs" id="mainTabs">
                <ul class="main__tabs-nav">
                  <li><a href="#tab-1" id="tabFactors"> Factors<span id="countFactors" class="count">[{{count($factors)}}]</span></a></li>
                  <li><a href="#tab-2" id="tabDiseases"> Diseases<span id="countDiseases" class="count">[{{count($diseases)}}]</span></a></li>
                  <li><a href="#tab-3" id="tabProtocols"> Protocols <span id="countProtocols" class="count">[{{count($protocols)}}]</span></a></li>
                  <li><a href="#tab-4" id="tabRemedies"> Remedies<span id="countRemedies" class="count">[{{count($remedies)}}]</span></a></li>
                  <li class="markers"><a href="#tab-5" id="tabMarkers"> Markers<span id="countMarkers" class="count">[{{count($markers)}}]</span></a></li>
                </ul>
                <div class="tags">
                  <div class="tags__list">                    
                  </div>
                </div>
                @include('main.main-left.main-tabs.factors')
                @include('main.main-left.main-tabs.diseases')
                @include('main.main-left.main-tabs.protocols')
                @include('main.main-left.main-tabs.remedies')
                @include('main.main-left.main-tabs.markers')
              </div>
