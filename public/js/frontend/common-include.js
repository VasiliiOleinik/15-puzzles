// Окрытие доп.информации в табах на home page
$(".arrow").on("click", function() {
    var isOpen = $(this).hasClass("dropdown");

    $(".arrow").removeClass("dropdown");
    $(".tab-item__content").slideUp();
    $(".tab-head-markers").removeClass("checked-tab");
    $(".tab-item__head").removeClass("checked-tab");

    if (isOpen) {
        $(this).removeClass("dropdown");
        $(this)
            .parent()
            .siblings(".tab-item__content")
            .slideUp();
        $(this)
            .parent(".tab-head-markers")
            .removeClass("checked-tab");
    } else {
        $(this).addClass("dropdown");
        $(this)
            .parent()
            .siblings(".tab-item__content")
            .slideDown();
        $(this)
            .parent(".tab-head-markers")
            .addClass("checked-tab");
    }

    // Модалка, если текста больше чем 160px по высоте
    var tabText = $(this)
            .parent()
            .siblings(".tab-item__content")
            .find(".text p"),
        showMore = $(this)
            .parent()
            .siblings(".tab-item__content")
            .find(".show-more"),
        modalText = $(".tabs-modal .tabs-modal-text");
    if (tabText.height() > 160) {
        showMore.css({ display: "flex" });
        modalText.append("<p>" + tabText.html() + "</p>");
    }
    showMore.on("click", function() {
        $(".tabs-modal").show();
        $("html, body").animate(
            {
                scrollTop: $(".header").height() / 2
            },
            500
        );
    });
    $(".close-tabs-modal-btn, .close-tabs-modal-ico").on("click", function() {
        $(".tabs-modal").hide();
    });
});
// Подсветка выбранного таба на странице home page
$(".tab_head_check input").on("click", function() {
    $(this)
        .parent()
        .parent()
        .toggleClass("checked-tab");
});

// Делаю фактор активным
$(".puzzle-15__item").on("click", function() {
    $(this).toggleClass("active");
});

$(".evidence").hover(
    function() {
        $(this)
            .find(".evidence__detail")
            .css({ display: "flex" });
    },
    function() {
        $(this)
            .find(".evidence__detail")
            .css({ display: "none" });
    }
);

/////

//Поменялось значение чекбокса
$(".checkbox").change(function () {
    syncCheckedElements('checkbox', $(this).attr('obj-id'), $(this).attr('obj-type'));
});

//Кликнули на пазл
$('.puzzle-15__item').bind('click', function () {
    syncCheckedElements('puzzle', $(this).parent().attr('obj-id'), "factor");
});

