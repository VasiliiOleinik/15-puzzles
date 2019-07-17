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
    
    tagsAjax = usedTags('articles');


    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */
    

    function clearFilter() {
        $('.choosen').removeClass('choosen');
        categoriesForNewsActive = [];
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
        //мерджим два массива тэгов (из поля "Search" и из облака)
        if (tagsActive[0] == "" && tagsActiveCloud.length > 0) {            
            tagsActive = tagsActiveCloud;            
        } else {
            tagsActive = tagsActive.concat(tagsActiveCloud);
        }

        
        try {
            categoryAjax.abort();
        } catch (err) { }

        let data = setData(categoriesForNewsActive, categoriesForBooksActive, tagsActive);

        categoryAjax = $.ajax({
            type: "GET",
            url: "/" + locale + "/news",
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
        //мерджим два массива тэгов (из поля "Search" и из облака)
        if (tagsActive[0] == "" && tagsActiveCloud.length > 0) {
            tagsActive = tagsActiveCloud;
        } else {
            tagsActive = tagsActive.concat(tagsActiveCloud);
        }
        
        let data = setData(categoriesForNewsActive, categoriesForBooksActive, tagsActive);

        newsAjax = $.ajax({
            type: "GET",
            url: "/" + locale + "/news",
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



