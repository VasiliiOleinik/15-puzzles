<form action="/admin/pages/post" method="post">
    @csrf
    <div class="form-group">
      <input type="hidden" value="{{$view}}" name="page">
     
      <label for="titleRu">Title RU:</label>
      <input type="text" class="form-control" name="titleRu" value="{{config('puzzles.'.$view.'.title_ru')}}"><br>
      <label for="titleEng">Title ENG:</label>
      <input type="text" class="form-control" name="titleEng" value="{{config('puzzles.'.$view.'.title_eng')}}"><br>
      <label for="_descriptionRu">Description RU:</label>
      <input type="text" class="form-control" name="_descriptionRu" value="{{config('puzzles.'.$view.'._description_ru')}}"><br>
      <label for="_descriptionEng">Description ENG:</label>
      <input type="text" class="form-control" name="_descriptionEng" value="{{config('puzzles.'.$view.'._description_eng')}}"><br>
      
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>
