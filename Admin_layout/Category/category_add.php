<?php
ob_start();
?>

<?php
if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $alert = "";

    if (isset($name)) {

        $sql = "INSERT INTO danhsach_dm (Name) VALUES ('$name')";
        $query = mysqli_query($connect, $sql);
        $alert = '<center class="alert alert-success mt-3 add-sp">Thêm mới thành công !</center>';
    } else {
        $alert = '<center class="alert alert-danger mt-3">Mời điền đủ thông tin !</center>';
    }
}
?>

<h4 class="text-aligncenter mt-3">Thêm danh mục mới</h4>

<?= $alert ?? "" ?>

<form id="quickForm" novalidate="novalidate" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>

    </div>

    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary">Thêm danh mục</button>
    </div>
</form>

<?php
$content = ob_get_clean();
?>