/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {

    /* ------------------ */
    /*       EVENTS       */
    /* ------------------ */

    //ajax pagination
    $('.cases-left').delegate('.pagination a', 'click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function (data) {
            $('.main-content').html(data);
        });
    });

    /* ------------------ */
    /* ------------------ */

});
/* ------------------ */
/* ------------------ */
