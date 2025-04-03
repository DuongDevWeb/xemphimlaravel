
<!DOCTYPE html><head>
  @include('bankend.admin.head')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid ps-0">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                  
                                 

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="images/user-2.jpg" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="images/user-5.jpg" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="notification-list d-none d-lg-block">
                        <a href="javascript:void(0);" class="nav-link waves-effect waves-light" id="light-dark-mode" type="button">
                            <i class="fe-sun noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                   
                    <li class="dropdown notification-list topbar-dropdown">
                      
                      
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-sm">
                            <img src="images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="images/logo-light.png" alt="" height="16">
                        </span>
                    </a>
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="images/logo-dark.png" alt="" height="16">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                    <li class="">
                        <button class="button-menu-mobile waves-effect">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li class="d-none d-lg-flex">
                        <h4 class="page-title-main">Thống Kê</h4>
                    </li>

                </ul>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100" data-simplebar="">

                 <!-- User box -->
                <div class="user-box text-center">

                    <img src="https://media.viez.vn/prod/2022/9/23/large_lo_lem_9_5863_a3bbef0412.jpeg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                        <div class="dropdown">
                            <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- xin người quản trị -->

                            </a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock me-1"></i>
                                    <span>Lock Screen</span>
                                </a>
        
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>
        
                            </div>
                        </div>

                        <p class="text-muted left-user-info">{{ $user->name ?? 'Admin Head' }}</p>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted left-user-info">
                                <i class="mdi mdi-cog"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a href="#">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Tổng Quát Menu</li>
                
                        <li>
                            <a href="{{route('dashboard')}}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="badge bg-success rounded-pill float-end">9+</span>
                                <span> Thống Kê </span>
                            </a>
                        </li>

                        <li class="menu-title mt-2">Chức Năng</li>

                        <li>
                            <a href="#email" data-bs-toggle="collapse">
                                <i class="mdi mdi-email-outline"></i>
                                <span> Danh Mục </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="email">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('category.create')}}">Thêm Danh Mục</a>
                                    </li>
                                    <li>
                                        <a href="{{route('category.index')}}">Danh Sách Danh Mục</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarTasks" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-outline"></i>
                                <span> Quốc Gia </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('country.create')}}">Thêm Quốc Gia</a>
                                    </li>
                                    <li>
                                        <a href="{{route('country.index')}}">Danh Sách Quốc Gia</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                       

                        <li>
                            <a href="#contacts" data-bs-toggle="collapse">
                                <i class="mdi mdi-book-open-page-variant-outline"></i>
                                <span> Thể Loại </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="contacts">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('genre.create')}}">Thêm Thể Loại</a>
                                    </li>
                                    <li>
                                        <a href="{{route('genre.index')}}">Danh Sách Thể Loại</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Phim & Server</li>

                        <li>
                            <a href="#sidebarAuth" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-plus-outline"></i>
                                <span>Server </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('server.create')}}">Thêm Server</a>
                                    </li>
                                    <li>
                                        <a href="{{route('server.index')}}">Danh Sách Server</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="#sidebarExpages" data-bs-toggle="collapse">
                                <i class="mdi mdi-file-multiple-outline"></i>
                                <span> Phim </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExpages">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('movie.create')}}">Thêm Phim</a>
                                    </li>
                                    <li>
                                        <a href="{{route('movie.index')}}">Danh Sách Phim</a>
                                    </li>

                                    <li>
                                        <a href="{{route('leechMovie')}}">Phim Api</a>
                                    </li>
                              
                                 </ul>
                            </div>
                        </li>

                    

                        <li class="menu-title mt-2">Báo Lỗi & Quảng Cáo</li>

                        <li>
                          
                        </li>

                       

                  

                        <li>
                            <a href="#sidebarMaps" data-bs-toggle="collapse">
                                <i class="mdi mdi-map-outline"></i>
                                <span> Quản Cáo </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="maps-google.html">Vị Trí Quảng Cáo</a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">Lượt Xem Web</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                       
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
           
            @yield('content')   

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>2025 © Adminto theme by <a href="https://coderthemes.com/" target="_blank">Coderthemes</a> 
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="offcanvas offcanvas-end right-bar" tabindex="-1" id="theme-settings-offcanvas">
        <div data-simplebar="" class="h-100">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>

            <!-- Tab panes -->
            <div class="tab-content pt-0">

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, Layout, etc.
                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-bs-theme" value="light" id="light-mode-check">
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-bs-theme" value="dark" id="dark-mode-check">
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                        <!-- Width -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-layout-width" value="fluid" id="fluid">
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-layout-width" value="boxed" id="boxed">
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>

                        <!-- Menu positions -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-leftbar-position" value="fixed" id="fixed-check">
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-leftbar-position" value="scrollable" id="scrollable-check">
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <div id="leftSidebar-color">
                            <!-- Left Sidebar-->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-color" value="light" id="light">
                                <label class="form-check-label" for="light-check">Light</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-color" value="dark" id="dark">
                                <label class="form-check-label" for="dark-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-color" value="brand" id="brand">
                                <label class="form-check-label" for="brand-check">Brand</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-color" value="gradient" id="gradient">
                                <label class="form-check-label" for="gradient-check">Gradient</label>
                            </div>
                        </div>

                        <div id="leftSidebar-size">

                            <!-- size -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-size" value="default" id="default-size-check">
                                <label class="form-check-label" for="default-size-check">Default</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-size" value="condensed" id="condensed-check">
                                <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                        size)</small></label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-size" value="compact" id="compact-check">
                                <label class="form-check-label" for="compact-check">Compact <small>(Small
                                        size)</small></label>
                            </div>


                            <!-- User info -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="data-leftbar-user" value="true" id="sidebaruser-check">
                                <label class="form-check-label" for="sidebaruser-check">Enable</label>
                            </div>
                        </div>


                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-topbar-color" value="dark" id="darktopbar-check">
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="data-topbar-color" value="light" id="lighttopbar-check">
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="reset-layout">Reset to Default</button>
                            <a href="https://1.envato.market/adminto-admin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor -->
    @include('bankend.admin.footer')    

</body></html>