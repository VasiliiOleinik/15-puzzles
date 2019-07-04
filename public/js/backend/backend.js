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


