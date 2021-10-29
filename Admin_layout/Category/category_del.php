<?php

include $_SERVER["DOCUMENT_ROOT"] . "/TheGioiBDS/connecting/Ketnoi.php";

$id_dm = $_GET["id_dm"];

$sql = "DELETE FROM danhsach_dm WHERE ID='$id_dm'";
$query = mysqli_query($connect, $sql);

header('location: http://localhost/TheGioiBDS/public/TrangQuanTri.php?Admin=category_show');

?>

