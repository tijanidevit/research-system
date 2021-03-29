<?php 
    session_start();
    if (isset($_SESSION['research_admin'])) {
        header('location: dashboard');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Museun - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="We will describe later" name="description" />
    <meta content="Xpat" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 p-5">
                                    <div class="mx-auto mb-5">
                                        <a href="./">
                                            <img src="assets/images/logo.png" alt="" height="24" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">Research System</h3>
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Welcome Back Admin!</h6>
                                    <h6 class="text-center my-4">Login</h6>

                                    <form id="loginForm" class="authentication-form">
                                        <div id="result"></div>
                                        <div class="form-group">
                                            <label class="form-control-label">Username</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input required type="text" class="form-control" name="username" id="name"
                                                placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label class="form-control-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input required type="password" name="password" class="form-control" id="password"
                                                placeholder="*********">
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                id="checkbox-signup" checked>
                                                <label class="custom-control-label" for="checkbox-signup">Remember Me
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">
                                                <span class="spinner" style="display: none;">
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                </span>
                                                <span class="btnText">
                                                    LOGIN
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar" style="background-image: url('assets/images/banner.jpg');">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                            <p class="font-size-24 font-weight-bold text-white mb-1">Welcome Back!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>
</html>
<script>
    $('#loginForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/login.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('.spinner').show();
                $('.btnText').hide();
            },
            success: function(data){

                $('.spinner').hide();
                $('.btnText').show();

                if (data == 1) {
                    location.href = 'dashboard';
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('.spinner').hide();
                }
            }
        })
    });
</script>
