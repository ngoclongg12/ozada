<?php
ob_start();

$id_sp = $_GET['id_sp'];
$getInf = "SELECT * FROM danhsach_sp WHERE ID='$id_sp'";
$row = mysqli_fetch_array(mysqli_query($connect, $getInf));

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = $_POST["status"];
    $price = $_POST["price"];
    $top = $_POST["top"];
    $alert = "";

    if (isset($_POST["accept"])) {
        $imgName = $_FILES['img_up']['name'];
        $imgPath = $_FILES['img_up']['tmp_name'];
        // echo $imgPath;

        if (isset($name) && isset($status) && isset($price)) {
            if(($_FILES['img_up']['name']) == ''){
                $sql = "UPDATE danhsach_sp SET Name = '$name', Status = '$status', Price = '$price', Top = '$top' WHERE ID = '$id_sp'";
            }
            else{
                move_uploaded_file($imgPath, '../img/' . $imgName);
                $sql = "UPDATE danhsach_sp SET Name = '$name', Status = '$status', Price = '$price', Image = '$imgName', Top = '$top' WHERE ID = '$id_sp'";
            }
            $query = mysqli_query($connect, $sql);
            // $alert = '<center class="alert alert-success mt-3 add-sp">Cập nhật thành công !</center>';
            header("location: ../admin/trangquantri.php?Admin=product_show");
        } else {
            $alert = '<center class="alert alert-danger mt-3">Mời điền đủ thông tin sản phẩm !</center>';
        }
    } else {
        $alert = '<center class="alert alert-danger mt-3">Mời xác nhận trước khi cập nhật !</center>';
    }
}
?>

<h4 class="text-aligncenter mt-3">Cập nhật sản phẩm</h4>

<?= $alert ?? "" ?>

<form id="quickForm" novalidate="novalidate" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $row["Name"] ?>" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" name="status" class="form-control" id="exampleInputPassword1" value="<?= $row["Status"] ?>" required>
        </div>
        <div class="form-group">
            <label>Giá thành sản phẩm</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" value="<?= $row["Price"] ?>" ` required>
        </div>
        <div class="form-group">
            <label>Top sản phẩm :</label>
            <select name="top" id="">
                <option value="0" class="active">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

        </div>
        <div class="form-group mb-4">
            <label>Ảnh mô tả: </label>
            <input type="file" class="dropify" name="img_up" data-default-file="../img/<?= $row['Image'] ?>"/>
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
        <button type="submit" name="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </div>
</form>

<?php
$content = ob_get_clean();
?>