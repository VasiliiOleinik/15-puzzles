            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">@lang('literature.title_categories')</p>
                <ul class="categories__list">
                  @foreach($categoriesForBooks as $category)
                  <li class="item">
                    <a href="javascript:void(0)" obj-id="{{$category->category_for_books_id}}"
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
                <form class="subscribe__input" method="get" action="{{ route('subscriber.create', app()->getLocale()) }}">
                  @auth
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('literature.placeholder_subscribe')" value="{{ Auth::user()->email }}" required>
                  @endauth
                  @guest
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('literature.placeholder_subscribe')" required>
                  @endguest
                  <button class="subscribe-btn"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                </form>
              </div>
              <div class="tags" obj-route="literature">
                <p class="news-right__title">@lang('literature.title_tags_cloud')</p>
                <ul class="tags__list">                  
                </ul>
              </div>
            </div>
