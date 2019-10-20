                  <div class="profile-labels">
                     <!-- avatar -->
                     <input id="img" type="hidden" name="img">
                    <!-- nickname -->
                    <div class="label">
                      <input id="nickname" type="text"class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{Auth::user()->nickname}}" disabled>
                      <label for="nickname">@lang('personal_cabinet.nickname')</label>
                      @error('nickname')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <div class="label required">

                      <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" disabled>
                      <label for="email">@lang('personal_cabinet.email')<span>*</span></label>
                      @error('email')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <div class="label required">

                      <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{Auth::user()->first_name}}" autocomplete="first_name" autofocus>
                      <label for="name">@lang('personal_cabinet.name')<span>*</span></label>
                      @error('first_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                    </div>

                    <div class="label required">
                      <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{Auth::user()->last_name}}" autocomplete="last_name" autofocus>
                      <label for="last_name">@lang('personal_cabinet.last_name')<span>*</span></label>
                      @error('last_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="label required">
                      <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" autofocus>
                      <label for="middle_name">@lang('personal_cabinet.middle_name')<span>*</span></label>
                      @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="label required">
                      <input class="date-inp" id="birthday" name="birthday" value="{{Auth::user()->birthday}}" type="text">
                      <label for="dob">@lang('personal_cabinet.date_of_birth')<span>*</span></label>
                      @error('birthday')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="label">
                      <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus>
                      <label for="nickname">@lang('personal_cabinet.password')</label>
                      @error('password')
                        <label class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
                      @enderror
                    </div>
                    <!- - ->
                    <div class="message">
                      <p><span>*</span>@lang('personal_cabinet.non_public_info')</p>
                    </div>
                  </div>
