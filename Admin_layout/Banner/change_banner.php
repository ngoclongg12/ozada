<?php
ob_start();
if (isset($_POST['submit'])) {
    if (isset($_FILES['banner_upload'])) {
        $img = $_FILES['banner_upload']['name'];
        $tmp = $_FILES['banner_upload']['tmp_name'];
        move_uploaded_file($tmp, '../img/' . $img);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date('d-m-Y h:i:s A');

        $sql_set = "INSERT INTO danhsach_banner(file_upload, created_at) VALUES('$img', '$time')";
        mysqli_query($connect, $sql_set);
        header('location: ../admin/trangquantri.php?Admin=banner_show');
    }
}
?>
<h4 class="text-aligncenter mt-5 mb-3">Thay thế Banner</h4>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">

        <input name="banner_upload" type="file" class="dropify">
        <div class="text-aligncenter mt-3">
            <input name="submit" type="submit" class="btn btn-info" value="Xác nhận">
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
?>