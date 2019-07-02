$(document).ready(function() {
  // preloader();//Fade preloader when page loaded
  setCategoryPosition(); // Позиционирование названия групп в секции puzzle-15
  var maintabsProps = {
    startCollapsed: "accordion"
  };
  tabsInit($("#mainTabs"), maintabsProps); //Инит табов на главной
  playVideo();
  $(".tooltip").tooltipster({
    side: "bottom",
    arrow: false,
    trigger: "click"
  });
});

// functions -------------------------------------------
function playVideo() {
  $(".main__video").on("click", function() {
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

function setCategoryPosition() {
  var step = $(".puzzle-15__item-outer").height(),
    position = step;
  $(".puzzle-15__category").each(function(index, item) {
    $(item).css({
      top: position + "px"
    });
    position += step + 10;
  });
}

function preloader() {
  $(window).on("load", function() {
    $(".loader-outer").fadeOut();
  });
}

$(function() {
  // Обработка событий  на странице с диаграммой
  var groupItem = $(".group_item"), // Один элемент
    groupTitle = $(".group_title_checkbox"), // Заголовок группы элементов
    deleteItem = $(".delete-item"), // Крестик для удаления выьранного элемента
    selectedList = $(".diagram__info-selected-list"), // Список выбранного
    itemContent = ""; // Содержимое элемента

  // Подсветка одного элемента
  groupItem.on("click", function() {
    $(this).toggleClass("active");
    // Добавление в список выбранного
    if ($(this).hasClass("active")) {
      itemContent = $(this).html();
      selectedList.append(
        '<div class="selected-item">' +
          itemContent +
          '<div class="delete-item"><img src="img/delete_item_ico.png" alt="Delete Item"></div></div>'
      );
    } else {
      itemContent = " ";
    }
  });

  // Подсветка всей группы
  groupTitle.on("click", function() {
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
  deleteItem.on("click", function() {
    $(this)
      .parent(".selected-item")
      .remove();
  });

  // Загрузка картинок
  $(".file-input").change(function() {
    var curElement = $(this)
      .parent()
      .parent()
      .find(".image");
    var reader = new FileReader();
    reader.onload = function(e) {
      curElement.attr("src", e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
  });

  // Скрываю label когда input активен (personal page)
  $(".profile-labels .label input").on("click", function() {
    $(this)
      .siblings("label")
      .hide(100);
  });
  $(".profile-labels .label input").on("blur", function() {
    if ($(this).val().length == "") {
      $(this)
        .siblings("label")
        .show(100);
    }
  });

  $(".upload-file input").on("change", function(e) {
    var fileName = $(this)[0].files[0].name;
    $("#personal_file_name").val("");
    $("#personal_file_name").val(fileName);
  });

  $("#personal_file_name").on("change", function() {
    if ($(this).val().length == 0) {
      $(this).val("File name");
    }
  });

  // date-inp = класс для всех полей с датой
  $(".date-inp").mask("99.99.9999");
  $(".date-inp")
    .datepicker({
      dateFormat: "dd.mm.yy",
      onClose: function(item, obj) {
        if ($(".date-inp").val().length == "") {
          $(".date-inp")
            .siblings("label")
            .show(100);
        }
      }
    })
    .val();

    // Окрытие доп.информации в табах на home page
    $(".tab-list.main-scroll").delegate(".arrow", "click", function () {
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
    // Подсветка выбранного таба на странице home page
    $(".tab-list.main-scroll").delegate(".tab_head_check input", "click", function () {
        $(this)
            .parent()
            .parent()
            .toggleClass("checked-tab");
    });

    // Делаю фактор активным
    $(".tab-list.main-scroll").delegate(".puzzle-15__item", "click", function () {
        $(this).toggleClass("active");
    });

    $(".tab-list.main-scroll").delegate(".evidence", "hover",
        function () {
            $(this)
                .find(".evidence__detail")
                .css({ display: "flex" });
        },
        function () {
            $(this)
                .find(".evidence__detail")
                .css({ display: "none" });
        }
    );
});

$(".tab-list.main-scroll").delegate(".method-item__head","change", function() {
  var thisTitle = $(this)
    .find(".title")
    .text();
  $(".method-item__head").removeClass("active-method");
  $(this).addClass("active-method");
  $("#select-method .current-value").text(thisTitle);
});
// Селекты в методах
$(".tab-list.main-scroll").delegate(".methods-select","click", function() {
  $(this)
    .find(".methods-select-list")
    .slideToggle();
});
$(
  "#select-method .methods-select-list li, #select-country .methods-select-list li"
).on("click", function() {
  var thisVal = $(this).text();
  var thisData = $(this).data();
  $(this)
    .parent()
    .siblings(".current-value")
    .text(thisVal)
    .data(thisData);
});

$(".main__tabs-nav li").on("click", function() {
  $(".methods-laboratories").slideUp();
});
$(".main__tabs-nav li.markers").on("click", function() {
  $(".methods-laboratories").slideDown();
});

// Взаимодействие с поиском
$("#search-btn-js").on("click", function() {
  $(".header__search").show(200);
});
$(document).mouseup(function(e) {
  var div = $(".header__search");
  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $(".header__search").hide(200);
  }
});

// Работа  с модалкой
// Таб логин
$("#tabs-login").on("click", function() {
  $(".authorization-tab").removeClass("active");
  $(this).addClass("active");
  $(".container-authorization__reg").hide();
  $(".container-authorization__login").show();
});
// Таб регистранции
$("#tabs-registration").on("click", function() {
  $(".authorization-tab").removeClass("active");
  $(this).addClass("active");
  $(".container-authorization__login").hide();
  $(".container-authorization__reg").show();
});
// Открытие модалки
$("#login-btn").on("click", function() {
  $(".header-login-modal").slideDown();
});
// Восстановление пароля
$("#forgot-pass-js").on("click", function() {
  $(".header-login-modal__container").css({ "max-height": "300px" });
  $(".container-authorization").hide();
  $(".container-recovery-pass").show();
});
// Выйти из восстановления в форму логин
$("#back-to-login-js").on("click", function() {
  $(".header-login-modal__container").css({ "max-height": "400px" });
  $(".container-authorization").show();
  $(".container-recovery-pass").hide();
});
// Успешная смена пароля
$("#recovery-pass-js").on("click", function(e) {
  e.preventDefault();
  $(".recovery-pass-inputs form").hide();
  $(".recovery-pass-footer-link").hide();
  $(".recovery-pass-inputs .recovery-success").show();
  $(".recovery-pass-footer-link.close").show();
  $(".recovery-pass-inputs").addClass("success");
});
// Закрытие модалки
$(" #close-recovery-js, .fancybox-container").on("click", function() {
  $(".header-login-modal").slideUp();
  $(".fancybox-close-small").click();
  $(".header-login-modal__container").css({ "max-height": "400px" });
  $(".container-authorization").show();
  $(".container-recovery-pass").hide();
  $(".recovery-pass-inputs form").show();
  $(".recovery-pass-footer-link").show();
  $(".recovery-pass-inputs .recovery-success").hide();
  $(".recovery-pass-footer-link.close").hide();
  $(".recovery-pass-inputs").removeClass("success");
});
