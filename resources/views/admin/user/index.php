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
    <!-- popover sytle -->
    <link href="../../../css/admin/popup.scss" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="../../../css/admin/examples.css" rel="stylesheet" />
    <link
      href="../../../../vendor/@coreui/chartjs/css/coreui-chartjs.css"
      rel="stylesheet"
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
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="card-title mb-0">Manajemen Akun</h4>
                  <div class="small text-medium-emphasis">
                    UD Tani Rejo Jenggawah
                  </div>
                </div>
                <a href="./create.php"  class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;">Tambah Akun</a>
              </div>
              <div class="table-responsive" style="margin-top: 40px">
                <table class="table" style="width:2300px;">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th width="6%">Nama Depan</th>
                      <th width="7%">Nama Belakang</th>
                      <th width="18%">Alamat</th>
                      <th width="10%">Email</th>
                      <th width="7%">No Handphone</th>
                      <th width="6%">Tanggal Lahir</th>
                      <th width="5%">Hak Akses</th>
                      <th width="8%">Password</th>
                      <th style="padding-left:10px;text-align:center;" width="8%">Tanggal Daftar</th>
                      <th style="padding-left:10px;text-align:center;"width="8%">Foto Profil</th>
                      <th style="padding-left:10px;text-align:center; width:50%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  include_once '../../../../config/database.php';
                  $no = 1;
                  $result = mysqli_query($conn, "SELECT * FROM users");
                  while ($users = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>{$no}</td>";
                      echo "<td>{$users['nama_depan']}</td>";
                      echo "<td>{$users['nama_belakang']}</td>";
                      echo "<td>{$users['alamat']}</td>";
                      echo "<td>{$users['email']}</td>";
                      echo "<td style='text-align: justify'>{$users['no_handphone']}</td>";
                      echo "<td>{$users['tanggal_lahir']}</td>";
                      echo "<td>{$users['hak_akses']}</td>";
                      echo "<td style='margin-left:5px; text-align: center'>{$users['password']}</td>";
                      echo "<td style='margin-left:5px; text-align: center'>{$users['tanggal_daftar']}</td>";
                      if (!empty($users['gambar_path'])) {
                        echo "<td style='text-align: center'>
                            <button style='padding-right:30px;padding-left:30px' type='button' class='btn btn-warning' onclick=\"window.open('../../../../public/assets/img/bibit/{$users['gambar_path']}', '_blank')\">
                                <img class='btn-logo' src='../../../../public/assets/icons/sent-icon.png'>
                            </img>
                            </button>
                        </td>";
                      } else {
                          echo "<td style='text-align:center'>-</td>"; // Empty cell if no image path
                      }
                      echo "
                      <td>
                        <div style='text-align: center'>
                          
                              <button style='margin-left: 0.5rem;'type='button' class='btn btn-danger' id='deleteBtn{$users['id_user']}' data-id='{$users['id_user']}'>
                                <img class='btn-logo' src='../../../../public/assets/icons/recycle-bin-line-icon.png'>
                                </img>
                              </button>
                              <button style='margin-right: 0.5rem; margin-left: 0.5rem;' type='button' class='btn btn-light' onclick=\"window.location.href='./edit.php?id={$users['id_user']}'\">
                                <img class='btn-logo' src='../../../../public/assets/icons/edit-pen-icon.png'>
                                </img>
                              </button>
                              <button type='button' class='btn btn-info' onclick=\"window.location.href='./info.php?id={$users['id_user']}'\">
                                <img class='btn-logo' src='../../../../public/assets/icons/database-cloud-icon.png'>
                                </img>
                              </button>
                          
                        </div>
                      </td>"
                      ;
                      echo "</tr>";
                      $no++;
                  }
                  ?>
                      
                  </tbody>
                </table>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- hapus user -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const deleteButtons = document.querySelectorAll('[id^=deleteBtn]');

          deleteButtons.forEach(button => {
              button.addEventListener('click', function () {
                  const id = this.getAttribute('data-id');

                  Swal.fire({
                      title: 'Konfirmasi Hapus',
                      text: 'Apakah Anda yakin ingin menghapus data ini?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Hapus',
                      cancelButtonText: 'Batal',
                  }).then((result) => {
                      if (result.isConfirmed) {
                          // Menggunakan fetch API untuk mengirim permintaan penghapusan ke deleteController.php
                          fetch(`../../../../app/Http/Controllers/user/deleteController.php?id=${id}`, { method: 'GET' })
                              .then(response => response.json())
                              .then(data => {
                                  if (data.success) {
                                      Swal.fire('Berhasil', data.message, 'success').then(() => {
                                          // Redirect ke halaman setelah penghapusan berhasil
                                          window.location.href = 'index.php';
                                      });
                                  } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: data.message,
                                        icon: "error",
                                        confirmButtonText: "OK",
                                    });
                                  }
                              })
                              .catch(error => {
                                  Swal.fire({
                                      title: "Error!",
                                      text: "Terjadi kesalahan saat mengirim permintaan penghapusan.",
                                      icon: "error",
                                      confirmButtonText: "OK",
                                  });
                              });
                      }
                  });
              });
          });
      });
      </script>

    <!-- CoreUI and necessary plugins-->
    <script src="../../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../../vendor/@coreui/utils/js/coreui-utils.js"></script>
    <script></script>
  </body>
</html>