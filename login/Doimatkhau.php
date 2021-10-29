<?php
include_once "../connecting/connectBD.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pw_new1 = $_POST["pw_new1"];
    $pw_new2 = $_POST["pw_new2"];
    $alert = "";
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["pw_new1"]) && isset($_POST["pw_new2"])) {

        if ($pw_new1 === $pw_new2) {
            $getPass = "SELECT password FROM danhsach_kh WHERE username = '$username' ";
            $queryGetPass = mysqli_query($connect, $getPass);
            $rowGetPass = mysqli_fetch_assoc($queryGetPass);

            if (mysqli_num_rows($queryGetPass) > 0) {

                if (password_verify($password, $rowGetPass["password"])) {

                    $pw_newHash = password_hash($pw_new1, PASSWORD_DEFAULT);
                    $setPass = "UPDATE danhsach_kh SET password = '$pw_newHash'";
                    $querySetPass = mysqli_query($connect, $setPass);
                    $alert = '<center class="btn btn-success">Đổi mật khẩu thành công !</center>';

                } else {
                    $alert = '<center class="btn btn-danger">Mật khẩu cũ không chính xác !</center>';
                }
            } else {
                $alert = '<center class="btn btn-danger">Tài khoản không chính xác !</center>';
            }
        } else {
            $alert = '<center class="btn btn-danger">Mật khẩu nhập lại không khớp !</center>';
        }
    } else {
        $alert = '<center class="btn btn-danger">Thông tin không được bỏ trống !</center>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <?php
    include_once "../connecting/heading.php";
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

                        <h3 class="text-center mb-4">Đổi mật khẩu</h3>
                        <form action="" class="login-form" method="post">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control rounded-left" placeholder="Tài khoản" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="password" type="password" class="form-control rounded-left" placeholder="Mật khẩu cũ" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="pw_new1" type="password" class="form-control rounded-left" placeholder="Mật khẩu mới" required>
                            </div>
                            <div class="form-group d-flex">
                                <input name="pw_new2" type="password" class="form-control rounded-left" placeholder="Nhập lại mật khẩu" required>
                            </div>
                            <?= $alert ?? '' ?>
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
                                <button name="submit" type="submit" class="btn btn-primary rounded submit p-3 px-5">Thực hiện</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once "../connecting/footing.php";
    ?>
</body>

</html>