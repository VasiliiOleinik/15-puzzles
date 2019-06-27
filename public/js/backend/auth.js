/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {

    $('.modal-login-btn').click(function (event) {
        event.preventDefault();

        var data = {
            "login": $('[name=login]').val(),
            "password": $('[name=password]').val(),
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };

        $.ajax({
            type: "post",
            url: "/login",
            data: data,
            dataType: 'json',              // let's set the expected response format
            success: function (data) {
                location.reload();                               
            },
            error: function (err) {
                if (err.status == 422) { // when status code is 422, it's a validation issue
                    $('.errors').remove();
                    // display errors on each form field
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="errors">' + error[0] + '</span>'));
                    });
                }
            }
        });
    })

});

/* ------------------ */
/* ------------------ */
