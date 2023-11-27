<?php
session_start();

// Check if the email and token are set in the URL
if (!isset($_SESSION['reset_email']) || !isset($_SESSION['reset_token']) ) {
  header("Location: index.php"); // Redirect to the home page or another page
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Favicons -->
    <link href="../../../public/assets/img/favicon.png" rel="icon" />
    <!-- Template Main CSS File -->
    <link href="../../css/admin/style.css" rel="stylesheet" />
</head>
<body>
  <div class="body flex-grow-1 px-3 mt-5" style="margin-inline: 400px">
    <div class="container-lg">
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div style="justify-items:center; text-align:center">
                  <h4 class="card-title mb-0">PERBARUI PASSWORD</h4>
                  <div class="small text-medium-emphasis">
                    UD Tani Rejo Jenggawah
                  </div>
                </div>
                <a href="../index.php"  class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;">Kembali ke halaman utama</a>
              </div>
              <form method="POST" id="reset-password-form" action="../../../app/Http/Controllers/auth/resetPasswordController.php">
                <div class="mt-4">
                  <label class="mb-1" for="password">Masukkan Password Baru</label>
                  <input class="form-control" name="password" id="password" placeholder="xxxx" required></input>
                  <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $_SESSION['reset_email']?>"></input>
                  <input type="hidden" class="form-control" name="token" id="token" value="<?php echo $_SESSION['reset_token']?>"></input>
                </div>
                <button class="btn btn-warning mt-4 mx-auto" style="margin: 0 auto;display: block;text-align:center;color:white;margin-left:10px; padding-inline:20px" type="submit">Reset Password</button>
              </form>
            </div>
          </div>
          
          <footer class="footer">
          <div>
            <div>
              
              </div>
              <div class="ms-auto" style="text-align:right">
                Powered by&nbsp;<a href="#"
                  >NexGen Team.</a
                >
              </div>
          </div>
          </footer>
      </div>
  </div>

      <!-- Link eksternal ke berkas JavaScript -->
    <script src="../../js/auth/main.js"></script>
    
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
      // sign-up form
      document
        .getElementById("reset-password-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          var formData = new FormData(this);

          fetch("../../../app/Http/Controllers/auth/resetPasswordController.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                // Pendaftaran berhasil
                Swal.fire({
                  title: "Success!",
                  text: "Password berhasil diperbarui",
                  icon: "success",
                  confirmButtonText: "OK",
                }).then(function(){
                    window.location.href ='../index.php';
                });
              } else {
                // Pendaftaran gagal
                Swal.fire({
                  title: "Error!",
                  text: data.message,
                  icon: "error",
                  confirmButtonText: "OK",
                });
              }
            })
            .catch((error) => {
              // Kesalahan saat mengirim permintaan AJAX
              console.error("Error:", error);
            });
        });
    </script>
</body>
</html>
