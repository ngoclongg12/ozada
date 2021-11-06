<?php
ob_start();
?>
<div class="container mt-5">
    <h4 class="mb-5 text-info">Banner Show</h4>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="slideBanner col-md-7">
            <?php
            $sql_get = "SELECT * FROM danhsach_banner ORDER BY created_at DESC LIMIT 3";
            $query_get = mysqli_query($connect, $sql_get);
            while ($row = mysqli_fetch_array($query_get)) {
            ?>
                <div>
                    <img class="imgBanner" src="../img/<?= $row['file_upload'] ?>" alt="banner">
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php
$content = ob_get_clean();
?>