<?php include_once('../layout/head.php') ?>

<?php
ob_start();

$page = isset($_GET['page']) ? $_GET['page'] : false;
if ($_SESSION['id'] == null) {
  header("location: " . BASE_URL . 'view/login.php');
  exit();
}
$id = $_SESSION['id'];
$query_users = "SELECT * FROM users WHERE id = $id";
$result_users = mysqli_query($koneksi, $query_users);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['username'])) {
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];

    $update_query = "UPDATE users SET email = '$newEmail', username = '$newUsername' WHERE id = $id";
    $update_result = mysqli_query($koneksi, $update_query);

    if ($update_result) {
      echo "<script>alert('Data updated successfully');</script>";
      echo "<script>window.location.replace('profile-setting.php');</script>";
      exit();
    } else {
      echo "Failed to update data: " . mysqli_error($koneksi);
    }
  } else {
    echo "Incomplete data for update.";
  }

  if (isset($_POST['newpassword']) && isset($_POST['renewpassword']) && isset($_POST['currentPassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newpassword'];
    $reNewPassword = $_POST['renewpassword'];

    if ($newPassword !== $reNewPassword) {
      exit("New passwords do not match.");
    }

    $hashedNewPassword = md5($newPassword);

    $query_verify_password = "SELECT password FROM users WHERE id = $id";
    $result_verify_password = mysqli_query($koneksi, $query_verify_password);

    if ($result_verify_password) {
      $data_password = mysqli_fetch_assoc($result_verify_password);
      $currentHashedPassword = $data_password['password'];

      if (md5($currentPassword) !== $currentHashedPassword) {
        exit("Current password is incorrect.");
      }

      $update_password_query = "UPDATE users SET password = '$hashedNewPassword' WHERE id = $id";
      $update_password_result = mysqli_query($koneksi, $update_password_query);

      if ($update_password_result) {
        echo '<script>alert("Password updated successfully!"); window.location.replace("profile-setting.php");</script>';
        exit();
      } else {
        echo "Failed to update password: " . mysqli_error($koneksi);
      }
    } else {
      echo "Error fetching current password: " . mysqli_error($koneksi);
    }
  } else {
    echo "Data incomplete for password update.";
  }
}
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pengaturan Akun</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Pengaturan Akun</li>
      </ol>
    </nav>
  </div>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-settings">Pengaturan Akun</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active pt-3" id="profile-settings">
                <?php
                if ($result_users) {
                  $data_users = mysqli_fetch_assoc($result_users);
                  if ($data_users) {
                ?>
                    <form method="POST" action="#">
                      <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="text" class="form-control" id="email" value="<?php echo $data_users['email']; ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control" id="username" value="<?php echo $data_users['username']; ?>">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Perubahan</button>
                      </div>
                    </form>
                <?php
                  } else {
                    echo "Data users tidak ditemukan";
                  }
                } else {
                  echo "Error: " . mysqli_error($koneksi);
                }
                ?>
              </div>
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <form method="POST" action="">
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password saat ini</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Masukan Ulang Password Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>
<?php include_once('../layout/footer.php') ?>