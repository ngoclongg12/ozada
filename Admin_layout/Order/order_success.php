<?php
ob_start();
// include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';
$stt = "Done";
$sql = "SELECT * FROM danhsach_donhang WHERE Status = '$stt' ORDER BY updated_at";
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
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <tbody>
            <tr>
                <td>
                    <a href="./trangquantri.php?Admin=order_detail&id_dh=<?= $row['id_dh'] ?>">Ozadavn00<?= $row['id_dh'] ?></a>
                </td>
                <td><?= $row['created_at'] ?></td>
                <td><?= $row['Name'] ?></td>
                <td style="overflow-x: hidden; max-width: 150px;"><?= $row['Address'] ?></td>
                <td><?= $row['Phone'] ?></td>
                <td>
                    <div class="btn btn-success">
                    Đơn hàng thành công
                    </div>
                </td>
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