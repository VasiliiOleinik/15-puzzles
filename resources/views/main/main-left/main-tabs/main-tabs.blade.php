<div class="main__tabs" id="mainTabs">
  <ul class="main__tabs-nav">
    <li><a href="#tab-1" id="tabFactors"> @lang('main.tabs_head_factors')<span id="countfactors" class="count">[{{count($factors)}}]</span></a>
    </li>
    <li><a href="#tab-2" id="tabDiseases"> @lang('main.tabs_head_diseases')<span id="countdiseases" class="count">[{{count($diseases)}}]</span></a>
    </li>
    <li><a href="#tab-3" id="tabProtocols"> @lang('main.tabs_head_protocols') <span id="countprotocols"
                                                            class="count">[{{count($protocols)}}]</span></a></li>
    <li><a href="#tab-4" id="tabRemedies"> @lang('main.tabs_head_remedies')<span id="countremedies" class="count">[{{count($remedies)}}]</span></a>
    </li>
    <li class="markers"><a href="#tab-5" id="tabMarkers"> @lang('main.tabs_head_markers')<span id="countmarkers" class="count">[{{count($markers)}}]</span></a>
    </li>
  </ul>
  <div class="tags">
    <div class="tags__list">
    </div>
  </div>
  <div id="tab-1">
    <div class="tab-list main-scroll" id="tabListFactors">
      @include('main.main-left.main-tabs.factors')
    </div>
  </div>
  <div id="tab-2">
    <div class="tab-list main-scroll" id="tabListDiseases">
      @include('main.main-left.main-tabs.diseases')
    </div>
  </div>
  <div id="tab-3">
    <div class="tab-list main-scroll" id="tabListProtocols">
      @include('main.main-left.main-tabs.protocols')
    </div>
  </div>
  <div id="tab-4">
    <div class="tab-list main-scroll" id="tabListRemedies">
      @include('main.main-left.main-tabs.remedies')
    </div>
  </div>
  <div id="tab-5">
    <div class="tab-list main-scroll markers" id="tabListMarkers">
      @include('main.main-left.main-tabs.markers')
    </div>
  </div>
</div>
