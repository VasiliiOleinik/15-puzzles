/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function () {

    //кликнули на login submit
    $('.modal-login-btn').click(function (event) {
        event.preventDefault();

        let data = {
            "login": $('[name=login]').val(),
            "password": $('[name=password]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: "post",
            url: "/login",
            data: data,
            dataType: 'json',
            complete: function (data) {
                if(data.responseJSON.auth === "success")
                {
                    $('.fancybox-close-small').click();
                    location.href = "/personal_cabinet";
                }
                if(data.responseJSON.auth === "failed")
                {
                    $('.errors-auth').html('Login or password invalid')
                }
            },
            error: function (err) {
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
        event.preventDefault();

        let data = {
            "login": $('[name=login]').val(),
            "email": $('[name=email]').val(),
            "password": $('[name=password]').val(),
            "confirm-password": $('[name=confirm-password]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: "post",
            url: "/login",
            data: data,
            dataType: 'json',
            complete: function (data) {
                if(data.responseJSON.auth === "success")
                {
                    $('.fancybox-close-small').click();
                    location.href = "/personal_cabinet";
                }
                if(data.responseJSON.auth === "failed")
                {
                    $('.errors-auth').html('Login or password invalid')
                }
            },
            error: function (err) {
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

});

/* ------------------ */
/* ------------------ */
