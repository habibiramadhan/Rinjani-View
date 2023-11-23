<?php
define("BASE_URL", "http://localhost/rinjani-view/");
$root_path = $_SERVER['DOCUMENT_ROOT'] . '/rinjani-view/';
$koneksi_path = $root_path . 'config/koneksi.php';
require_once($koneksi_path);

// Ambil ID laporan dari permintaan POST
$idLaporan = $_POST['id_laporan'];

// Lakukan query untuk mendapatkan data laporan berdasarkan ID
$query = "SELECT isi_laporan, balasan FROM laporan WHERE id = $idLaporan";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    // Kirim data dalam format JSON
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Gagal mengambil data laporan"]);
}
