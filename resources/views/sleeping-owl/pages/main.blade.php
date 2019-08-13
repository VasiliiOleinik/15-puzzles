<form action="/admin/pages/post" method="post">
    @csrf
    <div class="form-group">
      <label for="logo">Логотип:</label>
      <input type="text" class="form-control" name="logo" value="{{$logo}}"><br>

      <label for="titleRu">Название страницы RU:</label>
      <input type="text" class="form-control" name="titleRu" value="{{$titleRu}}"><br>
      <label for="titleEng">Название страницы ENG:</label>
      <input type="text" class="form-control" name="titleEng" value="{{$titleEng}}"><br>

      <label for="h1Ru">Заголовок h1 RU:</label>
      <input type="text" class="form-control" name="h1Ru" value="{{$h1Ru}}"><br>                 
      <label for="h1Eng">Заголовок h1 ENG:</label>
      <input type="text" class="form-control" name="h1Eng" value="{{$h1Eng}}"><br>

      <label for="descriptionRu">Описание RU:</label>
      <textarea class="form-control" rows="5" name="descriptionRu">{{$descriptionRu}}</textarea><br>
      <label for="descriptionEng">Описание ENG:</label>
      <textarea class="form-control" rows="5" name="descriptionEng">{{$descriptionEng}}</textarea><br>

      <label for="puzzlesDescriptionRu">Описание под пазлами RU:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionRu">{{$puzzlesDescriptionRu}}</textarea><br>
      <label for="puzzlesDescriptionEng">Описание под пазлами ENG:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionEng">{{$puzzlesDescriptionEng}}</textarea><br>

      <label for="linkVideo">Ссылка на видео:</label>
      <input type="text" class="form-control" name="linkVideo" value="{{$linkVideo}}"><br>
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>
