document.addEventListener("DOMContentLoaded", function (event) {
    //при смене аватара добавляем img src в hidden input формы
    $('.profile-img').find('.image').on('load', function () {
        setUserAvatar();
    });
    function setUserAvatar() {
        let img = $('.profile-img').find('.image').attr('src');
        $('#img').val(img);
    };
});
