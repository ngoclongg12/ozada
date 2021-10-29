<?php

include $_SERVER["DOCUMENT_ROOT"] . "/Ozada/connecting/connectDB.php";

$sql = "SELECT * FROM danhsach_sp ORDER BY ID DESC LIMIT 14";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_all($query);

if (isset($_GET["page"])) {
    $stt = $_GET["page"];
} else {
    $stt = 1;
}
$pageRow = 6;
$perRow = $stt * $pageRow - $pageRow;
$totalPage = ceil(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM danhsach_sp ")) / $pageRow);
$listPrd = "";
$x = 1;
$y = 2;

for ($i = 1; $i <= $totalPage; $i++) {

    if (isset($_GET["page"])) {
        $x = $_GET["page"] - 1;
        $y = $_GET["page"] + 1;
    }

    $prevPg = '<li class="page-item"><a class="page-link" href="./index.php?page=' . $x . '" aria-label="Previous"><span aria-hidden="true"><i class="fas fa-angle-left"></i></span></a></li>';
    $listPrd .= '<li class="page-item pageNumber'.$i.'"><a class="page-link " href="./index.php?page=' . $i . '">' . $i . '</a></li>';
    $nextPg = '<li class="page-item"><a class="page-link" href="./index.php?page=' . $y . '" aria-label="Next"><span aria-hidden="true"><i class="fas fa-angle-right"></i></span></a></li>';
}
$sql1 = "SELECT * FROM danhsach_sp ORDER BY ID DESC LIMIT $perRow,$pageRow";
$query1 = mysqli_query($connect, $sql1);

?>

<div class="container bfProduct mt-5">
    <h4>Sản phẩm đặc trưng</h4>
</div>
<div class="container specialProduct mt-3">

    <div class="slidePrd">
        <?php
        for ($i = 0; $i < count($row); $i += 2) {
        ?>
            <div class="boxSlidePrd">

                <img class="imgSlidePrd" src="./img/<?= $row[$i][5] ?>" alt="product">
                <div><?= $row[$i][1] ?></div>
                <?php
                if (isset($row[$i + 1])) {
                ?>
                    <img class="imgSlidePrd" src="./img/<?= $row[$i + 1][5] ?>" alt="product">
                    <div><?= $row[$i + 1][1] ?></div>
                <?php } ?>
            </div>
        <?php
        }
        ?>

    </div>

    <div class="row pt-4">
        
        <?php
        while ($row1 = mysqli_fetch_array($query1)) {
        ?>
            <div class="col-md-4 boxSearchPrd">
                <div>
                    <img class="imgSearch" src="./img/<?= $row1['Image'] ?>" alt="product">
                </div>
                <div class="namePrd mt-3"><?= $row1['Name'] ?></div>
                <div>Giá thành: <?= number_format($row1['Price']) ?>đ</div>
                <div>Số lượng: <?= $row1['Status'] ?></div>
                <div>
                    <button class="btn btn-info mt-4 btnSearchPrd">
                        <a href="./component/list_content/cart/cart_process.php?id_sp=<?= $row1['ID'] ?>&t=add">Thêm vào giỏ hàng</a>
                    </button>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>
<div class="container mt-5">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if (isset($_GET['page']) && $_GET['page'] > 1) {
                        echo $prevPg;
                    }
                    ?>
                    <?= $listPrd ?>
                    <?php
                    if (isset($_GET['page']) && $_GET['page'] < $totalPage) {
                        echo $nextPg;
                    }
                    if (!isset($_GET['page']) && mysqli_num_rows($query) >= 2) {
                        echo $nextPg;
                    }
                    ?>

                </ul>
            </nav>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>