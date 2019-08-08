<br><br>
<label for="admin-file-input">Изображение </label>
<input name="admin-file-input" class="file-input" type="file" placeholder="Choose Image">
<br>

<script>

/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {
    //при смене аватара добавляем img src в hidden input формы
    $('.file-input').on('change', function () {
        var curElement = $('#img');
        var reader = new FileReader();
        reader.onload = function(e) {
            curElement.attr("value", e.target.result);
            $('#img-admin').attr('src',e.target.result);
        };
        reader.readAsDataURL(this.files[0]);        
    });

    $('#img-admin').on('click',function(){
        $('.file-input').click();
    })
});
/* ------------------ */
/* ------------------ */

</script>

                
