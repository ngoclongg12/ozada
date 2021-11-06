<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php">
        <img src="../img/logo.jpg" class="logoAdmin" alt="logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <h5>Trang Quản trị</h5> -->
                <img src="../library/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block set_admin"><?= $_SESSION["hoTen"] . " ⌵ " ?></a>
                <div class="option-logout-toggle-admin">
                    <div><a href="../login/Dangxuat.php">Đăng xuất</a></div>
                    <div><a href="../login/Doimatkhau.php">Đổi mật khẩu</a></div>
                </div>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Quản lý thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=manage_main" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trang vận hành</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="../admin/trangquantri.php?Admin=order" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Đơn hàng
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Đơn hàng
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-danger right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=order" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng đang xử lý</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=order_shipping" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng đang Ship</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=order_success" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng thành công</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>

                        <p>
                            Sản phẩm
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=product_show" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=product_add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm sản phẩm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=category_show" class="nav-link" onclick="QuangCao()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=category_add" class="nav-link" onclick="QuangCao()">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm danh mục mới</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=banner" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Banner mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/trangquantri.php?Admin=banner_show" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Demo banner</p>
                            </a>
                        </li>


                    </ul>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>