/* 15 pazzles backend*/

document.addEventListener("DOMContentLoaded", function (event) {
            
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
        var _active_pieces_id = [];
        $(".piece").each(function(){
            if($(this).hasClass('_active')){
                piece_id = $(this).attr('piece-id');                        
                _active_pieces_id.push(piece_id);                        
            }
        });

        //get content of pieces
        $.ajax({
            type: "POST",
            url: "/pieces_content",
            data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                    _active_pieces_id : _active_pieces_id
                    },
            complete: function(result){
                    
                if(result.responseText.length == 0){
                    $('#understanding_the_15_ajax_container').html("");
                    protocolsContentAjax(null);
                    remediesContentAjax(null);
                }else{
                        
                    var json_result =  JSON.parse(result.responseText);
                        
                    var html = "";

                    for(i = 0; i < json_result.length; i++){
                        html += "<h4>" + json_result[i]['name'] + "</h4>";
                        html += json_result[i]['content'];
                        html += "<br><br>";
                    }
                    $('#understanding_the_15_ajax_container').html(html);

                    protocolsContentAjax(_active_pieces_id);
                    remediesContentAjax(_active_pieces_id);
                }
            }
        });
    });

    function protocolsContentAjax(_active_pieces_id){

        /*if(!_active_pieces_id){
            $('#protocols_ul').html("");
        }else*/
        {
            //get content of protocols
            $.ajax({
                type: "POST",
                url: "/protocols_content",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    _active_pieces_id : _active_pieces_id
                },
                complete: function(result){
                    //console.log(result.responseText);

                            
                    if(result.responseText.length == 0){                            
                        $('#protocols_ajax_container').html("");
                    }else{
                            
                    var json_result =  JSON.parse(result.responseText);
                            
                        var html = "";
                               
                        for(i = 0; i < json_result.length; i++){
                            html += "<li class='list-group-item list-group-item-action p-0'>" + json_result[i]['name'] + "</li>";
                        }

                        $('#protocols_ajax_container').html(html);
                    }
                },
                error:function(err){
                    console.log("protocols ajax error");
                }
            });
        }
    }

    function remediesContentAjax(_active_pieces_id) {

        //get content of protocols
        $.ajax({
            type: "POST",
            url: "/remedies_content",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                _active_pieces_id: _active_pieces_id
            },
            complete: function (result) {
                console.log("remedies: "+result.responseText);


                if (result.responseText.length == 0) {
                    $('#remedies_ajax_container').html("");
                } else {

                    var json_result = JSON.parse(result.responseText);

                    var html = "";

                    for (i = 0; i < json_result.length; i++) {
                        html += "<li class='list-group-item list-group-item-action p-0'>" + json_result[i]['name'] + "</li>";
                    }

                    $('#remedies_ajax_container').html(html);
                }
            },
            error: function (err) {
                console.log("remedies ajax error");
            }
        });
        
    }

});

/**/
