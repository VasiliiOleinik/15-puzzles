var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
});
/* ------------------------- */
/*     GLOBAL VARIABLES      */
/* ------------------------- */
let tagsActiveCloud = [];
let categoriesForNewsActive = [];
let categoriesForBooksActive = [];
/* ------------------ */
/* ------------------ */

/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {
    //add * before required fields (css)
    var required_label = $('[required="required"]').parent().parent().find('label');
    required_label.after('<label class="required_after">*</label>');
});

/* ------------------ */
/* ------------------ */

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}

$('.tags__list').delegate('.item', 'click', 'change', function () {
    //Тэг, по которому кликнули в облаке тэгов (добавляем его в массив выбранных тэгов из облака)
    let route = 'news';
    if (location.href.includes("news")) {
        route = 'news';
    }
    if (location.href.includes("literature")) {
        route = 'literature';
    }
    if (location.href.includes("member_cases")) {
        route = 'member_cases';
    }
    let tag = $(this).attr('obj-id');
    location.href = '/' + locale + '/'+ route +'/?tag=' + tag;
    //ajax способ
    /*
    //Тэги, которые мы вписали в поле "Search"
    let searchTags = [""];
    if ($("#tags").length > 0) {
        searchTags = $("#tags").val().split(',');
    }    
    if (!tagsActiveCloud.includes(tag)) {
        tagsActiveCloud.push(tag);
    } else {
        let index = tagsActiveCloud.indexOf(tag);
        if (index !== -1) tagsActiveCloud.splice(index, 1);
    }
    //мерджим эти два массива тэгов (из поля "Search" и из облака)
    tags = tagsActiveCloud.concat(searchTags);
    let data = setData(categoriesForNewsActive, categoriesForBooksActive, tags);
    let route = $('.tags').attr('obj-route');
    $.ajax({
        type: "GET",
        url: "/" + locale + "/" + route,
        data: data,
        complete: function (result) {
            if (result.responseText.length != 0) {

                result = result.responseText;
                html = result;
                $('.main-content').html(html);
            }
        },
        error: function (err) {
        }
    });
    */
});

/* ------------------------- */
/*      GLOBAL FUNCTIONS     */
/* ------------------------- */
function setData(categoriesForNewsActive, categoriesForBooksActive, tagsActive) {
    let data;
    if (categoriesForNewsActive.length > 0) {
        data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            categoriesForNewsActive: categoriesForNewsActive,
            tagsActive: tagsActive,
        };
    } else
        if (categoriesForBooksActive.length > 0) {
            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                categoriesForBooksActive: categoriesForBooksActive,
                tagsActive: tagsActive,
            };
        }
        else {
            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                tagsActive: tagsActive,
            };
        }
    return data;
}

function usedTags(_with, all) {
    $.ajax({
        type: "GET",
        url: "/" + locale + "/used_tags",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "with": _with,
            "all": all,
        },
        complete: function (result) {
            //console.log(result.responseText);
            if (result.responseText.length != 0) {                
                json = jQuery.parseJSON(result.responseText);
                setTagsCloud( Object.keys(json), _with );
                json_length = Object.keys(json).length;

                data = formTheCorrectDataFormat(json, json_length);
                tagsInputInit(data);                
            }
        },
        error: function (err) {
        }
    });
}

function setTagsCloud(tags, _with) {
    let view = "";
    if (_with == "articles") {
        view = 'news.news-right.tags-cloud';
    }
    if (_with == "books") {
        view = 'literature.literature-right.tags-cloud';
    }
    if (_with == "memberCases") {
        view = 'member-cases.tags-cloud';
    }
    $.ajax({
        type: "GET",
        url: "/" + locale + "/tags_cloud",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "with": _with,
            "tags": tags,
            "view": view,
        },
        complete: function (result) {
            //console.log(result.responseText);
            if (result.responseText.length != 0) {
                $('.tags__list').html(result.responseText);

                let timerCloud = setInterval(function () {
                    //Выбран тэг - подсвечиваем его как выбранный
                    if ($.urlParam('tag')) {
                        $(".tags__list li.item").each(function () {
                            clearInterval(timerCloud);
                            if ($(this).attr('obj-id') == $.urlParam('tag')) {
                                $(this).addClass('choosen');
                            }
                        });
                    }
                }, 1);                
            }
        },
        error: function (err) {
            //console.log(err.responseText);
        }
    });
}

function formTheCorrectDataFormat(json, json_length) {
    var data = '[';
    $.each(json, function (index, value) {
        data += '{"tag_id":' + index + ', "text":"' + value + '" }, ';
    });
    data = data.slice(0, -2);
    data += ']';
    return data;
}

function tagsInputInit(data) {
    //var data ='[{ "tag_id": 1, "text": "Task 1" }, { "tag_id": 2, "text": "Task 2" }]';

    var tags = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("text"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: jQuery.parseJSON(data) //your can use json type
    });

    tags.initialize();

    var tags_input = $("#tags");
    tags_input.tagsinput({
        itemValue: "tag_id",
        itemText: "text",
        typeaheadjs: {
            name: "tags",
            limit: 6,
            displayKey: "text",
            source: tags.ttAdapter()
        }
    });

    tags_input.tagsinput({
    });
}

function clearTagsActiveCloud() {
    tagsActiveCloud = [];
    let data = setData(categoriesForNewsActive, categoriesForBooksActive, [""]);
    let route = $('.tags').attr('obj-route');
    $.ajax({
        type: "GET",
        url: "/" + locale + "/" + route,
        data: data,
        complete: function (result) {
            if (result.responseText.length != 0) {

                result = result.responseText;
                html = result;
                $('.main-content').html(html);
            }
        },
        error: function (err) {
        }
    });
}

/* ------------------ */
/* ------------------ */
