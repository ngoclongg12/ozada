<?php
ob_start();
if(isset($_GET['id_dh'])){
    $id_dh = $_GET['id_dh'];
    $sql = "SELECT danhsach_donhang.id_dh, thongtin_kh_donhang.* 
    FROM danhsach_donhang 
    INNER JOIN thongtin_kh_donhang ON danhsach_donhang.id_tt_kh=thongtin_kh_donhang.id_tt_kh;";
    $query = mysqli_query($connect, $sql);
}

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
                <a href="">Ozadavn00<?= $row['id_dh'] ?></a>
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