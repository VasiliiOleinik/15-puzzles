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
    let count = 0;
    let timerId = setInterval(function(){
        if($('tr.even').length > 0){
            $('tr.even').find('.text-right').remove();
            let url = $('tr.even').find('.text-right').find('a')
            let urlSplit = url.split('/');
            let id = urlSplit[urlSplit.length-2];
            count++;
        }
        /*if(count>100){
            clearInterval(timerId)
        }*/
    }, 500);                                     
    }, false);
</script>
