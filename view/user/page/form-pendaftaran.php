<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pendaftaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>view/user/index.php?page=dashboard">Home</a></li>
                <li class="breadcrumb-item active">Pendaftaran</li>
                <li class="breadcrumb-item active">Form Pendaftaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Floating labels Form</h5>

                        <form method="POST">
                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="nama" type="text" class="form-control" id="nama" value="Adrian Suka Main Cewe">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pekerjaan" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="pekerjaan" class="form-select" aria-label="Default select example">
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Pelajar">Pelajar</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Umum" selected="">Umum</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="jenis kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8 col-lg-9">
                                    <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                                        <option selected="">Lainnya</option>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="asasa">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal lahir</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="tanggal_lahir" type="date" class="form-control" value="2023-11-29">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="alamat" class="form-control" style="height: 100px">CIANJURR WELL AJA</textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="nomor_telepon" class="col-md-4 col-lg-3 col-form-label">No HP</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="nomor_telepon" type="text" class="form-control" id="No HP" value="083879095303">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>