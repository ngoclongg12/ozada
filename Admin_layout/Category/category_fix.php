<?php
ob_start();

$id_dm = $_GET['id_dm'];
$getInf = "SELECT * FROM danhsach_dm WHERE ID='$id_dm'";
$row = mysqli_fetch_array(mysqli_query($connect, $getInf));


if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $alert = "";

    if (isset($_POST["accept"])) {

        if (isset($name)) {

            $sql = "UPDATE danhsach_sp SET Name = '$name' WHERE ID = '$id_dm'";
            $query = mysqli_query($connect, $sql);
            $alert = '<center class="alert alert-success mt-3 add-sp">Cập nhật thành công !</center>';
        } else {
            $alert = '<center class="alert alert-danger mt-3">Mời điền đủ thông tin !</center>';
        }
    } else {
        $alert = '<center class="alert alert-danger mt-3">Mời xác nhận trước khi cập nhật !</center>';
    }
}
?>

<h4 class="text-aligncenter mt-3">Cập nhật sản phẩm</h4>

<?= $alert ?? "" ?>

<form id="quickForm" novalidate="novalidate" method="post"  enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $row["Name"] ?>" required>
        </div>
        <div class="form-group mb-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="accept" class="custom-control-input" id="exampleCheck1" required>
                <label class="custom-control-label" for="exampleCheck1">Tôi xác nhận chính xác thông tin sản phẩm <a href="#">terms of service</a>.</label>
            </div>
        </div>
    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
    </div>
</form>

<?php
$content = ob_get_clean();
?>