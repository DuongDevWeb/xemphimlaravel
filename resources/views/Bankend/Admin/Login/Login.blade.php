
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Heo Phim -  Admin Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <link rel="shortcut icon" href="/teamplate/admin/assets/images/favicon.ico">

<!-- Theme Config Js -->
<script src="/teamplate/admin/js/config.js"></script>
<link href="/teamplate/admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style">
<link href="/teamplate/admin/css/icons.min.css" rel="stylesheet" type="text/css">

    
</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="assets/images/logo-dark.png" alt="" height="22" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4">Đăng Nhập</p>

                    </div>
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form action="{{route('loginHome')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('bankend.admin.alter')
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" 
                                        placeholder="Enter your email" name="email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password"  id="password"
                                        placeholder="Enter your password" name="password">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                  
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor -->
 
<script src="/teamplate/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="/teamplate/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/teamplate/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/teamplate/admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="/teamplate/admin/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="/teamplate/admin/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="/teamplate/admin/assets/libs/feather-icons/feather.min.js"></script>
</body>

</html>