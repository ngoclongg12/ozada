<?php
include_once "../connecting/connectDB.php";
if (isset($_POST["submit"])) {
    $alert = "";

    if (isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["sdt"]) && isset($_POST["address"]) && isset($_POST["birthday"]) && isset($_POST["sex"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sdt = $_POST["sdt"];
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $birthday = $_POST["birthday"];
        $sex = $_POST["sex"];
        $getUser = "SELECT username FROM danhsach_kh WHERE username = '$username'";
        if (isset($_POST["accept"])) {

            if (mysqli_num_rows(mysqli_query($connect, $getUser)) > 0) {
                $alert = '<center class="btn btn-danger">Tài khoản đã tồn tại !</center>';
            } else {
                $pw_hash = password_hash($password, PASSWORD_DEFAULT);
                $update = "INSERT INTO danhsach_kh (username, password, role, phone, address, fullname, birthday, sex) 
                VALUES ('$username', '$pw_hash', '1', '$sdt', '$address', '$fullname', '$birthday', '$sex')";
                $query = mysqli_query($connect, $update);
                header('location: ../login/Dangnhap.php');
            }
        } else {
            $alert = '<center class="btn btn-danger col-sm-12">Vui lòng xác nhận !</center>';
        }
    } else {
        $alert = '<center class="btn btn-danger col-sm-12">Vui lòng nhập đủ thông tin !</center>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Ozada/connecting/heading.php";
    ?>
</head>

<body>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-3">
                    <h2 class="heading-section mt-5"><a id="TGBDS" href="../index.php">THƯƠNG MẠI ĐIỆN TỬ OZADA</a></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>

                        <h3 class="text-center mb-4">Đăng kí</h3>

                        <form class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="fullname" type="text" id="firstName" placeholder="Họ tên quý khách" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="username" type="text" id="email" placeholder="Tài Khoản" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="password" type="password" id="password" placeholder="Mật khẩu" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="sdt" type="text" id="sdt" placeholder="Số điện thoại" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input name="birthday" type="date" id="birthDate" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select name="address" id="country" class="form-control">
                                        <option>Việt Nam</option>
                                        <option>Afghanistan</option>
                                        <option>Bahamas</option>
                                        <option>Cambodia</option>
                                        <option>Denmark</option>
                                        <option>Ecuador</option>
                                        <option>Gabon</option>
                                        <option>Haiti</option>
                                    </select>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <label class="control-label col-sm-6">Giới tính</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="radio-inline">
                                                <input name="sex" type="radio" id="femaleRadio" value="Nam">Nam
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="radio-inline">
                                                <input name="sex" type="radio" id="maleRadio" value="Nu">Nữ
                                            </label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="radio-inline">
                                                <input name="sex" type="radio" id="uncknownRadio" value="Unknown">Khác
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <?= $alert ?? '' ?>
                                <div class="col-sm-12 col-sm-offset-3">
                                    <div class="checkbox">
                                        <label>
                                            <input name="accept" type="checkbox"> Tôi chấp nhận các điều khoản. <a href="#">terms</a>
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- /.form-group -->

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <button name="submit" type="submit" class="btn btn-primary btn-block">Đăng kí</button>
                                </div>
                            </div>
                        </form> <!-- /form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/Ozada/connecting/footing.php";
    ?>
</body>

</html>