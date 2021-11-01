<?php
ob_start();
if (isset($_GET['id_dh'])) {
    $id_dh = $_GET['id_dh'];

    $sql = "SELECT * FROM danhsach_donhang WHERE id_dh='$id_dh'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);

    $sql_Donhang = "SELECT Donhang,soluong_sp FROM danhsach_donhang WHERE id_dh='$id_dh'";
    $query_Donhang = mysqli_query($connect, $sql_Donhang);
    $row_Donhang = mysqli_fetch_assoc($query_Donhang);
    $sp_thu = explode(' ', $row_Donhang['Donhang']);

    

    $total = 0;
    $totalAll = 0;
}

?>

<table class="table table-striped mt-4">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày tạo đơn</th>
            <th>Khách hàng</th>
            <!-- <th>Địa chỉ</th> -->
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Khách phải trả</th>
        </tr>
    </thead>
    <?php
    // while () {
    ?>
    <tbody>
        <tr>
            <td>
                <b>Ozadavn00<?= $row['id_dh'] ?></b>
            </td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['Name'] ?></td>
            <!-- <td></td> -->
            <td><?= $row['Phone'] ?></td>
            <td style="color: #d00000;"><b><?= $row['Status'] ?></b></td>
            <td><?= number_format($row['Bill']) ?>đ</td>
        </tr>
    </tbody>
    <?php
    // }
    ?>
</table>

<div class="ml-3">
    <label for="">Địa chỉ:</label>
    <?= $row['Address'] ?>
</div>

<table class="table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Sản phẩm đặt mua</th>
            <th scope="col">Giá thành</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
            <!-- <th scope="col"></th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < $row_Donhang['soluong_sp']; $i++) {

            $id_sp = rtrim($sp_thu[$i], strstr($sp_thu[$i], '/'));
            echo "\n";
            $soluong_sp = ltrim(strstr($sp_thu[$i], '/'), '/');
            echo "\n";
            $sql_get_sp = "SELECT * FROM danhsach_sp WHERE ID = '$id_sp'";
            $query_get_sp = mysqli_query($connect, $sql_get_sp);
            $row_get_sp = mysqli_fetch_array($query_get_sp);
            $total = $soluong_sp * $row_get_sp['Price'];
            $totalAll += $total;
        ?>
            <tr>
                <td scope="row">
                    <img class="admin_img_mota" src="../img/<?= $row_get_sp['Image'] ?>" alt="product">
                    <div class="namePrd"><?= $row_get_sp['Name'] ?></div>
                </td>
                <td><?= number_format($row_get_sp['Price']) ?>đ</td>
                <td data-th="Quantity">
                    <?= $soluong_sp ?>
                </td>
                <td><span class="ketqua"><?= number_format($total) ?>đ</span></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <b class="price">
                    Tổng tiền: <?= number_format($totalAll) ?>đ
                </b>
            </td>
        </tr>
    </tbody>
</table>

<?php
$content = ob_get_clean();
?>