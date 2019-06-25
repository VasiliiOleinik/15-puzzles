/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {
    //add * before required fields (css)
    var required_label = $('[required="required"]').parent().parent().find('label');
    required_label.after('<label class="required_after">*</label>');
});

/* ------------------ */
/* ------------------ */

/* ------------------------ */
/*     GLOBAL FUNCTIONS     */
/* ------------------------ */

function setUserAvatar(base64_img) {
    if (base64_img && base64_img != "" && base64_img.toLowerCase().indexOf("null") != 0) {
        if ($('#upload_style').length > 0) {
            $('#upload_style').remove();
        }

        $("head").append('<style id="upload_style" type="text/css"></style>');
        var newStyleElement = $("head").children(':last');
        newStyleElement.html('.imagePreview{background-image:url(' + base64_img + ')!important;}');

        $('#img').attr('value', base64_img);
    }
}

function filePriview(base64_img) {

    if ($('#upload_file_style').length > 0) {
        $('#upload_file_style').remove();
    }

    $("head").append('<style id="upload_file_style" type="text/css"></style>');
    var newStyleElement = $("head").children(':last');
    newStyleElement.html('.filePreview{background-image:url(' + base64_img + ')!important;}');
}


/* ------------------ */
/* ------------------ */
