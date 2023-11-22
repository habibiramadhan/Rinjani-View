<?php
include_once('../layout/head.php');

$page = isset($_GET['page']) ? ($_GET['page']) : false;
if ($_SESSION['id'] == null) {
  header("location: " . BASE_URL . 'view/login.php');
  exit();
}

$user_id = $_SESSION['id'];
$query = "SELECT * FROM data_pribadi WHERE user_id = $user_id";
$result = mysqli_query($koneksi, $query);


// Proses update jika formulir disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil data dari formulir
  $nama = $_POST['nama'];
  $pekerjaan = $_POST['pekerjaan'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  $nomor_telepon = $_POST['nomor_telepon'];

  // Query untuk update data
  $update_query = "UPDATE data_pribadi SET nama = '$nama', pekerjaan = '$pekerjaan', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', nomor_telepon = '$nomor_telepon' WHERE user_id = $user_id";

  // Lakukan update
  if (mysqli_query($koneksi, $update_query)) {
    // Redirect ke halaman profile setelah berhasil diupdate
    header("location: profile.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
}

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profil Saya</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Profil Saya</li>
      </ol>
    </nav>
  </div>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Ringkasan</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Profile</button>
              </li>

            </ul>
            <div class="tab-content pt-2">
              <?php
              if ($result) {
                $data_pribadi = mysqli_fetch_assoc($result);
                // Memeriksa apakah data ditemukan sebelum menampilkan
                if ($data_pribadi) {
                  // Tampilkan data di HTML
              ?>
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Profil lengkap</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nama</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['nama']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Pekerjaan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['pekerjaan']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['jenis_kelamin']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tempat Tanggal lahir</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['tempat_lahir'] . ', ' . date('d/m/Y', strtotime($data_pribadi['tanggal_lahir'])); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Alamat</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['alamat']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nomor telepon</div>
                      <div class="col-lg-9 col-md-8"><?php echo $data_pribadi['nomor_telepon']; ?></div>
                    </div>
                  </div>
              <?php
                } else {
                  // Menampilkan pesan jika data tidak ditemukan
                  echo "Data tidak ditemukan";
                }
              } else {
                // Menampilkan pesan jika query tidak berhasil dieksekusi
                echo "Error: " . mysqli_error($koneksi);
              }
              ?>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST">
                  <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $data_pribadi['nama']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pekerjaan" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                    <div class="col-md-8 col-lg-9">
                      <select name="pekerjaan" class="form-select" aria-label="Default select example">
                        <option value="">Pilih Pekerjaan</option>
                        <option value="Pelajar" <?php if ($data_pribadi['pekerjaan'] === 'Pelajar') echo ' selected'; ?>>Pelajar</option>
                        <option value="Mahasiswa" <?php if ($data_pribadi['pekerjaan'] === 'Mahasiswa') echo ' selected'; ?>>Mahasiswa</option>
                        <option value="Umum" <?php if ($data_pribadi['pekerjaan'] === 'Umum') echo ' selected'; ?>>Umum</option>
                      </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="jenis kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                        <option selected=""><?php echo $data_pribadi['jenis_kelamin']; ?></option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tempat_lahir" class="col-md-4 col-lg-3 col-form-label">Tempat Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir" value="<?php echo $data_pribadi['tempat_lahir']; ?>">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="tanggal_lahir" type="date" class="form-control" value="<?php echo $data_pribadi['tanggal_lahir']; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="alamat" class="form-control" style="height: 100px"><?php echo $data_pribadi['alamat']; ?></textarea>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="nomor_telepon" class="col-md-4 col-lg-3 col-form-label">No HP</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nomor_telepon" type="text" class="form-control" id="No HP" value="<?php echo $data_pribadi['nomor_telepon']; ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include_once('../layout/footer.php') ?>