<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css_admin/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../css_admin/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../css_admin/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../css_admin/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css_admin/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../css_admin/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../css_admin/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../css_admin/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class=" flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="bi bi-houses-fill"></i></a>

                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="adminController.php" class="nav-link">Trang Chủ</a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->




                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="adminController.php" class="brand-link">
                <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">Tân Thoại Store Manager</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info">

                        <a href="#" class="d-block">Xin chào <?php echo  $_SESSION['accountuser']['firstname'] . " " . $_SESSION['accountuser']['lastname'] ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="adminController.php" class="nav-link ">
                                <i class="bi bi-houses-fill"></i>
                                <p>
                                    Trang Chủ
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-list"></i>
                                <p>
                                    Sản phẩm <i class="bi bi-arrow-left-square right"></i>
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexProductGET" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="adminController.php?controller=createProductGET" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-list"></i>
                                <p>
                                    Nhà sản xuất <i class="bi bi-arrow-left-square right"></i>
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexProducerGET" class="nav-link">
                                    <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách nhà sản xuất</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexLSPGET" class="nav-link">
                                    <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách loại sản phẩm</p>
                                    </a>
                                </li>
                            </ul>    
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-list"></i>
                                <p>
                                    Nhân viên giao hàng
                                    <i class="bi bi-arrow-left-square right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexNvghGET" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách nhân viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-list"></i>
                                <p>
                                    Giao Hàng
                                    <i class="bi bi-arrow-left-square right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexGiaoHangGET" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách giao hàng</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=indexNvghGET" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Giao hàng chờ duyệt</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-list"></i>
                                <p>
                                    Quản lý hóa đơn
                                    <i class="bi bi-arrow-left-square right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="adminController.php?controller=billindex" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Danh sách hóa đơn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="adminController.php?controller=billwait" class="nav-link">
                                        <i class="bi bi-cloud-plus-fill"></i>
                                        <p>Hóa đơn chờ duyệt</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item ">
                            <a href="userController.php?controller=logout" class="nav-link ">

                                <p>
                                    Đăng xuất

                                </p>
                            </a>

                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>