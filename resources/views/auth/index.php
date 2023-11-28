<?php 
session_start();

// Destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login SFS - Pertanian</title>

    <!-- Favicons -->
    <link href="../../../public/assets/img/favicon.png" rel="icon" />
    <!-- Template Main CSS File -->
    <link href="../../css/admin/style.css" rel="stylesheet" />

    <!-- auth with google -->
    <meta
      name="google-signin-client_id"
      content="257712218696-7qu4d9dekltst8r6rhmedp42fsq5e5a6.apps.googleusercontent.com"
    />
  </head>
  <body>
  <div class="body flex-grow-1 px-3 mt-5" style="margin-inline: 400px">
      <div class="container-lg">
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div style="justify-items:center; text-align:center">
                  <h4 class="card-title mb-0">RESET PASSWORD</h4>
                  <div class="small text-medium-emphasis">
                    UD Tani Rejo Jenggawah
                  </div>
                </div>
                <a href="../index.php"  class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;">Kembali ke halaman utama</a>
              </div>
              <form id="forgot-password-form" method="POST" action="../../../app/Http/Controllers/auth/forgotPasswordController.php">
                <div class="d-flex justify-content-between mt-4">
                  <input class="form-control" name="email" id="email" rows="3" placeholder="youremail@example.com"  required></input>
                  <button class="btn btn-info" style="margin-left:10px; padding-inline:20px" type="submit">Verifikasi</button>
                </div>
              </form>
              <form method="POST" id="verif-forgot-password-form" action="../../../app/Http/Controllers/auth/verifForgotPasswordController.php">
                <div class="mt-4">
                  <label class="mb-1" for="token">Masukkan Kode Verifikasi</label>
                  <input class="form-control" name="token" id="token" placeholder="xxxx" required></input>
                  <input type="hidden" class="form-control" name="email2" id="email2" placeholder="xxxx"></input>
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
            
    <!-- Link eksternal ke berkas JavaScript -->
    <script src="../../js/auth/main.js"></script>
    
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- auth with google account -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
      // sign-up form
      document.getElementById("forgot-password-form").addEventListener("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        // Tampilkan SweetAlert untuk memberi tahu pengguna bahwa sedang dalam proses
        Swal.fire({
          title: 'Loading...',
          allowOutsideClick: false,
          onBeforeOpen: () => {
            Swal.showLoading();
          },
        });
        fetch("../../../app/Http/Controllers/auth/forgotPasswordController.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            // Tutup SweetAlert setelah mendapatkan respons
            Swal.close();
            if (data.success) {
              // Pendaftaran berhasil
              Swal.fire({
                title: "Success!",
                text: data.message,
                icon: "success",
                confirmButtonText: "OK",
              }).then(function () {
                  // Redirect atau lakukan tindakan lain setelah pengguna menekan tombol OK
                  window.location.href = "reset_password.php";
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
            // Tutup SweetAlert jika terjadi kesalahan
            Swal.close();

            // Kesalahan saat mengirim permintaan AJAX
            Swal.fire({
              title: "Error!",
              text: error,
              icon: "error",
              confirmButtonText: "OK",
            });
          });
      });


    </script>
    <script>
      // sign-up form
      document.getElementById("verif-forgot-password-form").addEventListener("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.set("email2", document.getElementById('email2').value);

        fetch("../../../app/Http/Controllers/auth/verifForgotPasswordController.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            // Tutup SweetAlert setelah mendapatkan respons
            Swal.close();
            if (data.success) {
              // Pendaftaran berhasil
              Swal.fire({
                title: "Success!",
                text: data.message,
                icon: "success",
                confirmButtonText: "OK",
              }).then(function(){
                window.location.href="reset_password.php";
              })
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
            // Tutup SweetAlert jika terjadi kesalahan
            Swal.close();

            // Kesalahan saat mengirim permintaan AJAX
            Swal.fire({
              title: "Error!",
              text: error,
              icon: "error",
              confirmButtonText: "OK",
            });
          });
      });


    </script>
    <script>
        // Mendapatkan elemen input email
        var emailInput = document.getElementById('email');

        // Mendapatkan elemen input email2
        var email2Input = document.getElementById('email2');

        // Menambahkan event listener untuk memantau perubahan pada input email
        emailInput.addEventListener('input', function () {
            // Memperbarui nilai input email2 dengan nilai dari input email
            email2Input.value = emailInput.value;
        });
    </script>
    <!-- Letakkan script berikut di bagian bawah sebelum tag </body> -->
<script>
    // Mendapatkan elemen form verifikasi
    var verifForm = document.getElementById('verif-forgot-password-form');

    // Menambahkan event listener untuk menanggapi pengiriman form
    verifForm.addEventListener('submit', function (e) {
        // Mencegah pengiriman form
        e.preventDefault();

        // Memperoleh nilai dari input email
        var emailValue = document.getElementById('email').value;

        // Memperbarui nilai input email2 dengan nilai dari input email
        document.getElementById('email2').value = emailValue;

        // Mengirim form verifikasi menggunakan fetch
        fetch('../../../app/Http/Controllers/auth/verifForgotPasswordController.php', {
            method: 'POST',
            body: new FormData(verifForm),
        })
            .then(response => response.json())
            .then(data => {
                // Menanggapi respons dari pengiriman kode verifikasi
                if (data.success) {
                    // Jika sukses, hapus atribut 'disabled' pada elemen token
                    document.getElementById('token').disabled = false;

                    // Menampilkan pesan verifikasi
                    document.getElementById('verifMessage').style.display = 'block';
                    document.getElementById('verifMessage').innerText = data.message;

                    // Optional: Tambahkan logika atau tindakan lain yang diperlukan
                } else {
                    // Jika gagal, tampilkan pesan atau lakukan tindakan lain yang diperlukan
                    console.error(data.message);
                }
            })
            .catch(error => {
                // Menangani kesalahan dalam pengiriman data
                console.error(error);
            });
    });
</script>
  </body>
</html>
