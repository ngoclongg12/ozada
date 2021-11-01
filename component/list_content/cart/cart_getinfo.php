<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

if (isset($_GET['Name']) && isset($_GET['Address']) && isset($_GET['Phone'])) {

    $tenKH = $_GET['Name'];
    $diachiKH = $_GET['Address'];
    $sdtKH = $_GET['Phone'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $time = date("d-m-Y h:i:s A");
    // echo $time;
    $x = 0;
    $bill = 0;
    $sp_dh = "";
    foreach ($_SESSION['giohang'] as $k => $v) {
        $x += 1;
        $total = $v['Count'] * $v['Price'];
        $bill += $total;
        $sp_dh .= $v['ID']."/".$v['Count']." ";

    }

    $sql_tt = "INSERT INTO danhsach_donhang(Name,Address,Phone,bill,created_at,Donhang,soluong_sp,Status) VALUES('$tenKH','$diachiKH','$sdtKH','$bill','$time','$sp_dh','$x','Đang xử lý')";
    $query_tt = mysqli_query($connect, $sql_tt);

    unset($_SESSION['giohang']);

}
// header('location: ./index.php?component=cart_success');
