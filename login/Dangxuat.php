<?php
session_start();
if(isset($_SESSION["hoTen"])){
    session_destroy();
    header('location: ../login/Dangnhap.php');
}
else{
    header('location: ../login/Dangnhap.php');
}