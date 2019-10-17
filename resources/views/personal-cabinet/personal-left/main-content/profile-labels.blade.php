                  <div class="profile-labels">
                     <!-- avatar -->
                     <input id="img" type="hidden" name="img">
                    <!- - ->
                    <!-- nickname -->
                    <div class="label">
                      <!--
                      <input name="nickname" type="text">
                      <label for="nickname">Nickname</label>
                      -->
                      <input id="nickname" type="text"class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{Auth::user()->nickname}}" required autocomplete="nickname" autofocus>
                      <label for="nickname">@lang('personal_cabinet.nickname')</label>
                      @error('nickname')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- email -->
                    <div class="label required">
                      <!--
                      <input name="email" type="text">
                      <label for="email">Email<span>*</span></label>
                      -->
                      <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>
                      <label for="email">@lang('personal_cabinet.email')<span>*</span></label>
                      @error('email')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- first name -->
                    <div class="label required">
                      <!--
                      <input name="name" type="text">
                      <label for="name">Name<span>*</span></label>
                      -->
                      <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>
                      <label for="name">@lang('personal_cabinet.name')<span>*</span></label>
                      @error('first_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- last name -->
                    <div class="label required">
                      <!--
                      <input name="last_name" type="text">
                      <label for="last_name">Last Name<span>*</span></label>
                      -->
                      <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>
                      <label for="last_name">@lang('personal_cabinet.last_name')<span>*</span></label>
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- middle name -->
                    <div class="label required">
                      <!--
                      <input name="middle_name" type="text">
                      <label for="middle_name">Middle Name<span>*</span></label>
                      -->
                      <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" autofocus>
                      <label for="middle_name">@lang('personal_cabinet.middle_name')<span>*</span></label>
                      @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- birthday -->
                    <div class="label required">
                      <!--
                      <input class="date-inp" id="personal-dob" name="dob" type="text">
                      <label for="dob">Date Of Birth<span>*</span></label>
                      -->
                      <input class="date-inp" id="birthday" name="birthday" value="{{Auth::user()->birthday}}" type="text">
                      <label for="dob">@lang('personal_cabinet.date_of_birth')<span>*</span></label>
                      @error('birthday')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <!- - ->
                    <!-- password -->
                    <div class="label">
                      <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus>
                      <label for="nickname">@lang('personal_cabinet.password')</label>
                      @error('password')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                      <!--
                      <input name="password" type="password">
                      <label for="nickname">Password</label>
                      -->
                    </div>
                    <!- - ->
                    <div class="message">
                      <p><span>*</span>@lang('personal_cabinet.non_public_info')</p>
                    </div>
                  </div>
