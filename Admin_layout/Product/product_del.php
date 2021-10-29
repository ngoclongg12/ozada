<?php

include $_SERVER["DOCUMENT_ROOT"] . "/Ozada/connecting/connectDB.php";

$id_sp = $_GET["id_sp"];

$sql = "DELETE FROM danhsach_sp WHERE ID='$id_sp'";
$query = mysqli_query($connect, $sql);

header('location: ../../admin/trangquantri.php?Admin=product_show');

?>

