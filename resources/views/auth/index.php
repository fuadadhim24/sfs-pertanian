<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login SFS - Pertanian</title>

    <!-- Favicons -->
    <link href="../../../public/assets/img/favicon.png" rel="icon" />
    <!-- Template Main CSS File -->
    <link href="../../css/auth/style.css" rel="stylesheet" />

    <!-- auth with google -->
    <meta
      name="google-signin-client_id"
      content="257712218696-7qu4d9dekltst8r6rhmedp42fsq5e5a6.apps.googleusercontent.com"
    />
  </head>
  <body>
    <div class="container">
      <div class="overlay" id="overlay">
        <div class="sign-in" id="sign-in">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="switch-button" id="slide-right-button">Sign In</button>
        </div>
        <div class="sign-up" id="sign-up">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start a journey with us</p>
          <button class="switch-button" id="slide-left-button">Sign Up</button>
        </div>
      </div>
      <div class="form">
        <div class="sign-in" id="sign-in-info">
          <h1>Sign In</h1>
          <div class="social-media-buttons">
            <div class="icon">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"
                />
              </svg>
            </div>
            <div class="icon">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z"
                />
              </svg>
            </div>
            <div class="icon">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z"
                />
              </svg>
            </div>
          </div>
          <p class="small">or use your email account:</p>
          <form
            id="sign-in-form"
            action="../../../app/Http/Controllers/auth/signInController.php"
            method="post"
          >
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <p class="forgot-password">Forgot your password?</p>
            <button type="submit" class="control-button in" name="signin">
              Sign In
            </button>
          </form>
        </div>
        <div class="sign-up" id="sign-up-info">
          <h1>Buat Akun Baru</h1>
          <div class="social-media-buttons">
            <div class="icon" href="#">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z"
                />
              </svg>
            </div>
            <div class="icon" href="#">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z"
                />
              </svg>
            </div>
            <div class="icon" href="#">
              <svg viewBox="0 0 24 24">
                <path
                  fill="#000000"
                  d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z"
                />
              </svg>
            </div>
          </div>
          <p class="small">or use your email for registration:</p>
          <form
            id="sign-up-form"
            action="../../../app/Http/Controllers/auth/signUpController.php"
            method="POST"
          >
            <input
              id="username"
              type="text"
              name="username"
              placeholder="Username"
              required
            /><br />
            <input
              id="email"
              type="email"
              name="email"
              placeholder="Email"
              required
            /><br />
            <input
              id="password"
              type="password"
              name="password"
              placeholder="Password"
              required
            /><br />
            <button type="submit" class="control-button up" name="signup">
              Sign Up
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- Link eksternal ke berkas JavaScript -->
    <script src="../../js/auth/main.js"></script>
    
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- auth with google account -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script>
      // sign-up form
      document
        .getElementById("sign-up-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          var formData = new FormData(this);

          fetch("../../../app/Http/Controllers/auth/signUpController.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                // Pendaftaran berhasil
                Swal.fire({
                  title: "Success!",
                  text: data.message,
                  icon: "success",
                  confirmButtonText: "OK",
                }).then(function () {
                  // Redirect atau lakukan tindakan lain setelah pengguna menekan tombol OK
                  window.location.href = "../admin/index.php";
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
      // sign-In form
      document
        .getElementById("sign-in-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          var formData = new FormData(this);

          fetch("../../../app/Http/Controllers/auth/signInController.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                // Pendaftaran berhasil
                Swal.fire({
                  title: "Success!",
                  text: data.message,
                  icon: "success",
                  confirmButtonText: "OK",
                }).then(function () {
                  // Redirect atau lakukan tindakan lain setelah pengguna menekan tombol OK
                  window.location.href = "../admin/index.php";
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
              Swal.fire({
                  title: "Error!",
                  text: error,
                  icon: "error",
                  confirmButtonText: "OK",
              });
            });
        });
    </script>
  </body>
</html>
