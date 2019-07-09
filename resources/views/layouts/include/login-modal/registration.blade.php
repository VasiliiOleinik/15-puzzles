<div class="container-authorization__reg">
  <div class="reg-inputs">
    <form method="POST" action="/" id="registration-form">
      @csrf
      <input name="nickname" type="text" placeholder="Login" class="@error('nickname') is-invalid @enderror"
             value="{{ old('nickname') }}" autocomplete="nickname" autofocus>
      @error('nickname')
      <label for="nickname" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </label>
      @enderror
      <input name="email" type="email" placeholder="Email"
             class="@error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email"
             autofocus>
      @error('email')
      <label for="email" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </label>
      @enderror
      <input name="password-register" type="password" placeholder="Password"
             class="@error('password-register') is-invalid @enderror" value="{{ old('password-register') }}"
             autofocus>
      @error('password-register')
      <label for="password-register" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </label>
      @enderror
      <input name="confirm-password-register" type="password" placeholder="Confirm password"
             class="@error('confirm-password-register') is-invalid @enderror" value="{{ old('confirm-password-register') }}"
             autofocus>
      @error('confirm-password-register')
      <label for="confirm-password-register" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </label>
      @enderror
      <button class="modal-reg-btn" type="submit" form="registration-form">Registration</button>
      <label id="errors-register" role="alert"></label>
    </form>
  </div>
  <div class="reg-footer">
    <p class="reg-footer__term">By clicking on the "Registration" button, I agree that I have read and accepted the <a
              href="javascript:void(0)">Terms of Use.</a></p>
  </div>
</div>
