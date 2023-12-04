<?php
define("BASE_URL", "http://localhost/rinjani-view/");
$root_path = $_SERVER['DOCUMENT_ROOT'] . '/rinjani-view/';
$koneksi_path = $root_path . 'config/koneksi.php';
require_once($koneksi_path);

//hapus cuy
if (isset($_POST['id_laporan'])) {
    $idLaporan = $_POST['id_laporan'];

    // Lakukan sanitasi inputan untuk mencegah serangan SQL injection
    $idLaporan = mysqli_real_escape_string($koneksi, $idLaporan);

    // Query untuk menghapus data
    $queryDelete = "DELETE FROM laporan WHERE id = $idLaporan";

    // Eksekusi query
    if (mysqli_query($koneksi, $queryDelete)) {
        echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Gagal menghapus data'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'ID laporan tidak diterima'));
}
