
@if ($paginator->hasPages())
<div class="blog-pagination">
    <ul class="justify-content-center">

        @if ($paginator->onFirstPage())
        <li class="disabled"><i class="icofont-rounded-left"></i></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
        <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
        @endif
    </ul>
</div>
@endif
