<header class="heading">
            <h3 class="heading__title">Xem Thêm Phim Sex</h3>
         </header>
       

<div class="items">
   @if ($moviesByCategory->isEmpty())
      <p>Không Có Phim Liên Quan</p>
   @else
      @foreach ($moviesByCategory as $movie)
         <div class="item">
            <a href="{{ route('movie', $movie->slug) }}" title="{{ $movie->name }}" class="item__thumbnail">
               <img src="{{ asset($movie->image) }}" alt="{{ $movie->name }}">
               <div class="item__labels">
                  @if ($movie->vskc == 1)
                     <span>VietSub</span>
                  @elseif($movie->vskc == 2)
                     <span>Không Che</span>
                  @endif
               </div>#
            </a>
            <a href="{{ route('movie', $movie->slug) }}" title="{{ $movie->name }}" class="item__title">
               <h4>{{ $movie->name }}</h4>
            </a>
         </div>
      @endforeach
   @endif
</div>

<!-- Hiển thị phân trang -->
<div class="paginate">
   {{ $moviesByCategory->links() }}
</div>
