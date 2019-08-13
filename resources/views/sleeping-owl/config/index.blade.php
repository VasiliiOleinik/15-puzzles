<form action="/admin/config/link" method="post">
    @csrf
    <div class="form-group">
      <label for="adminEmail">Почта администратора:</label>
      <input type="text" class="form-control" name="adminEmail" value="{{$adminEmail}}"><br>
           
      <label for="privacyPolicy">Политика конфиденциальности:</label>
      <textarea class="form-control" rows="5" name="privacyPolicy">{{$privacyPolicy}}</textarea><br>

      <label for="termsOfService">Условия обслуживания:</label>
      <textarea class="form-control" rows="5" name="termsOfService">{{$termsOfService}}</textarea><br>
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>
