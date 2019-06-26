                <div id="tab-1">
                  <div class="tab-list main-scroll">
                    @foreach($pieces as $piece)                                          
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #{{$piece->id}}: {{$piece->name}}</p>
                        </label>
                        <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>{{$piece->content}}</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
