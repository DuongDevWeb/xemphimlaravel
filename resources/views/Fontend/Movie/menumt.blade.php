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