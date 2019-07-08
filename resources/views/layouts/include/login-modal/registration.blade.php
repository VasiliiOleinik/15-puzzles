<div class="container-authorization__reg">
  <div class="reg-inputs">
    <form method="POST" action="/" id="registration-form">
      @csrf
      <input name="login-register" type="text" placeholder="Login">
      <input name="email" type="email" placeholder="Email">
      <input name="password-register" type="password" placeholder="Password">
      <input name="congirm-password-register" type="password" placeholder="Confirm password">
      <button class="modal-reg-btn" type="submit" form="registration-form">Registration</button>
    </form>
  </div>
  <div class="reg-footer">
    <p class="reg-footer__term">By clicking on the "Registration" button, I agree that I have read and accepted the <a
              href="javascript:void(0)">Terms of Use.</a></p>
  </div>
</div>
