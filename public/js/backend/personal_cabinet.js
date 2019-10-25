document.addEventListener("DOMContentLoaded", function (event) {

    //при нажатии на edit article заполняем поля формы
    $('.edit-artile').on('click', function () {
        let id = $(this).parent().attr('obj-id');
        $.ajax({
            type: "GET",
            url: "/member_cases/load_post/" + id,
            // data: {
            //     "_token": $('meta[name="csrf-token"]').attr('content'),
            // },
            success: function (data) {
                let editor = CKEDITOR.instances.ckeditor_edit;
                $('#edit-story__form').find('[name=id]').val(data.id);
                $('#edit-story__form').find('.headline.inp').val(data.title);
                $('#edit-story__form').find('.js-example-basic-multiple').val(data.story_tags).trigger('change');
                $('#edit-story__form').find('[name="anonym"]').prop('checked', false);
                if (data.anonym) {
                    $('#edit-story__form').find('[name="anonym"]').prop('checked', true);
                }
                editor.setData(data.content);
                $('#edit-story__form').find('.image').attr('src', data.img);
                $('#med-history-js, #edit-story-js').slideToggle();
            },
            error: function (data) {
                // $("#preloader").css("display", "none");
                // for (const key in data.responseJSON.errors) {
                //     if (data.responseJSON.errors.hasOwnProperty(key)) {
                //         const element = data.responseJSON.errors[key];
                //         $("#" + key + "-error").text(element[0]);
                //     }
                // }
                // $("#add-comment-form button").prop("disabled", false);
                // $("#send-comment").removeClass("disabled-button");
            }
        });
    });

    $(".delete-artile").unbind("click").click(function () {
        var id = $(this).parent().attr('obj-id');
        $(this).parent().parent().parent().remove();
        $.ajax({
            type: "DELETE",
            //url: '/medical_history/' + id,// '{{ route('file.personal_cabinet.destroy','id')}}',
            url: '/member_cases/' + id,
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            complete: function (result) {
                //console.log(result.responseText)
            },
            error: function (result) {
            }
        });
    });

    // Добавление истории
    $("#add-story__form").on("submit", function (e) {
        e.preventDefault();

        $("#add-story-headline-error").text("");
        $("#add-story-your-story-error").text("");
        $("#add-story-story-tags-error").text("");
        let formData = new FormData();
        CKEDITOR.instances.ckeditor_add.updateElement();
        formData.append('headline', $(e.target).find('[name="headline"]').val());
        formData.append('your-story', $(e.target).find('[name="your-story"]').val());
        formData.append('anonym', $(e.target).find('[name="anonym"]').prop('checked'));
        formData.append('story-tags', $(e.target).find('.js-example-basic-multiple').val());
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        if ($(e.target).find('[name=image-file]').prop('files').length != 0) {
            formData.append('image-file', $(e.target).find('[name="image-file"]').prop('files')[0]);
        }

        $.ajax({
            type: "POST",
            url: "/member_cases/create_post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
                if (($('#med-history-js').find('.pagination').find('*').length == 0) ||
                    ($('#med-history-js').find('*').length != 0) && ($('#med-history-js').find('.pagination__list').children().first().hasClass('disabled'))) {

                    $('.med-history').prepend(`
                                    <div class="med-history-item">
                                        <div class="member_case_title">
                                            <h3 class="med-history__name">` + data.title + `</h3>
                                            <label class="member_case_on_moder">` + data.member_case_on_moderation + `</label>
                                        </div>
                                        <img class="med-history__img" src="` + data.img + `" alt="">
                                        <div class="med-history__settings"><a class="med-history__date" href="javascript:void(0)">` + data.updated_at_format + `</a>
                                            <div class="med-history__settings-right" obj-id="` + data.id + `">
                                                <a class="edit-artile" id="edit-article-js" href="javascript:void(0)">` + data.edit_article + `</a>
                                                <a class="delete-artile" id="delete-article-js" href="javascript:void(0)">` + data.delete_article + `</a>
                                            </div>
                                        </div>
                                        <p class="med-history__info">` + data.content + `</p>
                                    </div>
                                `);
                }
                $("#med-history-js, #add-story-js").slideToggle();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#add-story-" + key + "-error").text(element[0]);
                    }
                }
            }
        });
    });

    // Изменение истории
    $("#edit-story__form").on("submit", function (e) {
        e.preventDefault();

        $("#edit-story-headline-error").text("");
        $("#edit-story-your-story-error").text("");
        $("#edit-story-story-tags-error").text("");
        let formData = new FormData();
        CKEDITOR.instances.ckeditor_edit.updateElement();
        formData.append('id', $(e.target).find('[name=id]').val());
        formData.append('headline', $(e.target).find('[name="headline"]').val());
        formData.append('your-story', $(e.target).find('[name="your-story"]').val());
        formData.append('anonym', $(this).find('[name="anonym"]').prop('checked'));
        formData.append('story-tags', $(e.target).find('.js-example-basic-multiple').val());
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        if ($(e.target).find('[name=image-file]').prop('files').length != 0) {
            formData.append('image-file', $(e.target).find('[name="image-file"]').prop('files')[0]);
        }

        $.ajax({
            type: "POST",
            url: "/member_cases/update_post",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#preloader").css("display", "none");
                $.fancybox.open({
                    src: "#success-modal",
                    type: "inline"
                });
                let medHistoryItem = $('#med-history-js').find('[obj-id=' + data.id + ']').parent().parent();
                $(medHistoryItem).find('.med-history__name').html(data.title);
                $(medHistoryItem).find('.member_case_title label').removeClass().addClass("member_case_on_moder");
                $(medHistoryItem).find('.member_case_title label').html(data.member_case_on_moderation);
                $(medHistoryItem).find('.med-history__img').attr('src', data.img);
                $(medHistoryItem).find('.med-history__date').html(data.updated_at_format);
                $(medHistoryItem).find('.med-history__info').html(data.content);
                console.log(medHistoryItem);
                $("#med-history-js, #edit-story-js").slideToggle();
            },
            error: function (data) {
                $("#preloader").css("display", "none");
                for (const key in data.responseJSON.errors) {
                    if (data.responseJSON.errors.hasOwnProperty(key)) {
                        const element = data.responseJSON.errors[key];
                        $("#edit-story-" + key + "-error").text(element[0]);
                    }
                }
            }
        });
    });

    //если поля поиска Search by analysis history пусты, то очищаем url от get параметров
    $(".search-btn, .search-byName").on("click", function (e) {
        e.preventDefault();
        let inputs = "";
        $("#file-search-form").find('input').each(function () {
            inputs += $(this).val();
        });
        if (inputs == "") {
            location.href = location.href.substring(0, location.href.indexOf('?'));
        } else
            $("#file-search-form").submit();
    });

    //загрузка файлов
    /*$('.result-item').on('dblclick', function (e) {
        let id = $(this).attr('obj-id');
        location.href = '/download/' + id
        let data = {
            "action": "download",
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };
    });*/

    $('.download').on('click', function (e) {
        let id = $(this).parent().parent().attr('obj-id');
        location.href = '/download/' + id
        let data = {
            "action": "download",
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };
    });

    $(".delete").unbind("click").click(function () {

        if (confirm("Are you shure you want to delete file?")) {
            var id = $(this).parent().parent().attr('obj-id');
            $(this).parent().parent().remove();

            $.ajax({
                type: "DELETE",
                url: 'personal_cabinet/' + id,// '{{ route('file.personal_cabinet.destroy','id')}}',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },
                complete: function (result) {
                    //console.log(result.responseText)

                },
                error: function (result) {
                    ;
                }
            });
        }
    });

    //при смене аватара добавляем img src в hidden input формы
    $('#add-story-item-image').find('.image').on('load', function () {
        setMedicalHistoryAvatar('#add-story-item-image', '#add-story-img');
    });

    $('#edit-story-item-image').find('.image').on('load', function () {
        setMedicalHistoryAvatar('#edit-story-item-image', '#edit-story-img');
    });


    function setMedicalHistoryAvatar(selector1, selector2) {
        let img = $(selector1).find('.image').attr('src');
        $(selector2).val(img);
    };

    //при смене аватара добавляем img src в hidden input формы
    $('.profile-img').find('.image').on('load', function () {
        setUserAvatar('#img');
    });

    function setUserAvatar(selector) {
        let img = $('.profile-img').find('.image').attr('src');
        $(selector).val(img);
    };

    $(function () {
        $(document).on("change", "#file", function () {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];

            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div

                setDefaultFileName(files[0]);
                setFileType(files[0]);
                setFileSize(files[0].size);
            }
            //}

        });
    });

    function setFileSize(file_size) {
        $('#personal_file_size').attr('value', file_size);
    }

    function setFileType(file) {
        var file_type = file.name.split('.')[file.name.split('.').length - 1];
        $('#personal_file_type').attr('value', file_type);
    }

    function setDefaultFileName(file) {
        var file_name = file.name.split('.')[0];
        $('#personal_file_name').val(file_name);
    }
});
