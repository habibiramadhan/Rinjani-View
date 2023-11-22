<?php
    require_once("../config/helper.php");
    require_once("../config/koneksi.php");

	
	if (isset($_SESSION['id']) && $_SESSION['id']) {
		header("Location: ".BASE_URL.'index.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - Rinjani</title>
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL.'public/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
  <link href="../public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../public/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../public/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../public/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../public/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../public/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
	<?php
		session_start();
		if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Registration successful! You can now log in.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
			unset($_SESSION['registration_success']); // Reset the session variable
		}
	?>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun Anda</h5>
                    <p class="text-center small">Masukkan nama pengguna & kata sandi Anda untuk login</p>
                  </div>

				  <!-- FORM buat masukin method -->
                  <form class="row g-3 needs-validation" novalidate method="POST" action="<?= BASE_URL.'function/func_login.php' ?>">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Silakan masukkan nama username Anda.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Silakan masukkan kata sandi Anda!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Tidak punya akun? <a href="<?= BASE_URL . 'view/register.php'?>">Buat dulu disini</a></p>
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