<?php include_once('../layout/head.php') ?>

<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  // Redirect user to a different page or show an error message
  header("Location: " . BASE_URL . "index.php");
  exit();
}

// Fetch data from the database
$query = "SELECT users.*, data_pribadi.nama FROM users LEFT JOIN data_pribadi ON users.id = data_pribadi.user_id";
$result = mysqli_query($koneksi, $query);

// Check if there are any rows in the result
if (mysqli_num_rows($result) > 0) {
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  $rows = [];
}
?>




<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data User</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // ... (previous code)

                // Loop through the fetched rows and display data
                foreach ($rows as $key => $row) {
                  echo "<tr>";
                  echo "<td>" . ($key + 1) . "</td>";
                  echo "<td>" . $row['nama'] . "</td>"; // Menggunakan nilai 'nama' dari data_pribadi
                  echo "<td>" . $row['username'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['role'] . "</td>";


                  // Check if the user role is 'admin' before displaying delete, edit, and reset password actions
                  if ($row['role'] != 'admin') {
                    echo '<td>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser(' . $row['id'] . ')">Delete</button>
                                <button class="btn btn-warning btn-sm" onclick="openEditUserModal(' . $row['id'] . ', \'' . $row['nama'] . '\', \'' . $row['username'] . '\', \'' . $row['email'] . '\')">Edit</button>
                                <button class="btn btn-info btn-sm" onclick="resetPassword(' . $row['id'] . ')">Reset Password</button>
                              </td>';
                  } else {
                    // If the role is 'admin', display an empty cell
                    echo '<td> Tidak Bisa Di Ubah</td>';
                  }

                  echo "</tr>";
                }
                ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->


          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- Bootstrap Modal for Editing User -->
  <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editUserForm" action="edit-user.php" method="post">
            <input type="hidden" id="editUserId" name="editUserId" value="">
            <div class="mb-3">
              <label for="editUserName" class="form-label">Name</label>
              <input type="text" class="form-control" id="editUserName" name="editUserName" required disabled>
            </div>

            <div class="mb-3">
              <label for="editUserUsername" class="form-label">Username</label>
              <input type="text" class="form-control" id="editUserUsername" name="editUserUsername" required>
            </div>
            <div class="mb-3">
              <label for="editUserEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="editUserEmail" name="editUserEmail" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    function deleteUser(userId) {
      // Use JavaScript to confirm the deletion
      if (confirm("Are you sure you want to delete this user?")) {
        // Send an AJAX request to delete the user
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload the page after successful deletion
            location.reload();
          }
        };

        // Update the path to delete_user.php based on its location
        xhr.open("GET", "delete-user.php?id=" + userId, true);
        xhr.send();
      }
    }

    function openEditUserModal(userId, name, username, email) {
      // Fill in the current user details in the modal
      document.getElementById('editUserId').value = userId;
      document.getElementById('editUserName').value = name;
      document.getElementById('editUserUsername').value = username;
      document.getElementById('editUserEmail').value = email;

      // Open the modal
      var editUserModal = new bootstrap.Modal(document.getElementById('editUserModal'));
      editUserModal.show();
    }

    function resetPassword(userId) {
      // Use JavaScript to confirm the password reset
      if (confirm("Are you sure you want to reset the password for this user?")) {
        // Send an AJAX request to reset the password
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            // Display the result of the password reset
            alert(xhr.responseText);

            // Reload the page after successful password reset
            location.reload();
          }
        };

        // Update the path to reset-password.php based on its location
        xhr.open("GET", "reset-password.php?id=" + userId, true);
        xhr.send();
      }
    }
  </script>

  <?php include_once('../layout/footer.php') ?>