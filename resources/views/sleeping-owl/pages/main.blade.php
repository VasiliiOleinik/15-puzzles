<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<form action="/admin/pages/post" method="post">
    @csrf
    <div class="form-group">
      <input type="hidden" value="main" name="page">

      <input type="hidden" value="{{config('puzzles.main.description_ru')}}" name="descriptionRu">
      <input type="hidden" value="{{config('puzzles.main.description_eng')}}" name="descriptionEng">
      <input type="hidden" value="{{config('puzzles.main.puzzles_description_ru')}}" name="puzzlesDescriptionRu">
      <input type="hidden" value="{{config('puzzles.main.puzzles_description_eng')}}" name="puzzlesDescriptionEng">
       
      <label for="titleRu">Название страницы RU:</label>
      <input type="text" class="form-control" name="titleRu" value="{{config('puzzles.main.title_ru')}}"><br>
      <label for="titleEng">Название страницы ENG:</label>
      <input type="text" class="form-control" name="titleEng" value="{{config('puzzles.main.title_eng')}}"><br>

      <label for="h1Ru">Заголовок h1 RU:</label>
      <input type="text" class="form-control" name="h1Ru" value="{{config('puzzles.main.h1_ru')}}"><br>                 
      <label for="h1Eng">Заголовок h1 ENG:</label>
      <input type="text" class="form-control" name="h1Eng" value="{{config('puzzles.main.h1_eng')}}"><br>

      <label for="descriptionRu">Описание RU:</label>
      <textarea class="form-control" rows="5" id="descriptionRu">{{config('puzzles.main.description_ru')}}</textarea><br>
      <label for="descriptionEng">Описание ENG:</label>
      <textarea class="form-control" rows="5" id="descriptionEng">{{config('puzzles.main.description_eng')}}</textarea><br>

      <label for="puzzlesDescriptionRu">Описание под пазлами RU:</label>
      <textarea class="form-control" rows="5" id="puzzlesDescriptionRu">{{config('puzzles.main.puzzles_description_ru')}}</textarea><br>
      <label for="puzzlesDescriptionEng">Описание под пазлами ENG:</label>
      <textarea class="form-control" rows="5" id="puzzlesDescriptionEng">{{config('puzzles.main.puzzles_description_eng')}}</textarea><br>

      <label for="linkVideo">Ссылка на видео:</label>
      <input type="text" class="form-control" name="linkVideo" value="{{config('puzzles.main.link_video')}}"><br>
    </div>
    <button type="submit" class="btn btn-info">Accept</button>
</form>

<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#descriptionRu' ) )
        .catch( error => {
            console.error( error );
        } );
     ClassicEditor
        .create( document.querySelector( '#descriptionEng' ) )
        .catch( error => {
            console.error( error );
        } );
     ClassicEditor
        .create( document.querySelector( '#puzzlesDescriptionRu' ) )
        .catch( error => {
            console.error( error );
        } );
     ClassicEditor
        .create( document.querySelector( '#puzzlesDescriptionEng' ) )
        .catch( error => {
            console.error( error );
        } );
    document.addEventListener("DOMContentLoaded", function(event) { 
        $("[role=textbox]").each(function(index){
            $(this).attr('name',$('textarea').eq(index).attr('id'));
        });

        $("body").on('DOMSubtreeModified', "[role=textbox]", function() {
            let name = $(this).attr('name');
            $('input[name='+name+']').attr('value',$(this).html())
        });
        
    });
</script> 
