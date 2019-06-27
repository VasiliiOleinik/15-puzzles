              <div class="container-authorization__login">
                <div class="login-inputs">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input name="login" type="text" placeholder="Login" required class="@error('login') is-invalid @enderror" value="{{ old('login') }}" autocomplete="login" autofocus>
                    @error('login')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <input name="password" type="password" placeholder="Password" required class="@error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="password" autofocus>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <button class="modal-login-btn">Login</button>
                  </form>
                </div>
                <div class="login-footer"><a class="forgot-pass" id="forgot-pass-js" href="javascript:void(0);">Forgot you password? <img src="img/svg/arrow.svg" alt=""></a></div>
              </div>
