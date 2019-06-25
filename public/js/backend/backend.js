/* 15 pazzles backend*/

var tags_pieces = "", tags_diseases = "", tags_protocols = "", tags_remedies = "", tags_markers = "";

/* ----------------------- */
/*     DOCUMENT READY      */
/* ----------------------- */

document.addEventListener("DOMContentLoaded", function (event) {

    console.log('ready')

    if(location.pathname == "/main" ||
       location.pathname == "/" )
    {
        evidencesContentAjax();
    }

    var required_label = $('[required="required"]').parent().parent().find('label');
    required_label.after('<label class="required_after">*</label>');

    /* ------------------ */
    /*     VARIABLES      */
    /* ------------------ */

    var protocols_ajax;
    var remedies_ajax;
    var markers_ajax;
    var evidences_ajax;

    var evidences;

    var model_protocol = "App\\Models\\Protocol\\Protocol";
    var model_remedy = "App\\Models\\Remedy";
    var model_marker = "App\\Models\\Marker";

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
    })

    $("[name='disease']").click(function () {
        if (!$(this).hasClass('_active')) {
            $(this).addClass('_active')
        } else {
            $(this).removeClass('_active')
        }
    })

    /* ------------------ */
    /* ------------------ */




    /* --------------------------- */
    /*   CLICKS ON ITEMS IN TABS   */
    /* --------------------------- */

    //click on piece item
    $(".piece").bind("click", function () {
    //$(".piece").click( function () {

        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        tags_pieces = "";
        //get inactive pieces
        $(".piece").each(function () {
            if (!$(this).hasClass('_active')) {
                piece_id = $(this).attr('obj-id');

                $('.factors_element').each(function () {
                    if ($(this).attr('obj-id') == piece_id) {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    }
                });

                // html = html.replace('<span class="badge badge-secondary">' + $(this).find('label').html() + '</span>', '');
            } else {
                tags_pieces += '<span class="badge-piece badge badge-secondary mr-1 mb-1" obj-id="' + $(this).attr("obj-id") + '">' + $(this).find('label').html();
                tags_pieces += '<button type="button" class="close" aria-label="Close"><span class="close-span" aria-hidden="true" >x</span ></button >';
                tags_pieces += '</span>';
            }
        });

        tags = tags_pieces + tags_diseases + tags_protocols + tags_remedies + tags_markers;
        $('#tags_container').html(tags);

        if (_active_pieces_id.length == 0) {
            _active_pieces_id = null;
        }


        if ($('.tab-pane.show').attr('id') == "protocols") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_protocol, 'protocols');
        }
        if ($('.tab-pane.show').attr('id') == "remedies") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_remedy, 'remedies');
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_marker, 'markers');
        }

    });

    //click on disease item
    $(".disease").bind("click", function () {
        
        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        tags_diseases = "";
        //get inactive diseases
        $(".disease").each(function () {
            if (!$(this).hasClass('_active')) {
                disease_id = $(this).attr('obj-id');

                $('.diseases_element').each(function () {
                    if ($(this).attr('obj-id') == disease_id) {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    }
                });

                //html = html.replace('<span class="badge badge-secondary">' + $(this).find('label').html() + '</span>', '');
            } else {
                tags_diseases += '<span class="badge-disease badge badge-secondary mr-1 mb-1" obj-id="' + $(this).attr("obj-id") + '">' + $(this).find('label').html();
                tags_diseases += '<button type="button" class="close" aria-label="Close"><span class="close-span" aria-hidden="true" >x</span ></button >';
                tags_diseases += '</span>';
            }
        });

        tags = tags_pieces + tags_diseases + tags_protocols + tags_remedies + tags_markers;
        $('#tags_container').html(tags);

        if (_active_diseases_id.length == 0) {
            _active_diseases_id = null;
        }

        if ($('.tab-pane.show').attr('id') == "protocols") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_protocol, 'protocols');
        }
        if ($('.tab-pane.show').attr('id') == "remedies") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_remedy, 'remedies');
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_marker, 'markers');
        }

    });

    //click on protocol item
    $('#protocols').delegate("li", "click", function () {

        var _active_pieces_id = getActivePiecesId();
        if (_active_pieces_id.length == 0) {

            var protocol_id = $(this).attr('obj-id');
            protocolPiecesAjax(protocol_id);
        }

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

        $('.details_ajax_container').html('');
        $('#protocols_ajax_container').html('Loading..');

        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        //protocolsContentAjax(_active_pieces_id, _active_diseases_id);
        modelDataAjax(_active_pieces_id, _active_diseases_id, model_protocol, "protocols");
    });

    //click on remedies tab
    $('#tab-remedies').delegate("a", "click", function () {

        $('.details_ajax_container').html('');
        $('#remedies_ajax_container').html('Loading..');

        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        //remediesContentAjax(_active_pieces_id, _active_diseases_id);
        modelDataAjax(_active_pieces_id, _active_diseases_id, model_remedy, "remedies");
    });

    //click on markers tab
    $('#tab-markers').delegate("a", "click", function () {

        $('.details_ajax_container').html('');
        $('#markers_ajax_container').html('Loading..');

        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        modelDataAjax(_active_pieces_id, _active_diseases_id, model_marker, "markers");
    });

    /* ------------------ */
    /* ------------------ */




    /* ------------------ */
    /*   AJAX FUNCTIONS   */
    /* ------------------ */

    function modelDataAjax(_active_pieces_id, _active_diseases_id, model, table_name){

        try {
            window[table_name + '_ajax'].abort();
        }
        catch(err){

        }


        $('#'+table_name+'_ajax_container').html('Loading..');

        var data;
        if(table_name != "protocols") {

            var _active_protocols_id = [];
            _active_protocols_id.push($('#tags_container .badge-protocol').eq(0).attr('obj-id'));

            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                piece: _active_pieces_id,
                disease: _active_diseases_id,
                protocol: _active_protocols_id,
                model: model,
            }
        }
        else{
            data = {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                piece: _active_pieces_id,
                disease: _active_diseases_id,
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
                    $('#'+table_name+'_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    if(table_name != "protocols") {
                        for (i = 0; i < json_result.length; i++) {
                            html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "</li>";
                        }

                        $('#' + table_name + '_ajax_container').html(html);
                    }
                    else
                    {
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


    function evidencesContentAjax() {

        try {
            evidences_ajax.abort();
        }
        catch (err) {

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

        //get details
        $.ajax({
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
                console.log(err.responseText);
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

    function getActivePiecesId() {

        //get active pieces
        var _active_pieces_id = [];
        $(".piece").each(function () {
            if ($(this).hasClass('_active')) {
                piece_id = $(this).attr('obj-id');

                $('.factors_element').each(function () {
                    if ($(this).attr('obj-id') == piece_id) {
                        if ($(this).hasClass('d-none')) {
                            $(this).removeClass('d-none');
                        }
                    }
                });

                _active_pieces_id.push(piece_id);
            }
        });

        return _active_pieces_id;
    }

    function getActiveDiseasesId() {

        //get active pieces
        var _active_diseases_id = [];
        $(".disease").each(function () {
            if ($(this).hasClass('_active')) {
                disease_id = $(this).attr('obj-id');


                $('.diseases_element').each(function () {
                    if ($(this).attr('obj-id') == disease_id) {
                        if ($(this).hasClass('d-none')) {
                            $(this).removeClass('d-none');
                        }
                    }
                });

                _active_diseases_id.push(disease_id);
            }
        });

        return _active_diseases_id;
    }

    function detectTagType(element) {

        var result

        result = element.hasClass('badge-piece');

        if (result) {

            result = "piece";
        }
        else {

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
        //get active pieces
        var _active_pieces_id = getActivePiecesId();
        //get active diseases
        var _active_diseases_id = getActiveDiseasesId();

        if ($('.tab-pane.show').attr('id') == "remedies") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_remedy, 'remedies');
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            modelDataAjax(_active_pieces_id, _active_diseases_id, model_marker, 'markers');
        }
    }

    function setUserAvatar(base64_img) {

        if ($('#upload_style').length > 0) {
            $('#upload_style').remove();
        }

        $("head").append('<style id="upload_style" type="text/css"></style>');
        var newStyleElement = $("head").children(':last');
        newStyleElement.html('.imagePreview{background-image:url(' + base64_img + ')!important;}');

        $('#img').attr('value', base64_img);
    }

    function filePriview(base64_img) {

        if ($('#upload_file_style').length > 0) {
            $('#upload_file_style').remove();
        }

        $("head").append('<style id="upload_file_style" type="text/css"></style>');
        var newStyleElement = $("head").children(':last');
        newStyleElement.html('.filePreview{background-image:url(' + base64_img + ')!important;}');
    }


/* ------------------ */
/* ------------------ */
});

/* ------------------ */
/* ------------------ */





/* ------------------------ */
/*     GLOBAL FUNCTIONS     */
/* ------------------------ */

function setUserAvatar(base64_img) {

    if ($('#upload_style').length > 0) {
        $('#upload_style').remove();
    }

    $("head").append('<style id="upload_style" type="text/css"></style>');
    var newStyleElement = $("head").children(':last');
    newStyleElement.html('.imagePreview{background-image:url(' + base64_img + ')!important;}');

    $('#img').attr('value', base64_img);
}

function filePriview(base64_img) {

    if ($('#upload_file_style').length > 0) {
        $('#upload_file_style').remove();
    }

    $("head").append('<style id="upload_file_style" type="text/css"></style>');
    var newStyleElement = $("head").children(':last');
    newStyleElement.html('.filePreview{background-image:url(' + base64_img + ')!important;}');
}


/* ------------------ */
/* ------------------ */


/**/
