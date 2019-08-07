document.addEventListener('DOMContentLoaded', function () {

    $('[name=next_action]').on('click', function (e) {
        e.preventDefault();        
        //Проверяем заполнены ли все required поля
        let elems = [$('[name=nameEng]').val(), $('[name = contentEng]').val(), $('[name=nameRu]').val(), $('[name = contentRu]').val()];
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
    $('[name=nameEng]').on('keyup', function (e) {        
        let val = $(this).val();
        $('[type=hidden][name=nameEng]').attr('value', val);
    });
    $('[name=contentEng]').on('keyup', function (e) {        
        let val = $(this).val();
        $('[type=hidden][name=contentEng]').attr('value', val);
    });
    $('[name=nameRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=nameRu]').attr('value', val);
    });    
    $('[name=contentRu]').on('keyup', function (e) {
        let val = $(this).val();
        $('[type=hidden][name=contentRu]').attr('value', val);
    });
}, false);
