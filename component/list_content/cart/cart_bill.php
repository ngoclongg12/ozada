<?php
// session_start();
$total = 0;
$totalAll = 0;


?>
<div class="container mt-4">
    <div class="row" style="background-color: rgb(170, 224, 248);">
        <h4 class="text-aligncenter" style="line-height: 40px; padding-left: 15px">XÁC NHẬN ĐƠN HÀNG</h4>
    </div>
    <table class="table table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá thành</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <!-- <th scope="col"></th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {

                foreach ($_SESSION['giohang'] as $k => $v) {
                    $total = $v['Count'] * $v['Price'];
                    $totalAll += $total;
            ?>
                    <tr>
                        <td scope="row">
                            <img class="admin_img_mota" src="./img/<?= $v['Image'] ?>" alt="product">
                            <div class="namePrd"><?= $v['Name'] ?></div>
                        </td>
                        <td><?= number_format($v['Price']) ?>đ</td>
                        <td data-th="Quantity">
                            <?= $v['Count'] ?>
                        </td>
                        <td><span class="ketqua"><?= number_format($total) ?>đ</span></td>
                    </tr>
            <?php
                }
            } else {
                echo '<center class="alert alert-danger mt-2">BẠN CHƯA CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG</center>';
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
    <form class="infoKH" action="" method="post">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Tên khách hàng:</label>
                    <input id="nameBill" class="form-control" name="Name" type="text" required>
                </div>
                <p class="alert alert-danger errNameBill" style="display: none;"></p>

                <div class="form-group">
                    <label for="">Số điện thoại:</label>
                    <input id="phoneBill" class="form-control" name="Phone" type="text" maxlength="11" required>
                </div>
                <p class="alert alert-danger errPhoneBill" style="display: none;"></p>

                <div class="form-group">
                    <label for="">Địa chỉ:</label>
                    <input id="addressBill" class="form-control" name="Address" type="text" required>
                </div>
                <p class="alert alert-danger errAddressBill" style="display: none;"></p>

                <div class="form-group">
                    <label for="">Hình thức thanh toán:</label>
                    <select class="form-control" name="typeBill" id="typeBill">
                        <option value="0" disabled selected hidden>Vui lòng chọn !</option>
                        <option value="1">Tiền mặt</option>
                        <option value="2">Visa/Master-Card</option>
                        <option value="3">Ví điện tử</option>
                        <option value="4">Internet Banking</option>
                    </select>
                </div>
                <p class="alert alert-danger errTypeBill" style="display: none;"></p>
            </div>
            <div class="col-md-4">
                <button type="button" name="infoSubmit" class="btn btn-info btn-sub-modal js_checkout">
                    <!-- <a href="#" id="btnModal" class="btn btn-info js_checkout"> -->
                    Thanh toán
                    <!-- </a> -->
                </button>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin mua hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div>Tên khách hàng: <span id="modalName"></span></div>
                        <div>Số điện thoại: <span id="modalPhone"></span></div>
                        <div>Địa chỉ: <span id="modalAddress"></span></div>
                        <div>
                            Thanh toán đơn hàng: <?= number_format($totalAll) ?> vnđ
                        </div>
                        <div>
                            Hình thức thanh toán: <span id="modalPay"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" name="modalSubmit" class="btn btn-info js_submit"> xác nhận -->
                            <a class="btn btn-info js_submit" href="./index.php?component=cart_success">Xác nhận</a>
                        <!-- </button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                    <?php
                    // if (isset($_POST['modalSubmit'])) {
                    //     $_SESSION['modalSubmit'] == $_POST['modalSubmit'];
                    //     header('location: ');
                    // }
                    ?>
                </form>
            </div>
        </div>
    </div>


</div>