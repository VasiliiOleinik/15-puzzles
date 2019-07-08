/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {
    
    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */
    let categoryAjax, tagsAjax;
    let categoriesForBooksActive = [];
    /* ------------------ */
    /* ------------------ */

    tagsAjax = usedTags();


    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    //Без этого кнопки "Где купить" будут disabled (ждем document ready и активуруем их)
    $('.show-more-info-book').attr('data-fancybox', '');

    function usedTags() {
        $.ajax({
            type: "GET",
            url: "/used_tags",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "with": "books",
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
        categoriesForBooksActive = [];
        $("#tags").tagsinput('removeAll');
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

    //клик на "Где купить"
    $('.main-content').delegate('.show-more-info-book', 'click', function () {
       
        $('#more-info-book-modal-js').html("");
        let loop = setInterval(function () {
            if ($('.fancybox-close-small')) {
                $('.fancybox-close-small').remove();
                clearInterval(loop);
            }
        }, 1);

        let bookId = $(this).parent().parent().attr('obj-id');
        let bookName = $(this).parent().find('.book-name').html();
        let bookAuthor = $(this).parent().find('.book-author').html();
        let bookDescription = $(this).parent().find('.book-review').html();
        let bookImg = $(this).parent().parent().find('.book-img').attr('src');
        let data = {
            "id" : bookId,
            "title" : bookName,
            "author" : bookAuthor,
            "description": bookDescription,
            "img": bookImg,
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };
        let closeButtonHtml = '<button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></button>';

        $.ajax({
            type: "GET",
            url: "/literature-modal",
            data: data,
            complete: function (result) {
                //if (result.responseText)
                    $('#more-info-book-modal-js').html(result.responseText + closeButtonHtml);
            },
            error: function (err) {
                if (err.responseText)
                    console.log(err.responseText);
            }
        });
    })

    //клик на сброс фильтра
    $('.clear-filter-btn').on('click', function () {
        clearFilter();
    })

    //клик на категориях статей
    $('.categories__list li a').on('click', function () {
        let category = $(this).attr('obj-id');
        if (!categoriesForBooksActive.includes(category)) {
            categoriesForBooksActive.push(category);
        } else {
            let index = categoriesForBooksActive.indexOf(category);
            if (index !== -1) categoriesForBooksActive.splice(index, 1);
        }

        let tagsActive = $("#tags").val().split(',');

        try {
            categoryAjax.abort();
        } catch (err) { }

        categoryAjax = $.ajax({
            type: "GET",
            url: "/literature",
            data: {
                categoriesForBooksActive: categoriesForBooksActive,
                tagsActive: tagsActive,
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
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
    $("#tags").change(function () {

        if ($("#tags").val().length) {
            $('.tt-input').attr('placeholder', '');
        }
        else {
            $('.tt-input').attr('placeholder', 'Search');
        }

        var tagsActive = $("#tags").val().split(',');

        news_ajax = $.ajax({
            type: "GET",
            url: "/literature",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                categoriesForBooksActive: categoriesForBooksActive,
                tagsActive: tagsActive,
            },
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



