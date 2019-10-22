<div class="container-recovery-pass">
  <div class="recovery-pass-header"><span>recovery password</span></div>
  <div class="recovery-pass-inputs">
    <form action="">
      <div class="label required">
        <input name="email-reset" type="email"
              class="dinamic-input-js @error('email-reset') is-invalid @enderror" value="{{ old('email-reset') }}" autocomplete="email-reset"
              autofocus>
        <label for="email-reset" class="dinamic-label-js">Email <span>*</span></label>
      </div>  
      <button class="recovery-pass-btn" id="recovery-pass-js">Recovery</button>
      @error('email-reset')
      <label for="email-reset" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </label>
      @enderror
      <label id="errors-reset" role="alert"></label>
    </form>
    <span class="recovery-success">Password reset link sent to your email</span>
  </div>
  <div class="recovery-pass-footer"><a class="recovery-pass-footer-link" id="back-to-login-js"
                                       href="javascript:void(0);"> <img src="/img/svg/arrow.svg" alt="">Back to login</a><a
            class="recovery-pass-footer-link close" id="close-recovery-js" href="javascript:void(0);">Close</a></div>
</div>
