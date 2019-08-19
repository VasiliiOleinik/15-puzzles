            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">@lang('news.title_categories')</p>
                <ul class="categories__list">
                  @foreach($categoriesForNews as $category)
                  <li class="item"><a href="javascript:void(0)" obj-id="{{$category->category_for_news_id}}">{{$category->name}}</a></li>
                  @endforeach                  
                </ul>
              </div>             
              <div class="clear-filter"><a class="clear-filter-btn" id="clear-filter-btn-js" href="javascript:void(0)">@lang('news.clear_filter')</a></div>
              <div id="news_right_side" class="search">
                    <p class="news-right__title">@lang('news.title_search')</p>                    
                    <form class="search__input">
                      <input class="search-news" type="text" placeholder="@lang('news.placeholder_search')" id="tags">
                      <button class="search-news-btn"><img src="/img/svg/search_news.svg" alt="@lang('news.title_search')"></button>
                    </form>
              </div>              
              <div class="subscribe">
                <p class="news-right__title">@lang('news.title_subscribe')</p>
                <form class="subscribe__input" method="get" action="{{ route('subscriber.create', app()->getLocale()) }}">
                  @auth
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('news.placeholder_subscribe')" value="{{ Auth::user()->email }}" required>
                  @endauth
                  @guest
                  <input class="subscribe-field" type="email" name="email-subscribe" placeholder="@lang('news.placeholder_subscribe')" required>
                  @endguest
                  <button class="subscribe-btn"><img src="/img/svg/envelope.svg" alt="Subscribe"></button>
                </form>
              </div>
              <div class="tags" obj-route="news">
                <p class="news-right__title">@lang('news.title_tags_cloud')</p>
                <ul class="tags__list">                  
                </ul>
              </div>
            </div>
