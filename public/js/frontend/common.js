$(document).ready(function () {
    var maintabsProps = {
        startCollapsed: "accordion"
    };
    tabsInit($("#mainTabs, #faqTabs"), maintabsProps); //Инит табов на главной
    playVideo();
    $(".tooltip").tooltipster({
        side: "bottom",
        arrow: false,
        trigger: "click"
    });
});

// functions -------------------------------------------
function playVideo() {
    $(".main__video").on("click", function () {
        var wrapper = $(this),
            overlay = $(".main__video-overlay"),
            video = wrapper.find("video").get()[0];

        overlay.fadeOut();
        video.controls = true;
        video.autoplay = true;
    });
}

function tabsInit(item, props) {
    $(item).responsiveTabs(props);
}

function preloader() {
    $(window).on("load", function () {
        $(".loader-outer").fadeOut();
    });
}

$(document).on('change', "#method_check", function () {
    $("#preloader").css("display", "flex");
    $.ajax({
        url: 'get_laboratory',
        method: 'POST',
        data: {
            id: $(this).data('id'),

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#preloader").css("display", "none");
            $('#finded_loboratory').html(data)
        },
        onerror: function () {
            $("#preloader").css("display", "none");
        }
    })
});

$(function () {
    // Обработка событий  на странице с диаграммой
    var groupItem = $(".group_item"), // Один элемент
        groupTitle = $(".group_title_checkbox"), // Заголовок группы элементов
        deleteItem = $(".delete-item"), // Крестик для удаления выьранного элемента
        selectedList = $(".diagram__info-selected-list"), // Список выбранного
        itemContent = ""; // Содержимое элемента

    // Подсветка одного элемента
    groupItem.on("click", function () {
        $(this).toggleClass("active");
    });

    // Подсветка всей группы
    groupTitle.on("click", function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this)
                .parent(".group_title")
                .removeClass("active");
            $(this)
                .parent(".group_title")
                .siblings(".group_content")
                .find(".group_item")
                .removeClass("active");
        } else {
            $(this).addClass("active");
            $(this)
                .parent(".group_title")
                .addClass("active");
            $(this)
                .parent(".group_title")
                .siblings(".group_content")
                .find(".group_item")
                .addClass("active");
        }
    });

    // Удаление элемента
    deleteItem.on("click", function () {
        $(this)
            .parent(".selected-item")
            .remove();
    });

    // Загрузка картинок
    $(".file-input").change(function () {
        var curElement = $(this)
            .parent()
            .parent()
            .find(".image");
        var reader = new FileReader();
        reader.onload = function (e) {
            curElement.attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });

    // Скрываю label когда input активен (personal page)

    $(window).on("load", function () {
        $(".dinamic-input-js").each(function (index, item) {
            var value = $.trim($(item).val());
            if (value) {
                $(item).closest(".label").addClass("active");
                $(item).addClass("active");
            } else {
                $(item).closest(".label").removeClass("active");
                $(item).removeClass("active");
            }
        });
    });

    $(function () {
        $(".label .dinamic-label-js").on("click", function () {
            $(this).closest(".label").find(".dinamic-input-js").focus();
        });
        $(".label .dinamic-input-js").on("keyup", function () {
            var value = $.trim($(this).val());
            if (value) {
                $(this).closest(".label").addClass("active");
                $(this).addClass("active");
            } else {
                $(this).closest(".label").removeClass("active");
                $(this).removeClass("active");
            }
        });
    });

    $(".upload-file input").on("change", function (e) {
        var fileName = $(this)[0].files[0].name;
        $("#personal_file_name").val("");
        $("#personal_file_name").val(fileName);
    });

    $("#personal_file_name").on("change", function () {
        if ($(this).val().length == 0) {
            $(this).val("File name");
        }
    });

    // date-inp = класс для всех полей с датой
    $(".date-inp").mask("99.99.9999");
    $(".date-inp")
        .datepicker({
            dateFormat: "dd.mm.yy",
            onClose: function (item, obj) {
                if ($(".date-inp").val().length == "") {
                    $(".date-inp")
                        .siblings("label")
                        .show(100);
                }
            }
        })
        .val();

    // Окрытие доп.информации в табах на home page
    $(".tab-list.main-scroll").delegate(".tab-name", "click", function () {
        var isOpen = $(this)
            .find(".arrow")
            .hasClass("dropdown");

        $(".arrow").removeClass("dropdown");
        $(".tab-item__content").slideUp();
        $(".tab-head-markers").removeClass("checked-tab");
        // $(".tab-item__head").removeClass("checked-tab");

        if (isOpen) {
            $(this)
                .find(".arrow")
                .removeClass("dropdown");
            $(this)
                .parent()
                .siblings(".tab-item__content")
                .slideUp();
            $(this)
                .parent(".tab-head-markers")
                .removeClass("checked-tab");
        } else {
            $(this)
                .find(".arrow")
                .addClass("dropdown");
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
            showMore.css({display: "flex"});
            modalText.append("<p>" + tabText.html() + "</p>");
        }
        showMore.on("click", function () {
            $(".tabs-modal").show();
            $("html, body").animate(
                {
                    scrollTop: $(".header").height() / 2
                },
                500
            );
        });
        $(".close-tabs-modal-btn, .close-tabs-modal-ico").on("click", function () {
            $(".tabs-modal").hide();
        });
    });

    $(".evidence").hover(
        function () {
            $(this)
                .find(".evidence__detail")
                .css({display: "flex"});
        },
        function () {
            $(this)
                .find(".evidence__detail")
                .css({display: "none"});
        }
    );
});

$(document).on("change", ".method-item__head", function () {
    var thisTitle = $(this)
        .find(".title")
        .text();
    $(".method-item__head").removeClass("active-method");
    $(this).addClass("active-method");
    $("#select-method .current-value").text(thisTitle);
});
// Селекты в методах
$(".methods-select").on("click", function () {
    $(this)
        .find(".methods-select-list")
        .slideToggle();
});
$(
    "#select-method .methods-select-list li, #select-country .methods-select-list li"
).on("click", function () {
    var thisVal = $(this).text();
    var thisData = $(this).data();
    $(this)
        .parent()
        .siblings(".current-value")
        .text(thisVal)
        .data(thisData);
});

$(".main__tabs-nav li").on("click", function () {
    $(".methods-laboratories").slideUp();
});
$(".main__tabs-nav li.markers").on("click", function () {
    var count = $(this)
        .find(".count")
        .text();
    if (count === "[0]") {
        $(".markers-message").slideDown();
    } else {
        $(".methods-laboratories").slideDown();
    }
});

// Взаимодействие с поиском
$("#search-btn-js").on("click", function () {
    $(".header__search").show(200);
});
$(document).mouseup(function (e) {
    var div = $(".header__search");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        $(".header__search").hide(200);
    }
});

// Работа  с модалкой
// Таб логин
$("#tabs-login").on("click", function () {
    $(".authorization-tab").removeClass("active");
    $(this).addClass("active");
    $(".container-authorization__reg").hide();
    $(".container-authorization__login").show();
});
// Таб регистранции
$("#tabs-registration").on("click", function () {
    $(".authorization-tab").removeClass("active");
    $(this).addClass("active");
    $(".container-authorization__login").hide();
    $(".container-authorization__reg").show();
});
// Открытие модалки
$("#login-btn").on("click", function () {
    $(".header-login-modal").slideDown();
});
// Восстановление пароля
$("#forgot-pass-js").on("click", function () {
    $(".header-login-modal__container").css({"max-height": "300px"});
    $(".container-authorization").hide();
    $(".container-recovery-pass").show();
});
// Выйти из восстановления в форму логин
$("#back-to-login-js").on("click", function () {
    $(".header-login-modal__container").css({"max-height": "400px"});
    $(".container-authorization").show();
    $(".container-recovery-pass").hide();
});
// Успешная смена пароля
$("#recovery-pass-js").on("click", function (e) {
    e.preventDefault();
    $(".recovery-pass-inputs form").hide();
    $(".recovery-pass-footer-link").hide();
    $(".recovery-pass-inputs .recovery-success").show();
    $(".recovery-pass-footer-link.close").show();
    $(".recovery-pass-inputs").addClass("success");
});
// Закрытие модалки
$(" #close-recovery-js, .fancybox-container").on("click", function () {
    $(".header-login-modal").slideUp();
    $(".fancybox-close-small").click();
    $(".header-login-modal__container").css({"max-height": "400px"});
    $(".container-authorization").show();
    $(".container-recovery-pass").hide();
    $(".recovery-pass-inputs form").show();
    $(".recovery-pass-footer-link").show();
    $(".recovery-pass-inputs .recovery-success").hide();
    $(".recovery-pass-footer-link.close").hide();
    $(".recovery-pass-inputs").removeClass("success");
});

// Работа с правой частью новостей
$(function () {
    var categorItem = $(".categories__list .item"),
        tagsItem = $(".tags__list .item");
    $(tagsItem).on("click", function () {
        $(this).toggleClass("choosen");
        if (categorItem.hasClass("choosen") || tagsItem.hasClass("choosen")) {
            $("#clear-filter-btn-js").css({cursor: "pointer"});
        } else {
            $("#clear-filter-btn-js").css({cursor: "not-allowed"});
        }
    });
    $(categorItem).on("click", function () {
        $(this).toggleClass("choosen");
        if (categorItem.hasClass("choosen") || tagsItem.hasClass("choosen")) {
            $("#clear-filter-btn-js").css({cursor: "pointer"});
        } else {
            $("#clear-filter-btn-js").css({cursor: "not-allowed"});
        }
    });
});

$(function () {
    $(".faq__tabs-nav-item")
        .first()
        .addClass("active");
    $(".faq__tabs-nav-item").on("click", function () {
        $(".faq__tabs-nav-item").removeClass("active");
        $(this).addClass("active");
    });

    $(".search-byHistory__result .result-item").hover(function () {
        $(this)
            .find(".control-block")
            .slideToggle();
        $(this)
            .find(".control-block")
            .css({display: "flex"});
    });
});

$(function () {
    $("#add-note-js, #cancel-form-js").on("click", function () {
        $("#med-history-js, #add-story-js").slideToggle();
    });

    // $("#submit-button-form-js").on("click", function() {
    //     $("#med-history-js, #add-story-js").slideToggle();
    // });

    // $("#submit-edit-form-js").on("click", function() {
    //     $("#med-history-js, #edit-story-js").slideToggle();
    // });

    $("#cancel-edit-form-js").on("click", function () {
        $("#med-history-js, #edit-story-js").slideToggle();
    });

    // Валидация
    $("#contact_form, #subscription-form").validate({
        errorClass: "invalid",
        validClass: "success",
        rules: {
            email: {
                email: true,
                required: true
            },
            name: {
                minlength: 2,
                required: true
            },
            phone: {
                minlength: 10,
                maxlength: 13,
                digits: true,
                required: true
            },
            letter: {
                minlength: 10,
                required: true
            }
        },
        messages: {
            name: {
                required: "Поле обязательно для заполнения",
                minlength: "Минимальная длина имени - 2 символа"
            },
            email: {
                required: "Поле обязательно для заполнения",
                email: "Введите корректный email"
            },
            phone: {
                required: "Поле обязательно для заполнения",
                digits: "Поле должно содержать только цифры",
                minlength: "Минимальная длина номера 10 цифр",
                maxlength: "Максимальная длина номера 13 цифр"
            },
            letter: {
                required: "Поле обязательно для заполнения",
                minlength: "Минимальная длина сообщения 10 символов"
            },
            check: {
                required: "Поле обязательно для заполнения"
            }
        }
    });
    $("#cont-phone").keypress(function (e) {
        if (
            e.which != 8 &&
            e.which != 0 &&
            e.which != 46 &&
            (e.which < 48 || e.which > 57)
        ) {
            return false;
        }
    });

    // Отправка FAQ-формы
    $("#faq-form").on("submit", function (e) {
        e.preventDefault();

        $("#faq-name-error").text("");
        $("#faq-phone-error").text("");
        $("#faq-email-error").text("");
        $("#faq-letter-error").text("");

        $.ajax({
            type: "POST",
            url: "faq",
            data: $("#faq-form").serialize(),
            success: function (data) {
                $("#faq-name").val("");
                $("#faq-phone").val("");
                $("#faq-email").val("");
                $("#faq-letter").val("");
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#faq-" + key + "-error").text(element[0]);
                    }
                }
            }
        });
    });
    // что это????? зачем?? зачем 4 функции делать одно и тоже???
    // Отправка формы подписки на странице Literature
    $("#literature-subscribe-form").on("submit", function (e) {
        e.preventDefault();

        $("#literature-subscribe-form label").text("");
        $("#literature-subscribe-form button").prop("disabled", true);
        $("#literature-subscribe-form button").addClass("disabled-button");

        $.ajax({
            type: "GET",
            url: "subscriber/create",
            data: {
                email_subscribe: $("#footer-subscribe-form").serialize(),
                local: locale
            },
            success: function (data) {
                $("#literature-subscribe-form input").val("");
                $("#literature-subscribe-form button").prop("disabled", false);
                $("#literature-subscribe-form button").removeClass("disabled-button");
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#literature-" + key + "-error").text(element[0]);
                    }
                }
                $("#literature-subscribe-form button").prop("disabled", false);
                $("#literature-subscribe-form button").removeClass("disabled-button");
            }
        });
    });
    // Отправка формы подписки на странице Member's cases
    $("#member-cases-subscribe-form").on("submit", function (e) {
        e.preventDefault();

        $("#member-cases-subscribe-form label").text("");
        $("#member-cases-subscribe-form button").prop("disabled", true);
        $("#member-cases-subscribe-form button").addClass("disabled-button");

        $.ajax({
            type: "GET",
            url: "subscriber/create",
            data: {
                email_subscribe: $("#footer-subscribe-form").serialize(),
                local: locale
            },
            success: function (data) {
                $("#member-cases-subscribe-form input").val("");
                $("#member-cases-subscribe-form button").prop("disabled", false);
                $("#member-cases-subscribe-form button").removeClass("disabled-button");
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#member-cases-" + key + "-error").text(element[0]);
                    }
                }
                $("#member-cases-subscribe-form button").prop("disabled", false);
                $("#member-cases-subscribe-form button").removeClass("disabled-button");
            }
        });
    });
    // Отправка формы подписки на странице News
    $("#news-subscribe-form").on("submit", function (e) {
        e.preventDefault();

        $("#news-subscribe-form label").text("");
        $("#news-subscribe-form button").prop("disabled", true);
        $("#news-subscribe-form button").addClass("disabled-button");

        $.ajax({
            type: "GET",
            url: "subscriber/create",
            data: {
                email_subscribe: $("#footer-subscribe-form").serialize(),
                local: locale
            },
            success: function (data) {
                $("#news-subscribe-form input").val("");
                $("#news-subscribe-form button").prop("disabled", false);
                $("#news-subscribe-form button").removeClass("disabled-button");
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#news-" + key + "-error").text(element[0]);
                    }
                }
                $("#news-subscribe-form button").prop("disabled", false);
                $("#news-subscribe-form button").removeClass("disabled-button");
            }
        });
    });
    // Отправка формы подписки в Footer
    $("#footer-subscribe-form").on("submit", function (e) {
        $("#preloader").css("display", "flex");
        e.preventDefault();
        $("#footer-email-subscribe-error").text("");
        $("#footer-subscribe-form button").prop("disabled", true);
        $("#footer-subscribe-form button").addClass("disabled-button");

        $.ajax({
            type: "GET",
            url: "subscriber/create",
            data: {
                email_subscribe: $("#email_subscribe").val(),
                local: locale
            },
            success: function (data) {
                $("#footer-subscribe-form input").val("");
                $("#footer-subscribe-form button").prop("disabled", false);
                $("#footer-subscribe-form button").removeClass("disabled-button");
                $("#footer-email_subscribe-error").text('');
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#footer-" + key + "-error").text(element[0]);
                    }
                }
                $("#footer-subscribe-form button").prop("disabled", false);
                $("#footer-subscribe-form button").removeClass("disabled-button");
            }
        });
    });
    // Отправка комментария
    $("#add-comment-form").on("submit", function (e) {
        e.preventDefault();

        $("#add-comm-error").text("");
        $("#send-comment").prop("disabled", true);
        $("#send-comment").addClass("disabled-button");

        $.ajax({
            type: "GET",
            url: "comment/create",
            data: $("#add-comment-form").serialize(),
            success: function (data) {
                $("#add-comment-text").val("");
                $("#add-comment-form button").prop("disabled", false);
                $("#send-comment").removeClass("disabled-button");
                $("div.case-comm-list").append(
                    `
                    <div class="case-comm-item">
                        <div class="comm-item-header"><img src="` +
                    data.img +
                    `">
                        <div class="item-header-info">
                            <p class="comm-author">` +
                    data.nickname +
                    `</p><span class="comm-date">` +
                    data.updated_at +
                    `</span>
                        </div>
                        </div>
                        <div class="comm-item-content">
                        <p class="comm-item-text">` +
                    data.content +
                    `</p>
                        </div>
                    </div>
                `
                );
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#" + key + "-error").text(element[0]);
                    }
                }
                $("#add-comment-form button").prop("disabled", false);
                $("#send-comment").removeClass("disabled-button");
            }
        });
    });

    // конец
});

$(function () {
    $(".group_item").on("click", function () {
        $("#preloader").css("display", "flex");
        var id = [];
        id.push($(this).attr("id"));
        if ($(this).hasClass("active") !== false) {
            printRows(id);
        } else {
            deleteRows(id);
        }
    });
    $(".group_title_checkbox").on("click", function (event) {
        $("#preloader").css("display", "flex");
        var elements = $(this)
                .parent()
                .siblings(".group_content")
                .find(".group_item"),
            ids = [];
        elements.each(function (i, item) {
            ids.push($(item).attr("id"));
        });
        if ($(this).hasClass("active") !== false) {
            $("#preloader").css("display", "flex");
            printRows(ids, true);
        } else {
            deleteRows(ids);
        }
    });

    function printRows(id, clear_table = false) {
        $.ajax({
            method: "GET",
            url: "print_row/",
            data: {
                id: id
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                $("#preloader").css("display", "none");
                if (clear_table) {
                    $("#table-body").html(response);
                } else {
                    $("#table-body").append(response);
                }
            },
            error: function () {
                $("#preloader").css("display", "none");
            }
        });
    }

    $(document).on("click", ".show_protocol", function () {
        $("#preloader").css("display", "flex");
        var option = "protocol",
            id = $(this).data("id");
        showFullContent(id, option);
    });
    $(document).on("click", ".show_norm_condition", function () {
        $("#preloader").css("display", "flex");
        var option = "normal_condition",
            id = $(this).data("id");
        showFullContent(id, option);
    });
    $(document).on("click", ".show_abnorm_condition", function () {
        $("#preloader").css("display", "flex");
        var option = "abnormal_condition",
            id = $(this).data("id");
        showFullContent(id, option);
    });
    $(document).on("click", ".show_marker", function () {
        $("#preloader").css("display", "flex");
        var option = "methods",
            id = $(this).data("id");
        showFullContent(id, option);
    });

    function showFullContent(id, option) {
        $.ajax({
            method: "GET",
            url: "show_full/",
            data: {
                id: id,
                option: option
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {

                $("#preloader").css("display", "none");
                $("#methods_list").html(response);
                $("#finded_loboratory").html('');
                $.fancybox.open({
                    src: "#hidden-content",
                    type: "inline"
                });
            },
            error: function () {

                $("#hidden-content").html("error...");
                $("#preloader").css("display", "none");
            }
        });
    }

    function deleteRows(ids) {
        ids.forEach(function (item, i, ids) {
            $("#row" + item).remove();
        });
        $("#preloader").css("display", "none");
    }
});

$(function () {
    $(".cell-group-patalogy, .cell-group-norm").text(function (i, text) {
        if (text.length >= 50) {
            text = text.substring(0, 50);
            var lastIndex = text.lastIndexOf(" ");
            text = text.substring(0, lastIndex) + "...";
        }
        $(this).text(text);
    });
});

// Preloader settings
$(function () {
    if ($("#preloader").css("display") == "block") {
        $("html, body").css({
            overflow: "hidden",
            height: "100%"
        });
    } else {
        $("html, body").css({
            overflow: "auto",
            height: "auto"
        });
    }
});
$(document).on("click", "#send-form-btn", function () {
    $("#preloader").css("display", "flex");
});

$(function () {
    lazyScroll($("#faq-left-sticky, .r-tabs-anchor"), 500);
});

// Lazy scroll
function lazyScroll(anchor, speed) {
    anchor.on("click", function (e) {
        e.preventDefault();
        var href = $(this).attr("href");
        var scrollRange = $(href).offset().top;
        $("html, body").animate({scrollTop: scrollRange}, speed);
    });
}

//hover

function toggleColor(elem, isColor) {
    if (isColor) {
        $(elem)
            .find(".color")
            .fadeIn(0);
        $(elem)
            .find(".grey")
            .fadeOut(0);
        $(elem)
            .find(".target")
            .addClass("show");
    } else {
        $(elem)
            .find(".grey")
            .fadeIn(0);
        $(elem)
            .find(".color")
            .fadeOut(0);
        $(elem)
            .find(".target")
            .removeClass("show");
    }
}

function hoverFactor() {
    $(".js-item").hover(
        function () {
            var item = $(this);
            var obj = item.data("json");
            var data = obj.split(",");

            data.forEach(function (i) {
                var id = "#" + i;
                id !== "#" && toggleColor($(id), true);
            });
        },
        function () {
            var item = $(this);
            var obj = item.data("json");
            var data = obj.split(",");

            data.forEach(function (i) {
                var id = "#" + i;
                id !== "#" && toggleColor($(id), false);
            });
        }
    );
}

hoverFactor();

// Прелоадер на главной

$(window).on("load", function () {
    ($preloader = $(".main-page-preloader")),
        $preloader.delay(350).remove(),
        $("html, body").css({
            overflow: "auto",
            height: "auto"
        });
});

// Member cases multi-seselc
$(function () {
    $('.js-example-basic-multiple').select2();
});
