<?php
// reset-password.php

require_once("../../../config/helper.php");
require_once("../../../config/koneksi.php");

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Reset password to 'bibiganteng' using MD5 hash
    $hashedPassword = md5('bibiganteng');

    // Update the user's password in the database
    $query = "UPDATE users SET password = '$hashedPassword' WHERE id = $userId";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Password reset successfully";
    } else {
        echo "Password reset failed";
    }
} else {
    echo "Invalid user ID";
}
?>
