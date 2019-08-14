@if ( ! empty($title))
	<div class="row">
		<div class="col-lg-12">
			{!! $title !!}
		</div>
	</div>
	<br />
@endif

@yield('before.panel')

<div class="panel panel-default {!! $panel_class !!}">
	<div class="panel-heading">
		@if ($creatable)
			<a href="{{ url($createUrl) }}" class="btn btn-primary">
				<i class="fa fa-plus"></i> {{ $newEntryButtonText }}
			</a>
		@endif

		@yield('panel.buttons')

		<div class="pull-right">
			@yield('panel.heading.actions')
		</div>
	</div>

	@yield('panel.heading')

	@foreach($extensions as $ext)
		{!! $ext->render() !!}
	@endforeach

	@yield('panel.footer')
</div>

@yield('after.panel')
<script>    
    document.addEventListener('DOMContentLoaded', function () {
        let timerId = setInterval(function(){
            //оставляем только корректный edit id 
            $('tr[role=row]').each(function(index){
                if(index != 0){
                    let lang =  $(this).find('td').eq( $(this).find('td').length - 2 ).find('.row-text').html().trim();
                    if(lang != 'eng'){
                        $(this).find('.text-right').remove();
                    }
                }
            });
        }, 50);                                    
    }, false);
</script>
