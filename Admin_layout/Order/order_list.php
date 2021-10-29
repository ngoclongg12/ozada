<?php
ob_start();

$sql = "SELECT * FROM thongtin_kh_donhang ORDER BY id_tt_kh DESC";
$query = mysqli_query($connect, $sql);

?>

<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày tạo đơn</th>
            <th>Khách hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Khách phải trả</th>
        </tr>
    </thead>
    <?php
    while($row = mysqli_fetch_array($query)){
    ?>
    <tbody>
        <tr>
            <td>
                <a href="./trangquantri.php?Admin=order_detail&id_dh=<?= $row['id_tt_kh'] ?>">Ozadavn00<?= $row['id_tt_kh'] ?></a>
            </td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['Name'] ?></td>
            <td><?= $row['Address'] ?></td>
            <td><?= $row['Phone'] ?></td>
            <td><?= $row['Status'] ?></td>
            <td><?= number_format($row['Bill']) ?>đ</td>
        </tr>
    </tbody>
    <?php
    }
    ?>
</table>

<?php
$content = ob_get_clean();
?>