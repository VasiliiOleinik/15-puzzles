/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function () {

    //кликнули на login submit
    $('.modal-login-btn').click(function (event) {
        event.preventDefault();
        $(this).attr("disabled", true);

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
                $('.modal-login-btn').removeAttr("disabled");
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
        event.preventDefault();       
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
            url: "/register",
            data: data,
            dataType: 'json',
            complete: function (data) {
                //console.log(data.responseText);
                $('.modal-reg-btn').removeAttr("disabled");
                if (data.responseJSON) {
                    $('.spinner-register').remove();                    
                    if (data.responseJSON === "success") {
                        $('.fancybox-close-small').click();
                        location.href = "/personal_cabinet";
                    }
                    if (data.responseJSON.errorsRegister) {                        
                        $('.errors').remove();
                        $('#errors-register').html('');
                        // display errors on each form field
                        $.each(data.responseJSON.errorsRegister, function (i, error) {
                            let el = $(document).find('[name="' + i + '"]');
                            el.after($('<label class="errors ' + i +'">' + error[0] + '</label>'));
                        });
                    }
                }
            },
            error: function (err) {
                $('.modal-reg-btn').removeAttr("disabled");
                $('.errors').html('');
                $('#errors-register').html('Error try again.');                
            }
        });
    })

});

/* ------------------ */
/* ------------------ */
