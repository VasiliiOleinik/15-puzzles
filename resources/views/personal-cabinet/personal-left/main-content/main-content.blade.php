              <div class="main-content">
                <h1 class="title">@lang('personal_cabinet.personal_cabinet')</h1>
                <form class="personal-main-info" id="personal-main-info" method="POST" action="{{ route('user.update', $user)}}">
                  @csrf
                  <input name="_method" type="hidden" value="PUT">

                  @include('personal-cabinet.personal-left.main-content.profile-img')
                  @include('personal-cabinet.personal-left.main-content.profile-labels')
                </form>
                <div class="save-change">
                  <button class="save_change_btn" type="submit" form="personal-main-info">@lang('personal_cabinet.save_changes')</button>
                </div>

                @include('personal-cabinet.personal-left.main-content.personal-history')
                @include('personal-cabinet.personal-left.main-content.search.search')
              </div>
