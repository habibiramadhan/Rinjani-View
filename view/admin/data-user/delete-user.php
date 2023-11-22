<?php
require_once("../../../config/helper.php");
require_once("../../../config/koneksi.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $deleteUserQuery = "DELETE FROM users WHERE id = $userId";
    $deleteDataPribadiQuery = "DELETE FROM data_pribadi WHERE user_id = $userId";
    mysqli_query($koneksi, $deleteDataPribadiQuery);
    mysqli_query($koneksi, $deleteUserQuery);

}

?>
