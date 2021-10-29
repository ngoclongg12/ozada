<?php
session_start();
if (isset($_GET['id']) && isset($_GET['qty'])) {

    $ID = $_GET['id'];
    $countNum = $_GET['qty'];
    if($countNum == 0){
        unset($_SESSION['giohang'][$ID]);
    }
    else{

        $_SESSION['giohang'][$ID]['Count'] = $countNum;
        // foreach()
    }
    echo json_encode(true);
    // $price = $_SESSION['giohang'][$ID]['Price'];
    // echo (number_format($total));
}
// $ID = $_GET['ID'];
// $countNum = $_GET['countNum'];

// // $total =  $countNum * $v['Price'];
// // $totalAll += $total;

