<?php
define("BASE_URL", "http://localhost/rinjani-view/");
$root_path = $_SERVER['DOCUMENT_ROOT'] . '/rinjani-view/';
$koneksi_path = $root_path . 'config/koneksi.php';
require_once($koneksi_path);

session_start();
$page = isset($_GET['page']) ? ($_GET['page']) : false;
if ($_SESSION['id'] == null) {
    header("location: " . BASE_URL . 'view/login.php');
    exit();
}

$userID = $_SESSION['id'];
$query = "SELECT nama FROM data_pribadi WHERE user_id = '$userID'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['nama'];
} else {
    // Default to session username if data not found in the table
    $userName = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Gunung Rinjani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet">

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo BASE_URL; ?>view/user/index.php?page=dashboard" class="logo d-flex align-items-center">
                <img src="<?php echo BASE_URL; ?>public/img/logo.png" alt="Logo">

                <span class="d-none d-lg-block">Rinjani</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $userName; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <p> <?= $userName; ?> | <?= $_SESSION['role']; ?></p>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo BASE_URL; ?>view/user/profil/profile.php">
                                <i class="bi bi-person"></i>
                                <span>Profil saya</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo BASE_URL; ?>view/user/profil/profile-setting.php">
                                <i class="bi bi-gear"></i>
                                <span>Pengaturan akun</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form id="logoutForm" action="<?= BASE_URL . 'function/func_logout.php' ?>" method="post">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#" onclick="document.getElementById('logoutForm').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Keluar</span>
                                </a>
                            </li>
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar">
        <? $page = '' ?>
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo ($page === 'dashboard') ? '' : 'collapsed'; ?>" href="<?php echo BASE_URL; ?>view/user/index.php?page=dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($page === 'pendaftaran') ? '' : 'collapsed'; ?>" href="<?php echo BASE_URL; ?>view/user/index.php?page=pendaftaran">
                    <i class="bi bi-grid"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>

        </ul>
    </aside>