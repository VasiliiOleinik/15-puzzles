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

    //инициализация карты
    let mapInitAttempts = 0;
    let mapInit = setInterval(function () {
        if ($('#map_canvas').find('div').length > 0 ||
            mapInitAttempts > 10) {
            clearInterval(mapInit);
        } else {
            $('.methods-btn').click();
            mapInitAttempts++;
        }
    }, 1);

    //Поменялось значение чекбокса
    $(".tab-list.main-scroll").delegate('.checkbox', 'change', function () {
        syncCheckedElements('checkbox', $(this).attr('obj-id'), $(this).attr('obj-type'));
    });

    //Кликнули на пазл
    $('.puzzle-15__item').bind('click', function () {
        syncCheckedElements('puzzle', $(this).parent().attr('obj-id'), "factor");
    });

    $('.list_country').on('click', function(){
        $('.list_country').removeClass('selected');
        $(this).addClass('selected');
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
    $( document ).ready(function() {
    let mapProp = {
        center: new google.maps.LatLng(45.0, 45.0),//USA
        zoom: 0,
    };

        var map = new google.maps.Map(document.getElementById("map_canvas"), mapProp);
        $('#tabMarkers').on('click', function () {

        });
    });
    //Кликнули на 'найти лаборатории'
    $('.methods-btn').bind('click', function () {
        $("#preloader").css("display", "flex");
        try {
            laboratories_ajax.abort();
        } catch (err) {
        }
        let country = $('#select-country').find('li.selected').eq(0).attr('obj-id');
        let method = $('#select-method').find('.current-value').text();
        if (country === "Your country" || country===undefined) {
            country = null;
        }
        if (method === "Select method") {
            method = null;
        }
        /*
        let zipcode = $('.methods-input').val();
        let lat, lng;
        let geocoder = new google.maps.Geocoder();
        lat = geocoder.geocode({ address: zipcode},
            function (results_array, status) {
                // Check status and do whatever you want with what you get back
                // in the results_array variable if it is OK.
                lat = results_array[0].geometry.location.lat()
                lng = results_array[0].geometry.location.lng()
            });
        */
        let data = {
            "country": country,
            "local": locale,
            "methode": method,
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };
        if(country!=null && method!=null) {

            laboratories_ajax = $.ajax({
                type: "post",
                url: "/map_refresh",
                data: data,
                dataType: 'json',
                complete: function (response) {
                    result = response.responseJSON;
                    $("#preloader").css("display", "none");
                    //console.log(response.responseJSON);
                    //очистка карты
                    $('#map_canvas').html('');
                    //выставляем центр карты в зависимости от выбранной страны
                    let mapProp = {
                        center: new google.maps.LatLng(45.0, 45.0),//USA
                        zoom: 0,
                    };
                    if (country&&result.laboratories!==undefined) {
                        mapProp = {
                            center: new google.maps.LatLng(parseFloat(result.laboratories[0].lat),
                                parseFloat(result.laboratories[0].lng)),
                            zoom: 0,
                        };

                    //инициализакция карты
                    var map = new google.maps.Map(document.getElementById("map_canvas"), mapProp);

                    //функция добавления маркера
                    function addMarker(location) {
                        marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }

                    //добавление маркера
                    result.laboratories.forEach(function (item) {
                        addMarker(new google.maps.LatLng(parseFloat(item.lat),
                            parseFloat(item.lng)));
                    });
                    }else{
                        $('#map_canvas').html('not found laboratory');
                    }
                },
                error: function (err) {
                    $("#preloader").css("display", "none");
                }
            });
        }
    });

    /* ------------------ */
    /* ------------------ */


    /* ------------------ */
    /*   AJAX FUNCTIONS   */
    /* ------------------ */

    //главный фильтр табов
    function dataFilter(data) {
        $("#preloader").css("display", "flex");
        try {
            filter_ajax.abort();
        } catch (err) {
        }

        filter_ajax = $.ajax({
            type: "post",
            url: "model_partial",
            data: data,
            dataType: 'json',
            complete: function (response) {
                $("#preloader").css("display", "none");
                //console.log(response.responseJSON.views);
                if (data.factor.length === 0 && data.disease.length === 0 && data.protocol.length === 0) {
                    location.reload()
                    // refreshTabsCounts(response.responseJSON.models);
                    // $('#tabListFactors').html(tab1);
                    // $('#tabListDiseases').html(tab2);
                    // $('#tabListProtocols').html(tab3);
                    // $('#tabListRemedies').html(tab4);
                    // $('#tabListMarkers').html(tab5);
                } else {
                    //console.log(data.activeTab)
                    refreshTabsCounts(response.responseJSON.models, data);
                    if (data.activeTab != 0)
                        $('#tabListFactors').html(response.responseJSON.views.factors);
                    if (data.activeTab != 1)
                        $('#tabListDiseases').html(response.responseJSON.views.diseases);
                    if (data.activeTab != 2)
                        $('#tabListProtocols').html(response.responseJSON.views.protocols);
                    if (data.activeTab != 3)
                        $('#tabListRemedies').html(response.responseJSON.views.remedies);
                    if (data.activeTab != 4)
                        $('#tabListMarkers').html(response.responseJSON.views.markers);
                }
            },
            error: function (err) {
                $("#preloader").css("display", "none");
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
        let factor = [], disease = [], protocol = [], filter = "";
        $(".tag-item").each(function () {
            let objId = $(this).attr('obj-id');
            let objType = $(this).attr('obj-type');
            filter = objType;
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
        return {
            "factor": factor,
            "disease": disease,
            "protocol": protocol,
            "activeTab": activeTab,
            "local": locale,
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "filter": filter
        };
    }


    function refreshTabsCounts(models) {
        let length = Object.keys(modelNames).length;

        for (key in models) {
            if (models[key]) {
                $('#count' + key).html('[' + models[key].length + ']');
            } else {
                $('#count' + key).html('[0]');
            }

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
        var objName = elem.parent().siblings('.tab-name').find('.title span').html();
        console.log(objName);
        addTagToTagsList(objId, objName, objType);
        checkPuzzle(objId, objType);
        checkCheckbox(objId, objType);
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
        elem.toggleClass('active');
    }
}

function addTagToTagsList(objId, objName, objType) {
    if (tagExists(objId, objType)) {
        removeTag(objId, objType);
    } else {
        if (objType === 'protocol') {
            let elem = $("input[type='checkbox'][obj-id=" + objId + "][obj-type=" + objType + "]"),
                name = elem.parent().parent().find('.title').html().split('<span')[0].trim();
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
