/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {

    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */
    let categoryAjax, tagsAjax;
    let categoriesForNewsActive = [];
    /* ------------------ */
    /* ------------------ */
    
    tagsAjax = usedTags();


    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    function usedTags() {
        $.ajax({
            type: "GET",
            url: "/used_tags",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "with":"articles",
            },
            complete: function (result) {
                //console.log(result.responseText);
                if (result.responseText.length != 0) {

                    json = jQuery.parseJSON(result.responseText);
                    json_length = Object.keys(json).length;

                    data = formTheCorrectDataFormat(json, json_length);
                    tagsInputInit(data);
                }
            },
            error: function (err) {
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

    function clearFilter() {
        $('.choosen').removeClass('choosen');
        categoriesForNewsActive = [];
        $("#tags").tagsinput('removeAll');
    }

    function setData(categoriesForNewsActive, tagsActive){
        let data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            categoriesForNewsActive: categoriesForNewsActive,
            tagsActive: tagsActive,
        };
        return data;
    }

    /* ------------------ */
    /* ------------------ */




    /* ------------------ */
    /*       EVENTS       */
    /* ------------------ */

    //ajax pagination
    $('.news-left').delegate('.pagination a', 'click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function (data) {
            $('.main-content').html(data);
        });
    });

    //клик на сброс фильтра
    $('.clear-filter-btn').on('click', function () {
        clearFilter();
    });

    //клик на категориях статей
    $('.categories__list li a').on('click', function () {
        let category = $(this).attr('obj-id');
        if (!categoriesForNewsActive.includes(category)) {
            categoriesForNewsActive.push(category);
        } else {
            let index = categoriesForNewsActive.indexOf(category);
            if (index !== -1) categoriesForNewsActive.splice(index, 1);
        }
        
        let tagsActive = $("#tags").val().split(',');

        try {
            categoryAjax.abort();
        } catch (err) { }

        let data = setData(categoriesForNewsActive, tagsActive);

        categoryAjax = $.ajax({
            type: "GET",
            url: "/news",
            data: data,
            complete: function (result) {
                if (result.responseText)
                    $('.main-content').html(result.responseText);
            },
            error: function (err) {
                if (err.responseText)
                    console.log(err.responseText);
            }
        });
    });

    //Клик на иконке поиска по тэгам
    $('.search-news-btn').on('click', function (e) {
        e.preventDefault();
        $('#tags').trigger("change");
    })

    //Тэги изменились
    $("#tags").on('change',function () {

        if ($("#tags").val().length) {
            $('.tt-input').attr('placeholder', '');
        }
        else {
            $('.tt-input').attr('placeholder', 'Search');
        }

        let tagsActive = $("#tags").val().split(',');
        let data = setData(categoriesForNewsActive, tagsActive);

        newsAjax = $.ajax({
            type: "GET",
            url: "/news",
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
    })
    /* ------------------ */
    /* ------------------ */

});
/* ------------------ */
/* ------------------ */



