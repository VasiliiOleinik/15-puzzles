/* ------------------ */
/*     VARIABLES      */
/* ------------------ */
let evidences;
let diseaseFactors;
/* ------------------ */
/* ------------------ */


/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {

    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */

    let modelNames = {
        0: "factor",
        1: "disease",
        2: "protocol",
        3: "remedy",
        4: "marker"
    };
    let modelSelectors = {
        0: "Factors",
        1: "Diseases",
        2: "Protocols",
        3: "Remedies",
        4: "Markers"
    };

    let tab1 = $('#tabListFactors').html();
    let tab2 = $('#tabListDiseases').html();
    let tab3 = $('#tabListProtocols').html();
    let tab4 = $('#tabListRemedies').html();
    let tab5 = $('#tabListMarkers').html();

    /* ------------------ */
    /* ------------------ */


    /* ------------------ */
    /*       EVENTS       */
    /* ------------------ */

    //Поменялось значение чекбокса
    $(".tab-list.main-scroll").delegate('.checkbox', 'change', function () {
        syncCheckedElements('checkbox', $(this).attr('obj-id'), $(this).attr('obj-type'));
    });

    //Кликнули на пазл
    $('.puzzle-15__item').bind('click', function () {
        syncCheckedElements('puzzle', $(this).parent().attr('obj-id'), "factor");
    });

    //тэги обновились
    startObserver('.tags__list', dataFilter, getTagsData);

    //если был редирект со страницы "about" с указанием фактора
    if (getUrlParameter('factor')) {
        //кликаем на пазл который пришел с редиректа "about" страницы
        syncCheckedElements('puzzle', getUrlParameter('factor'), "factor");
        //очищаем от get параметра url
        window.history.replaceState("object or string", "Title", "/" + window.location.href.substring(window.location.href.lastIndexOf('/') + 1).split("?")[0]);
    }

    //удаление тэга с панели тэгов
    $('.tags__list').delegate('.tag-remove', 'click', function () {
        removeTag($(this).parent().attr('obj-id'), $(this).parent().attr('obj-type'));
        checkCheckbox($(this).parent().attr('obj-id'), $(this).parent().attr('obj-type'));
        checkPuzzle($(this).parent().attr('obj-id'), $(this).parent().attr('obj-type'));
    });

    /* ------------------ */
    /* ------------------ */



    /* ------------------ */
    /*   AJAX FUNCTIONS   */
    /* ------------------ */

    //главный фильтр табов
    function dataFilter(data) {

        try {
            filter_ajax.abort();
        } catch (err) {
        }

        filter_ajax = $.ajax({
            type: "post",
            url: "/model_partial",
            data: data,
            dataType: 'json',
            complete: function (response) {
                //console.log(response.responseText);                
                if (data.factor.length === 0 && data.disease.length === 0 && data.protocol.length === 0) {
                    refreshTabsCounts(response.responseJSON.models);
                    $('#tabListFactors').html(tab1);
                    $('#tabListDiseases').html(tab2);
                    $('#tabListProtocols').html(tab3);
                    $('#tabListRemedies').html(tab4);
                    $('#tabListMarkers').html(tab5);
                } else {
                    //console.log(data.activeTab)
                    refreshTabsCounts(response.responseJSON.models);
                    if (data.activeTab != 0)
                        $('#tabListFactors').html(response.responseJSON.views.factor);
                    if (data.activeTab != 1)
                        $('#tabListDiseases').html(response.responseJSON.views.disease);
                    if (data.activeTab != 2)
                        $('#tabListProtocols').html(response.responseJSON.views.protocol);
                    if (data.activeTab != 3)
                        $('#tabListRemedies').html(response.responseJSON.views.remedy);
                    if (data.activeTab != 4)
                        $('#tabListMarkers').html(response.responseJSON.views.marker);
                }
            },
            error: function (err) {
            }
        });
    }

    /* ------------------ */
    /* ------------------ */



    /* ------------------ */
    /*     FUNCTIONS      */
    /* ------------------ */

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    function getTagsData() {
        let factor = [], disease = [], protocol = [];
        $(".tag-item").each(function () {
            let objId = $(this).attr('obj-id');
            let objType = $(this).attr('obj-type');
            if (objType === "factor") {
                factor.push(objId);
            }
            if (objType === "disease") {
                disease.push(objId);
            }
            if (objType === "protocol") {
                protocol.push(objId);
            }
        });
        let activeTab = checkActiveTab();
        let data = {
            "factor": factor,
            "disease": disease,
            "protocol": protocol,
            "activeTab": activeTab,
            "locale": locale,
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };
        return data;
    }


    function refreshTabsCounts(models) {
        let length = Object.keys(modelNames).length;
        for (let i = 0; i < length; i++) {
            $('#count' + modelSelectors[i]).html('[' + models[modelNames[i]].length + ']');
        }
    }

    /* ------------------ */
    /* ------------------ */

});
/* ------------------ */
/* ------------------ */



/* ------------------ */
/*     FUNCTIONS      */
/* ------------------ */

function checkActiveTab() {
    result = 0;
    $.each($('.r-tabs-tab'), function (index, id) {
        if ($(this).hasClass('r-tabs-state-active')) {
            result = index;
        }
    });
    return result;
}

function syncCheckedElements(clicked, objId, objType) {
    if (clicked === "checkbox" && objType != undefined) {
        var elem = $("input[type='checkbox'][obj-id=" + objId + "][obj-type=" + objType + "]");
        var objName = elem.parent().find('.title').html().split(':')[1].substr(1);
        addTagToTagsList(objId, objName, objType);
        checkPuzzle(objId, objType);
    }
    if (clicked == "puzzle") {
        var elem = $(".puzzle-15__item-outer[obj-id=" + objId + "]");
        var objName = elem.find('.puzzle-15__item-title').html();
        addTagToTagsList(objId, objName, objType);
        checkCheckbox(objId, objType);
        checkPuzzle(objId, objType);
    }
}

function checkCheckbox(objId, objType) {
    var elem = $("input[type='checkbox'][obj-id=" + objId + "][obj-type=" + objType + "]");
    if (tagExists(objId, objType)) {
        elem.prop('checked', true);
        elem.parent().parent().addClass('checked-tab');
    } else {
        elem.prop('checked', false);
        elem.parent().parent().removeClass('checked-tab');
    }
}

function checkPuzzle(objId, objType) {
    if (objType == 'factor') {
        var elem = $('.puzzle-15__item-outer[obj-id=' + objId + ']').children();
        if (!elem.hasClass('active')) {
            elem.addClass('active');
        } else {
            elem.removeClass('active');
        }
    }
}

function addTagToTagsList(objId, objName, objType) {
    if (tagExists(objId, objType)) {
        removeTag(objId, objType);
    } else {
        /*if (objType === 'disease') {

            var loop = setInterval(function () {
                console.log(diseaseFactors)
                if (diseaseFactors) {
                    $.each(diseaseFactors, function (index, id) {
                        let type = "factor";
                        let elem = $("input[type='checkbox'][obj-id=" + id + "][obj-type=" + type + "]");
                        let checkbox = $("input[type='checkbox'][obj-id=" + id + "][obj-type=" + type + "]");
                        let puzzle = $('.puzzle-15__item-outer[obj-id=' + id + ']').children();

                        let name = elem.parent().find('.title').html().split(':')[1].substr(1);
                        
                        html = '<li class="tag-item" obj-id="' + id + '" obj-type="' + type + '"><a class="tag-name" href="javascript:void(0)">' + name + '</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>';
                        if (tagExists(id, type)) {
                            removeTag(id, type);
                            checkbox.prop('checked', false);
                            checkbox.parent().parent().addClass('checked-tab');
                        } 
                        $('.tags__list').append(html);
                        checkbox.prop('checked', true);
                        checkbox.parent().parent().addClass('checked-tab');
                        puzzle.addClass('active');
                    });
                    clearInterval(loop);
                }
            }, 1);
         
            checkOnlyThisCheckbox(objId, objType);
        }*/
        if (objType === 'protocol') {
            let elem = $("input[type='checkbox'][obj-id=" + objId + "][obj-type=" + objType + "]");
            name = elem.parent().find('.title').html().split('<span')[0].trim();
            html = '<li class="tag-item" obj-id="' + objId + '" obj-type="' + objType + '"><a class="tag-name" href="javascript:void(0)">' + name + '</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>';
        } else {
            html = '<li class="tag-item" obj-id="' + objId + '" obj-type="' + objType + '"><a class="tag-name" href="javascript:void(0)">' + objName + '</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>';
        }
        $('.tags__list').append(html);

    }
}

function removeTag(objId, objType) {
    var elem = $('.tag-item[obj-id=' + objId + '][obj-type=' + objType + ']');
    elem.remove();
}

function tagExists(objId, objType) {
    var elem = $('.tag-item[obj-id=' + objId + '][obj-type=' + objType + ']');
    if (elem.length > 0) {
        return true;
    }
    return false;
}

function checkOnlyThisCheckbox(objId, objType) {
    var elem = $("input[type='checkbox'][obj-id=" + objId + "][obj-type=" + objType + "]");
    elem.prop('checked', true);
    elem.parent().parent().addClass('checked-tab');
}

function clearTagsList() {
    $('.tags__list').html('');
}

function uncheckAllCheckboxes() {
    $("input[type='checkbox']").prop('checked', false);
    $('.tab-item__head').removeClass('checked-tab');
}

function uncheckAllPuzzles() {
    $('.puzzle-15__item-outer').children().removeClass('active');
}

function startObserver(selector, callback, params) {
    // Configuration of the observer:
    let config = {
        attributes: true,
        childList: true,
        characterData: true
    };

    let target = $(selector)[0];

    // Create an observer instance
    let observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            let newNodes = mutation.addedNodes; // DOM NodeList

            callback(params());
        });
    });

    // Pass in the target node, as well as the observer options
    observer.observe(target, config);
}

/* ------------------ */
/* ------------------ */
