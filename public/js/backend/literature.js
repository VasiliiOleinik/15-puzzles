/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */
document.addEventListener("DOMContentLoaded", function (event) {
    
    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */
    let categoryAjax, tagsAjax;    
    /* ------------------ */
    /* ------------------ */

    tagsAjax = usedTags('books');


    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    //Без этого кнопки "Где купить" будут disabled (ждем document ready и активуруем их)
    $('.show-more-info-book').attr('data-fancybox', '');

    function clearFilter() {
        $('.choosen').removeClass('choosen');
        categoriesForBooksActive = [];
        $("#tags").tagsinput('removeAll');
        clearTagsActiveCloud();
    }

    /* ------------------ */
    /* ------------------ */




    /* ------------------ */
    /*       EVENTS       */
    /* ------------------ */

    //ajax pagination
    /*$('.news-left').delegate('.pagination a', 'click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function (data) {
            $('.main-content').html(data);
        });
    });
    */

    //клик на "Где купить"
    $('.main-content').delegate('.show-more-info-book', 'click', function () {
        $(this).attr('data-fancybox','');
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
            type: "POST",
            url: "/" + locale + "/literature-modal",
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
        location.href = '/' + locale + '/literature/?category=' + category;
        //ajax способ
        /*
        if (!categoriesForBooksActive.includes(category)) {
            categoriesForBooksActive.push(category);
        } else {
            let index = categoriesForBooksActive.indexOf(category);
            if (index !== -1) categoriesForBooksActive.splice(index, 1);
        }

        let tagsActive = $("#tags").val().split(',');
        //мерджим два массива тэгов (из поля "Search" и из облака)
        if (tagsActive[0] == "" && tagsActiveCloud.length > 0) {
            tagsActive = tagsActiveCloud;
        } else {
            tagsActive = tagsActive.concat(tagsActiveCloud);
        }

        try {
            categoryAjax.abort();
        } catch (err) { }
        //console.log(categoriesForBooksActive);
        let data = setData(categoriesForNewsActive, categoriesForBooksActive, tagsActive);

        categoryAjax = $.ajax({
            type: "GET",
            url: "/" + locale + "/literature",
            data: data,
            complete: function (result) {
                if (result.responseText) {
                    $('.main-content').html(result.responseText);
                    $('.show-more-info-book').attr('data-fancybox', '');
                }
            },
            error: function (err) {
                if (err.responseText)
                    console.log(err.responseText);
            }
        });
        */
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

        let tagsActive = $("#tags").val().split(',');
        //мерджим два массива тэгов (из поля "Search" и из облака)
        if (tagsActive[0] == "" && tagsActiveCloud.length > 0) {
            tagsActive = tagsActiveCloud;
        } else {
            tagsActive = tagsActive.concat(tagsActiveCloud);
        }

        let data = setData(categoriesForNewsActive, categoriesForBooksActive, tagsActive);

        categoryAjax = $.ajax({
            type: "GET",
            url: "/" + locale + "/literature",
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



