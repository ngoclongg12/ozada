<?php

session_start();
include "../connecting/connectDB.php";

if (isset($_POST["submit"])) {

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $alert = "";
        $getPass = "SELECT password, fullname, role FROM danhsach_kh WHERE username = '$username'";
        $queryPass = mysqli_query($connect, $getPass);
        $rowPass = mysqli_fetch_assoc($queryPass);

        if (mysqli_num_rows($queryPass) > 0) {

            if (password_verify($password, $rowPass["password"])) {

                $_SESSION["hoTen"] = $rowPass["fullname"];
                $_SESSION["quyen"] = $rowPass["role"];
                if($rowPass["role"] == 0){
                    header('location: ../admin/trangquantri.php');
                }
                else{
                    header('location: ../index.php');
                }
            } else {
                $alert = '<center class="btn btn-danger">Mật khẩu không chính xác !</center>';
            }
        } else {
            $alert = '<center class="btn btn-danger">Tài khoản không chính xác !</center>';
        }
    } else {
        $alert = '<center class="btn btn-danger">MờI nhập đầy đủ thông tin</center>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <?php
    include "../connecting/heading.php";
    ?>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section mt-5"><a id="TGBDS" href="../index.php">THƯƠNG MẠI ĐIỆN TỬ OZADA</a></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">Đăng nhập</h3>
                        <form action="" class="login-form" method="post">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control rounded-left" placeholder="Tài khoản" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="password" type="password" class="form-control rounded-left" placeholder="Mật khẩu" required>
                            </div>
                            <?= $alert ?? "" ?>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Lưu mật khẩu
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="Dangki.php">Bạn chưa có tài khoản ?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary rounded submit p-3 px-5">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include '../connecting/footing.php';
    ?>
</body>

</html>