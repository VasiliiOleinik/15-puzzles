<div class="container-authorization__login">
  <div class="login-inputs">
    <form method="POST" action="/personal_cabinet">
      @csrf
      <input name="login" type="text" placeholder="Login" class="@error('login') is-invalid @enderror"
             value="{{ old('login') }}" autocomplete="login" autofocus>
      @error('login')
      <label for="login" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </label>
      @enderror
      <input name="password" type="password" placeholder="Password"
             class="@error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password"
             autofocus>
      @error('password')
      <label for="password" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </label>
      @enderror
      <button class="modal-login-btn">Login</button>
      <span class="errors-auth"></span>
    </form>
  </div>
  <div class="login-footer"><a class="forgot-pass" id="forgot-pass-js" href="javascript:void(0);">Forgot you password?
      <img src="/img/svg/arrow.svg" alt=""></a>
  </div>
</div>
