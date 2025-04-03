@extends('fontend.user.main')

@section('content')

<div class="layout__left">
   <header class="heading">
   <h1>Kết quả tìm kiếm cho từ khóa: {{ $search }}</h1>
   </header>
   <div class="items">
   @if ($movie->isNotEmpty())
        <div class="movie-list">
            @foreach ($movie as $item)
                <div class="movie-item">
                    <a href="{{ route('movie.detail', $item->slug) }}">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                        <h3>{{ $item->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p>Không tìm thấy kết quả nào.</p>
    @endif
   </div>
   <div class="mt-5"></div>
  @include('fontend.paginate.paginateplay')

</div>



@endsection