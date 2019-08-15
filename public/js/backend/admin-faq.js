document.addEventListener('DOMContentLoaded', function () {

    $('[name=next_action]').on('click', function (e) {
        e.preventDefault();
        //Проверяем заполнены ли все required поля
        let elems = [$('[type=hidden][name= titleEng]').val(), $('[type=hidden][name = contentEng]').val(),
                     $('[type=hidden][type=hidden][name=titleRu]').val(),
                     $('[type=hidden][name = contentRu]').val()];                    
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
    $('[name=contentEng]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=contentEng]').attr('value', val);
    });   
    $('[name=titleRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=titleRu]').attr('value', val);
    });
    $('[name=contentRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=contentRu]').attr('value', val);
    });
}, false);
