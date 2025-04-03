
@include('fontend.user.head')
<body>
   <!-- mneu điện tho -->
   @include('fontend.movie.menu')
   @include('fontend.movie.menumt')
   <!-- đường dẫn  -->
   @include('fontend.movie.duongdan')
  @yield('content')

   @include('fontend.user.footer')
</body>
</html>