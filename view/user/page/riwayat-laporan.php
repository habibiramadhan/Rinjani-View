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
                                        echo "<button type='button' class='btn btn-info btn-edit' data-idlaporan='" . $row['id'] . "'>Edit</button>";
                                        echo "<button type='button' class='btn btn-danger btn-hapus' data-idlaporan='" . $row['id'] . "'>Hapus</button>";
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

<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" method="POST" action="<?php echo BASE_URL; ?>function/proses_edit_laporan.php" novalidate>
                    <input type="hidden" name="user_id" value="<?= $_SESSION['id']; ?>">

                    <!-- Input nama, diambil dari data_pribadi untuk user yang sedang aktif -->
                    <div class="col-md-8">
                        <label for="validationCustom01" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="validationCustom01" name="nama" value="<?= $userName; ?>" disabled>
                    </div>

                    <!-- Pilihan kategori laporan -->
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Kategori Laporan</label>
                        <select class="form-select" id="validationCustom04" name="kategori_laporan" required>
                            <option selected disabled value="">Pilih Kategori Laporan</option>
                            <option value="Feedback dan Komentar">Feedback dan Komentar</option>
                            <option value="Kondisi Jalur Pendakian">Kondisi Jalur Pendakian</option>
                            <option value="Informasi Perjalanan">Informasi Perjalanan</option>
                            <option value="Keamanan dan Perlindungan Lingkungan">Keamanan dan Perlindungan Lingkungan</option>
                        </select>
                        <div class="invalid-feedback">
                            Harap pilih Kategori yang valid.
                        </div>
                    </div>

                    <!-- Judul laporan -->
                    <div class="col-md-12">
                        <label for="judul_laporan" class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" id="isi" name="judul_laporan" required>
                        <div class="invalid-feedback">
                            Harap isi Judul yang valid.
                        </div>
                    </div>

                    <!-- Isi laporan -->
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label">Isi Laporan</label>
                        <textarea class="form-control" id="validationCustom05" style="height: 100px" name="isi_laporan" required></textarea>
                        <div class="invalid-feedback">
                            Harap isi Isi Laporan yang valid.
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
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
        $('.lihat-respon').click(function() {
            var idLaporan = $(this).data('idlaporan');


            $.ajax({
                url: '<?php echo BASE_URL; ?>function/ambil_data_laporan.php',
                method: 'POST',
                data: {
                    id_laporan: idLaporan
                },
                success: function(response) {
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

    $('.btn-hapus').click(function() {
        var idLaporan = $(this).data('idlaporan');

        $.ajax({
            url: '<?php echo BASE_URL; ?>function/hapus_data_laporan.php',
            method: 'POST',
            data: {
                id_laporan: idLaporan
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Data berhasil dihapus');
                    $(this).closest('tr').remove();
                    location.reload();
                } else {
                    alert('Gagal menghapus data');
                }
            },
            error: function() {
                alert("Gagal menghubungi server untuk menghapus data");
            }
        });
    });
    $('.btn-edit').click(function() {
        var idLaporan = $(this).data('idlaporan');

        $.ajax({
            url: '<?php echo BASE_URL; ?>function/ambil_data_laporan.php',
            method: 'POST',
            data: {
                id_laporan: idLaporan
            },
            success: function(response) {
                var data = JSON.parse(response);

                $("#validationCustom04").val(data.kategori_laporan);
                $("#isi").val(data.judul_laporan);
                $("#validationCustom05").val(data.isi_laporan);


                var dropdown = $("#validationCustom04");
                dropdown.empty();
                var kategori = ["Feedback dan Komentar", "Kondisi Jalur Pendakian", "Informasi Perjalanan", "Keamanan dan Perlindungan Lingkungan"];
                $.each(kategori, function(index, value) {
                    if (value === data.kategori_laporan) {
                        dropdown.append($('<option selected></option>').val(value).html(value));
                    } else {
                        dropdown.append($('<option></option>').val(value).html(value));
                    }
                });

                $('#editModal').modal('show');
                $('#editModal').data('idlaporan', idLaporan);
            },
            error: function() {
                alert("Gagal memuat data laporan.");
            }
        });
    });

    $('#editModal form').submit(function(event) {
        event.preventDefault();

        var idLaporan = $('#editModal').data('idlaporan');
        var kategori = $("#validationCustom04").val();
        var judul = $("#isi").val();
        var isi = $("#validationCustom05").val();

        $.ajax({
            url: '<?php echo BASE_URL; ?>function/proses_edit_laporan.php',
            method: 'POST',
            data: {
                id_laporan: idLaporan,
                kategori_laporan: kategori,
                judul_laporan: judul,
                isi_laporan: isi
            },
            success: function(response) {
                var data = JSON.parse(response);

                if (data.status === 'success') {
                    alert('Laporan berhasil diubah');
                    location.reload();
                } else {
                    alert('Gagal mengubah laporan');
                }
            },
            error: function() {
                alert("Gagal menghubungi server untuk mengubah laporan");
            }
        });
    });
</script>