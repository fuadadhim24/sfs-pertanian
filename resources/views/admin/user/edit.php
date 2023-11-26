<?php
// Mulai sesi (pastikan ini ada di awal skrip)
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['user_email'])) {
    header("Location: ../../index.php");
    exit(); // Pastikan untuk keluar setelah melakukan redirect
}
// Check if the logout link is clicked
if (isset($_GET['logout'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect to '../index.php'
  header('Location: ../../index.php');
  exit();
}?>
<!--

--><!-- Breadcrumb-->
<html lang="en">
  <head>
    <base href="./" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="CoreUI - Open Source Bootstrap Admin Template"
    />
    <meta name="author" content="Łukasz Holeczek" />
    <meta
      name="keyword"
      content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard"
    />
    <title>Dashboard Admin | SFS - Pertanian</title>
    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="../../../../public/assets/favicon/apple-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="../../../../public/assets/favicon/apple-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="../../../../public/assets/favicon/apple-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../../../../public/assets/favicon/apple-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="../../../../public/assets/favicon/apple-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="../../../../public/assets/favicon/apple-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="../../../../public/assets/favicon/apple-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="../../../../public/assets/favicon/apple-icon-152x152.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../../../../public/assets/favicon/apple-icon-180x180.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="../../../../public/assets/favicon/android-icon-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../../../../public/assets/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="../../../../public/assets/favicon/favicon-96x96.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../../../public/assets/favicon/favicon-16x16.png"
    />
    <link rel="manifest" href="../../../../public/assets/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta
      name="msapplication-TileImage"
      content="../../../../public/assets/favicon/ms-icon-144x144.png"
    />
    <meta name="theme-color" content="#ffffff" />
    <!-- vendor styles-->
    <link rel="stylesheet" href="../../../../vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="../../../css/admin/vendors/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="../../../css/admin/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="../../../css/admin/examples.css" rel="stylesheet" />
    <link
      href="../../../../vendor/@coreui/chartjs/css/coreui-chartjs.css"
      rel="stylesheet"
    />
    <!-- for map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""
    />
  </head>
  <body>
  <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <img src="../../../../public/assets/brand/logo-brand.png" width="80"/>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="../index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">UTAMA</span></a></li>
        <li class="nav-title">Manajemen</li>
        <li class="nav-item"><a class="nav-link" href="../sawah/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-layers"></use>
            </svg> Sawah</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> Akun</a></li>
        <li class="nav-title">Pengembangan</li>
        <li class="nav-item"><a class="nav-link" href="../literasi/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> Literasi</a></li>
        <li class="nav-title">Pengadaan</li>
        <li class="nav-item"><a class="nav-link" href="../bibit/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-eco"></use>
            </svg> Bibit</a></li>
        <li class="nav-item"><a class="nav-link" href="../semprotan/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Semprotan</a></li>
        <li class="nav-item"><a class="nav-link" href="../pupuk/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-storage"></use>
            </svg> Pupuk</a></li>
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-3">  
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Dashboard</span>
              </li>
            </ol>
          </nav>
          <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
              <a
                class="nav-link py-0"
                data-coreui-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <div class="avatar avatar-md">
                  <img
                    class="avatar-img"
                    src="../../../../public/assets/img/avatars/8.jpg"
                    alt="user@email.com"
                  />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Settings</div>
                </div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-user"
                    ></use>
                  </svg>
                  Profile</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-settings"
                    ></use>
                  </svg>
                  Settings</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-account-logout"
                    ></use>
                  </svg>
                  Logout</a
                >
              </div>
            </li>
          </ul>
        </div> 
      </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
              <div class="card mb-4">
              <?php
                    // Hubungkan ke database
                    include_once '../../../../config/database.php';

                    // Periksa apakah ada parameter ID yang dikirimkan
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query untuk mengambil data sawah berdasarkan ID
                        $query = "SELECT * FROM users WHERE id_user = $id";
                        $result = mysqli_query($conn, $query);
                        $user = mysqli_fetch_array($result);

                        if ($user) {
                ?>
                <form action="../../../../app/Http/Controllers/user/editController.php" method="post" id="editUser" enctype="multipart/form-data">
                  <div class="card-body">
                    <h5 class="card-title mb-4">Edit Akun Petani</h5>
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-coreui-toggle="tab" data-coreui-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Informasi</button>
                        <button class="nav-link" id="nav-rincian-tab" data-coreui-toggle="tab" data-coreui-target="#nav-rincian" type="button" role="tab" aria-controls="nav-rincian" aria-selected="false">Identitas Diri</button>
                        <button class="nav-link" id="nav-profile-tab" data-coreui-toggle="tab" data-coreui-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Foto Profil</button>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                          <div class="row">
                              <div class="mb-3 mt-3">
                                  <label class="form-label">No Handphone<span style="color:red"> *</span></label>
                                  <input class="form-control" name="no_handphone" id="no_handphone" rows="3" value="<?php echo $user['no_handphone']?>" required></input>
                                  <input class="form-control" type="hidden" name="id_user" id="id_user" rows="3" value="<?php echo $user['id_user']?>"></input>
                                  <input class="form-control" type="hidden" name="hak_akses" id="hak_akses" rows="3" value="<?php echo $user['hak_akses']?>"></input>
                                  <input class="form-control" type="hidden" name="tanggal_daftar" id="tanggal_daftar" rows="3" value="<?php echo $user['tanggal_daftar']?>"></input>
                              </div>
                              <div class="mb-3">
                                  <div class="row g-3">
                                      <div class="col">
                                          <label class="form-label">Nama Depan<span style="color:red"> *</span></label>
                                          <input class="form-control" name="nama_depan" id="nama_depan" rows="3" value="<?php echo $user['nama_depan']?>" required></input>
                                      </div>
                                      <div class="col">
                                          <label class="form-label">Nama Belakang<span style="color:red"> *</span></label>
                                          <input class="form-control" name="nama_belakang" id="nama_belakang" rows="3" value="<?php echo $user['nama_belakang']?>" required></input>
                                      </div>
                                  </div>
                              </div>
                              <div class="mb-3 mt-3">
                                  <label class="form-label">Email<span style="color:red"> *</span></label>
                                  <input class="form-control" name="email" id="email" rows="3" value="<?php echo $user['email']?>" required></input>
                              </div>
                              <div class="mb-3 mt-3">
                                <label for="password" class="form-label">Password Akun<span style="color:red"> *</span></label>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($user['password']); ?>">
                                <div id="passwordHelpBlock" class="form-text">
                                  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="nav-rincian" role="tabpanel" aria-labelledby="nav-rincian-tab" tabindex="0">
                          <div class="mb-3 mt-3">
                                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span style="color:red"> *</span></label>
                                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" rows="3" value="<?php echo $user['tanggal_lahir']?>" required></input>
                              </div>
                              <div class="mb-3">
                                <label for="deskripsi_lengkap" class="form-label">Alamat<span style="color:red"> *</span></label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?php echo $user['alamat']?></textarea>
                          </div>
                      </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                      <div class="mb-3 mt-3">
                              <div class="mb-3">
                                  <label for="formFileSm" class="form-label">Gambar<span style="color:red"> *</span></label>
                                  <input class="form-control form-control-sm" name="gambar_path_main" id="gambar_path_main" type="file" accept="image/*" value="<?php echo $user['gambar_path']?>" required>
                              </div>
                          </div>
                      </div>
                      <div class="mt-2">
                              <button type="submit" id="createAkun" class="btn btn-success text-white" style="padding:8px; padding-right:40px; padding-left:40px; justify-content: center;align-items: center;">Edit akun</button>
                      </div>
                    </div>
                  </div>
                </form>
                <?php
                            } else {
                                echo "Data tidak ditemukan.";
                            }
                        } else {
                            echo "ID tidak ditemukan.";
                        }
                        ?>
              </div>
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
    <!-- CoreUI and necessary plugins-->
    <script src="../../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../../vendor/@coreui/utils/js/coreui-utils.js"></script>
   
   
    <script src="../../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
      document.getElementById("editUser").addEventListener("submit", function(event) {
          // Add your form submission logic here, for example, using AJAX to submit the form data asynchronously
          // Prevent the default form submission
          event.preventDefault();
          var formData = new FormData(this);

            // Tambahkan parameter action=create untuk memanggil fungsi create
            formData.append('action', 'edit');

            fetch("../../../../app/Http/Controllers/user/editController.php", {
                method: "POST",
                body: formData,
            })
            .then((response) => {
                if (response.ok) {
                    return response.json(); // Uraikan respons JSON jika respons OK
                } else {
                    throw new Error('Terjadi kesalahan saat mengambil respons.');
                }
            })
            .then((data) => {
                if (data.success) {
                    // Input berhasil
                    Swal.fire({
                        title: "Berhasil!",
                        text: data.message,
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(function () {
                        // Redirect atau lakukan tindakan lain setelah pengguna menekan tombol OK
                        window.location.href = "index.php";
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
                // Kesalahan saat mengirim permintaan AJAX atau menguraikan respons
                Swal.fire({
                    title: "Error!",
                    text: error.message,
                    icon: "error",
                    confirmButtonText: "OK",
                });
                console.error("Error:", error);
            });
      });
    </script>
  </body>
</html>