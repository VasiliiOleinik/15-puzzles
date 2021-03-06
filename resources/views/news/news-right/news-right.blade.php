            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">@lang('news.title_categories')</p>
                <ul class="categories__list">
                  @foreach($categoriesForNews as $category)
                  <li class="item">
                    <a href="{{ url(app()->getLocale().'/news/category') }}/{{ $category->categoriesForNews->alias }}" obj-id="{{$category->category_for_news_id}}"
                                                 obj-name="{{$category->categoriesForNews->name}}">{{$category->name}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!--
              <div class="clear-filter"><a class="clear-filter-btn" id="clear-filter-btn-js" href="javascript:void(0)">@lang('news.clear_filter')</a></div>
              <div id="news_right_side" class="search">
                    <p class="news-right__title">@lang('news.title_search')</p>
                    <form class="search__input">
                      <input class="search-news" type="text" placeholder="@lang('news.placeholder_search')" id="tags">
                      <button class="search-news-btn"><img src="/img/svg/search_news.svg" alt="@lang('news.title_search')"></button>
                    </form>
              </div>
              -->
              <div class="subscribe">
                <p class="news-right__title">@lang('news.title_subscribe')</p>
                <form id="news-subscribe-form" class="subscribe__input" method="get">
                  <div class="label">
                    @auth
                      <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe" value="{{ Auth::user()->email }}">
                      <label for="email-subscribe" class="dinamic-label-js">@lang('news.placeholder_subscribe')</label>
                    @endauth
                    @guest
                      <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe">
                      <label for="email-subscribe" class="dinamic-label-js">@lang('news.placeholder_subscribe')</label>
                    @endguest
                  </div>
                  <button class="subscribe-btn" type="submit"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                  <label id="news-email-subscribe-error" class="invalid" for="email-subscribe"></label>
                </form>
              </div>
              <div class="tags" obj-route="news">
                <p class="news-right__title">@lang('news.title_tags_cloud')</p>
                <ul class="tags__list">
                </ul>
              </div>
            </div>
