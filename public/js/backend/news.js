document.addEventListener("DOMContentLoaded", function (event) {

    var tags_count = 0;

    tags_ajax = $.ajax({
        type: "GET",
        url: "/tag_names",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
        },
        complete: function (result) {

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


    function formTheCorrectDataFormat(json, json_length) {

        var data = '[';

        for (tag_id = 1; tag_id < json_length; tag_id++) {
            data += '{"tag_id":' + tag_id + ', "text":"' + json[tag_id] + '" }, ';
        }
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

        $("#tags").change(function () {
            //console.log($("#tags").val().split(','))
            var tags_id = $("#tags").val().split(',');

            news_ajax = $.ajax({
                type: "POST",
                url: "/news_content",
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    tags_id: tags_id,
                },
                complete: function (result) {

                    if (result.responseText.length != 0) {

                        result = result.responseText;
                        html = result;
                        $('#articles').html(html);

                        //console.log(result);
                    }
                },
                error: function (err) {

                }
            });
        })

        /*
        //In search field changed count of tags
        $('.bootstrap-tagsinput').bind("DOMSubtreeModified",function(){
            _tags_count = $('.bootstrap-tagsinput').find('.tag').length;

            if(_tags_count != tags_count){
                tags_count = _tags_count;

                console.log($("#tags").val().split(','));



            }
        });
        */
    }
});
