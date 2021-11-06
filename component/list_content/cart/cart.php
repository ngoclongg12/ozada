<?php

$total = 0;
$totalAll = 0;


?>

<div class="container mt-4">
    <div class="row" style="background-color: rgb(170, 224, 248);">
        <h4 class="text-aligncenter" style="line-height: 40px; padding-left: 15px">GIỎ HÀNG OZADA </h4>

    </div>
    <form class="form_tb_cart" method="get">

        <table class="table table-hover mt-2 tb_cart">
            <thead>
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá thành</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {

                    foreach ($_SESSION['giohang'] as $k => $v) {
                        $total = $v['Count'] * $v['Price'];
                        // while($_SESSION['giohang'][$_GET['id_sp']] = array()){
                        $totalAll += $total;
                ?>
                        <input type="hidden" name="component" value="bill">
                        <tr>
                            <th scope="row">
                                <img class="admin_img_mota" src="./img/<?= $v['Image'] ?>" alt="product">
                                <div class="namePrd"><?= $v['Name'] ?></div>
                            </th>
                            <td><?= number_format($v['Price']) ?>đ</td>
                            <td data-th="Quantity">

                                <input data-id="<?= $v['ID'] ?>" class="form-control text-center countNum" style="max-width: 85px" value="<?= $v['Count'] ?>" type="number">
                            </td>

                            <td><span class="ketqua"><?= number_format($total) ?>đ</span></td>
                            <td>
                                <a onclick="return prd_cart_del()" class="btn btn-danger btn-md" href="./component/list_content/cart/cart_process.php?id_sp=<?= $v['ID'] ?>&t=del">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<center class="alert alert-danger mt-2">BẠN CHƯA CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG</center>';
                }
                ?>
                <tr>
                    <th>
                        <div class="animate__animated animate__fadeInRight rq_swipe_r mb-2">
                            <i class="fas fa-angle-double-left"></i>
                            Trượt sang phải
                        </div>
                        <a class="btn btn-info" href="./index.php">Chọn thêm sản phẩm</a>
                    </th>
                    <td>
                        
                    </td>
                    <td></td>
                    <td><b class="price">
                            Tổng tiền: <?= number_format($totalAll) ?>đ
                        </b>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-info">
                            Thực hiện mua hàng
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>