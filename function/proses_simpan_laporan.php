<?php
define("BASE_URL", "http://localhost/rinjani-view/");
$root_path = $_SERVER['DOCUMENT_ROOT'] . '/rinjani-view/';
$koneksi_path = $root_path . 'config/koneksi.php';
require_once($koneksi_path);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $kategori_laporan = $_POST['kategori_laporan'];
    $judul_laporan = $_POST['judul_laporan'];
    $isi_laporan = $_POST['isi_laporan'];

    $queryCountReports = "SELECT COUNT(*) as total_reports 
                          FROM laporan 
                          WHERE user_id = '$user_id' AND status_laporan = 'Belum ditanggapi'";
    $resultCountReports = mysqli_query($koneksi, $queryCountReports);

    if ($resultCountReports) {
        $rowCountReports = mysqli_fetch_assoc($resultCountReports);
        $totalReports = $rowCountReports['total_reports'];

        if ($totalReports < 5) {
            $queryUserData = "SELECT nama FROM data_pribadi WHERE user_id = '$user_id'";
            $resultUserData = mysqli_query($koneksi, $queryUserData);

            if ($resultUserData && mysqli_num_rows($resultUserData) > 0) {
                $rowUserData = mysqli_fetch_assoc($resultUserData);
                $nama = $rowUserData['nama'];

                $queryInsert = "INSERT INTO laporan (user_id, nama, kategori_laporan, judul_laporan, isi_laporan) 
                                VALUES ('$user_id', '$nama', '$kategori_laporan', '$judul_laporan', '$isi_laporan')";

                if (mysqli_query($koneksi, $queryInsert)) {
                    echo '<script>alert("Data berhasil disimpan.");';
                    echo 'window.location.href="' . BASE_URL . 'view/user/index.php?page=Laporan";</script>';
                    exit();
                } else {
                    echo '<script>alert("Error: ' . mysqli_error($koneksi) . '");';
                    echo 'window.location.href="' . BASE_URL . 'view/user/index.php?page=Laporan";</script>';
                    exit();
                }
            } else {
                echo "Data tidak ditemukan untuk pengguna ini.";
            }
        } else {
            echo '<script>alert("Anda terlalu banyak memberi laporan dan Anda memiliki ' . $totalReports . ' laporan yang belum ditanggapi. Silakan coba lagi besok.");';
            echo 'window.location.href="' . BASE_URL . 'view/user/index.php?page=Laporan";</script>';
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Metode request yang diterima bukan POST.";
}
