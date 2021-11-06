<div class="container banner mt-3">
    <div class="superSale">
        <div class="clip-path">
            <div>Super</div>
            <div>September</div>
        </div>
        <div class="rightSale">
            <i class="fas fa-tag icSale"></i>
            <div class="textSale">
                <div style="font-weight: bold;">
                    Product Discound
                </div>
                <div>
                    upto 40% off
                </div>
            </div>
        </div>
        <div class="rightSale">
            <i class="fas fa-ship icSale"></i>
            <div class="textSale">
                <div style="font-weight: bold;">
                    Shipping Discound
                </div>
                <div>
                    upto $20 off
                </div>
            </div>
        </div>
        <div class="rightSale">
            <i class="fas fa-chalkboard-teacher icSale"></i>
            <div class="textSale">
                <div style="font-weight: bold;">
                    Logistic Service
                </div>
                <div>
                    on-time delivery
                </div>
            </div>
        </div>
    </div>
    <div class="container saleMarket mt-3">
        <div class="row">
            <div class="col-2">
                <div>
                    <h5>Ozada Market</h5>
                    <div class="boxPrd onTop">
                        <i class="far fa-tshirt iconPrd"></i>
                        <span>Trang phục hàng mới về</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="fas fa-chess-knight iconPrd"></i>
                        <span>Đồ chơi & thể thao</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="fas fa-tv iconPrd"></i>
                        <span>TV & đồ gia dụng</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="far fa-lips iconPrd"></i>
                        <span>Mỹ phẩm thịnh hành</span>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="slideBanner">
                    <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Ozada/connecting/connectDB.php';

                    $sql_get = "SELECT * FROM danhsach_banner ORDER BY created_at DESC LIMIT 3";
                    $query_get = mysqli_query($connect, $sql_get);
                    while ($row = mysqli_fetch_array($query_get)) {
                    ?>
                        <div>
                            <img class="imgBanner" src="./img/<?= $row['file_upload'] ?>" alt="banner">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-2">
                <div>
                    <h5>Super Sept11</h5>
                    <div class="boxPrd onTop">
                        <i class="far fa-mobile iconPrd"></i>
                        <span>Đồ điện tử & đồ điện dân dụng</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="far fa-luggage-cart iconPrd"></i>
                        <span>Máy móc công nghệ nhập khẩu</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="far fa-house-flood iconPrd"></i>
                        <span>Xây dựng & bất động sản</span>
                    </div>
                </div>
                <div>
                    <div class="boxPrd">
                        <i class="far fa-shopping-bag iconPrd"></i>
                        <span>Túi sách & vali thời trang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>