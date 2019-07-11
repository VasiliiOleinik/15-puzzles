            <div class="news-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">Main</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="{{ url(app()->getLocale().'/news') }}">News</a></li>
                </ul>
              </div>
              <div class="main-content">
                @include('news.news-left.main-content')
              </div>
            </div>
