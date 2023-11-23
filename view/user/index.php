<?php include_once('layout/head.php') ?>

    <?php

    $filename = "page/$page.php";
    if (file_exists($filename)) {
        include_once($filename);
    } else {
        echo "404";
    }
    ?>

<?php include_once('layout/footer.php') ?>