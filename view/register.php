<?php
require_once("../config/helper.php");
require_once("../config/koneksi.php");

session_start();
if (isset($_SESSION['id']) && $_SESSION['id']) {
    header("Location: " . BASE_URL . 'index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $checkQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
    $checkStmt = $koneksi->prepare($checkQuery);
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div id="registrationAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                  Nama pengguna atau email sudah ada. Silakan pilih nama pengguna lain atau gunakan email lain.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        echo '<script>
                setTimeout(function() {
                    document.getElementById("registrationAlert").style.display = "none";
                }, 5000);
              </script>';
    } else {
        $role = "user";

        $insertQuery = "INSERT INTO users (email, username, password, role) VALUES (?, ?, ?, ?)";
        $insertStmt = $koneksi->prepare($insertQuery);
        $insertStmt->bind_param("ssss", $email, $username, $password, $role);

        if ($insertStmt->execute()) {
            $user_id = $koneksi->insert_id;

            $insertDataQuery = "INSERT INTO data_pribadi (user_id) VALUES (?)";
            $insertDataStmt = $koneksi->prepare($insertDataQuery);
            $insertDataStmt->bind_param("i", $user_id);

            if ($insertDataStmt->execute()) {
                // Entry in data_pribadi created successfully
            } else {
                echo "Failed to create entry in data_pribadi. Please try again.";
            }

            $insertDataStmt->close();

            $_SESSION['registration_success'] = true;
            header("Location: " . BASE_URL . "view/login.php");
            exit();
        } else {
            echo "Registration failed. Please try again.";
        }

        $insertStmt->close();
    }

    $checkStmt->close();
    $result->close();
    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../public/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../public/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../public/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../public/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../public/css/style.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukkan detail pribadi Anda untuk membuat akun</p>
                  </div>
                  <form class="row g-3 needs-validation" action="register.php" method="post" novalidate>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Silakan masukkan alamat Email yang valid!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Silakan pilih nama pengguna.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Kata Sandi</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Silakan masukkan kata sandi Anda!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Saya menyetujui dan menerima hal tersebut <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">Anda harus menyetujuinya sebelum mengirimkan.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="<?= BASE_URL . 'view/login.php'?>">Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="../public/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../public/vendor/chart.js/chart.umd.js"></script>
  <script src="../public/vendor/echarts/echarts.min.js"></script>
  <script src="../public/vendor/quill/quill.min.js"></script>
  <script src="../public/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../public/vendor/tinymce/tinymce.min.js"></script>
  <script src="../public/vendor/php-email-form/validate.js"></script>
  <script src="../public/js/main.js"></script>
</body>
</html>
