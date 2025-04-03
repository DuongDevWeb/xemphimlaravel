<div class="paginate">
      <nav class="paginator" role="navigation">
         <!-- Hiển thị trang hiện tại và các trang khác -->
         @if ($movie->currentPage() > 1)
          <div class="paginator__item">
            <a class="paginator__item__link" href="{{ $movie->previousPageUrl() }}">←</a>
          </div>
       @endif

         @for ($i = 1; $i <= $movie->lastPage(); $i++)
          <div class="paginator__item {{ $i == $movie->currentPage() ? 'paginator__item--active' : '' }}">
            <a class="paginator__item__link" href="{{ $movie->url($i) }}">{{ $i }}</a>
          </div>
       @endfor

         @if ($movie->hasMorePages())
          <div class="paginator__item">
            <a class="paginator__item__link" href="{{ $movie->nextPageUrl() }}">→</a>
          </div>
       @endif
      </nav>
   </div>