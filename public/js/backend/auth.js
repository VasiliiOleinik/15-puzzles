/* ------------------------- */
/*      GLOBAL VARIABLES     */
/* ------------------------- */

let locale = $('html').attr('lang');

/* ------------------ */
/* ------------------ */


/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function () {

    //кликнули на login submit
    $('.modal-login-btn').click(function (event) {
        $("#preloader").css("display", "flex");
        event.preventDefault();
        $('.errors').remove();
        $(this).attr("disabled", true);
        console.log('login clicked')
        let data = {
            "login": $('[name=login]').val(),
            "password": $('[name=password]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: "post",
            url: "/" + locale + "/login",
            data: data,
            dataType: 'json',
            complete: function (data) {
                $("#preloader").css("display", "none");
                console.log(data.responseText);
                $('.modal-login-btn').removeAttr("disabled");
                if (data.responseJSON.auth === "success") {
                    $('.fancybox-close-small').click();
                    location.href = "/" + locale + "/personal_cabinet";

                }
                if (data.responseJSON.auth === "failed") {
                    $('.errors-auth').html('Login or password invalid')
                }
            },
            error: function (err) {
                $("#preloader").css("display", "none");
                $('.modal-login-btn').removeAttr("disabled");
                if (err.status === 422) { // when status code is 422, it's a validation issue

                    $('.errors').remove();
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        let el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="errors">' + error[0] + '</span>'));
                    });
                }
            }
        });
    })

    //кликнули на registration submit
    $('.modal-reg-btn').click(function (event) {
        $("#preloader").css("display", "flex");
        event.preventDefault();
        $('.errors').remove();
        $(this).attr("disabled", true);

        /*let confirmPassword = false;
        if ($('[name=password-register]').val() === $('[name=congirm-password-register]').val()) {
            confirmPassword = true;
        }*/

        let data = {
            "nickname": $('[name=nickname]').val(),
            "email": $('[name=email]').val(),
            "password-register": $('[name=password-register]').val(),
            "confirm-password-register": $('[name=confirm-password-register]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        if ($('.spinner-register').length === 0) {
            $('.modal-reg-btn').before('<div class="spinner-border spinner-register text-medicine"></div>');
        }

        $.ajax({
            type: "post",
            url: "/" + locale + "/register",
            data: data,
            dataType: 'json',
            complete: function (data) {
                $("#preloader").css("display", "none");
                //console.log(data.responseText);
                $('.modal-reg-btn').removeAttr("disabled");
                if (data.responseJSON) {
                    $('.spinner-register').remove();
                    if (data.responseJSON.auth === "success") {
                        createCookie(locale, locale, 1);
                        $('.fancybox-close-small').click();
                        location.href = "/" + locale + "/personal_cabinet";
                    }
                    if (data.responseJSON.errorsRegister) {
                        $('.errors').remove();
                        $('#errors-register').html('');
                        // display errors on each form field
                        $.each(data.responseJSON.errorsRegister, function (i, error) {
                            let el = $(document).find('[name="' + i + '"]');
                            el.after($('<label class="errors ' + i + '">' + error[0] + '</label>'));
                        });
                    }
                }
            },
            error: function (err) {
                $("#preloader").css("display", "none");
                console.log(err.responseText);
                $('.modal-reg-btn').removeAttr("disabled");
                $('.errors').html('');
                $('#errors-register').html('Error try again.');
            }
        });
    })

    //кликнули на reset password submit
    $('#recovery-pass-js').click(function (event) {
        $("#preloader").css("display", "flex");
        event.preventDefault();
        //очищаем поле ошибок
        $('.errors').remove();
        //отключаем кнопку submit чтобы нельзя было спамить ей
        $(this).attr("disabled", true);
        //console.log('reset password clicked')
        let data = {
            "email": $('[name=email-reset]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: "post",
            url: "/" + locale + "/password/email",
            data: data,
            dataType: 'json',
            complete: function (data) {
                $("#preloader").css("display", "none");
                //console.log(data.responseText);
                //Проверка на то, существует ли указанный email
                if (data.responseJSON.message == "Invalid user") {
                    let el = $(document).find('[name="email-reset"]');
                    let error = 'The specified email is not registered.';
                    if (locale == 'ru') {
                        error = 'Указанный email не зарегистрирован.'
                    }
                    el.after($('<br><label class="errors errors-reset">' + error + '</label>'));
                    $('#recovery-pass-js').removeAttr("disabled");
                } else
                //показываем ошибки
                if (data.status !== 422) {
                    $('#recovery-pass-js').removeAttr("disabled");
                    $(".recovery-pass-inputs form").hide();
                    $(".recovery-pass-footer-link").hide();
                    $(".recovery-pass-inputs .recovery-success").show();
                    $(".recovery-pass-footer-link.close").show();
                    //location.href("/" + locale + '/password/reset' + $('meta[name="csrf-token"]').attr('content'));
                }
            },
            error: function (err) {
                $("#preloader").css("display", "none");
                $('#recovery-pass-js').removeAttr("disabled");
                if (err.status === 422) { // when status code is 422, it's a validation issue

                    $('.errors').remove();
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        let el = $(document).find('[name="email-reset"]');
                        el.after($('<br><label class="errors errors-reset">' + error[0] + '</label>'));
                    });
                }
            }
        });
    })

    if (document.URL.indexOf("email/verify") >= 0) {
        createCookie('locale', locale, 1)
    }
});

/* ------------------ */

/* ------------------ */


function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

