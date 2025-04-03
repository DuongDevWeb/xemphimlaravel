<!DOCTYPE html>
<html lang="vi">
@include('fontend.user.head')

<body>
   <!-- quảng cáo -->
   <!-- <style>
         #sticky-top-ads {
         display: none;
         }
         .sticky-div {
         width: 100%;
         position: fixed;
         top: 0;
         left: 0;
         background: rgba(0, 0, 0, 0.5);
         z-index: 999;
         }
         .ads-item-wrapper {
         display: block;
         height: 35px;
         aspect-ratio: 728/90;
         margin-left: auto;
         margin-right: auto;
         }
         .sticky-ads-item {
         object-fit: cover;
         height: 100%;
         width: 100%;
         }
         .close-ads-btn {
         display: inline-block;
         position: absolute;
         top: 101%;
         right: 0%;
         padding: 5 15px !important;
         font-size: 16px;
         color: #dadada;
         background-color: #2b2b2b;
         border: 1px solid #dadada;
         box-shadow: 0 0 5px #fff;
         opacity: 0.8;
         cursor: pointer;
         font-size: serif;
         }
         @media screen and (min-width: 768px) {
         .ads-item-wrapper {
         height: 50px;
         max-height: 80px;
         }
         }
      </style> -->
      
   <div id="header" class="container">
      <div class="header__logo">
         <div>
            <a href="/" class="header__logo__text">
               <span>
                  Sex
               </span>
               <span style="margin-left: -5px">
                  Top Số 1
               </span>
               <span style="margin-left: -5px">Mới Nhất</span>
            </a>
         </div>
         <div x-data="{opened: false}" x-show="true" :class="'header__mobile-menu-toggle ' + (opened ? 'header__mobile-menu-toggle--opened' : '')" style="display:none">
            <button x-on:click="opened = !opened" data-drawer-toggle="mobile-aside-menu"
               aria-controls="mobile-aside-menu"></button>
            <aside id="mobile-aside-menu" aria-label="Sidebar" :class="opened ? 'mobile-aside-menu--active' : ''">
               <div class="mobile-aside-menu__container">
                  <ul>
                  <li>
                        <a href="{{route('Homeplay')}}">
                           <span class="ms-3"> Trang Chủ</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{route('countryHome')}}">
                           <span class="ms-3">  Quốc Gia</span>
                        </a>
                     </li>

                     <li>
                        <a href="{{route('genreHome')}}">
                           <span class="ms-3">Thể Loại</span>
                        </a>
                     </li>

                     @foreach ($category as $categoryhome)
                   <li>
                     <a href="{{route('category', $categoryhome->slug)}}">
                        <span class="ms-3">{{$categoryhome->name}}</span>
                     </a>
                   </li>
                   
                @endforeach
               
                  </ul>
               </div>
            </aside>
            <div x-on:click="opened=false" class="mobile-aside-menu-outside" :style="'display: ' + (opened ? 'block' : 'none')"></div>
         </div>
      </div>
         @include('fontend.search.search')
   </div>
   <div id="navbar">
    <div class="container navbar__menu">
      
       <a href="{{route('Homeplay')}}" class="navbar__menu__item">
        🔥   Trang Chủ
        </a>
        <a href="{{route('genreHome')}}" class="navbar__menu__item">
        🔥   Thể Loại
        </a>

        <a href="{{route('countryHome')}}" class="navbar__menu__item">
        🔥    Quốc Gia
        </a>
        <!-- Thể loại -->
        @foreach ($category as $categoryhome)
            <a href="{{route('category', $categoryhome->slug)}}" class="navbar__menu__item">
                {{$categoryhome->name}}
            </a>
        @endforeach

       
        <!-- Thể loại và Quốc gia -->
       
    </div>
</div>
   <div class="layout container">
      <!-- content nội dung -->
      @yield('content')
      @include('fontend.user.sidebar')
   </div>
   @include('fontend.user.footer')

</body>

</html>