<form action="/admin/pages/post" method="post">
    @csrf
    <div class="form-group">
      <input type="hidden" value="about" name="page">

      <label for="img">Логотип:</label>
      <input type="text" class="form-control" name="img" value="{{config('puzzles.about.img')}}"><br>

      <label for="descriptionRu">Описание RU:</label>
      <textarea class="form-control" rows="5" name="descriptionRu">{{config('puzzles.about.description_ru')}}</textarea><br>
      <label for="descriptionEng">Описание ENG:</label>
      <textarea class="form-control" rows="5" name="descriptionEng">{{config('puzzles.about.description_eng')}}</textarea><br>

      <label for="puzzlesDescriptionRu">Описание под пазлами RU:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionRu">{{config('puzzles.about.puzzles_description_ru')}}</textarea><br>
      <label for="puzzlesDescriptionEng">Описание под пазлами ENG:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionEng">{{config('puzzles.about.puzzles_description_eng')}}</textarea><br>
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>
