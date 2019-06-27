                <div id="tab-3">
                  <div class="tab-list main-scroll" id="tabListProtocols">
                    @foreach($protocols as $protocol) 
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">{{$protocol->name}}<span class="evidence {{$protocol->evidence->name}}"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle">{{$protocol->subtitle}}</p>
                          <p>{{$protocol->content}}</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link protocols" href="javascript:void(0)">{{$protocol->url}}</a>
                      </div>
                    </div>
                    @endforeach
                    <!--
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Podduvka protocol<span class="evidence average"><span class="evidence__detail">Level of evidence:<span class="evidence__level average">average</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Rath protocol<span class="evidence proven"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Johanna Budwig protocol<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Dokopalenko protocol<span class="evidence average"><span class="evidence__detail">Level of evidence:<span class="evidence__level average">average</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Shiitake protocol<span class="evidence proven"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    -->
                  </div>
                </div>
