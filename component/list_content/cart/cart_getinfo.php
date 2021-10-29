<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

if (isset($_GET['Name']) && isset($_GET['Address']) && isset($_GET['Phone'])) {

    $tenKH = $_GET['Name'];
    $diachiKH = $_GET['Address'];
    $sdtKH = $_GET['Phone'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("Y-m-d h:i:s A");

    foreach ($_SESSION['giohang'] as $k => $v) {

        $total = $v['Count'] * $v['Price'];
        $bill += $total;
        $tenSp = $v['Name'];
        $img_sp_dh = $v['Image'];
        $count_sp_dh = $v['Count'];
        // $id_dh = $v['ID'];
        // echo json_encode($k);

        $sql_sp = "INSERT INTO sanpham_donhang(Name_sp_dh,Count_sp_dh,Price_total_sp_dh,img_sp_dh) VALUES('$tenSp','$count_sp_dh','$total','$img_sp_dh')";
        $query_sp = mysqli_query($connect,$sql_sp);
    }

    $sql_tt = "INSERT INTO thongtin_kh_donhang(Name,Address,Phone,bill,created_at) VALUES('$tenKH','$diachiKH','$sdtKH','$bill','$time')";
    $query_tt = mysqli_query($connect, $sql_tt);

    $sql_dh = "INSERT INTO danhsach_donhang(Name,Address,Phone,bill,created_at) VALUES()";
    $query_dh = mysqli_query($connect,$sql_dh);

    unset($_SESSION['giohang']);
}
