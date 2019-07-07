/* ------------------ */
/*     VARIABLES      */
/* ------------------ */
let evidences;
let diseasePieces;
/* ------------------ */
/* ------------------ */


/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {
  
    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */

    let evidences_ajax, model_ajax, markers_ajax;
  
    let modelPiece = "App\\Models\\Piece\\Piece";
    let modelDisease = "App\\Models\\Disease\\Disease";
    let modelProtocol = "App\\Models\\Protocol\\Protocol";
    let modelRemedy = "App\\Models\\Remedy";
    let modelMarker = "App\\Models\\Marker\\Marker";

    let modelNames = {
        0: "piece",
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

    evidences = evidencesAjax();

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

    //удаление тэга с панели тэгов
    $('.tags__list').delegate('.tag-remove','click',function(){
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
            url: "/filter",
            data: data,
            dataType: 'json',
            complete: function (response) {
                if (response.responseJSON.diseasePieces) {
                    diseasePieces = response.responseJSON.diseasePieces;
                }
                if (data.piece.length === 0 && data.disease.length === 0 && data.protocol.length === 0) {
                    refreshTabsCounts(response.responseJSON.models);
                    $('#tabListFactors').html(tab1);
                    $('#tabListDiseases').html(tab2);
                    $('#tabListProtocols').html(tab3);
                    $('#tabListRemedies').html(tab4);
                    $('#tabListMarkers').html(tab5);
                } else {
                    refreshTabsContent(response.responseJSON.models);
                }
            },
            error: function (err) {
            }
        });
    }

    function modelPartialAjax(data) {

        try {
            model_ajax.abort();
        } catch (err) {
        }

        model_ajax = $.ajax({
            type: "post",
            url: "/model_partial",
            data: data,
            dataType: 'json',
            complete: function (response) {
                if (response.responseText) {
                    $('#' + data.container).html(response.responseText);
                }
            },
            error: function (err) {
            }
        });
    }

    function markersPartialAjax(data) {

        try {
            markers_ajax.abort();
        } catch (err) {
        }

        markers_ajax = $.ajax({
            type: "post",
            url: "/markers_partial",
            data: data,
            dataType: 'json',
            complete: function (response) {
                if (response.responseText) {
                    $('#tabListMarkers').html(response.responseText);
                }
            },
            error: function (err) {
            }
        });
    }

    function evidencesAjax() {

        try {
            evidences_ajax.abort();
        } catch (err) {
        }

        //get content of evidences
        evidences_ajax = $.ajax({
            type: "POST",
            url: "/evidences",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            complete: function (result) {
                if (result.responseText.length != 0) {

                    var json_result = JSON.parse(result.responseText);

                    evidences = json_result;
                    return evidences;
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

    function getTagsData() {
        let piece = [], disease = [], protocol = [];
        $(".tag-item").each(function () {
            let objId = $(this).attr('obj-id');
            let objType = $(this).attr('obj-type');
            if (objType === "factor") {
                piece.push(objId);
            }
            if (objType === "disease") {
                disease.push(objId);
            }
            if (objType === "protocol") {
                protocol.push(objId);
            }
        });
        let data = {
            "piece": piece,
            "disease": disease,
            "protocol": protocol,
            "models": [modelPiece, modelDisease, modelProtocol, modelRemedy, modelMarker],
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

    function refreshTabsContent(models) {

        let length = Object.keys(modelNames).length;
        let markersArray = [];

        for (let i = 0; i < length; i++) {

            let html = "";
            if (models[modelNames[i]].length > 0) {
                for (let count = 0; count < models[modelNames[i]].length; count++) {

                    let id = models[modelNames[i]][count].id;
                    let name = models[modelNames[i]][count].name;
                    let content = models[modelNames[i]][count].content;
                    let url = models[modelNames[i]][count].url;

                    if (modelNames[i] != "marker" ) {
                        html += '<div class="tab-item">';
                        html += '   <div class="tab-item__head">';
                        html += '       <label class="tab_head_check">';
                        if (modelNames[i] == "piece") {
                            html += '           <input class="checkbox" type="checkbox" obj-id="' + id + '" obj-type="factor"><span class="checkbox-custom"></span>';
                        } else
                            if (modelNames[i] == "disease" || modelNames[i] == "protocol") {
                                html += '           <input class="checkbox" type="checkbox" obj-id="' + id + '" obj-type="' + modelNames[i] + '"><span class="checkbox-custom"></span>';
                            } else {
                                html += '           <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>';
                            }
                        if (modelNames[i] == "piece" || modelNames[i] == "disease") {
                            html += '           <p class="title">' + modelSelectors[i].substring(0, modelSelectors[i].length - 1) + ' #' + (count + 1) + ': ' + name + '</p>';
                        } else {
                            html += '           <p class="title">' + name;
                        }
                        if (modelNames[i] == "protocol") {
                            html += '           <span class="evidence ' + evidences[models[modelNames[i]][count].evidence_id - 1].name + '"><span class="evidence__detail">Level of evidence:<span class="evidence__level ' + evidences[models[modelNames[i]][count].evidence_id - 1].name + '">' + evidences[models[modelNames[i]][count].evidence_id - 1].name + '</span></span></span>';
                        }
                        html += '           </p>';
                        html += '       </label>';
                        html += '       <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>';
                        html += '   </div>';
                        html += '   <div class="tab-item__content">';
                        html += '       <div class="text">';
                        if (modelNames[i] == "protocol") {
                            html += '       <p class="subtitle">' + content + '</p>';
                        } else {
                            html += '       <p>' + content + '</p>';
                        }
                        html += '       </div>';
                        html += '       <a class="show-more" href="javascript:void(0)">Show more</a>';
                        if (modelNames[i] == "protocol" || modelNames[i] == "remedy") {
                            html += '   <a class="link" href="javascript:void(0)"> ' + url + ' </a>';
                        }
                        html += '   </div>';
                        html += '</div>';
                    }

                    if (modelNames[i] == "marker") {
                        markersArray.push(models[modelNames[i]][count].id);
                    }

                    let activeTab = checkActiveTab();

                    //во вкладке факторов показывать всегда все элементы
                    if (modelNames[i] != "piece" && activeTab != 2) {
                        $('#tabList' + modelSelectors[i]).html(html);
                    }
                    $('#count' + modelSelectors[i]).html('[' + models[modelNames[i]].length + ']');
                }
            } else {
                $('#count' + modelSelectors[i]).html('[' + models[modelNames[i]].length + ']');
                html = $('#tabList' + modelSelectors[i]).html();
                $('#tabList' + modelSelectors[i]).html('');
            }
        }

        if (markersArray.length > 0) {
            data = {
                "array": markersArray,
                "_token": $('meta[name="csrf-token"]').attr('content'),
            }
            markersPartialAjax(data);
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
    result = undefined;
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
        if (objType === 'disease') {
            
            var loop = setInterval(function () {
                if (diseasePieces) {
                    $.each(diseasePieces, function (index, id) {
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
        }
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
