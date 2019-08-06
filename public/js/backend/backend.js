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

$('.tags__list').delegate('.item', 'click', 'change', function () {
    //Тэги, которые мы вписали в поле "Search"
    let searchTags = $("#tags").val().split(',');
    //Тэг, по которому кликнули в облаке тэгов (добавляем его в массив выбранных тэгов из облака)
    let tag = $(this).attr('obj-id');
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
