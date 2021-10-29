<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

if (isset($_GET['t']) && $_GET['t'] == "del") {

    unset($_SESSION['giohang'][$_GET['id_sp']]);
}
if (isset($_GET['t']) && $_GET['t'] == "add") {
    if (isset($_GET['id_sp'])) {
        $get_id_sp = $_GET['id_sp'];
        $count = 1;
        $sql = "SELECT * FROM danhsach_sp WHERE ID = '$get_id_sp' ";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($query);
        
        if (isset($_SESSION['giohang']) && array_key_exists($get_id_sp, $_SESSION['giohang'])) {
            $_SESSION['giohang'][$get_id_sp] = array(
                'ID' => $row['ID'],
                'Name' => $row['Name'],
                'Count' => (int)$_SESSION['giohang'][$get_id_sp]['Count'] + 1,
                'Price' => (int)$row['Price'],
                'Image' => $row['Image'],
            );
        } else {
            $_SESSION['giohang'][$get_id_sp] = array(
                'ID' => $row['ID'],
                'Name' => $row['Name'],
                'Count' => (int)$count,
                'Price' => (int)$row['Price'],
                'Image' => $row['Image'],
            );
        }

    }
}


header('location: ../../../index.php?component=cart');