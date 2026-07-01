@if ($paginator->hasPages())

<div class="dok-pagination-wrap">

    <div class="dok-pagi">

        {{-- Tombol Previous --}}
        @if ($paginator->onFirstPage())
            <span class="pagi-btn pagi-disabled">
                <i class="bi bi-chevron-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagi-btn">
                <i class="bi bi-chevron-left"></i>
            </a>
        @endif

        {{-- Nomor halaman --}}
        @foreach ($elements as $element)

            {{-- Tiga titik --}}
            @if (is_string($element))
                <span class="pagi-btn pagi-dots">{{ $element }}</span>
            @endif

            {{-- Link halaman --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagi-btn pagi-active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pagi-btn">{{ $page }}</a>
                    @endif
                @endforeach
            @endif

        @endforeach

        {{-- Tombol Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagi-btn">
                <i class="bi bi-chevron-right"></i>
            </a>
        @else
            <span class="pagi-btn pagi-disabled">
                <i class="bi bi-chevron-right"></i>
            </span>
        @endif

    </div>

</div>

@endif