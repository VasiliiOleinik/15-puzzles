/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {

    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    usedTags('memberCases', 'all');

    // function tagsEmpty() {
    //     return $("#tags").val().split(',').length == 1 && $("#tags").val().split(',') == "";
    // };

    /* ------------------ */
    /* ------------------ */



    /* ------------------ */
    /*       EVENTS       */
    /* ------------------ */

    /*//ajax pagination
    $('.cases-left').delegate('.pagination a', 'click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function (data) {
            $('.main-content').html(data);
        });
    });
    */

    //при смене аватара добавляем img src в hidden input формы
    $('.item-img').find('.image').on('load', function () {
        setUserAvatar();
    });

    function setUserAvatar() {
        let img = $('.item-img').find('.image').attr('src');
        $('#img').val(img);
    };

    // $('.submit-form').on('click', function (e) {
    //     if (!tagsEmpty()) {
    //         $('#story-tags').val( $('#tags').val().split(',') );
    //     }
    // });

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

    $("#add-member-case__form").on("submit", function (e) {
        e.preventDefault();

        $("#add-member-case-headline-error").text("");
        $("#add-member-case-your-story-error").text("");
        $("#add-member-case-story-tags-error").text("");
        let formData = new FormData();
        CKEDITOR.instances.ckeditor_add_member_case.updateElement();
        formData.append('headline', $("#add-member-case__form").find('[name="headline"]').val());
        formData.append('your-story', $("#add-member-case__form").find('[name="your-story"]').val());
        formData.append('anonym', $("#add-member-case__form").find('[name="anonym"]').prop('checked'));
        formData.append('story-tags', $("#add-member-case__form").find('.js-example-basic-multiple').val());
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        if ($("#add-member-case__form").find('[name=image-file]').prop('files').length != 0) {
            formData.append('image-file', $("#add-member-case__form").find('[name="image-file"]').prop('files')[0]);
        }

        $.ajax({
            type: "POST",
            url: "member_cases/create_post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });

                // очистка формы
                $("#add-member-case__form").find('.headline.inp').val('');
                $("#add-member-case__form").find('.js-example-basic-multiple').val([]).trigger('change');
                $("#add-member-case__form").find('[name="anonym"]').prop('checked', false);
                CKEDITOR.instances.ckeditor_add_member_case.setData('');
                CKEDITOR.instances.ckeditor_add_member_case.updateElement();
                $("#add-member-case__form").find('.image').attr('src', '/img/upload.png');
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#add-member-case-" + key + "-error").text(element[0]);
                    }
                }
            }
        });
    });

});
/* ------------------ */
/* ------------------ */
