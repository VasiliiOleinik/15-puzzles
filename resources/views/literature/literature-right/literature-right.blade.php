            <div class="news-right">
              <div class="categories">
                <p class="news-right__title">Literature categories</p>
                <ul class="categories__list">
                  @foreach($categoriesForBooks as $category)
                  <li class="item"><a href="javascript:void(0)" obj-id={{$category->id}}>{{$category->name}}</a></li>
                  @endforeach
                </ul>
              </div>
              <div class="tags">
                <p class="news-right__title">Literature tags</p>
                <ul class="tags__list">
                  <li class="item"><a href="#item">Oxygen metabolism change</a></li>
                  <li class="item"><a href="#item">Cellular</a></li>
                  <li class="item"><a href="#item">Dr. Rath protocol</a></li>
                  <li class="item"><a href="#item">Cancer</a></li>
                  <li class="item"><a href="#item">Nutrition</a></li>
                  <li class="item"><a href="#item">Reactivation of immune system</a></li>
                </ul>
              </div>
              <div class="clear-filter"><a class="clear-filter-btn" id="clear-filter-btn-js" href="javascript:void(0)">Clear filter</a></div>
              <div class="search">
                <p class="news-right__title">Search in literature</p>
                <form class="search__input">
                  <input class="search-news" type="text" placeholder="Search" id="tags">
                  <button class="search-news-btn"><img src="img/svg/search_news.svg" alt="Search news"></button>
                </form>
              </div>
              <div class="subscribe">
                <p class="news-right__title">Take latest news from 15-Puzzle</p>
                <form class="subscribe__input">
                  <input class="subscribe-field" type="text" placeholder="Your Email Address">
                  <button class="subscribe-btn"><img src="img/svg/envelope.svg" alt="Subscribe"></button>
                </form>
              </div>
            </div>
