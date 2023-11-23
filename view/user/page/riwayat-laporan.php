<?php


$query = "SELECT * FROM laporan WHERE user_id = $userID ORDER BY tanggal_laporan DESC";
$result = mysqli_query($koneksi, $query);

?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Riwayat Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat laporan</h5>
                        <p>Ini adalah riwayat laporan Anda yang mencatat setiap langkah dan detail yang telah dilakukan.</p>

                        <!-- Default Table -->
                        <table id="myTable" class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul Laporan</th>
                                    <th scope="col">Kategori Laporan</th>
                                    <th scope="col">Tanggal Laporan</th>
                                    <th scope="col">Status Laporan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    $nomor = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $nomor . "</td>";
                                        echo "<td>" . $row['judul_laporan'] . "</td>";
                                        echo "<td>" . $row['kategori_laporan'] . "</td>";
                                        echo "<td>" . date('d/m/Y', strtotime($row['tanggal_laporan'])) . "</td>";
                                        echo "<td>";

                                        if ($row['status_laporan'] === "Belum ditanggapi") {
                                            echo "<button type='button' class='btn btn-danger'>" . $row['status_laporan'] . "</button>";
                                        } elseif ($row['status_laporan'] === "Ditanggapi") {
                                            echo "<button type='button' class='btn btn-success'>" . $row['status_laporan'] . "</button>";
                                        } else {
                                            echo "<button type='button' class='btn btn-warning'>Laporan Tidak Valid</button>";
                                        }
                                        echo "</td>";

                                        echo "<td>";

                                        if ($row['balasan'] !== null) {
                                            echo "<button type='button' class='btn btn-primary lihat-respon' data-bs-toggle='modal' data-bs-target='#basicModal' data-idlaporan='" . $row['id'] . "' data-toggle='modal'>Lihat Respon</button>";
                                        } else {
                                            echo "<button type='button' class='btn btn-warning'>Tidak Ada Respon</button>";
                                        }

                                        echo "</td>";
                                        echo "</tr>";
                                        $nomor++;
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada data laporan.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Respon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Isi Laporan Anda</h6>
                <p id="isi_laporan"></p>
                <h6>Respon Dari Admin</h6>
                <p id="balasan"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        // Ketika tombol "Lihat Respon" diklik
        $('.lihat-respon').click(function() {
            // Ambil nilai atribut data-idlaporan dari tombol yang diklik
            var idLaporan = $(this).data('idlaporan');

            // Lakukan request AJAX untuk mengambil data spesifik dari tabel laporan berdasarkan idLaporan
            $.ajax({
                url: '<?php echo BASE_URL; ?>function/ambil_data_laporan.php', // Ganti dengan URL yang tepat untuk mengambil data dari database
                method: 'POST',
                data: {
                    id_laporan: idLaporan
                },
                success: function(response) {
                    // Mengisi konten modal dengan data yang diterima
                    var data = JSON.parse(response);
                    $('#isi_laporan').text(data.isi_laporan);
                    var balasan = data.balasan + " - Ditanggapi oleh Si Lebah Ganteng";
                    $('#balasan').text(balasan);
                },
                error: function() {
                    alert("Gagal memuat data laporan.");
                }
            });
        });
    });
</script>