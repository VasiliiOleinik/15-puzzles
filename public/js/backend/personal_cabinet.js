document.addEventListener("DOMContentLoaded", function (event) {

    //при нажатии на edit article заполняем поля формы
    $('.edit-artile').on('click', function () {
        let id = $(this).parent().attr('obj-id');
        let title = $(this).parent().parent().parent().find('.med-history__name').html();
        let content = $(this).parent().parent().parent().find('.med-history__info').html();
        let img = $(this).parent().parent().parent().find('.med-history__img').attr('src');
        $('#edit-story__form').find('[name=id]').val(id);
        $('#edit-story__form').find('.headline.inp').val(title);
        $('#edit-story__form').find('.story.inp').val(content);
        $('#edit-story__form').find('.image').attr('src',img);
        $('#med-history-js, #edit-story-js').slideToggle();
    });

    $(".delete-artile").unbind("click").click(function () {
        var id = $(this).parent().attr('obj-id');
        $(this).parent().parent().parent().remove();
        $.ajax({
            type: "DELETE",
            url: '/medical_history/' + id,// '{{ route('file.personal_cabinet.destroy','id')}}',
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
