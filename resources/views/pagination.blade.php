<div class="pagination">
    <!-- Previous Page Link -->
    @if ($paginator->onFirstPage())
        <a class="disabled page gradient" ><span>&laquo;</span></a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page gradient">&laquo;</a>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <a class="disabled page gradient"><span>{{ $element }}</span></a>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="page gradient active"><span>{{ $page }}</span></a>
                @else
                    <a class="page gradient" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page gradient">&raquo;</a>
    @else
        <a class="page gradient disabled"><span>&raquo;</span></a>
    @endif
</div>