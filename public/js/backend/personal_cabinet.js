document.addEventListener("DOMContentLoaded", function (event) {

    $(".imgAdd").click(function () {
      $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del" , function() {
	    $(this).parent().remove();
    });
    $(function() {
        $(document).on("change",".uploadFile", function()
        {
    		    var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
 
                reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);


                    if ($('#upload_style').length > 0 ) {
                        
                        $('#upload_style').remove();
                    }
                    $("head").append('<style id="upload_style" type="text/css"></style>');
                    var newStyleElement = $("head").children(':last');
                    newStyleElement.html('.imagePreview{background-image:url(' + this.result+');}');

                    uploadFile.closest(".imgUp").find('.imagePreview');
                }
            }
      
        });
    });

});
