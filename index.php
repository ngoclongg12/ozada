<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once "./connecting/heading.php";
    ?>

</head>

<body>

    <?php

    include_once "./component/header.php";

    if (isset($_GET['component']) && $_GET['component']=='filter') {
        include_once "./component/list_content/search.php";
    }
    elseif(isset($_GET['component']) && $_GET['component']=='cart'){
        include_once "./component/list_content/cart/cart.php";
    }
    elseif(isset($_GET['component']) && $_GET['component']=='bill'){
        include_once "./component/list_content/cart/cart_bill.php";
    }
    elseif(isset($_GET['component']) && $_GET['component']=='cart_success'){
        include_once "./component/list_content/cart/cart_success.php";
    }
    else{
        include_once "./component/content.php";
    }
    // include './abc.php';
    include_once "./component/footer.php";

    include_once "./connecting/footing.php";

    ?>
    
</body>

</html>