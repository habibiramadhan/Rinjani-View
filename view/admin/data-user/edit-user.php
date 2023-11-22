<?php
require_once("../../../config/helper.php");
require_once("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the form
    $userId = $_POST['editUserId'];
    $username = $_POST['editUserUsername'];
    $email = $_POST['editUserEmail'];

    // Perform the update query
    $query = "UPDATE users SET  username='$username', email='$email' WHERE id=$userId";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Update successful
        header("Location: " . BASE_URL . "view/admin/data-user/data-user.php");
        exit();
    } else {
        // Handle the update failure
        echo "Update failed: " . mysqli_error($koneksi);
    }
}
?>
