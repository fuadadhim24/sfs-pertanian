
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
     crossorigin=""/>
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"
    />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

  </head>
  <body>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <header class="header header-sticky mb-4">
        <div class="container-fluid" >
          <button
            class="header-toggler px-md-0 me-md-3"
            type="button"
            onclick=""
          >
            <svg class="icon icon-lg">
              <use
                xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-menu"
              ></use>
            </svg>
          </button>
          <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="../index.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php">Sawah</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Bibit</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pupuk</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Penyemprotan</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Literasi</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Akun</a></li>
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
                    src="../../../public/assets/img/avatars/8.jpg"
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
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-bell"
                    ></use>
                  </svg>
                  Updates<span class="badge badge-sm bg-info ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-envelope-open"
                    ></use>
                  </svg>
                  Messages<span class="badge badge-sm bg-success ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-task"
                    ></use>
                  </svg>
                  Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-comment-square"
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
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-user"
                    ></use>
                  </svg>
                  Profile</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-settings"
                    ></use>
                  </svg>
                  Settings</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-credit-card"
                    ></use>
                  </svg>
                  Payments<span class="badge badge-sm bg-secondary ms-2"
                    >42</span
                  ></a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-file"
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
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-lock-locked"
                    ></use>
                  </svg>
                  Lock Account</a
                ><a class="dropdown-item" href="#">
                  <svg class="icon me-2">
                    <use
                      xlink:href="../../../vendor/@coreui/icons/svg/free.svg#cil-account-logout"
                    ></use>
                  </svg>
                  Logout</a
                >
              </div>
            </li>
          </ul>
        </div>
        <div class="header-divider"></div>
        <div class="container-fluid"style="height:2px; font-size:11px">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
              <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
              </li>
              <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
          </nav>
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
                                  <form id="create-form" action="../../../../app/Http/Controllers/sawah/createController.php" method="POST">
                                      <div class="row">
                                        <div class="col">
                                          <h5 class="card-title">Detail Info</h5>
                                        </div>
                                        <div style="text-align:right; color:#808080;" class="col">
                                            <label class="form-label"><a style="color:#0c8305">*</a>Tekan map untuk menentukan lahan sawah anda</label>
                                        </div>
                                      </div>
                                      <div class="row">
                                          <div class="mb-3">
                                              <input class="form-control" type="hidden" name="lokasi_sawah" id="lokasi_sawah" rows="3" required/>
                                              <label class="form-label">Nama lokasi</label>
                                              <input class="form-control" name="nama_sawah" id="nama_sawah" rows="3" required></input>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Deskripsi</label>
                                              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal Pengadaan</label>
                                              <input style="padding-bottom: 5px" type="date" class="form-control" name="created_at" id="created_at" rows="3" required></input>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Luas Sawah <label style='font-size:smaller;'>/hektar</label></label>
                                              <input class="form-control" name="luas_sawah" id="luas_sawah" rows="3" required></input>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Nama Petani</label>
                                              <input type="hidden" class="form-control" name="id_user" id="nama_sawah" rows="3" required></input>
                                              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_user" id="id_user" required>
                                                <option selected disabled>Pilih petani sebagai kontrol aktivitas</option>
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
                                              <button type="submit" id="createLokasi" class="btn btn-success text-white" style="padding:8px; padding-right:40px; padding-left:40px; justify-content: center;align-items: center;">Tambah Sawah</button>
                                          </div>
                                      </div>
                                  </form>
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
    <!-- CoreUI and necessary plugins-->
    <script src="../../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../../vendor/@coreui/utils/js/coreui-utils.js"></script>
   
   
    <!-- for leaflet's js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
        
    <!-- Make sure you put this AFtER leaflet.js, when using with leaflet -->
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script src="../../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        const map = L.map('map').setView([-8.168577, -246.296838], 10);

        L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        //search map
        L.Control.geocoder().addTo(map);
    </script>
    <script>
      var popup = L.popup();
        const lokasiSawahInput = document.querySelector('input[name="lokasi_sawah"]');
        function onMapClick(e) {
            lokasiSawahInput.value = e.latlng.toString(); // Mengatur nilai input HTML
            popup
                .setLatLng(e.latlng)
                .setContent("Anda menekan lokasi pada koordinat " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
          
        document.getElementById("create-form").addEventListener("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        // Tambahkan parameter action=create untuk memanggil fungsi create
        formData.append('action', 'create');

        fetch("../../../../app/Http/Controllers/sawah/createController.php", {
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