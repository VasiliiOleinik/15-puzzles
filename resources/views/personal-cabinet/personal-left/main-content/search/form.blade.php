                  <form  id="file-search-form" method="get" action="{{ route('file.personal_cabinet.index', app()->getLocale()) }}" class="search-byHistory__labels" enctype="multipart/form-data">
                    <div class="label-search">
                      <input type="text" placeholder="Search by name" name="search_file_name" value="{{$search_file['name']}}" autofocus autocomplete="search_file_name">
                      <button class="search-byName" type="submit"><img src="/img/svg/history-search.svg" alt=""></button>
                    </div>
                    <div class="label-date">
                      <input class="date-inp" type="text" name="search_file_date_from" value="{{$search_file['date_from']}}" placeholder="dd.mm.yyyy" autocomplete="off">
                      <input class="date-inp" type="text" name="search_file_date_to" value="{{$search_file['date_to']}}" placeholder="dd.mm.yyyy" autocomplete="off">
                      <button class="search-btn" type="submit">Search by date</button>
                    </div>
                  </form>
