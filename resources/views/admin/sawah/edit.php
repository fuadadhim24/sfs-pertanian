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

    <!-- search location -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
        <li class="nav-item"><a class="nav-link" href="../user/index.php">
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
              <div class="row">
                  <!-- First Card -->
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <div class="card mb-3">
                          <div class="card-body">
                              <div class="c-chart-wrapper">
                                <?php
                                  // Hubungkan ke database
                                  include_once '../../../../config/database.php';

                                  // Periksa apakah ada parameter ID yang dikirimkan
                                  if (isset($_GET['id'])) {
                                      $id = $_GET['id'];

                                      // Query untuk mengambil data sawah berdasarkan ID
                                      $query = "SELECT * FROM sawah JOIN users ON users.id_user=sawah.id_user WHERE id_sawah = $id";
                                      $result = mysqli_query($conn, $query);
                                      $sawah = mysqli_fetch_array($result);

                                      if ($sawah) {
                                  ?>
                                  <form id="edit-form" action="../../../../app/Http/Controllers/sawah/editController.php" method="POST">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title">Detail Info</h5>
                                        </div>
                                        <div style="text-align:right; color:#808080;" class="col">
                                            <label class="form-label"><a style="color:#0c8305">*</a>Tekan map untuk menentukan lahan sawah anda</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                      <input class="form-control mt-2" name="id_sawah" id="id" rows="3" type="hidden" value="<?php echo $sawah['id_sawah']?>" required/>
                                          <div class="mb-3">
                                              <input class="form-control mt-2" name="lokasi_sawah" id="lokasi_sawah" rows="3" type="hidden" value="<?php echo $sawah['lokasi_sawah']?>" required/>
                                              <label class="form-label">Nama lokasi</label>
                                              <input class="form-control" name="nama_sawah" id="nama_sawah" rows="3" value="<?php echo $sawah['nama_sawah']?>" required></input>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Deskripsi</label>
                                              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required><?php echo $sawah['deskripsi']?></textarea>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal Pengadaan</label>
                                              <input style="padding-bottom: 5px" type="date" class="form-control" name="created_at" id="created_at" rows="3" value="<?php echo $sawah['created_at']?>" required></input>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Nama Petani</label>
                                              <input type="hidden" class="form-control" name="id_user" id="nama_sawah" rows="3" required></input>
                                              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_user" id="id_user" required>
                                                <option value="<?php echo $sawag['id_user']; ?>" selected><?php echo $sawah['nama_depan']; ?></option>
                                                <?php 
                                                  include_once '../../../../config/database.php';
                                                  $query = "SELECT * FROM users WHERE users.hak_akses='Petani'";

                                                  $result = mysqli_query($conn, $query);

                                                  // Ganti fetch menjadi fetch_assoc untuk mendapatkan associative array
                                                  while ($user = mysqli_fetch_array($result)) {
                                                  ?>
                                                      <option value="<?php echo $user['id_user']; ?>"><?php echo $user['nama_depan']; ?></option>
                                                  <?php 
                                                  }
                                                ?>
                                              </select>
                                          </div>
                                          <div class="mt-2">
                                              <button type="submit" id="createLokasi" class="btn btn-success text-white" style="padding:8px; padding-right:40px; padding-left:40px; justify-content: center;align-items: center;">Edit Sawah</button>
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
                  </div>
                  
                  <!-- Second Card -->
                  <div class="col-sm-6">
                      <div class="card mb-3">
                          <div class="card-body">
                              <h5 class="card-title">Lokasi Sawah</h5>
                              <div class="mb-3">
                                  <div id="map" style="height:300px; border-radius:8px"></div>
                              </div>
                          </div>
                      </div>
                  </div>
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
   
   
    <!-- for leaflet's css -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="../../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        var map = L.map('map').setView([-8.168577, -246.296838], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var popup = L.popup();

        // Mendapatkan elemen input lokasi_sawah
        const lokasiSawahInput = document.querySelector('input[name="lokasi_sawah"]');

        // Mendapatkan nilai dari input
        const rawCoordinates = lokasiSawahInput.value;

        // Menghapus karakter "LatLng", "(", ")", dan ","
        const cleanedCoordinates = rawCoordinates.replace(/LatLng|\(|\)|,/g, '');

        // Membagi koordinat ke dalam dua angka desimal
        const coordinatesArray = cleanedCoordinates.split(' ');
        const latitude = parseFloat(coordinatesArray[0]);
        const longitude = parseFloat(coordinatesArray[1]);

        // Set peta ke koordinat yang ditemukan
        map.setView([latitude, longitude], 10);

        // Tampilkan popup pada koordinat tersebut
        popup
        .setLatLng([latitude, longitude])
        .setContent("Anda menekan lokasi pada koordinat (" + latitude + ", " + longitude+")")
        .openOn(map);
        L.Control.geocoder().addTo(map);

    </script>
    
    <script>
        function onMapClick(e) {
            lokasiSawahInput.value = e.latlng.toString(); // Mengatur nilai input HTML
            popup
                .setLatLng(e.latlng)
                .setContent("Anda menekan lokasi pada koordinat " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
          
        document.getElementById("edit-form").addEventListener("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        // Tambahkan parameter action=edit untuk memanggil fungsi edit
        formData.append('action', 'edit');

        fetch("../../../../app/Http/Controllers/sawah/editController.php", {
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
                // Input gagal
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