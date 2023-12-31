<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Member Dashboard </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href=<?php echo base_url('vendors/feather/feather.css') ?>>
    <link rel="stylesheet" href=<?php echo base_url("vendors/mdi/css/materialdesignicons.min.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("vendors/ti-icons/css/themify-icons.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("vendors/typicons/typicons.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("vendors/simple-line-icons/css/simple-line-icons.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("vendors/css/vendor.bundle.base.css") ?>>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=<?php echo base_url("vendors/datatables.net-bs4/dataTables.bootstrap4.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("js/select.dataTables.min.css") ?>>
    <!-- End plugin css for this page -->

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- inject:css -->
    <link rel="stylesheet" href=<?php echo base_url("css/vertical-layout-light/style.css") ?>>
    <!-- endinject -->
    <link rel="shortcut icon" href=<?php echo base_url("img/logo/uns.png") ?>>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- container-scroller -->

    <?php echo $this->include('member/layout/navbar'); ?>

    <?php echo $this->include('member/layout/navigation'); ?>
    <?php echo $this->renderSection('container'); ?>
    <?php echo $this->include('member/layout/footer'); ?>
    <!-- plugins:js -->
    <script src=<?php echo base_url("vendors/js/vendor.bundle.base.js") ?>></script>
    </script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src=<?php echo base_url("vendors/chart.js/Chart.min.js") ?>></script>
    <script src=<?php echo base_url("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js") ?>></script>
    <script src=<?php echo base_url("vendors/progressbar.js/progressbar.min.js") ?>></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src=<?php echo base_url("js/off-canvas.js") ?>></script>
    <script src=<?php echo base_url("js/hoverable-collapse.js") ?>></script>
    <script src=<?php echo base_url("js/template.js") ?>></script>
    <script src=<?php echo base_url("js/settings.js") ?>></script>
    <script src=<?php echo base_url("js/todolist.js") ?>></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src=<?php echo base_url("js/dashboard.js") ?>></script>
    <script src=<?php echo base_url("js/Chart.roundedBarCharts.js") ?>></script>
    <!-- End custom js for this page-->
</body>

</html>