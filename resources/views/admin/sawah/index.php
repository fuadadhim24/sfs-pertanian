<?php
// index.php
?>

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
        <svg
          class="sidebar-brand-full"
          width="118"
          height="46"
          alt="SFS - Pertanian Logo"
        >
          <use xlink:href="../../../../public/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg
          class="sidebar-brand-narrow"
          width="46"
          height="46"
          alt="SFS - Pertanian Logo"
        >
          <use
            xlink:href="../../../../public/assets/brand/coreui.svg#signet"
          ></use>
        </svg>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-speedometer"
              ></use>
            </svg>
            Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a
          >
        </li>
        <li class="nav-title">Manajemen</li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreunodei/icons/svg/free.svg#cil-drop"
              ></use>
            </svg>
            Data Sawah</a
          >
          <a class="nav-link" href="../bibit/index.php">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreunodei/icons/svg/free.svg#cil-drop"
              ></use>
            </svg>
            Data Bibit/Varietas</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="typography.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-pencil"
              ></use>
            </svg>
            Data Pupuk</a
          >
        </li>
        <li class="nav-title">Kelas</li>
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Umum</a
          >
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Bibit</a
          >
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Semai</a
          >
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Pemupukan</a
          >
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Penanggulangan</a
          >
          <a class="nav-link" href="./bibit/index.html">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-chart-pie"
              ></use>
            </svg>
            Standar QC</a
          >
        <li class="nav-divider"></li>
        <li class="nav-title">Extras</li>
        <li class="nav-group">
          <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-star"
              ></use>
            </svg>
            Pages</a
          >
          <ul class="nav-group-items">
            <li class="nav-item">
              <a class="nav-link" href="login.html" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-account-logout"
                  ></use>
                </svg>
                Login</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-account-logout"
                  ></use>
                </svg>
                Register</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="404.html" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-bug"
                  ></use>
                </svg>
                Error 404</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="500.html" target="_top">
                <svg class="nav-icon">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-bug"
                  ></use>
                </svg>
                Error 500</a
              >
            </li>
          </ul>
        </li>
        <li class="nav-item mt-auto">
          <a
            class="nav-link"
            href="https://coreui.io/docs/templates/installation/"
            target="_blank"
          >
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-description"
              ></use>
            </svg>
            Docs</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link nav-link-danger"
            href="https://coreui.io/pro/"
            target="_top"
          >
            <svg class="nav-icon">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-layers"
              ></use>
            </svg>
            Try CoreUI
            <div class="fw-semibold">PRO</div>
          </a>
        </li>
      </ul>
      <button
        class="sidebar-toggler"
        type="button"
        data-coreui-toggle="unfoldable"
      ></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid">
          <button
            class="header-toggler px-md-0 me-md-3"
            type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
          >
            <svg class="icon icon-lg">
              <use
                xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-menu"
              ></use>
            </svg></button
          ><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
              <use
                xlink:href="../../../../public/assets/brand/coreui.svg#full"
              ></use></svg
          ></a>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Sawah</a></li>
          </ul>
          <ul class="header-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-bell"
                  ></use></svg
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-list-rich"
                  ></use></svg
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg class="icon icon-lg">
                  <use
                    xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-envelope-open"
                  ></use></svg
              ></a>
            </li>
          </ul>
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
                  <div class="fw-semibold">Account</div>
                </div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-bell"
                    ></use>
                  </svg>
                  Updates<span class="badge badge-sm bg-info ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-envelope-open"
                    ></use>
                  </svg>
                  Messages<span class="badge badge-sm bg-success ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-task"
                    ></use>
                  </svg>
                  Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-comment-square"
                    ></use>
                  </svg>
                  Comments<span class="badge badge-sm bg-warning ms-2"
                    >42</span
                  ></a
                >
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
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-credit-card"
                    ></use>
                  </svg>
                  Payments<span class="badge badge-sm bg-secondary ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-file"
                    ></use>
                  </svg>
                  Projects<span class="badge badge-sm bg-primary ms-2"
                    >42</span
                  ></a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../../vendor/@coreui/icons/svg/free.svg#cil-lock-locked"
                    ></use>
                  </svg>
                  Lock Account</a
                ><a class="dropdown-item" href="#">
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
        <div class="header-divider"></div>
        <div class="container-fluid">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Manajemen</span>
              </li>
              <li class="breadcrumb-item active"><span>Sawah</span></li>
            </ol>
          </nav>
        </div>
      </header>
      <div class="body flex-grow-1 px-3">
        <div class="container-lg">
          <!-- /.row-->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="card-title mb-0">Lokasi Sawah</h4>
                  <div class="small text-medium-emphasis">
                    UD Tani Rejo Jenggawah
                  </div>
                </div>
                <a href="./create.php"  class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;">Tambah Sawah</a>
              </div>
              <div cclass="c-chart-wrapper table-responsive" style="height: 300px; margin-top: 40px">
              <table class="table caption-top">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sawah</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Terdaftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include_once '../../../../config/database.php';
            $no = 1;
            $result = mysqli_query($conn, "SELECT * FROM sawah");
            while ($sawah = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$sawah['nama_sawah']}</td>";
                echo "<td>{$sawah['lokasi_sawah']}</td>";
                echo "<td>{$sawah['deskripsi']}</td>";
                echo "<td>{$sawah['created_at']}</td>";
                echo "<td>
                    <button type='button' class='btn btn-light' onclick=\"window.location.href='./edit.php?id={$sawah['id_sawah']}'\">
                        <svg class='avatar-sm'>
                            <use xlink:href='../../../../vendor/@coreui/icons/svg/free.svg#cil-pencil'></use>
                        </svg>
                    </button>
                    <button type='button' class='btn btn-danger' id='deleteBtn{$sawah['id_sawah']}' data-id='{$sawah['id_sawah']}'>
                        <svg class='avatar-sm'>
                            <use xlink:href='../../../../vendor/@coreui/icons/svg/free.svg#cil-trash'></use>
                        </svg>
                    </button>
                    <button type='button' class='btn btn-info' onclick=\"window.location.href='./info.php?id={$sawah['id_sawah']}'\">
                        <svg class='avatar-sm'>
                            <use xlink:href='../../../../vendor/@coreui/icons/svg/free.svg#cil-info'></use>
                        </svg>
                    </button>
                </td>";
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
          <a href="https://coreui.io">CoreUI </a
          ><a href="https://coreui.io">Bootstrap Admin Template</a> © 2023
          creativeLabs.
        </div>
        <div class="ms-auto">
          Powered by&nbsp;<a href="https://coreui.io/docs/"
            >CoreUI UI Components</a
          >
        </div>
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- hapus sawah -->
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
                          fetch(`../../../../app/Http/Controllers/sawah/deleteController.php?id=${id}`, { method: 'GET' })
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