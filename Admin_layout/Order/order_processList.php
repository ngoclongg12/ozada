<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

if(isset($_GET['val_id_dh'])){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d-m-Y h:i:s A");
    $id_dh = $_GET['val_id_dh'];
    $sql = "UPDATE danhsach_donhang SET Status = 'Shipping', updated_at = '$time' WHERE id_dh = '$id_dh'";
    $query = mysqli_query($connect, $sql);
}