<form action="/admin/options/post" method="post">
    @csrf
    <div class="form-group">
      <label for="adminEmail">Почта администратора:</label>
      <input type="text" class="form-control" name="adminEmail" value="{{config('puzzles.options.admin_email')}}"><br>

      <label for="logo">Логотип:</label>
      <input type="text" class="form-control" name="logo" value="{{config('puzzles.options.logo')}}"><br>
           
      <label for="privacyPolicy">Политика конфиденциальности:</label>
      <textarea class="form-control" rows="5" name="privacyPolicy">{{config('puzzles.options.privacy_policy')}}</textarea><br>

      <label for="termsOfService">Условия обслуживания:</label>
      <textarea class="form-control" rows="5" name="termsOfService">{{config('puzzles.options.terms_of_service')}}</textarea><br>
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>
