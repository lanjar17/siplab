<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url("vendors/feather/feather.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("vendors/mdi/css/materialdesignicons.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("vendors/ti-icons/css/themify-icons.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("vendors/typicons/typicons.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("vendors/simple-line-icons/css/simple-line-icons.css ") ?>">
    <link rel="stylesheet" href="<?php echo base_url("vendors/css/vendor.bundle.base.css ") ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url("css/vertical-layout-light/style.css") ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?php echo base_url("img/logo/uns.png") ?>" />
</head>

<body>
    <div class="container-scroller">
        <div id="viewmodal">

        </div>
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="img/logo/ptik.png" alt="logo">
                            </div>
                            <h4>Hallo! Selamat datang</h4>
                            <h6 class="fw-light">Masuk untuk melanjutkan.</h6>
                            <?php if (session()->getFlashdata('pesan') != '') { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('pesan'); ?>
                                </div>
                            <?php } ?>
                            <form class="pt-3 validate-form" method="POST" action="/masuk">

                                <div class=" form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">Masuk</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="remember-me">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>

                                <div class="text-center mt-4 fw-light">
                                    Belum jadi member? <a href="#" id="mendaftar" onclick="signup()" class="text-primary">Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo base_url("vendors/js/vendor.bundle.base.js") ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js") ?>">
    </script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url("js/off-canvas.js") ?>"></script>
    <script src="<?php echo base_url("js/hoverable-collapse.js") ?>"></script>
    <script src="<?php echo base_url("js/template.js") ?>"></script>
    <script src="<?php echo base_url("js/settings.js") ?>"></script>
    <script src="<?php echo base_url("js/todolist.js") ?>"></script>
    <!-- endinject -->

    <!-- Modal Register -->
    <script>
        function signup() {
            $.ajax({
                url: "<?= base_url('/signup') ?>",
                dataType: "json",
                success: function(response) {
                    $('#viewmodal').html(response.data).show();
                    $('#daftarmodal').modal('show');
                }
            });

        };
    </script>

</body>

</html>