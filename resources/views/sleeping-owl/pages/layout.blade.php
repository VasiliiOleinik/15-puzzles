<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
@yield('content')
<script type="text/javascript">
    tinymce.init({
        setup:function(ed) {
           ed.on('init change keyup', function(e) {
               /*console.log('the event object ', e);
               console.log('the editor object ', ed.id);
               console.log('the content ', ed.getContent());*/
               $('[name='+ed.id+']').attr('value',ed.getContent());
           });
       },
        selector:'textarea',
        width: 900,
        height: 300
    });
</script> 
