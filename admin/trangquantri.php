<?php

session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

if (!$_SESSION["hoTen"]) {
    header("location: ../login/Dangnhap.php");
}

if ($_SESSION["quyen"] == 1) {
    header("location: ../index.php");
}

$content = "";
// echo $content;
if (isset($_GET['Admin'])) {
    switch ($_GET['Admin']) {

        case "manage_main":
            include_once '../Admin_layout/manage_main.php';
            break;

        case "banner":
            include_once '../Admin_layout/Banner/change_banner.php';
            break;

        case "banner_show":
            include_once '../Admin_layout/Banner/Banner_show.php';
            break;

        case "order":
            include_once '../Admin_layout/Order/order_list.php';
            break;

        case "order_shipping":
            include_once '../Admin_layout/Order/order_shipping.php';
            break;

        case "order_success":
            include_once '../Admin_layout/Order/order_success.php';
            break;

        case "order_detail":
            include_once '../Admin_layout/Order/order_detail.php';
            break;

        case "product_add":
            include_once "../Admin_layout/Product/product_add.php";
            break;

        case "product_show":
            include_once "../Admin_layout/Product/product_show.php";
            break;

        case "product_fix":
            include_once "../Admin_layout/Product/product_fix.php";
            break;

        case "category_show":
            include_once "../Admin_layout/Category/category_show.php";
            break;

        case "category_add":
            include_once "../Admin_layout/Category/category_add.php";
            break;

        case "category_fix":
            include_once "../Admin_layout/Category/category_fix.php";
            break;



            // case "product_del":
            //     include_once "../Admin_layout/Product/product_del.php";
            //     break;
    }
} else {
    include_once '../Admin_layout/manage_main.php';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Quản trị</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../library/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../library/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../library/dist/css/adminlte.min.css">

    <?php
    include_once "../connecting/heading.php"
    ?>
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="../img/logo.png" alt="AdminLTELogo" height="70" width="80">
        </div>

        <!-- Navbar -->
        <?php
        include_once "../Admin_layout/Admin_navbar/Navbar.php";
        ?>

        <!-- Main Sidebar Container -->
        <?php
        include_once "../Admin_layout/Admin_navbar/Sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0">Người vận hành: <?= $_SESSION['hoTen'] ?>,</h5>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php">Ozada</a></li>
                                <li class="breadcrumb-item active">Trang quản trị</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php
            echo $content;
            ?>

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-light">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 </strong>
            Bản quyền thuộc về <b><a href="../index.php">Ozada</a>.</b>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../library/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../library/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../library/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../library/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../library/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../library/plugins/raphael/raphael.min.js"></script>
    <script src="../library/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../library/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../library/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../library/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../library/dist/js/pages/dashboard2.js"></script>

    <?php
    include_once "../connecting/footing.php"
    ?>
</body>

</html>