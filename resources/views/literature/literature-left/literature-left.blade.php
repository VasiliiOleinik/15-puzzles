            <div class="news-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="{{ url('/', app()->getLocale() )}}">@lang('breadcrumbs.main')</a></li>
                  <li class="breadcrumbs__element divider"><img src="/img/svg/arrow.svg" ></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">@lang('breadcrumbs.literature')</a></li>
                </ul>
              </div>
              <div class="main-content">
                @include('literature.literature-left.main-content')
              </div>
            </div>
