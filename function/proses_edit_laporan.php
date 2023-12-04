<?php
define("BASE_URL", "http://localhost/rinjani-view/");
$root_path = $_SERVER['DOCUMENT_ROOT'] . '/rinjani-view/';
$koneksi_path = $root_path . 'config/koneksi.php';
require_once($koneksi_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idLaporan = $_POST['id_laporan'];
    $kategori = $_POST['kategori_laporan'];
    $judul = $_POST['judul_laporan'];
    $isi = $_POST['isi_laporan'];


    $query = "UPDATE laporan SET kategori_laporan='$kategori', judul_laporan='$judul', isi_laporan='$isi' WHERE id=$idLaporan";

    if (mysqli_query($koneksi, $query)) {
        $response = [
            'status' => 'success'
        ];
        echo json_encode($response);
    } else {
        $response = [
            'status' => 'error'
        ];
        echo json_encode($response);
    }
}
