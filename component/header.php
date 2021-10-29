<header>
    <!-- header1 -->
    <div class="container header1">
        <div class="barh1"><i class="fas fa-bars pr-3"></i></div>
        <div class="divbtnService">
            <button class="btn btn-light btnService"><a href="#"></a>Mua sắm tiêu dùng</button>
            <button class="btn btn-light btnService">Thương mại xuất nhập khẩu</button>
            <button class="btn btn-light btnService">Nhà sản xuất</button>
        </div>
    </div>

    <!-- header2 -->
    <div class="container header2">
        <div class="row">
            <div class="col-md-3">
                <a href="./index.php"><img class="logoHeader mt-2" src="./img/logo.png" alt="logo"></a>
            </div>
            <form class="col-md-5 input-group mb-4 border rounded-pill filter mt-4" method="get">
                <input name="search" type="search" placeholder="searching..." class="form-control bg-none border-0">
                <input type="hidden" name="component" value="filter">
                <div class="input-group-append border-0">
                    <button id="button-addon3" type="submit" class="btn btn-link text-info"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <div class="col-md-2 login cursorPointer">
                <div>
                    <i class="fas fa-user-circle logoUser"></i>
                </div>
                <?php
                if (isset($_SESSION['hoTen'])) {
                ?>
                    <div class="accUser User">
                        Hi, <?= $_SESSION['hoTen'] ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="infoUser">
                        <a class="User" href="<?= $config['hostname'] ?>login/Dangnhap.php">Đăng nhập</a>
                    </div>
                <?php
                }
                ?>
                <div class="loginHide Hide">
                    <div>
                        <a href="<?= $config['hostname'] ?>login/Dangki.php">Đăng ký</a>
                    </div>
                    <div>
                        <a href="<?= $config['hostname'] ?>login/Doimatkhau.php">Đổi mật khẩu</a>
                    </div>
                </div>
                <div class="opAccHide Hide">
                    <?php
                    if (isset($_SESSION["quyen"]) && $_SESSION["quyen"] == "0" ) {
                    ?>
                        <div>
                            <a href="<?= $config['hostname'] ?>admin/trangquantri.php">Trang quản trị</a>
                        </div>
                    <?php
                    }
                    ?>
                    <div>
                        <a href="<?= $config['hostname'] ?>login/Doimatkhau.php">Đổi mật khẩu</a>
                    </div>
                    <div>
                        <a href="<?= $config['hostname'] ?>login/Dangxuat.php">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 moreCart">
                <div class="message cursorPointer">
                    <i class="fas fa-comments"></i> Tin nhắn
                </div>
                <div class="addCart cursorPointer">
                    <a href="./index.php?component=cart">
                        <i class="fad fa-shopping-cart"></i> Giỏ hàng
                        <?php
                        if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                        ?>
                            <span><?= count($_SESSION['giohang']) ?></span>
                        <?php
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- header3 -->
    <div class="container header3 mt-2">
        <div class="row">
            <nav class="col-md-11">
                <a class="transport">Sẵn sàng chuyển hàng▾</a>
                <div class="transportToggle">
                    <div>
                        <a href="#">Ship Hà Nội</a>
                    </div>
                    <div>
                        <a href="#">Ship TP.HCM</a>
                    </div>
                    <div>
                        <a href="#">Ship tỉnh miền băc, trung, nam</a>
                    </div>
                </div>
                <a href="#">Triển lãm thương mại</a>
                <a href="#">Thiết bị bảo vệ cá nhân</a>
                <a href="#">Trung tâm người mua </a>
                <a href="#">Bán trên LOGO </a>
            </nav>
            <div class="col-md-1 ">
                <div class="box-lang">
                    <img class="set-lang" src="./img/vn-Lang.png" alt="language"> ▾
                </div>
                <div class="get-lang">
                    <div class="useLang"><a href="#">Eng</a></div>
                    <div class="useLang"><a href="#">Cn</a></div>
                    <div class="useLang"><a href="#">Fra</a></div>
                    <div class="useLang"><a href="#">Jap</a></div>
                </div>
            </div>
        </div>

    </div>
</header>