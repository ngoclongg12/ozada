<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "ozada";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

if($connect){
    $setLanguage = mysqli_set_charset($connect, 'UTF8');
}
else{
    die("Kết nối lỗi".mysqli_connect_error());
}