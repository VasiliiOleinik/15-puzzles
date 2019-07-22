/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {

    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    usedTags('memberCases', 'all');

    function tagsEmpty() {
        return $("#tags").val().split(',').length == 1 && $("#tags").val().split(',') == "";
    };

    /* ------------------ */
    /* ------------------ */



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

    //при смене аватара добавляем img src в hidden input формы
    $('.item-img').find('.image').on('load', function () {
        setUserAvatar();
    });

    function setUserAvatar() {
        let img = $('.item-img').find('.image').attr('src');
        $('#img').val(img);
    };

    $('.submit-form').on('click', function (e) {
        if (!tagsEmpty()) { 
            $('#story-tags').val( $('#tags').val().split(',') );
        }
    });

    // Скрываю label когда input активен (personal page)
    $(
        ".tag-search"
    ).delegate(".bootstrap-tagsinput","click", function () {
        $(this).find('.place').css({
            "box-shadow": "rgba(91, 156, 167, 0.32) 0px 1px 6px",
            border: "1px solid rgba(91, 156, 167, .5)",
            transition: ".1s ease-in-out"
        });
        $(this)
            .siblings(".place")
            .css({
                transition: ".1s ease-in-out",
                top: "-7px",
                "z-index": "5",
                padding: "0px 10px",
                background: "#ffff",
                left: "15px",
                "font-size": "10px",
                "box-shadow": "0px 0px 3px 0px rgba(0,0,0,0.1)"
            });
    });
    $(
        ".tag-search"
    ).delegate(".place", "click", function () {
        $(".bootstrap-tagsinput").click();
        $(this).parent().find('.bootstrap-tagsinput').css({
            "box-shadow": "rgba(91, 156, 167, 0.32) 0px 1px 6px",
            border: "1px solid rgba(91, 156, 167, .5)",
            transition: ".1s ease-in-out"
        });
        $(this)
            .css({
                transition: ".1s ease-in-out",
                top: "-7px",
                "z-index": "5",
                padding: "0px 10px",
                background: "#ffff",
                left: "15px",
                "font-size": "10px",
                "box-shadow": "0px 0px 3px 0px rgba(0,0,0,0.1)"
            });
            
    });
    $(
        ".labels"
    ).delegate(".bootstrap-tagsinput", "blur", function () {
        //если тэги введены, то оставляем надпись сверху
        if (tagsEmpty()) {
            if ($(this).val().length == "") {
                $(this).css({
                    "box-shadow": "none",
                    border: "1px solid #d6dbde",
                    transition: ".1s ease-in-out"
                });
                $(this)
                    .siblings(".place")
                    .css({
                        transition: ".1s ease-in-out",
                        top: "15px",
                        "z-index": "1",
                        padding: "0px",
                        background: "transparent",
                        left: "30px",
                        "font-size": "15px",
                        "box-shadow": "none"
                    });
            }
        }
    });

    /* ------------------ */
    /* ------------------ */

});
/* ------------------ */
/* ------------------ */
