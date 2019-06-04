/* 15 pazzles backend*/


document.addEventListener("DOMContentLoaded", function (event) {


    var protocols_ajax;
    var remedies_ajax;
    var markers_ajax;

    //$(".tm-input").tagsManager();

    // Add _active class to the current piece (highlight it)
    var div =$("#pieces");
    var pieces = document.getElementsByName("piece");
    for (var i = 0; i < pieces.length; i++) {
        pieces[i].addEventListener("click", function () {
            if (!$(this).hasClass('_active')) {
                $(this).addClass('_active')
            } else {
                $(this).removeClass('_active')
            }
        });
    }

    $(".piece").bind("click", function() {

        //get active pieces
        var _active_pieces_id = getActivePiecesId();

        //get inactive pieces
        $(".piece").each(function () {
            if (!$(this).hasClass('_active')) {
                piece_id = $(this).attr('piece-id');

                $('.understanding_the_15_element').each(function () {
                    if ($(this).attr('obj-id') == piece_id) {
                        if (!$(this).hasClass('d-none')) {
                            $(this).addClass('d-none');
                        }
                    }
                });
            }
        });

        if (_active_pieces_id.length == 0) {
            _active_pieces_id = null;
        }

        if ($('.tab-pane.show').attr('id') == "protocols") {
            protocolsContentAjax(_active_pieces_id);
        } 
        if ($('.tab-pane.show').attr('id') == "remedies") {            
            remediesContentAjax(_active_pieces_id);
        }
        if ($('.tab-pane.show').attr('id') == "markers") {
            markersContentAjax(_active_pieces_id);
        }
       
    });




    function protocolsContentAjax(_active_pieces_id) {
       
        try {
            protocols_ajax.abort();
        }
        catch{
        
        }
   
        $('#protocols_ajax_container').html('Loading..');

            //get content of protocols
            protocols_ajax = $.ajax({
                type: "POST",
                url: "/protocols_content",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    _active_pieces_id: _active_pieces_id
                },
                complete: function (result) {
                    //console.log("protocols: "+result.responseText);


                    if (result.responseText.length == 0) {
                        $('#protocols_ajax_container').html("");
                    } else {

                        var json_result = JSON.parse(result.responseText);

                        var html = "";

                        for (i = 0; i < json_result.length; i++) {
                            html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "</li>";
                        }

                        $('#protocols_ajax_container').html(html);
                    }
                },
                error: function (err) {
                    //console.log("protocols ajax error: " + err.responseText);
                }
            });
        
    }

    function remediesContentAjax(_active_pieces_id) {

        try {
            remedies_ajax.abort();
        }
        catch{

        }

        $('#remedies_ajax_container').html('Loading..');

        //get content of remedies
        remedies_ajax = $.ajax({
            type: "POST",
            url: "/remedies_content",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                _active_pieces_id: _active_pieces_id
            },
            complete: function (result) {
                //console.log("remedies: "+result.responseText);


                if (result.responseText.length == 0) {
                    $('#remedies_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    for (i = 0; i < json_result.length; i++) {
                        html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "</li>";
                    }

                    $('#remedies_ajax_container').html(html);
                }
            },
            error: function (err) {
                console.log("remedies ajax error:" + err.responseText);
            }
        });     
    }

    function markersContentAjax(_active_pieces_id) {

        try {
            markers_ajax.abort();
        }
        catch{

        }


        $('#markers_ajax_container').html('Loading..');

        //get content of protocols
        markers_ajax = $.ajax({
            type: "POST",
            url: "/markers_content",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                _active_pieces_id: _active_pieces_id
            },
            complete: function (result) {
                //console.log("markers: " + result.responseText);


                if (result.responseText.length == 0) {
                    $('#markers_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    for (i = 0; i < json_result.length; i++) {
                        html += "<li class='list-group-item list-group-item-action p-0' obj-id='" + json_result[i]['id'] + "'>" + json_result[i]['name'] + "</li>";
                    }

                    $('#markers_ajax_container').html(html);
                }
            },
            error: function (err) {
                //console.log("markers ajax error");
            }
        });
    }

    function DetailsAjax(id, table) {
        
        //get details
        $.ajax({
                type: "POST",
                url: "/details_content",
                data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    id: id,
                    table: table
                },
                complete: function (result) {
                        //console.log("details: " + result.responseText);
            
                
                            if (result.responseText.length == 0) {
                                    $('#'+table+' .details_ajax_container').html("");
                                } else {
                
                                    var json_result = JSON.parse(result.responseText);
                
                                    var html = "";
                
                                    html += json_result['content'];
                                html += "<br><br>";
                
                                $('#'+table+' .details_ajax_container').html(html);
                            }
                    },
                error: function (err) {
                    console.log("protocols ajax error");
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

                
                /*
                if (result.responseText.length != 0) {
                    console.log("protocol_pieces: " + result.responseText);
                    var _active_pieces_id = result.responseText;

                    $(".piece").each(function () {
                        if ($(this).hasClass('_active')) {
                            piece_id = $(this).attr('piece-id');

                            $('.understanding_the_15_element').each(function () {
                                if ($(this).attr('obj-id') == piece_id) {
                                    if ($(this).hasClass('d-none')) {
                                        $(this).removeClass('d-none');
                                    }
                                }
                            });
                            _active_pieces_id.push(piece_id);
                        }
                    });
                }
                */
             
            },
            error: function (err) {
                console.log("protocol_pieces ajax error");
            }

        });     
    }

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
        var table = "protocols";
        DetailsAjax(id, table);
        //console.log($(this).attr('obj-id'));
    });

    //click on remedy item
    $('#remedies').delegate("li", "click", function () {

        $('#remedies_ajax_container li').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('obj-id');
        var table = "remedies";
        DetailsAjax(id, table);
        console.log($(this).attr('obj-id'));
    });

    $('#markers').delegate("li", "click", function () {

        $('#markers_ajax_container li').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('obj-id');
        var table = "markers";
        DetailsAjax(id, table);
        console.log($(this).attr('obj-id'));
    });



    //click on protocol tab    
    $('#tab-protocols').delegate("a", "click", function () {

        $('.details_ajax_container').html('');     
        $('#protocols_ajax_container').html('Loading..');     
        var _active_pieces_id = getActivePiecesId();

        protocolsContentAjax(_active_pieces_id);
    });

    //click on remedies tab
    $('#tab-remedies').delegate("a", "click", function () {

        $('.details_ajax_container').html('');     
        $('#remedies_ajax_container').html('Loading..');
        var _active_pieces_id = getActivePiecesId();

        remediesContentAjax(_active_pieces_id);
    });

    //click on markers tab
    $('#tab-markers').delegate("a", "click", function () {

        $('.details_ajax_container').html('');     
        $('#markers_ajax_container').html('Loading..');
        var _active_pieces_id = getActivePiecesId();

        markersContentAjax(_active_pieces_id);
    });

    


    function getActivePiecesId() {
        //get active pieces
        var _active_pieces_id = [];
        $(".piece").each(function () {
            if ($(this).hasClass('_active')) {
                piece_id = $(this).attr('piece-id');

                $('.understanding_the_15_element').each(function () {
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
});

/**/
