<div class="container-authorization__login">
  <div class="login-inputs">
    <form method="POST" action="/personal_cabinet">
      @csrf
      <div class="label required">
        <input name="login" type="text" class="dinamic-input-js @error('login') is-invalid @enderror"
              value="{{ old('login') }}" autocomplete="login"
        >
        <label for="login" class="dinamic-label-js">@lang('main.login')<span>*</span></label>
        @error('login')
          <label for="login" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </label>
        @enderror
      </div>
      <div class="label required">
        <input name="password" type="password"
              class="dinamic-input-js @error('main.password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password"
        >
        <label for="password" class="dinamic-label-js">@lang('main.password')<span>*</span></label>
        @error('password')
        <label for="password" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
        @enderror
      </div>
      <button class="modal-login-btn">@lang('main.enter')</button>
      <span class="errors-auth"></span>
    </form>
  </div>
  <div class="login-footer"><a class="forgot-pass" id="forgot-pass-js" href="javascript:void(0);">@lang('main.forgot_pass')
      <img src="/img/svg/arrow.svg" alt=""></a>
  </div>
</div>
