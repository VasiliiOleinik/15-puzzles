            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">@lang('literature.title_categories')</p>
                <ul class="categories__list">
                  @foreach($categoriesForBooks as $category)
                  <li class="item">
                    <a href="{{ url(app()->getLocale().'/literature/category') }}/{{ $category->categoriesForBook->alias }}" obj-id="{{$category->category_for_books_id}}"
                                                 obj-name="{{$category->categoriesForBook->name}}">{{$category->name}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!--
              <div class="clear-filter"><a class="clear-filter-btn" id="clear-filter-btn-js" href="javascript:void(0)">@lang('literature.clear_filter')</a></div>
              <div class="search">
                <p class="news-right__title">@lang('literature.title_search')</p>
                <form class="search__input">
                  <input class="search-news" type="text" placeholder="@lang('literature.placeholder_search')" id="tags">
                  <button class="search-news-btn"><img src="/img/svg/search_news.svg" alt=""></button>
                </form>
              </div>
              -->
              <div class="subscribe">
                <p class="news-right__title">@lang('literature.title_subscribe')</p>
                <form id="literature-subscribe-form" class="subscribe__input" method="get">
                  <div class="label">
                    @auth
                      <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe" value="{{ Auth::user()->email }}">
                      <label for="email-subscribe" class="dinamic-label-js">@lang('literature.placeholder_subscribe')</label>
                    @endauth
                    @guest
                      <input class="subscribe-field dinamic-input-js" type="text" name="email-subscribe">
                      <label for="email-subscribe" class="dinamic-label-js">@lang('literature.placeholder_subscribe')</label>
                    @endguest
                  </div>
                  <button class="subscribe-btn" type="submit" id="send-form-btn"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                  <label id="literature-email-subscribe-error" class="invalid" for="email-subscribe"></label>
                </form>
              </div>
              <div class="tags" obj-route="literature">
                <p class="news-right__title">@lang('literature.title_tags_cloud')</p>
                <ul class="tags__list">
                </ul>
              </div>
            </div>
