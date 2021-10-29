<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Ozada/connecting/connectDB.php";
// $cookie = setcookie("user", "name", time() + (86400 * 30), "/");

if (isset($_GET["search"])) {
    $text = $_GET["search"];
}

$textFix = trim($text);
$arr_textFix = explode(" ", $textFix);
$textFix = implode("%", $arr_textFix);
$textFix = "%" . $textFix . "%";

// print_r($query) ;
if (isset($_GET["page_filter"])) {
    $stt = $_GET["page_filter"];
} else {
    $stt = 1;
}
$pageRow = 6;
$perRow = $stt * $pageRow - $pageRow;
$totalPage = ceil(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM danhsach_sp WHERE Name LIKE ('$textFix')")) / $pageRow);
$listPrd = "";
$x = 1;
$y = 2;

for ($i = 1; $i <= $totalPage; $i++) {

    if (isset($_GET["page_filter"])) {
        $x = $_GET["page_filter"] - 1;
        $y = $_GET["page_filter"] + 1;
    }

    $prevPg = '<li class="page-item"><a class="page-link" href="./index.php?component=filter&search=' . $text . '&page_filter=' . $x . '" aria-label="Previous"><span aria-hidden="true"><i class="fas fa-angle-left"></i></span></a></li>';
    $listPrd .= '<li class="page-item"><a class="page-link pageNumber'.$i.'" href="./index.php?component=filter&search=' . $text . '&page_filter=' . $i . '">' . $i . '</a></li>';
    $nextPg = '<li class="page-item"><a class="page-link" href="./index.php?component=filter&search=' . $text . '&page_filter=' . $y . '" aria-label="Next"><span aria-hidden="true"><i class="fas fa-angle-right"></i></span></a></li>';
    // echo $textFix;
}
$sql = "SELECT * FROM danhsach_sp WHERE Name LIKE ('$textFix') ORDER BY ID ASC LIMIT $perRow,$pageRow";
$query = mysqli_query($connect, $sql);

?>
<div class="container">
    <div class="row mt-4" style="background-color: rgb(170, 224, 248);">
        <h4 style="line-height: 40px; padding-left: 15px">Từ khoá tìm kiếm: <?= $text ?>,</h4>

    </div>
    <div class="row pt-4">
        <?php
        if (mysqli_num_rows($query) == 0) {
            echo "Không có sản phẩm bạn muốn tìm kiếm";
        }
        ?>
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col-md-4 boxSearchPrd">
                <div>
                    <img class="imgSearch" src="./img/<?= $row['Image'] ?>" alt="product">
                </div>
                <div class="namePrd mt-3"><?= $row['Name'] ?></div>
                <div>Giá thành: <?= $row['Price'] ?>đ</div>
                <div>Số lượng: <?= $row['Status'] ?></div>
                <div>
                    <button class="btn btn-info mt-4 btnSearchPrd">
                        <a href="<?= $config['hostname'] ?>component/list_content/cart/cart_process.php?id_sp=<?= $row['ID'] ?>&t=add">Thêm vào giỏ hàng</a>
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
                    if (isset($_GET['page_filter']) && $_GET['page_filter'] > 1) {
                        echo $prevPg;
                    }
                    ?>
                    <?= $listPrd ?>
                    <?php
                    if (isset($_GET['page_filter']) && $_GET['page_filter'] < $totalPage) {
                        echo $nextPg;
                    }
                    if (!isset($_GET['page_filter']) && mysqli_num_rows($query) >= 2) {
                        echo $nextPg;
                    }
                    ?>

                </ul>
            </nav>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>