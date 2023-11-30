<?php
// Mulai sesi (pastikan ini ada di awal skrip)
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['user_email'])) {
    header("Location: ../../../");
    exit(); // Pastikan untuk keluar setelah melakukan redirect
}
// Check if the logout link is clicked
if (isset($_GET['logout'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Send JSON response
  header('Content-Type: application/json');
  echo json_encode(['success' => true, 'message' => 'Logout successful']);
  exit();
}?>

<!DOCTYPE html>
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
    <title>Dashboard Admin | JejakPadi</title>
    <!-- Favicons -->
    <link href="../favicon.png" rel="icon">
    <link rel="manifest" href="../../../public/assets/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta
      name="msapplication-TileImage"
      content="../../../public/assets/favicon/ms-icon-144x144.png"
    />
    <meta name="theme-color" content="#ffffff" />
    <!-- vendor styles-->
    <link rel="stylesheet" href="../../../vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="../../css/admin/vendor/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="../../css/admin/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="../../css/admin/examples.css" rel="stylesheet" />
    <link
      href="../../../vendor/@coreui/chartjs/css/coreui-chartjs.css"
      rel="stylesheet"
    />
    <script>
        function logoutClicked() {
            // Assuming you are using AJAX (fetch) to call the PHP script
            fetch('?logout=true')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to '../index.php' after successful logout
                        window.location.href = '../../../';
                    } else {
                        // Handle any error messages if needed
                        console.error(data.message);
                    }
                })
                .catch(error => {
                    // Handle fetch error
                    console.error('Error:', error);
                });
        }
    </script>
  </head>
  <body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
      <div class="sidebar-brand d-none d-md-flex">
        <img src="../../../public/assets/brand/logo-brand.png" width="80"/>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="#">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">UTAMA</span></a></li>
        <li class="nav-title">Manajemen</li>
        <li class="nav-item"><a class="nav-link" href="sawah/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-layers"></use>
            </svg> Sawah</a></li>
        <li class="nav-item"><a class="nav-link" href="user/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> Akun</a></li>
        <li class="nav-title">Pengembangan</li>
        <li class="nav-item"><a class="nav-link" href="literasi/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> Literasi</a></li>
        <li class="nav-title">Pengadaan</li>
        <li class="nav-item"><a class="nav-link" href="bibit/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-eco"></use>
            </svg> Bibit</a></li>
        <li class="nav-item"><a class="nav-link" href="semprotan/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Semprotan</a></li>
        <li class="nav-item"><a class="nav-link" href="pupuk/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-storage"></use>
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
                    src="../../../public/assets/img/avatars/8.jpg"
                    alt="user@email.com"
                  />
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">Aksi</div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="logoutClicked()">
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
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-black" style="padding-bottom:15px ;background-color:#ffffff">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fw-semibold">Jumlah Produk</div>
                    <div class="fs-1 fw-semibold">
                      50
                      <span class="fs-6 fw-normal"
                        >(pcs)</span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-black" style="padding-bottom:15px ;background-color:#5EEB5B">
                <div
                  class="card-body pb-0 d-flex justify-content-between align-items-start"
                >
                
                  <div>
                  <div class="fw-semibold">Sawah</div>
                    <div class="fs-1 fw-semibold">
                      20
                      <span class="fs-6 fw-normal"
                        >(titik lokasi)</span
                      >
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-black bg-warning" style="padding-bottom:15px ;">
                <div
                  class="card-body pb-0 d-flex justify-content-between align-items-start"
                >
                  <div>
                    <div class="fw-semibold">Jenis Bibit</div>
                    <div class="fs-1 fw-semibold">
                      30
                      <span class="fs-6 fw-normal"
                        >(varian)
                      </span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
              <div class="card mb-4 text-black" style="padding-bottom:15px ;background-color:#62ab37">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fw-semibold">Jumlah Akun</div>
                    <div class="fs-1 fw-semibold">
                      7
                      <span class="fs-6 fw-normal">(petani)
                      </span>
                    </div>
                    
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn btn-transparent text-white p-0"
                      type="button"
                      data-coreui-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <svg class="icon">
                        <use
                          xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-options"
                        ></use>
                      </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Action</a
                      ><a class="dropdown-item" href="#">Another action</a
                      ><a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body" style="height:500px">
              
            </div>
          </div>
          <!-- /.card.mb-4-->
          <!-- /.row-->
        </div>
      </div>
      <footer class="footer">
        <div style="text-align:right">
            <div>
              Powered by&nbsp;<a href="#"
                >NexGen Team.</a
              >
            </div>
        </div>
      </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../vendor/chart.js/js/chart.min.js"></script>
    <script src="../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../vendor/@coreui/utils/js/coreui-utils.js"></script>
    <script src="../../js/admin/main.js"></script>
  </body>
</html>
