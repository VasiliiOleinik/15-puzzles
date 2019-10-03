@extends('sleeping-owl.pages.layout')
@section('content')
<form action="/admin/pages/post" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <input type="hidden" value="about" name="page">

      <label for="img">Логотип:</label>
      <input type="file" class="form-control" name="img" value="{{config('puzzles.about.img')}}"><br>

      <label for="titleRu">Title RU:</label>
      <input type="text" class="form-control" name="titleRu" value="{{config('puzzles.about.title_ru')}}"><br>
      <label for="titleEng">Title ENG:</label>
      <input type="text" class="form-control" name="titleEng" value="{{config('puzzles.about.title_eng')}}"><br>
      <label for="_descriptionRu">Description RU:</label>
      <input type="text" class="form-control" name="_descriptionRu" value="{{config('puzzles.about._description_ru')}}"><br>
      <label for="_descriptionEng">Description ENG:</label>
      <input type="text" class="form-control" name="_descriptionEng" value="{{config('puzzles.about._description_eng')}}"><br>

      <label for="descriptionRu">Описание RU:</label>
      <textarea class="form-control" rows="5" name="descriptionRu">{{config('puzzles.about.description_ru')}}</textarea><br>
      <label for="descriptionEng">Описание ENG:</label>
      <textarea class="form-control" rows="5" name="descriptionEng">{{config('puzzles.about.description_eng')}}</textarea><br>

      <label for="puzzlesDescriptionRu">Описание под пазлами RU:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionRu">{{config('puzzles.about.puzzles_description_ru')}}</textarea><br>
      <label for="puzzlesDescriptionEng">Описание под пазлами ENG:</label>
      <textarea class="form-control" rows="5" name="puzzlesDescriptionEng">{{config('puzzles.about.puzzles_description_eng')}}</textarea><br>
    </div>`
    <button type="submit" class="btn btn-info">Accept</button>
</form>
@endsection
