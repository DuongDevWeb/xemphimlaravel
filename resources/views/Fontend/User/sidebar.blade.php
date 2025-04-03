<div class="layout__right">
    <header class="heading">
        <h3 class="heading__title">Phim Sex Mới Mỗi Giờ</h3>
    </header>

    <div class="top-items">
        <div class="top-items__wrapper">
            @if ($randomMovies->isNotEmpty())
                @foreach ($randomMovies as $movie)
                    <div class="item">
                        <a href="{{ route('movie', $movie->slug) }}" title="{{ $movie->name }}" class="item__thumbnail">
                            <!-- Kiểm tra nếu có ảnh -->
                            <img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}">
                            <div class="item__labels">
                                @if ($movie->vskc == 1)
                                    <span>VietSub</span>
                                @elseif($movie->vskc == 2)
                                    <span>Không Che</span>
                                @else
                                  
                                @endif
                            </div>
                        </a>
                        <a href="{{ route('movie', $movie->slug) }}" title="{{ $movie->name }}" class="item__title">
                            <h4 class="item__title">{{ $movie->name }}</h4>
                        </a>
                    </div>
                @endforeach
            @else
                <p>Không có phim nào để hiển thị.</p>
            @endif
        </div>
    </div>
</div>
