@extends('fontend.user.main')

@section('content')

<div class="layout__left">
   <header class="heading">
      <h1 class="heading__title">Thẻ Tag Nội Dung Tương Tự: {{$tag}}</h1>
   </header>
   <div class="items">
      <!-- video -->
      @if ($movie->isEmpty())
        <p>Không Có Phim Liên Quan</p>
     @else
        @foreach ($movie as $movies)
         <div class="item">
           <a href="{{route('movie', $movies->slug)}}" title=" {{$movies->name}}" class="item__thumbnail">
            <img src="{{asset($movies->image)}}"
               alt="">
            <div class="item__labels">
               @if ($movies->vskc == 1)
               <span>VietSub</span>
            @elseif($movies->vskc == 2)
               <span>Không Che</span>
            @else

            @endif
            </div>
           </a>
           <a href="{{route('movie', $movies->slug)}}" title="{{$movies->name}}" class="item__title">
            <h4 class="item__title">
               {{$movies->name}}
            </h4>
           </a>
         </div>
      @endforeach

     @endif

   </div>
   <div class="mt-5"></div>
  @include('fontend.paginate.paginateplay')

</div>
@endsection