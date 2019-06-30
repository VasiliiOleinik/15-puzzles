var tags_pieces = "", tags_diseases = "", tags_protocols = "", tags_remedies = "", tags_markers = "";

/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {

    /**/
    //Поменялось значение чекбокса
    $(".checkbox").change(function () {
        syncCheckedElements('checkbox', $(this).attr('obj-id'), $(this).attr('obj-type'));
    });

    //Кликнули на пазл
    $('.puzzle-15__item').bind('click', function () {
        syncCheckedElements('puzzle', $(this).parent().attr('obj-id'), "factor");
    });

    /**/

    evidencesAjax();

    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */

    var protocols_ajax;
    var remedies_ajax;
    var markers_ajax;
    var evidences_ajax;
    var details_ajax;

    var evidences;

    var modelPiece = "App\\Models\\Piece\\Piece";
    var modelDisease = "App\\Models\\Disease\\Disease";
    var modelProtocol = "App\\Models\\Protocol\\Protocol";
    var modelRemedy = "App\\Models\\Remedy";
    var modelMarker = "App\\Models\\Marker\\Marker";

    /* ------------------ */
    /* ------------------ */


    /* ------------------ */
    /*     LISTENERS      */
    /* ------------------ */

    // Add _active class to the current piece and disease (highlight it)
    $("[name='piece']").click(function () {
        if (!$(this).hasClass('_active')) {
            $(this).addClass('_active')
        } else {
            $(this).removeClass('_active')
        }
    });

    $("[name='disease']").click(function () {
        if (!$(this).hasClass('_active')) {
            $(this).addClass('_active')
        } else {
            $(this).removeClass('_active')
        }
    });

    /* ------------------ */
    /* ------------------ */


    /* --------------------------- */
    /*   CLICKS ON ITEMS IN TABS   */
    /* --------------------------- */

    //click on piece item
    $(".piece").bind("click", function () {
        displayPiecesOrDiseases("piece");
    });

    //click on disease item
    $(".disease").bind("click", function () {
        displayPiecesOrDiseases("disease");
    });

    //click on protocol item
    $('#protocols').delegate("li", "click", function () {

        /*if (_active_pieces_id.length == 0) {

            var protocol_id = $(this).attr('obj-id');
            protocolPiecesAjax(protocol_id);
        }*/

        $('#protocols li').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('obj-id');
        var model = "App\\Models\\Protocol\\Protocol";
        var table = 'protocols';
        DetailsAjax(id, model, table);

        //console.log($(this).attr('obj-id'));
    });

    //click on remedy item
    $('#remedies').delegate("li", "click", function () {

        $('#remedies_ajax_container li').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('obj-id');
        var model = "App\\Models\\Remedy";
        var table = 'remedies';
        DetailsAjax(id, model, table);

        //console.log($(this).attr('obj-id'));
    });

    //click on marker item
    $('#markers').delegate("li", "click", function () {

        $('#markers_ajax_container li').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('obj-id');
        var model = "App\\Models\\Marker";
        var table = 'markers';
        DetailsAjax(id, model, table);
        //console.log($(this).attr('obj-id'));
    });

    //click on close tag icon
    $('#tags_container').delegate(".close", "click", function () {

        var tag = $(this).parent();
        var tag_type = detectTagType(tag);//piece, disease, protocol
        var tag_id = tag.attr('obj-id');//number

        if (tag_type == "piece") {

            $('.piece').each(function () {

                //click on this tag on pieces and diseases panel
                if ($(this).attr('obj-id') == tag_id) {
                    $(this).click();
                }
            });
        }
        if (tag_type == "disease") {

            $('.disease').each(function () {

                //click on this tag on pieces and diseases panel
                if ($(this).attr('obj-id') == tag_id) {
                    $(this).click();
                }
            });
        }
        if (tag_type == "protocol") {
            tags_protocols = "";
            $('#protocols li').removeClass('highlighted');
            refreshTagsPanelHtml();
            refreshContent();
        }

        //console.log(tag_type);
    });

    /* ------------------ */
    /* ------------------ */


    /* ---------------------------------- */
    /*   DOUBLE CLICKS ON ITEMS IN TABS   */
    /* ---------------------------------- */

    $('#protocols').delegate("li", "dblclick", function () {

        $('#protocols li').removeClass('highlighted');
        $(this).addClass('highlighted');

        protocol_name = $(this).html().split('<span')[0];
        tags_protocols = '<span class="badge-protocol badge badge-secondary mr-1 mb-1" obj-id="' + $(this).attr("obj-id") + '">' + protocol_name;
        tags_protocols += '<button type="button" class="close" aria-label="Close"><span class="close-span" aria-hidden="true" >x</span ></button >';
        tags_protocols += '</span>';

        tags = tags_pieces + tags_diseases + tags_protocols + tags_remedies + tags_markers;
        $('#tags_container').html(tags);
    });

    /* ------------------ */
    /* ------------------ */


    /* ------------------ */
    /*   CLICKS ON TABS   */
    /* ------------------ */

    //click on protocol tab    
    $('#tab-protocols').delegate("a", "click", function () {
        filterAjax(modelProtocol, "protocols");
    });

    //click on remedies tab
    $('#tab-remedies').delegate("a", "click", function () {
        filterAjax(modelRemedy, "remedies");
    });

    //click on markers tab
    $('#tab-markers').delegate("a", "click", function () {
        filterAjax(modelMarker, "markers");
    });

    /* ------------------ */
    /* ------------------ */


    /* ------------------ */
    /*   AJAX FUNCTIONS   */

    /* ------------------ */

    function filterAjax(model, table_name) {

        try {
            window[table_name + '_ajax'].abort();
        } catch (err) {
        }

        $('.details_ajax_container').html('');
        $('#' + table_name + '_ajax_container').html('Loading..');

        //get active pieces
        var pieces = getActivePiecesOrDiseases('piece');
        //get active diseases
        var diseases = getActivePiecesOrDiseases('disease');

        var data;
        if (table_name != "protocols") {

            var protocols = [];
            protocols.push($('#tags_container .badge-protocol').eq(0).attr('obj-id'));

            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                piece: pieces,
                disease: diseases,
                protocol: protocols,
                model: model,
            }
        } else {
            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                piece: pieces,
                disease: diseases,
                model: model,
            }
        }

        //get content of protocols
        window[table_name + '_ajax'] = $.ajax({
            type: "POST",
            url: "/filter",
            data: data,
            complete: function (result) {
                //console.log("result: " + result.responseText);

                if (result.responseText.length == 0) {
                    $('#' + table_name + '_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    if (table_name != "protocols") {
                        for (i = 0; i < json_result.length; i++) {
                            html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "</li>";
                        }

                        $('#' + table_name + '_ajax_container').html(html);
                    } else {
                        //active protocol
                        var active_protocol_id = "";
                        if ($('#tags_container').find('.badge-protocol').length > 0) {
                            active_protocol_id = $('#tags_container').find('.badge-protocol').eq(0).attr('obj-id');
                        }

                        if (result.responseText.length == 0) {
                            $('#protocols_ajax_container').html("");
                        } else {

                            var json_result = JSON.parse(result.responseText);

                            var html = "";

                            for (i = 0; i < json_result.length; i++) {

                                evidence_id = json_result[i]['evidence_id'];
                                evidence_color = "";

                                $(evidences).each(function () {
                                    if ($(this)[0]['id'] == evidence_id) {
                                        evidence_color = $(this)[0]['color'];
                                    }
                                });

                                if (json_result[i]['id'] == active_protocol_id) {
                                    html += "<li class='list-group-item list-group-item-action p-0 highlighted' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "<span class='evidence' style='background:" + evidence_color + "'></span></li>";
                                } else {
                                    html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "<span class='evidence' style='background:" + evidence_color + "'></span></li>";
                                }
                            }

                            $('#protocols_ajax_container').html(html);
                        }
                    }
                }
            },
            error: function (err) {
                //console.log("markers ajax error");
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
                }
                //console.log(evidences);
            },
            error: function (err) {
                //console.log("evidences ajax error: " + err.responseText);
            }
        });

    }

    function DetailsAjax(id, model, table) {

        try {
            details_ajax.abort();
        } catch (err) {
        }

        //get details
        details_ajax = $.ajax({
            type: "POST",
            url: "/details",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                id: id,
                model: model
            },
            complete: function (result) {
                //console.log("details: " + result.responseText);

                if (result.responseText.length == 0) {
                    $('#' + table + ' .details_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    html += json_result['content'];
                    html += "<br><br>";

                    $('#' + table + ' .details_ajax_container').html(html);
                }
            },
            error: function (err) {
                //console.log(err.responseText);
            }

        });
    }

    function protocolPiecesAjax(protocol_id) {
        $.ajax({
            type: "POST",
            url: "/protocol_pieces",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                id: protocol_id
            },
            complete: function (result) {

            },
            error: function (err) {
                console.log("protocol_pieces ajax error");
            }

        });
    }

    /* ------------------ */
    /* ------------------ */

    /* ------------------ */
    /*      FUNCTIONS     */

    /* ------------------ */

    function displayPiecesOrDiseases(obj) {
        //get active pieces
        var active_pieces_id_array = getActivePiecesOrDiseases('piece');
        //get active diseases
        var active_diseases_id_array = getActivePiecesOrDiseases('disease');

        tags_obj = "";
        //get inactive pieces
        $("." + obj).each(function () {
            if (!$(this).hasClass('_active')) {
                obj_id = $(this).attr('obj-id');

                $('.factors_element').each(function () {
                    if ($(this).attr('obj-id') == obj_id) {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    }
                });

                // html = html.replace('<span class="badge badge-secondary">' + $(this).find('label').html() + '</span>', '');
            } else {
                tags_obj += '<span class="badge-' + obj + ' badge badge-secondary mr-1 mb-1" obj-id="' + $(this).attr("obj-id") + '">' + $(this).find('label').html();
                tags_obj += '<button type="button" class="close" aria-label="Close"><span class="close-span" aria-hidden="true" >x</span ></button >';
                tags_obj += '</span>';
            }
        });

        if (obj == "piece") {
            tags_pieces = tags_obj;
        } else {
            tags_diseases = tags_obj;
        }

        tags = tags_pieces + tags_diseases + tags_protocols + tags_remedies + tags_markers;
        $('#tags_container').html(tags);

        if (active_pieces_id_array.length == 0) {
            active_pieces_id_array = null;
        }


        if ($('.tab-pane.show').attr('id') == "protocols") {
            filterAjax(modelProtocol, 'protocols');
        }
        if ($('.tab-pane.show').attr('id') == "remedies") {
            filterAjax(modelRemedy, 'remedies');
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            filterAjax(modelMarker, 'markers');
        }
    }

    function getActivePiecesOrDiseases(obj) {

        //get active obj
        var active_obj_id_array = [];
        $("." + obj).each(function () {
            if ($(this).hasClass('_active')) {
                obj_id = $(this).attr('obj-id');

                $('.factors_element').each(function () {
                    if ($(this).attr('obj-id') == obj_id) {
                        if ($(this).hasClass('d-none')) {
                            $(this).removeClass('d-none');
                        }
                    }
                });

                active_obj_id_array.push(obj_id);
            }
        });

        return active_obj_id_array;
    }

    function detectTagType(element) {

        var result = element.hasClass('badge-piece');

        if (result) {
            result = "piece";
        } else {
            result = element.hasClass('badge-disease');

            if (result) {
                result = "disease";
            } else {

                result = element.hasClass('badge-protocol');
                if (result) {
                    result = "protocol";
                }
            }
        }

        return result;
    }

    function refreshTagsPanelHtml() {
        tags = tags_pieces + tags_diseases + tags_protocols + tags_remedies + tags_markers;
        $('#tags_container').html(tags);
    }

    function refreshContent() {

        if ($('.tab-pane.show').attr('id') == "remedies") {
            filterAjax(modelRemedy, 'remedies');
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            filterAjax(modelMarker, 'markers');
        }
    }

    //////

    $('#tabFactors').on("click",function(){
        dataFilter();
    });

    function dataFilter() {

        try {
            filter_ajax.abort();
        } catch (err) {
        }

        let data = {
            "piece": [],
            "disease": [2],
            "protocol": [],
            "models": [modelPiece, modelDisease, modelProtocol, modelRemedy, modelMarker],
            //"model": "App\\Models\\Disease\\Disease",
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };


        filter_ajax = $.ajax({
            type: "post",
            url: "/filter",
            data: data,
            dataType: 'json',
            complete: function (data) {
                refreshTabsContent(data.responseJSON.models);
            },
            error: function (err) {
                //console.log(err.responseText);
            }
        });
    }

    function refreshTabsContent(models) {

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
        let length = Object.keys(modelNames).length;

        for (let i = 0; i < length; i++) {

            let html = "";
            if (models[modelNames[i]].length > 0) {
                for (let count = 0; count < models[modelNames[i]].length; count++) {

                    if (modelNames[i] != "marker") {
                        html += '<div class="tab-item">';
                        html += '   <div class="tab-item__head">';
                        html += '       <label class="tab_head_check">';
                        if (modelNames[i] == "piece") {
                            html += '           <input class="checkbox" type="checkbox" obj-id="' + models[modelNames[i]][count].id + '" obj-type="factor"><span class="checkbox-custom"></span>';
                        }else
                        if (modelNames[i] == "disease" || modelNames[i] == "protocol") {
                            html += '           <input class="checkbox" type="checkbox" obj-id="' + models[modelNames[i]][count].id + '" obj-type="' + modelNames[i] + '"><span class="checkbox-custom"></span>';
                        }else{
                            html += '           <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>';
                        }
                        if (modelNames[i] == "piece" || modelNames[i] == "disease") {
                            html += '           <p class="title">' + modelSelectors[i].substring(0, modelSelectors[i].length - 1) + ' #' + (count + 1) + ': ' + models[modelNames[i]][count].name + '</p>';
                        }else {
                            html += '           <p class="title">' + models[modelNames[i]][count].name;
                        }
                        if (modelNames[i] == "protocol") {
                            html += '           <span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span>';
                        }
                        html += '           </p>';
                        html += '       </label>';
                        html += '       <div class="arrow"><img src="img/svg/dropdown-ico.svg" alt=""></div>';
                        html += '   </div>';
                        html += '   <div class="tab-item__content">';
                        html += '       <div class="text">';
                        if (modelNames[i] == "protocol") {
                            html += '       <p class="subtitle">' + models[modelNames[i]][count].content + '</p>';
                        }else{
                            html += '       <p>' + models[modelNames[i]][count].content + '</p>';
                        }
                        html += '       </div>';
                        html += '       <a class="show-more" href="javascript:void(0)">Show more</a>';
                        if (modelNames[i] == "protocol" || modelNames[i] == "remedy") {
                            html += '   <a class="link" href="javascript:void(0)"> ' + models[modelNames[i]][count].url + ' </a>';
                        }
                        html += '   </div>';
                        html += '</div>';
                    }

                    if (modelNames[i] == "marker") {
                        /*html += '<div class="tab-item markers">';
                                <div class="tab-head-markers">
                                <p class="title">{{$marker->name}}</p>
                            <div class="arrow markers"><img src="img/svg/dropdown-ico.svg" alt=""></div>
                                </div>
                                <div class="tab-item__content markers">
                                <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3>
                            <span class="methods">Methods</span>
                                <div class="method-list">
                                @foreach($marker->methods as $method)
                                <div class="method-item">
                                <label class="method-item__head">
                                <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                                <p class="title">{{$method->name}}</p>
                            </label>
                            <div class="method-item__content">
                                <div class="text markers">
                                <p>{{$method->content}}</p>
                            </div>
                            </div>
                            </div>
                        @endforeach
                        </div>
                            </div>
                            </div>*/
                    }

                    $('#tabList' + modelSelectors[i]).html(html);
                    $('#count' + modelSelectors[i]).html(models[modelNames[i]].length);
                }
            } else {
                console.log(modelSelectors[i]);
                html = $('#tabList' + modelSelectors[i]).html();
                $('#tabList' + modelSelectors[i]).html('');
                $('#tabList' + modelSelectors[i]).html(html);
            }
        }
        $.getScript("/js/frontend/common-include.js");
    }




    //////
    /* ------------------ */
    /* ------------------ */
});


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
            clearTagsList();
            uncheckAllCheckboxes();
            uncheckAllPuzzles();
            checkOnlyThisCheckbox(objId, objType);
        }
        html = '<li class="tag-item" obj-id="' + objId + '" obj-type="' + objType + '"><a class="tag-name" href="javascript:void(0)">' + objName + '</a><img class="tag-remove" src="img/delete_item_ico.png" alt="Delete Item"></li>';
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
/* ------------------ */
/* ------------------ */
