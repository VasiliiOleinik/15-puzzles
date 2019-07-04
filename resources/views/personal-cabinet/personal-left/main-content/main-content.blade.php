              <div class="main-content">
                <h1 class="title">Personal cabinet</h1>
                <form class="personal-main-info">
                  @include('personal-cabinet.personal-left.main-content.profile-img')
                  @include('personal-cabinet.personal-left.main-content.profile-labels')                  
                </form>
                <div class="save-change">
                  <button class="save_change_btn" type="submit">Save changes</button>
                </div>
                @include('personal-cabinet.personal-left.main-content.personal-history')  
                @include('personal-cabinet.personal-left.main-content.search.search') 
              </div>
