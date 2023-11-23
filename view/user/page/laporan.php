

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>view/user/index.php?page=dashboard">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Layanan Aspirasi dan Pengaduan Online Pendaki</h5>
                        <p>Tolong isi form laporan dengan detail dan jelas untuk memudahkan analisis data. Pastikan mencantumkan informasi yang relevan dan akurat demi kepentingan pengambilan keputusan yang tepat.</p>

                        <!-- Form untuk mengisi laporan -->
                        <form class="row g-3 needs-validation" method="POST" action="<?php echo BASE_URL; ?>function/proses_simpan_laporan.php" novalidate>
                            <!-- Input user_id yang diambil dari sesi yang sedang aktif -->
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
                                <label for="validationCustom03" class="form-label">Judul Laporan</label>
                                <input type="text" class="form-control" id="validationCustom03" name="judul_laporan" required>
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

                            <!-- Checkbox persetujuan -->
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Saya bertanggung jawab atas isi laporan ini yang disusun dengan seksama berdasarkan informasi yang tersedia.
                                    </label>
                                    <div class="invalid-feedback">
                                        Anda harus menyetujuinya sebelum mengirimkan.
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form><!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->