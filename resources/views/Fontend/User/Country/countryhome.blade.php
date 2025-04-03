@extends('fontend.user.main')

@section('content')

<div class="layout__left">
            <header class="heading">
               <h1 class="heading__title">Quốc Gia</h1>
            </header>
            <div class="items">
               <!-- video -->
                @foreach ($country as $countryHome )

                <div class="item">
                  <a href="{{route('country',$countryHome->slug)}}" title="" class="item__thumbnail">
                     <img src="{{asset($countryHome->image)}}" alt="Anh xã để vợ yêu một mình với cậu cấp dưới để thử lòng chung thủy và cái kết">
                     <div class="item__labels">
                        <span>{{$countryHome->name}}</span>
                     </div>
                  </a>
                  <a href="#" title="" class="item__title">
                     <h4 class="item__title">
                        
                     </h4>
                  </a>
               </div>
                
                @endforeach
              
            </div>
            <div class="mt-5"></div>
           

         </div>
@endsection