@if ($paginator->hasPages())
    <ul class="pagination__list" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination__page prev disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="pagination__page prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        @php
            $pagesMin = 6;
            $pagesBeforeDots = 4;
            $pagesAfterDots = 4;
        @endphp
        @if($paginator->lastPage() > $pagesMin)
            @if($paginator->currentPage() > 2)
                <li class="hidden-xs pagination__page"><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif
            @if($paginator->currentPage() > 3)
                <li class="pagination__page disabled" aria-disabled="true"><span>...</span></li>
            @endif        
           
            @if($paginator->currentPage() >= $pagesBeforeDots)
                @if($paginator->currentPage() <= $paginator->lastPage() - $pagesAfterDots + 1)
                    @foreach(range(1, $paginator->lastPage()) as $i)
                        @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                            @if ($i == $paginator->currentPage())
                                <li class="pagination__page active"><span>{{ $i }}</span></li>
                            @else
                                <li class="pagination__page"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                @else
                    @foreach(range($paginator->lastPage() - $pagesAfterDots+1, $paginator->lastPage()) as $i)
                        @if($i <= $paginator->currentPage() + 1)
                            @if ($i == $paginator->currentPage())
                                <li class="pagination__page active"><span>{{ $i }}</span></li>
                            @else
                                <li class="pagination__page"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endif
                    @endforeach
                @endif
            @else
                @foreach(range(1, $pagesBeforeDots) as $i)
                    @if($i >= $paginator->currentPage() - 1)
                        @if ($i == $paginator->currentPage())
                            <li class="pagination__page active"><span>{{ $i }}</span></li>
                        @else
                            <li class="pagination__page"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach
            @endif
            

            @if($paginator->currentPage() <= $paginator->lastPage() - 3)
                <li class="pagination__page disabled" aria-disabled="true"><span>...</span></li>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage() - 1)
                <li class="hidden-xs pagination__page"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif
        @else
            @foreach(range(1, $paginator->lastPage()) as $i)
                @if ($i == $paginator->currentPage())
                    <li class="pagination__page active"><span>{{ $i }}</span></li>
                @else
                    <li class="pagination__page"><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endforeach
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination__page next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="pagination__page next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

