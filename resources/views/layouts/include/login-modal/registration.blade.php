<div class="container-authorization__reg">
  <div class="reg-inputs">
    <form method="POST" action="/" id="registration-form">
      @csrf
      <div class="label required">
        <input name="nickname" type="text" class="dinamic-input-js @error('nickname') is-invalid @enderror"
              value="{{ old('nickname') }}" autocomplete="nickname" autofocus>
        <label for="nickname" class="dinamic-label-js">@lang('main.login') <span>*</span></label>
        @error('nickname')
        <label for="nickname" class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </label>
        @enderror
      </div>
      <div class="label required">
        <input name="email" type="email"
              class="dinamic-input-js @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email"
              autofocus>
        <label for="email" class="dinamic-label-js">Email <span>*</span></label>
        @error('email')
        <label for="email" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
        @enderror
      </div>
      <div class="label required">
        <input name="password-register" type="password"
              class="dinamic-input-js @error('password-register') is-invalid @enderror" value="{{ old('password-register') }}"
              autofocus>
        <label for="password-register" class="dinamic-label-js">@lang('main.password') <span>*</span></label>
        @error('password-register')
        <label for="password-register" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
        @enderror
      </div>
      <div class="label required">
        <input name="confirm-password-register" type="password"
              class="dinamic-input-js @error('confirm-password-register') is-invalid @enderror" value="{{ old('confirm-password-register') }}"
              autofocus>
        <label for="confirm-password-register" class="dinamic-label-js">@lang('main.confirm_pass')<span>*</span></label>
        @error('confirm-password-register')
        <label for="confirm-password-register" class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </label>
        @enderror
      </div>
      <button class="modal-reg-btn" type="submit" form="registration-form">@lang('main.Registration')</button>
      <label id="errors-register" role="alert"></label>
    </form>
  </div>
  <div class="reg-footer">
    <p class="reg-footer__term">@lang('main.confirm_button')<a
              href="javascript:void(0)">@lang('main.Terms')</a></p>
  </div>
</div>
