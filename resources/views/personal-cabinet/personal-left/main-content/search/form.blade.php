                  <form  id="file-search-form" method="get" action="{{ route('file.personal_cabinet.index', app()->getLocale()) }}" class="search-byHistory__labels" enctype="multipart/form-data">
                    <div class="label-search">
                      <div class="label">
                        <input type="text" placeholder="@lang('personal_cabinet.search_by_name')" name="search_file_name" value="{{$search_file['name']}}" autofocus autocomplete="search_file_name">
                        <button class="search-byName" type="submit"><img src="/img/svg/history-search.svg" alt=""></button>
                      </div>
                    </div>
                    <div class="label-date">
                      <input class="date-inp" type="text" name="search_file_date_from" value="{{$search_file['date_from']}}" placeholder="dd.mm.yyyy" autocomplete="off">
                      <input class="date-inp" type="text" name="search_file_date_to" value="{{$search_file['date_to']}}" placeholder="dd.mm.yyyy" autocomplete="off">
                      <button class="search-btn" type="submit">@lang('personal_cabinet.search_by_date')</button>
                    </div>
                  </form>
