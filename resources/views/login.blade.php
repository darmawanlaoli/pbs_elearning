<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Login | Peachblossoms School</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="../../assets/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="../../assets/css/style.min.css" />
    <link id="themeColors" rel="stylesheet" href="../../assets/css/mystyle.css" />

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden min-vh-100 bg" style="background-image: url('background.svg');">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8 col-lg-7">

                    </div>
                    <div class="col-xl-5 col-xxl-4 col-lg-5">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4 right-card">
                            <div class="col-sm-9 col-md-6 col-xl-9 col-lg-9">

                                <img class="mb-3 logo-login" src="../../assets/images/logos/logo.png" alt="">
                                <h2 class="fs-7 fw-bolder mb-4 text-center">E-LEARNING</h2>

                                <form action="{{url('login_action')}}" method="POST" id="logForm">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" {{old('username')}}
                                            class="form-control border <?= ($errors->has('username')) ? 'border-danger' : 'border-info'; ?>"
                                            placeholder="Username" name="username" />
                                        <label><i
                                                class="ti ti-lock me-2 fs-4 <?= ($errors->has('username')) ? 'text-danger' : 'text-info'; ?>"></i><span
                                                class="border-start <?= ($errors->has('username')) ? 'border-danger' : 'border-info'; ?> ps-3">Username</span></label>
                                        @if ($errors->has('username'))
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                        @endif
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password"
                                            class="form-control border <?= ($errors->has('password')) ? 'border-danger' : 'border-info'; ?>"
                                            placeholder="Password" name="password" />
                                        <label><i
                                                class="ti ti-lock me-2 fs-4 <?= ($errors->has('password')) ? 'text-danger' : 'text-info'; ?>"></i><span
                                                class="border-start <?= ($errors->has('password')) ? 'border-danger' : 'border-info'; ?> ps-3">Password</span></label>
                                        @if ($errors->has('password'))
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <a class="text-primary fw-medium"
                                            href="./authentication-forgot-password.html">Forgot Password ?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign
                                        In</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Import Js Files -->
    <script src=" ../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- core files -->
    <script src="../../assets/js/app.min.js"></script>
    <script src="../../assets/js/app.horizontal.init.js"></script>
    <script src="../../assets/js/app-style-switcher.js"></script>
    <script src="../../assets/js/sidebarmenu.js"></script>

    <script src="../../assets/js/custom.js"></script>
    <!-- current page js files -->
    <script src="../../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>



    <script>
        $(function() {
            <?php if (session()->has("gagal_login")) { ?>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "<?php echo session('gagal_login'); ?>",
                    footer: '<a href="#">Forgot username or password?</a>'
                });
                <?php session()->forget('gagal_login'); // Hapus data sesi setelah digunakan
                ?>
            <?php } ?>
        });
    </script>



</body>

</html>
