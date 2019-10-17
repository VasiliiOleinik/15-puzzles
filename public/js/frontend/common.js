$(document).ready(function() {
  // preloader();//Fade preloader when page loaded
  setCategoryPosition(); // Позиционирование названия групп в секции puzzle-15
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
    // if ($(this).hasClass("active")) {
    //   itemContent = $(this).html();
    //   selectedList.append(
    //     '<div class="selected-item">' +
    //       itemContent +
    //       '<div class="delete-item"><img src="/img/delete_item_ico.png" alt="Delete Item"></div></div>'
    //   );
    // } else {
    //   itemContent = " ";
    // }
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
  $(
    ".profile-labels .label input, .header-login-modal__container .label input, .add-story .labels input, .add-story .labels textarea, .search__top .label input, .case-add-comm .label textarea, .add-faq-letter .label input, .add-faq-letter .label textarea"
  ).on("click", function() {
    $(this).css({
      "box-shadow": "rgba(91, 156, 167, 0.32) 0px 1px 6px",
      border: "1px solid rgba(91, 156, 167, .5)",
      transition: ".1s ease-in-out"
    });
    $(this)
      .siblings("label")
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
    ".profile-labels .label input, .header-login-modal__container .label input, .add-story .labels input, .add-story .labels textarea, .search__top .label input, .case-add-comm .label textarea, .add-faq-letter .label input, .add-faq-letter .label textarea"
  ).on("blur", function() {
    if ($(this).val().length == "") {
      $(this).css({
        "box-shadow": "none",
        border: "1px solid #d6dbde",
        transition: ".1s ease-in-out"
      });
      $(this)
        .siblings("label")
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
  $(".tab-list.main-scroll").delegate(".tab-name", "click", function() {
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
  // $(".tab_head_check input").on("click", function() {
  //   console.log('Parent: ' + $(this).parent().parent().html());
  //   $('.tab-item__head').toggleClass('toggle');
  //   $(this)
  //     .parent()
  //     .parent()
  //     .toggleClass("checked-tab");
  // });

  // Делаю фактор активным
  // $(".puzzle-15__item").on("click", function() {
  //   $(this).toggleClass("active");
  // });

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
});

$(document).on("change", ".method-item__head", function() {
  var thisTitle = $(this)
    .find(".title")
    .text();
  $(".method-item__head").removeClass("active-method");
  $(this).addClass("active-method");
  $("#select-method .current-value").text(thisTitle);
});
// Селекты в методах
$(".methods-select").on("click", function() {
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

// Работа с правой частью новостей
$(function() {
  var categorItem = $(".categories__list .item"),
    tagsItem = $(".tags__list .item");
  $(tagsItem).on("click", function() {
    $(this).toggleClass("choosen");
    if (categorItem.hasClass("choosen") || tagsItem.hasClass("choosen")) {
      $("#clear-filter-btn-js").css({ cursor: "pointer" });
    } else {
      $("#clear-filter-btn-js").css({ cursor: "not-allowed" });
    }
  });
  $(categorItem).on("click", function() {
    $(this).toggleClass("choosen");
    if (categorItem.hasClass("choosen") || tagsItem.hasClass("choosen")) {
      $("#clear-filter-btn-js").css({ cursor: "pointer" });
    } else {
      $("#clear-filter-btn-js").css({ cursor: "not-allowed" });
    }
  });
});

$(function() {
  $(".faq__tabs-nav-item")
    .first()
    .addClass("active");
  $(".faq__tabs-nav-item").on("click", function() {
    $(".faq__tabs-nav-item").removeClass("active");
    $(this).addClass("active");
  });

  $(".search-byHistory__result .result-item").hover(function() {
    $(this)
      .find(".control-block")
      .slideToggle();
    $(this)
      .find(".control-block")
      .css({ display: "flex" });
  });
});

$(function() {
  $(
    ".profile-labels .label input, .header-login-modal__container .label input, .add-story .labels input, .add-story .labels textarea, .search__top .label input, .case-add-comm .label textarea, .add-faq-letter .label input, .add-faq-letter .label textarea"
  ).each(function() {
    if ($(this).val().length != "") {
      $(this).css({
        "box-shadow": "rgba(91, 156, 167, 0.32) 0px 1px 6px",
        border: "1px solid rgba(91, 156, 167, .5)",
        transition: ".1s ease-in-out"
      });
      $(this)
        .siblings("label")
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
    }
  });
});

$(function() {
  $("#add-note-js, #cancel-form-js").on("click", function() {
    $("#med-history-js, #add-story-js").slideToggle();
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
  $("#cont-phone").keypress(function(e) {
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
  $("#faq-form").on("submit", function(e) {
    e.preventDefault();

    $("#faq-name-error").text("");
    $("#faq-phone-error").text("");
    $("#faq-email-error").text("");
    $("#faq-letter-error").text("");

    $.ajax({
      type: "POST",
      url: "faq",
      data: $("#faq-form").serialize(),
      success: function(data) {
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
      error: function(data) {
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

  // Отправка формы подписки на страницах Member's cases, News, Literature
  $("#literature-subscribe-form").on("submit", function(e) {
    e.preventDefault();

    $("#literature-subscribe-form label").text("");
    $("#literature-subscribe-form button").prop("disabled", true);
    $("#literature-subscribe-form button").addClass("disabled-button");

    $.ajax({
      type: "GET",
      url: "subscriber/create",
      data: $("#literature-subscribe-form").serialize(),
      success: function(data) {
        $("#literature-subscribe-form input").val("");
        $("#literature-subscribe-form button").prop("disabled", false);
        $("#literature-subscribe-form button").removeClass("disabled-button");
        $("#preloader").css("display", "none");
        $.fancybox.open({
          src: "#success-modal",
          type: "inline"
        });
      },
      error: function(data) {
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

  $("#member-a-subscribe-form").on("submit", function(e) {
    e.preventDefault();

    $("#member-cases-subscribe-form label").text("");
    $("#member-cases-subscribe-form button").prop("disabled", true);
    $("#member-cases-subscribe-form button").addClass("disabled-button");

    $.ajax({
      type: "GET",
      url: "subscriber/create",
      data: $("#member-cases-subscribe-form").serialize(),
      success: function(data) {
        $("#member-cases-subscribe-form input").val("");
        $("#member-cases-subscribe-form button").prop("disabled", false);
        $("#member-cases-subscribe-form button").removeClass("disabled-button");
        $("#preloader").css("display", "none");
        $.fancybox.open({
          src: "#success-modal",
          type: "inline"
        });
      },
      error: function(data) {
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

  $("#news-subscribe-form").on("submit", function(e) {
    e.preventDefault();

    $("#news-subscribe-form label").text("");
    $("#news-subscribe-form button").prop("disabled", true);
    $("#news-subscribe-form button").addClass("disabled-button");

    $.ajax({
      type: "GET",
      url: "subscriber/create",
      data: $("#news-subscribe-form").serialize(),
      success: function(data) {
        $("#news-subscribe-form input").val("");
        $("#news-subscribe-form button").prop("disabled", false);
        $("#news-subscribe-form button").removeClass("disabled-button");
        $("#preloader").css("display", "none");
        $.fancybox.open({
          src: "#success-modal",
          type: "inline"
        });
      },
      error: function(data) {
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

  // Отправка комментария
  $("#add-comment-form").on("submit", function(e) {
    e.preventDefault();

    $("#add-comm-error").text("");
    $("#send-comment").prop("disabled", true);
    $("#send-comment").addClass("disabled-button");

    $.ajax({
      type: "GET",
      url: "comment/create",
      data: $("#add-comment-form").serialize(),
      success: function(data) {
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
      },
      error: function(data) {
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
});

function diagramDraw(id) {
  var position = [];

  var item = $("#45").data("json");
  console.log(item);
  //arr = item.data('position').parseJSON();
  var canvas = document.getElementById("diagram"),
    ctx = canvas.getContext("2d");
  // var position = [
  //     {
  //         start: [0, 40],
  //         finish: [450, 40],
  //         circle: []
  //     },
  //     {
  //         start: [450, 40],
  //         finish: [450, 340],
  //         circle: [450, 340]
  //     },
  //     {
  //         start: [350, 40],
  //         finish: [350, 140],
  //         circle: [350, 140]
  //     },
  //     {
  //         start: [300, 40],
  //         finish: [300, 140],
  //         circle: [300, 140]
  //     },
  //     {
  //         start: [250, 40],
  //         finish: [250, 240],
  //         circle: [250, 240]
  //     }
  // ];
  position.map(function(item) {
    if (i.start && i.circle) {
      ctx.moveTo(i.start[0], i.start[1]);
      ctx.lineTo(i.finish[0], i.finish[1]);
      ctx.strokeStyle = "red";
      ctx.stroke();
    }
    if (p.finish && p.circle) {
      ctx.moveTo(i.start[0], i.start[1]);
      ctx.lineTo(i.finish[0], i.finish[1]);
      ctx.strokeStyle = "red";
      ctx.stroke();
    }
    if (p.circle) {
      ctx.beginPath();
      ctx.arc(i.circle[0], i.circle[1], 4, 0, 2 * Math.PI, false);
      ctx.fillStyle = "red";
      ctx.fill();
      ctx.lineWidth = 1;
      ctx.strokeStyle = "red";
      ctx.stroke();
    }
    ctx.stroke();
  });
}

function clearCanvas() {
  var canvas = document.getElementById("diagram"),
    ctx = canvas.getContext("2d");
  canvas.width = canvas.width;
}

hoverItem();

function hoverItem() {
  var item = $(".js-item"),
    id = item.data("id");
  item.hover(
    function() {
      $(this).addClass("show");
      diagramDraw(id);
    },
    function() {
      $(this).removeClass("show");
      clearCanvas();
    }
  );
}

$(function() {
  $(".group_item").on("click", function() {
    $("#preloader").css("display", "flex");
    var id = [];
    id.push($(this).attr("id"));
    if ($(this).hasClass("active") !== false) {
      printRows(id);
    } else {
      deleteRows(id);
    }
  });
  $(".group_title_checkbox").on("click", function(event) {
    $("#preloader").css("display", "flex");
    var elements = $(this)
        .parent()
        .siblings(".group_content")
        .find(".group_item"),
      ids = [];
    elements.each(function(i, item) {
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
      success: function(response) {
        $("#preloader").css("display", "none");
        if (clear_table) {
          $("#table-body").html(response);
        } else {
          $("#table-body").append(response);
        }
      },
      error: function() {
        $("#preloader").css("display", "none");
      }
    });
  }
  $(document).on("click", ".show_protocol", function() {
    $("#preloader").css("display", "flex");
    var option = "protocol",
      id = $(this).data("id");
    showFullContent(id, option);
  });
  $(document).on("click", ".show_norm_condition", function() {
    $("#preloader").css("display", "flex");
    var option = "normal_condition",
      id = $(this).data("id");
    showFullContent(id, option);
  });
  $(document).on("click", ".show_abnorm_condition", function() {
    $("#preloader").css("display", "flex");
    var option = "abnormal_condition",
      id = $(this).data("id");
    showFullContent(id, option);
  });
  $(document).on("click", ".show_marker", function() {
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
      success: function(response) {
        $("#preloader").css("display", "none");
        $(".factor-diagrams_modal-content").html(response);
        $.fancybox.open({
          src: "#hidden-content",
          type: "inline"
        });
      },
      error: function() {
        $("#hidden-content").html("error...");
        $("#preloader").css("display", "none");
      }
    });
  }

  function deleteRows(ids) {
    ids.forEach(function(item, i, ids) {
      $("#row" + item).remove();
    });
    $("#preloader").css("display", "none");
  }
});

$(function() {
  $(".cell-group-patalogy, .cell-group-norm").text(function(i, text) {
    if (text.length >= 50) {
      text = text.substring(0, 50);
      var lastIndex = text.lastIndexOf(" ");
      text = text.substring(0, lastIndex) + "...";
    }
    $(this).text(text);
  });
});

// Preloader settings
$(function() {
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

$(document).on("click", "#send-form-btn", function() {
  $("#preloader").css("display", "flex");
});
