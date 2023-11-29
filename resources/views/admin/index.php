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
    <title>Dashboard Admin | SFS - Pertanian</title>
    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="../../../public/assets/favicon/apple-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="../../../public/assets/favicon/apple-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="../../../public/assets/favicon/apple-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../../../public/assets/favicon/apple-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="90x90" href
      href="../../../public/assets/favicon/apple-icon-76x76.png""
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="../../../public/assets/favicon/apple-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="../../../public/assets/favicon/apple-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="../../../public/assets/favicon/apple-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="../../../public/assets/favicon/apple-icon-152x152.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../../../public/assets/favicon/apple-icon-180x180.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="../../../public/assets/favicon/android-icon-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../../../public/assets/favicon/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="../../../public/assets/favicon/favicon-96x96.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../../public/assets/favicon/favicon-16x16.png"
    />
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
          <div class="row">
            <div class="col-sm-6 col-lg-4">
              <div class="card mb-4" style="--cui-card-cap-bg: #3b5998">
                <div
                  class="card-header position-relative d-flex justify-content-center align-items-center"
                >
                  <svg class="icon icon-3xl text-white my-4">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-facebook-f"
                    ></use>
                  </svg>
                  <div
                    class="chart-wrapper position-absolute top-0 start-0 w-100 h-100"
                  >
                    <canvas id="social-box-chart-1" height="90"></canvas>
                  </div>
                </div>
                <div class="card-body row text-center">
                  <div class="col">
                    <div class="fs-5 fw-semibold">89k</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      friends
                    </div>
                  </div>
                  <div class="vr"></div>
                  <div class="col">
                    <div class="fs-5 fw-semibold">459</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      feeds
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-4">
              <div class="card mb-4" style="--cui-card-cap-bg: #00aced">
                <div
                  class="card-header position-relative d-flex justify-content-center align-items-center"
                >
                  <svg class="icon icon-3xl text-white my-4">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-twitter"
                    ></use>
                  </svg>
                  <div
                    class="chart-wrapper position-absolute top-0 start-0 w-100 h-100"
                  >
                    <canvas id="social-box-chart-2" height="90"></canvas>
                  </div>
                </div>
                <div class="card-body row text-center">
                  <div class="col">
                    <div class="fs-5 fw-semibold">973k</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      followers
                    </div>
                  </div>
                  <div class="vr"></div>
                  <div class="col">
                    <div class="fs-5 fw-semibold">1.792</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      tweets
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-4">
              <div class="card mb-4" style="--cui-card-cap-bg: #4875b4">
                <div
                  class="card-header position-relative d-flex justify-content-center align-items-center"
                >
                  <svg class="icon icon-3xl text-white my-4">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-linkedin"
                    ></use>
                  </svg>
                  <div
                    class="chart-wrapper position-absolute top-0 start-0 w-100 h-100"
                  >
                    <canvas id="social-box-chart-3" height="90"></canvas>
                  </div>
                </div>
                <div class="card-body row text-center">
                  <div class="col">
                    <div class="fs-5 fw-semibold">500+</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      contacts
                    </div>
                  </div>
                  <div class="vr"></div>
                  <div class="col">
                    <div class="fs-5 fw-semibold">292</div>
                    <div class="text-uppercase text-medium-emphasis small">
                      feeds
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header">Traffic &amp; Sales</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-6">
                          <div
                            class="border-start border-start-4 border-start-info px-3 mb-3"
                          >
                            <small class="text-medium-emphasis"
                              >New Clients</small
                            >
                            <div class="fs-5 fw-semibold">9.123</div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6">
                          <div
                            class="border-start border-start-4 border-start-danger px-3 mb-3"
                          >
                            <small class="text-medium-emphasis"
                              >Recuring Clients</small
                            >
                            <div class="fs-5 fw-semibold">22.643</div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                      <hr class="mt-0" />
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small">Monday</span>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 34%"
                              aria-valuenow="34"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 78%"
                              aria-valuenow="78"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small"
                            >Tuesday</span
                          >
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 56%"
                              aria-valuenow="56"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 94%"
                              aria-valuenow="94"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small"
                            >Wednesday</span
                          >
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 12%"
                              aria-valuenow="12"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 67%"
                              aria-valuenow="67"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small"
                            >Thursday</span
                          >
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 43%"
                              aria-valuenow="43"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 91%"
                              aria-valuenow="91"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small">Friday</span>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 22%"
                              aria-valuenow="22"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 73%"
                              aria-valuenow="73"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small"
                            >Saturday</span
                          >
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 53%"
                              aria-valuenow="53"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 82%"
                              aria-valuenow="82"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend">
                          <span class="text-medium-emphasis small">Sunday</span>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-info"
                              role="progressbar"
                              style="width: 9%"
                              aria-valuenow="9"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-danger"
                              role="progressbar"
                              style="width: 69%"
                              aria-valuenow="69"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-6">
                          <div
                            class="border-start border-start-4 border-start-warning px-3 mb-3"
                          >
                            <small class="text-medium-emphasis"
                              >Pageviews</small
                            >
                            <div class="fs-5 fw-semibold">78.623</div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6">
                          <div
                            class="border-start border-start-4 border-start-success px-3 mb-3"
                          >
                            <small class="text-medium-emphasis">Organic</small>
                            <div class="fs-5 fw-semibold">49.123</div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                      <hr class="mt-0" />
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-user"
                            ></use>
                          </svg>
                          <div>Male</div>
                          <div class="ms-auto fw-semibold">43%</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-warning"
                              role="progressbar"
                              style="width: 43%"
                              aria-valuenow="43"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-5">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-user-female"
                            ></use>
                          </svg>
                          <div>Female</div>
                          <div class="ms-auto fw-semibold">37%</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-warning"
                              role="progressbar"
                              style="width: 43%"
                              aria-valuenow="43"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-google"
                            ></use>
                          </svg>
                          <div>Organic Search</div>
                          <div class="ms-auto fw-semibold me-2">191.235</div>
                          <div class="text-medium-emphasis small">(56%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-success"
                              role="progressbar"
                              style="width: 56%"
                              aria-valuenow="56"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-facebook-f"
                            ></use>
                          </svg>
                          <div>Facebook</div>
                          <div class="ms-auto fw-semibold me-2">51.223</div>
                          <div class="text-medium-emphasis small">(15%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-success"
                              role="progressbar"
                              style="width: 15%"
                              aria-valuenow="15"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-twitter"
                            ></use>
                          </svg>
                          <div>Twitter</div>
                          <div class="ms-auto fw-semibold me-2">37.564</div>
                          <div class="text-medium-emphasis small">(11%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-success"
                              role="progressbar"
                              style="width: 11%"
                              aria-valuenow="11"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-linkedin"
                            ></use>
                          </svg>
                          <div>LinkedIn</div>
                          <div class="ms-auto fw-semibold me-2">27.319</div>
                          <div class="text-medium-emphasis small">(8%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div
                              class="progress-bar bg-success"
                              role="progressbar"
                              style="width: 8%"
                              aria-valuenow="8"
                              aria-valuemin="0"
                              aria-valuemax="100"
                            ></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- /.row--><br />
                  <div class="table-responsive">
                    <table class="table border mb-0">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            <svg class="icon">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-people"
                              ></use>
                            </svg>
                          </th>
                          <th>User</th>
                          <th class="text-center">Country</th>
                          <th>Usage</th>
                          <th class="text-center">Payment Method</th>
                          <th>Activity</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/1.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-success"></span>
                            </div>
                          </td>
                          <td>
                            <div>Yiorgos Avraamu</div>
                            <div class="small text-medium-emphasis">
                              <span>New</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-us"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">50%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-success"
                                role="progressbar"
                                style="width: 50%"
                                aria-valuenow="50"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-mastercard"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">10 sec ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/2.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-danger"></span>
                            </div>
                          </td>
                          <td>
                            <div>Avram Tarasios</div>
                            <div class="small text-medium-emphasis">
                              <span>Recurring</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-br"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">10%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-info"
                                role="progressbar"
                                style="width: 10%"
                                aria-valuenow="10"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-visa"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">5 minutes ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/3.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-warning"></span>
                            </div>
                          </td>
                          <td>
                            <div>Quintin Ed</div>
                            <div class="small text-medium-emphasis">
                              <span>New</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-in"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">74%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-warning"
                                role="progressbar"
                                style="width: 74%"
                                aria-valuenow="74"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-stripe"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">1 hour ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/4.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-secondary"></span>
                            </div>
                          </td>
                          <td>
                            <div>Enéas Kwadwo</div>
                            <div class="small text-medium-emphasis">
                              <span>New</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-fr"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">98%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-danger"
                                role="progressbar"
                                style="width: 98%"
                                aria-valuenow="98"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-paypal"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">Last month</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/5.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-success"></span>
                            </div>
                          </td>
                          <td>
                            <div>Agapetus Tadeáš</div>
                            <div class="small text-medium-emphasis">
                              <span>New</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-es"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">22%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-info"
                                role="progressbar"
                                style="width: 22%"
                                aria-valuenow="22"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-apple-pay"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">Last week</div>
                          </td>
                          <td>
                            <div class="dropdown dropup">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md">
                              <img
                                class="avatar-img"
                                src="../../../public/assets/img/avatars/6.jpg"
                                alt="user@email.com"
                              /><span class="avatar-status bg-danger"></span>
                            </div>
                          </td>
                          <td>
                            <div>Friderik Dávid</div>
                            <div class="small text-medium-emphasis">
                              <span>New</span> | Registered: Jan 1, 2020
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/flag.svg#cif-pl"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-start">
                                <div class="fw-semibold">43%</div>
                              </div>
                              <div class="float-end">
                                <small class="text-medium-emphasis"
                                  >Jun 11, 2020 - Jul 10, 2020</small
                                >
                              </div>
                            </div>
                            <div class="progress progress-thin">
                              <div
                                class="progress-bar bg-success"
                                role="progressbar"
                                style="width: 43%"
                                aria-valuenow="43"
                                aria-valuemin="0"
                                aria-valuemax="100"
                              ></div>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use
                                xlink:href="../../../vendor/@coreui/icons/svg/brand.svg#cib-cc-amex"
                              ></use>
                            </svg>
                          </td>
                          <td>
                            <div class="small text-medium-emphasis">
                              Last login
                            </div>
                            <div class="fw-semibold">Yesterday</div>
                          </td>
                          <td>
                            <div class="dropdown dropup">
                              <button
                                class="btn btn-transparent p-0"
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
                                <a class="dropdown-item" href="#">Info</a
                                ><a class="dropdown-item" href="#">Edit</a
                                ><a class="dropdown-item text-danger" href="#"
                                  >Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
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
