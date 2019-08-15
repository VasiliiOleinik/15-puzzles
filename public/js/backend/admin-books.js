document.addEventListener('DOMContentLoaded', function () {

    $('[name=next_action]').on('click', function (e) {
        e.preventDefault();
        //Проверяем заполнены ли все required поля
        let elems = [$('[type=hidden][name= titleEng]').val(), $('[type=hidden][name = descriptionEng]').val(),
                     $('[type=hidden][name = authorEng]').val(), $('[type=hidden][type=hidden][name=titleRu]').val(),
                     $('[type=hidden][name = descriptionRu]').val(), $('[type=hidden][name = authorRu]').val()];                    
        let validate = true;
        elems.forEach(function (item) {
            if (item == "") {
                validate = false;
            }
        });
        if (!validate) {
            alert('Заполните обязательные поля (поля с красной звездой).');
        } else {
            $("form[method=post]:last").submit();
        }
    })
    $('[name=titleEng]').on('keyup', function (e) {        
        let val = $(this).val();
        $('[type=hidden][name=titleEng]').attr('value', val);
    });
    $('[name=descriptionEng]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=descriptionEng]').attr('value', val);
    });
    $('[name=authorEng]').on('keyup', function (e) {        
        let val = $(this).val();
        $('[type=hidden][name=authorEng]').attr('value', val);
    });
    $('[name=titleRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=titleRu]').attr('value', val);
    });
    $('[name=descriptionRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=descriptionRu]').attr('value', val);
    });
    $('[name=authorRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=authorRu]').attr('value', val);
    });
}, false);