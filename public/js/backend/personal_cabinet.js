document.addEventListener("DOMContentLoaded", function (event) {

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
    })

    //загрузка файлов
    $('.result-item').on('dblclick', function (e) {
        let id = $(this).attr('obj-id');
        location.href = '/download/' + id
        let data = {
            "action": "download",
            "_token": $('meta[name="csrf-token"]').attr('content'),
        };      
    })
        
    //при смене аватара добавляем img src в hidden input формы
    $('.profile-img').find('.image').on('load', function () {
        setUserAvatar();
    });

    function setUserAvatar() {
        let img = $('.profile-img').find('.image').attr('src');
        $('#img').val(img);
    };

    $(function () {
        $(document).on("change", ".file-input", function () {
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
