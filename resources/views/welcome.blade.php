<div class="text-center mt-3">
                  <div class="featured-list">
                     <!-- Desktop view -->
                     <div class="featured-list__desktop">
                        <h3 class="featured-list__desktop__heading">
                           Quốc Gia
                        </h3>
                        <ul role="list" class="featured-list__desktop__list">
                           @foreach ($country as $countryhome)
                           <li class="featured-list__desktop__list__item">
                              <a href="" class="featured-list__desktop__list__item__image">
                              <img src="{{asset($countryhome->image ?? '')}}" alt="Việt Nam">
                              </a>
                              <a href="" class="featured-list__desktop__list__item__body">
                                 <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                                    <h3 class="featured-list__desktop__list__item__title">
                                       {{$countryhome->name ?? ''}}
                                    </h3>
                                    <p class="text-gray-500 text-xs">
                                    </p>
                                 </div>
                              </a>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <!-- Mobile view -->
                  </div>
                  <!-- quocos gia -->
                  <div class="featured-list mt-5">
                     <!-- Desktop view -->
                     <div class="featured-list__desktop">
                        <h3 class="featured-list__desktop__heading">
                           Danh Mục
                        </h3>
                        <ul role="list" class="featured-list__desktop__list">
                           @foreach ($category as $categoryhome)
                           <li class="featured-list__desktop__list__item">
                              <a href="" class="featured-list__desktop__list__item__image">
                              <img src="{{asset($categoryhome->image ?? '')}}" alt="Việt Nam">
                              </a>
                              <a href="" class="featured-list__desktop__list__item__body">
                                 <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                                    <h3 class="featured-list__desktop__list__item__title">
                                       {{$categoryhome->name ?? ''}}
                                    </h3>
                                    <p class="text-gray-500 text-xs">
                                    </p>
                                 </div>
                              </a>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <!-- Mobile view -->
                  </div>
                  <!-- thể loại -->
                  <div class="featured-list mt-5">
                     <!-- Desktop view -->
                     <div class="featured-list__desktop">
                        <h3 class="featured-list__desktop__heading">
                           Tất cả thể loại
                        </h3>
                        <ul role="list" class="featured-list__desktop__list">
                           @foreach ($genre as $genrehome)
                           <li class="featured-list__desktop__list__item">
                              <a href="" class="featured-list__desktop__list__item__image">
                              <img src="{{asset($genrehome->image ?? '')}}" alt="Việt Nam">
                              </a>
                              <a href="" class="featured-list__desktop__list__item__body">
                                 <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                                    <h3 class="featured-list__desktop__list__item__title">
                                       {{$genrehome->name ?? ''}}
                                    </h3>
                                    <p class="text-gray-500 text-xs">
                                    </p>
                                 </div>
                              </a>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <!-- Mobile view -->
                  </div>
               </div>

               <!-- quảng cáo
                 <!-- quảng cáo <div class="ad-place ads--under-navbar">
            <div class="under-navbar-ads-container">
               <div id="under-navbar-ads" class="under-navbar-ads overlay-ad">
                  <div style="width: 100%" class="mt-2 ads-row">
                     <div class="under-navbar-add-item" onclick="window.open('https://ads12.choigod55.com')">
                        <img loading="lazy" src="images/god55-728x90.gif">
                     </div>
                     <div class="under-navbar-add-item" onclick="window.open('ads13.choigod55.com')">
                        <img loading="lazy" src="images/god55-728x90.gif">
                     </div>
                     <div class="under-navbar-add-item" onclick="window.open('https://du88.com/?a=mswl_bd4e7e5bb657bfd6ee96d9f4cd9c52fd&utm_campaign=cpd&utm_source=heovlblog&utm_medium=top-pc3-728x90&utm_term=top-pc3-728x90&utm_content=sex')">
                        <img loading="lazy" src="images/du88_728x90.gif">
                     </div>
                  </div>
                  <div style="width: 100%" class="mt-2 ads-row">
                     <div class="under-navbar-add-item" onclick="window.open('https://9bet.net/?a=mswl_096cf069df01f148103ebb79c7cc0f21&utm_campaign=cpd&utm_source=heovlblog&utm_medium=top-pc4-728x90&utm_term=top-pc4-728x90&utm_content=sex')">
                        <img loading="lazy" src="images/9bet-728x90.gif">
                     </div>
                     <div class="under-navbar-add-item" onclick="window.open('https://9bet.net/?a=mswl_30795869012415a2c3854de8fe30f8ae&utm_campaign=cpd&utm_source=heovlblog&utm_medium=top-pc5-728x90&utm_term=top-pc5-728x90&utm_content=sex')">
                        <img loading="lazy" src="images/9bet-728x90.gif">
                     </div>
                     <div class="under-navbar-add-item" onclick="window.open('https://154.82.109.156/1440979.html')">
                        <img loading="lazy" src="images/i9-728x90.gif">
                     </div>
                  </div>
               </div>
            </div>
            <style>
               .under-navbar-ads-container {
               min-height: 80px;
               display: flex;
               justify-content: center;
               }
               @media screen and (max-width: 768px) {
               .under-navbar-ads-container {
               display: none;
               }
               }
               .ads-row {
               display: flex;
               justify-content: center;
               }
               .under-navbar-ads {
               display: none;
               }
               .under-navbar-add-item {
               height: 40px;
               cursor: pointer;
               text-align: center;
               aspect-ratio: 728/90;
               }
               .under-navbar-add-item img {
               height: 100%;
               object-fit: cover;
               max-width: 100%;
               }
               @media screen and (min-width: 768px) {
               .under-navbar-ads {
               display: none;
               }
               .under-navbar-add-item {
               height: 20px;
               }
               }
               @media screen and (min-width: 1024px) {
               .under-navbar-add-item {
               height: 30px;
               }
               }
               @media screen and (min-width: 1280px) {
               .under-navbar-add-item {
               height: 40px;
               }
               }
            </style>
            </div> -->


            @extends('fontend.user.main')

@section('content')


<div class="featured-list">
         <!-- Desktop view -->
         <div class="featured-list__desktop">
            <h3 class="featured-list__desktop__heading">
              Quốc Gia
            </h3>
            <ul role="list" class="featured-list__desktop__list">
               @foreach ($country as $countryhome)
               <li class="featured-list__desktop__list__item">
                  <a href="" class="featured-list__desktop__list__item__image">
                  <img src="{{asset($countryhome->image ?? '')}}" alt="Việt Nam">
                  </a>
                  <a href="" class="featured-list__desktop__list__item__body">
                     <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                        <h3 class="featured-list__desktop__list__item__title">
                           {{$countryhome->name ?? ''}}
                        </h3>
                        <p class="text-gray-500 text-xs">
                          
                        </p>
                     </div>
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
         <!-- Mobile view -->
      </div>

<!-- quocos gia -->


<div class="featured-list mt-5">
         <!-- Desktop view -->
         <div class="featured-list__desktop">
            <h3 class="featured-list__desktop__heading">
               Danh Mục
            </h3>
            <ul role="list" class="featured-list__desktop__list">
               @foreach ($category as $categoryhome)
               <li class="featured-list__desktop__list__item">
                  <a href="" class="featured-list__desktop__list__item__image">
                  <img src="{{asset($categoryhome->image ?? '')}}" alt="Việt Nam">
                  </a>
                  <a href="" class="featured-list__desktop__list__item__body">
                     <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                        <h3 class="featured-list__desktop__list__item__title">
                           {{$categoryhome->name ?? ''}}
                        </h3>
                        <p class="text-gray-500 text-xs">
                         
                        </p>
                     </div>
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
         <!-- Mobile view -->
      </div>

<!-- thể loại -->
<div class="featured-list mt-5">
         <!-- Desktop view -->
         <div class="featured-list__desktop">
            <h3 class="featured-list__desktop__heading">
               Tất cả thể loại
            </h3>
            <ul role="list" class="featured-list__desktop__list">
               @foreach ($genre as $genrehome)
               <li class="featured-list__desktop__list__item">
                  <a href="" class="featured-list__desktop__list__item__image">
                  <img src="{{asset($genrehome->image ?? '')}}" alt="Việt Nam">
                  </a>
                  <a href="" class="featured-list__desktop__list__item__body">
                     <div class="flex-1 truncate pl-1 lg:pl-3 text-sm">
                        <h3 class="featured-list__desktop__list__item__title">
                           {{$genrehome->name ?? ''}}
                        </h3>
                        <p class="text-gray-500 text-xs">
                          
                        </p>
                     </div>
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
         <!-- Mobile view -->
      </div>
@endsection

<!-- qc js #2b2b2b
 
 <div id="sticky-top-ads" class="sticky-div overlay-ad">
         <!-- qh88 -->
         <div class="ads-item-wrapper">
            <img class="sticky-ads-item" loading="lazy" src="images/qq88-728x90.gif" onclick="window.open('https://123qq88.me/sextop3')">
         </div>
         <!-- mb-->
         <div class="ads-item-wrapper">
            <img class="sticky-ads-item" loading="lazy" src="images/mb66-728x90.gif" onclick="window.open('https://mb6688.me/MB66sextop1bot')">
         </div>
         <button class="close-ads-btn">Tắt Quảng Cáo</button>
      </div>
-->




