@extends('fontend.user.main')

@section('content')

<div class="layout__left">
            <header class="heading">
               <h1 class="heading__title">Thể Loại</h1>
            </header>
            <div class="items">
               <!-- video -->
                @foreach ($genre as $genreHome )

                <div class="item">
                  <a href="{{route('genre',$genreHome->slug)}}" title="" class="item__thumbnail">
                     <img src="{{asset($genreHome->image)}}" alt="">
                     <div class="item__labels">
                        <span>{{$genreHome->name}}</span>
                     </div>
                  </a>
                  <a href="" title="{{$genreHome->name}}" class="item__title">
                     <h4 class="item__title">
                     </h4>
                  </a>
               </div>
                
                @endforeach
              
            </div>
            <div class="mt-5"></div>
           
         </div>
@endsection