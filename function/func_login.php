<?php

require_once("../config/helper.php");
require_once("../config/koneksi.php");



//mengambil request dari pengguna
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username ='$username' AND password ='$password'");

// var_dump(mysqli_num_rows($query));
// die();

//cek validasi role
if (mysqli_num_rows($query) != 0) {
    $row = mysqli_fetch_assoc($query);
    session_start();

    $_SESSION['id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['username'] = $row['username'];

    // var_dump($row);
    // die();
    if ($row['role'] == 'admin') {
        header("location: " . BASE_URL . "view/admin/index.php");
    } elseif ($row['role'] == 'user') {
        header("location: " . BASE_URL . "view/dashboard.php?page=user");
    }
} else {



    header("location: " . BASE_URL . 'view/login.php');
}
