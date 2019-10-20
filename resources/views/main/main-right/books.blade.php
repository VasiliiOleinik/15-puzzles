<ul class="main__books">
    @foreach($lits as $lit)
    <li><a href="{{app()->getLocale()}}/literature#book-{{ $lit->book_id }}"><img src="img/svg/book.svg">{{$lit->title}}</a></li>
    @endforeach
</ul>
<a class="arrow-link" href="{{ url(app()->getLocale().'/literature') }}"
   target="_self">@lang('main.button_literature')</a>
