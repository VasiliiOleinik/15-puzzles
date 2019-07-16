@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="member-case">
              <div class="member-case__left">
                <div class="breadcrumbs">
                  <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
                    <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url(app()->getLocale().'/member_cases') }}">@lang('breadcrumbs.member_cases')</a></li>
                    <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                    <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">{{$memberCase->title}}</a></li>
                  </ul>
                </div>
                <div class="main-content">
                  <h1 class="title">{{$memberCase->title}}</h1>
                  <div class="case-info"><span class="case-info-text">{{$memberCase->updated_at->format('d.m.Y')}}</span>
                    @if($memberCase->anonym == 1)
                    <span class="case-info-text">{{$memberCase->user->first_name}} {{$memberCase->user->last_name}}</span>
                    @else
                    <span class="case-info-text">User wished to remain anonymous</span>
                    @endif
                  </div>
                  <div class="case-container"><img class="case-container__img" src="/{{$memberCase->img}}" alt="">
                    <p class="case-container__title">
                      {{$memberCase->description}}
                    </p>
                    <span class="case-container__text">
                      {{$memberCase->content}}
                    </span>
                  </div>
                </div>
              </div>
              <div class="member-case__right">
                <div class="sticky-right">
                  <div class="case-tags"><span class="case-info-title">Tags</span>
                    <ul class="case-tags__list">
                      <li class="item"><a href="#item">Oxygen metabolism change</a></li>
                      <li class="item"><a href="#item">Cellular</a></li>
                      <li class="item"><a href="#item">Dr. Rath protocol</a></li>
                      <li class="item"><a href="#item">Cancer</a></li>
                      <li class="item"><a href="#item">Nutrition</a></li>
                      <li class="item"><a href="#item">Reactivation of immune system</a></li>
                    </ul>
                  </div>
                  <div class="case-share"><span class="case-info-title">Share</span>
                    <ul class="case-share-links">
                      <li><a href=""><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a></li>
                      <li><a href=""><i class="fab fa-facebook-square"></i><span>Facebook</span></a></li>
                      <li><a href=""><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                      <li><a href=""><i class="fab fa-twitter-square "></i><span>Twitter</span></a></li>
                      <li><a href=""><i class="fab fa-telegram"></i><span>Telegram</span></a></li>
                      <li><a href=""><i class="fab fa-pinterest-square"></i><span>Pinterest</span></a></li>
                    </ul>
                  </div>
                  <div class="case-add-comm"><span class="case-info-title">Add comment</span>
                    <form action="">
                      <div class="label">
                        <textarea name="add-comm" type="text"></textarea>
                        <label for="add-comm">Add comment</label>
                      </div>
                      <button class="send-comment">Send comment</button>
                    </form>
                  </div>
                  <div class="case-comm-list"><span class="case-info-title">Comments</span>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img1.png" alt="Danny Hebrew">
                        <div class="item-header-info">
                          <p class="comm-author">Danny Hebrew</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Spiny basslet lemon shark wallago, sauger. Sea snail tarpon, Blobfish tadpole cod northern lampfish; Atlantic herring; redtooth triggerfish bonito snakehead bichir, &quot;Black mackerel pineconefish.&quot;</p>
                      </div>
                    </div>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img2.png" alt="Arthur James">
                        <div class="item-header-info">
                          <p class="comm-author">Arthur James</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Broadband dogfish pelican gulper, red snapper delta smelt loach coolie loach electric catfish bocaccio frilled shark barramundi combtooth blenny Indian mul!&quot;</p>
                      </div>
                    </div>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img3.png" alt="Kane Whest">
                        <div class="item-header-info">
                          <p class="comm-author">Kane Whest</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Redhorse sucker worm eel kissing gourami slickhead ocean perch bigmouth buffalo anemonefish amago escolar European eel.</p>
                      </div>
                    </div>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img1.png" alt="Darci French">
                        <div class="item-header-info">
                          <p class="comm-author">Darci French</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Temperate ocean-bass, sauger waryfish great white shark, graveldiver--bonytongue murray cod rockweed gunnel cobbler sand tilefish. Oarfish threespine stickleback panga horsefish striped bass icefish, stingfish, sleeper.&quot;</p>
                      </div>
                    </div>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img2.png" alt="Alice Cooper">
                        <div class="item-header-info">
                          <p class="comm-author">Alice Cooper</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Ribbon sawtail fish, &quot;basslet, brown trout pineconefish king-of-the-salmon mail-cheeked fish saury whitefish climbing gourami trevally river stingray sand tiger, smoothtongue dusky grouper, bonito Rabbitfish.&quot;</p>
                      </div>
                    </div>
                    <div class="case-comm-item">
                      <div class="comm-item-header"><img src="/img/comm-img3.png" alt="Kara Celtic">
                        <div class="item-header-info">
                          <p class="comm-author">Kara Celtic</p><span class="comm-date">10.10.1010</span>
                        </div>
                      </div>
                      <div class="comm-item-content">
                        <p class="comm-item-text">Bramble shark pelican gulper glass knifefish frogfish zebra tilapia albacore halfmoon!</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection
