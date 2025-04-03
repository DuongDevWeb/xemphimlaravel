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
                           <span class="ms-3">Trang Chủ</span>
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