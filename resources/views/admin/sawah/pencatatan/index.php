<?php
// Mulai sesi (pastikan ini ada di awal skrip)
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['user_email'])) {
    header("Location: ../../../../../");
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
<?php
// Hubungkan ke database
include_once '../../../../../config/database.php';

// Periksa apakah ada parameter ID yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data sawah berdasarkan ID
    $query = "SELECT bibit.id_bibit, bibit.nama_bibit, bibit.deskripsi_singkat as 'bibit.deskripsi_singkat', bibit.kelebihan as 'bibit.kelebihan', bibit.durasi_penanaman, bibit.durasi_anakan, bibit.durasi_bunting, bibit.durasi_pemasakan,bibit.gambar_path_main as 'bibit.gambar_path_main',
    sawah.id_sawah, sawah.deskripsi as 'sawah.deskripsi', sawah.nama_sawah, sawah.lokasi_sawah, sawah.luas_sawah, sawah.created_at,
    detail_sawah.id_detail_sawah, detail_sawah.jumlah_benih, detail_sawah.tanggal_tanam, detail_sawah.jumlah_benih,
    masa_panen.id_masa_panen, masa_panen.tanggal_panen, masa_panen.jumlah_panen, masa_panen.quest_1, masa_panen.quest_2, masa_panen.quest_3, masa_panen.quest_4,
    users.id_user,users.nama_depan,users.nama_belakang,users.no_handphone, users.alamat,users.email, users.tanggal_lahir,users.tanggal_daftar, users.gambar_path as 'users.gambar_path' FROM bibit, sawah, detail_sawah, masa_panen, users WHERE sawah.id_sawah = $id;";

    $result = mysqli_query($conn, $query);
    $sawah = mysqli_fetch_array($result);
    
    // Function to get the current page URL
    function getCurrentPageURL() {
      $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
      $url = $protocol . "://" . $_SERVER['HTTP_HOST'] . '/resources/views/scanQrCode/index.php?id='.$_GET['id'];
      return $url;
  }

  if(isset($_POST['generate'])){
      $code = $_POST['text_code'];
      $image_url = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8";

      // Get the contents of the image
      $image_data = file_get_contents($image_url);

      // Set headers for download
      header("Content-type: image/png");
      header("Content-Disposition: attachment; filename=qr_code_ketelusuran_beras.png");

      // Output the image directly to the browser
      echo $image_data;
  }
    ?>
<!DOCTYPE html>
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
    <link href="../../../favicon.png" rel="icon">
    <link rel="manifest" href="../../../../../public/assets/favicon/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta
      name="msapplication-TileImage"
      content="../../../../../public/assets/favicon/ms-icon-144x144.png"
    />
    <meta name="theme-color" content="#ffffff" />
    <!-- vendor styles-->
    <link rel="stylesheet" href="../../../../../vendor/simplebar/css/simplebar.css" />
    <link rel="stylesheet" href="../../../../css/admin/vendors/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="../../../../css/admin/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="./../../../css/admin/examples.css" rel="stylesheet" />
    <link
      href="../../../../../vendor/@coreui/chartjs/css/coreui-chartjs.css"
      rel="stylesheet"
    />
    <!-- for map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""
    />

    <!-- for rating form -->
    <link href="../../../../css/admin/pencatatan/style.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- search location -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <!-- Style Timeline -->
    <link href="../../../../css/admin/qr_code/style.css" rel="stylesheet" />
    <script>
        function logoutClicked() {
            // Assuming you are using AJAX (fetch) to call the PHP script
            fetch('?logout=true')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to '../../../' after successful logout
                        window.location.href = '../../../../../';
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
      <div class="sidebar-brand d-none d-md-flex" onclick="logoutClicked()">
        <img src="../../../../../public/assets/brand/logo-brand.png" width="80"/>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="../../index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">UTAMA</span></a></li>
        <li class="nav-title">Manajemen</li>
        <li class="nav-item"><a class="nav-link" href="../index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-layers"></use>
            </svg> Sawah</a></li>
        <li class="nav-item"><a class="nav-link" href="../../user/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> Akun</a></li>
        <li class="nav-title">Pengembangan</li>
        <li class="nav-item"><a class="nav-link" href="../../literasi/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> Literasi</a></li>
        <li class="nav-title">Pengadaan</li>
        <li class="nav-item"><a class="nav-link" href="../../bibit/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-eco"></use>
            </svg> Bibit</a></li>
        <li class="nav-item"><a class="nav-link" href="../../semprotan/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Semprotan</a></li>
        <li class="nav-item"><a class="nav-link" href="../../pupuk/index.php">
            <svg class="nav-icon">
              <use xlink:href="../../../../../vendor/@coreui/icons/svg/free.svg#cil-storage"></use>
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
                    src="../../../../../public/assets/img/avatars/8.jpg"
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
          <!-- /.row-->
          <div class="card mb-2">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h4 class="card-title mb-0">Pencatatan Ketelusuran</h4>
                  <div class="small text-medium-emphasis">
                  UD Tani Rejo Jenggawah | 
                    <?php
                                      // $json = json_encode($sawah);echo($json);
                                      if ($sawah) { echo $sawah['nama_sawah'];}
                                      } else {echo "Tidak Ada Data Sawah Yang Dipilih!";}?>
                  </div>
                  
                </div>
                <form method="POST">
                    <input type="hidden" name="text_code" value="<?php echo getCurrentPageURL(); ?>" />
                    <button type="submit" name="generate" class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;">
                        <img width="20px" style="margin-right:5px" src="../../../../../public/assets/icons/qr-code-icon.png"/>Cetak QR Code
                    </button>
                </form>
              </div>
              <div class="card mb-3" style=" align-content:center: center; margin-top:20px">
                <div class="row g-0">
                    <div class="col-md-4">
                      <img src="../../../../../public/assets/img/bibit/<?php echo $sawah['bibit.gambar_path_main']?>" class="img-fluid rounded-start" alt="...">

                    </div>
                    <div class="col-md-8">
                      <div class="card-body" style>
                          <h5 class="card-title">Varietas Bibit <?php echo $sawah['nama_bibit']?></h5>
                          <p class="card-text"><?php echo $sawah['bibit.deskripsi_singkat'];?>. <?php echo $sawah['bibit.kelebihan']?>.</p>
                          <p class="card-text"><small class="text-body-secondary">Sawah didaftarkan <?php echo $sawah['created_at']?></small></p>
                          <div class="container text-center" style="margin-right: 50px; ">
                            <div class="row">
                              <div class="col" style='background: rgba(15, 255, 255, 0.2);
                                  border-radius: 15px 50px;
                                  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                  backdrop-filter: blur(5px);
                                  -webkit-backdrop-filter: blur(5px);
                                  border: 1px solid rgba(255, 255, 255, 0.3);'>
                                <h5><?php echo $sawah['tanggal_tanam']?></h5>
                                <p>Tanggal Tanam</p>
                              </div>
                              <div class="col" style='border-radius: 15px 50px;
                                  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                  backdrop-filter: blur(5px);
                                  -webkit-backdrop-filter: blur(5px);
                                  border: 1px solid rgba(15, 255, 255, 0.2);'>
                                <h5><?php echo $sawah['tanggal_panen']?></h5>
                                <p>Tanggal Panen</p>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            
          </div>
          
          <div class="card mb-2">
            <div class="row">
              <div class="col-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div>
                        <h4 class="card-title mb-0">Informasi Petani</h4>
                      </div>
                    </div>
                    <div style="margin-top:20px">
                          <div class="card mb-3" style="text-align:left; justify-content: center; align-content:center: center;max-height: 300px;">
                                  <div class="card-body" style>
                                      <p>Nama Depan: <?php echo $sawah['nama_depan']?></p>
                                      <p>Nama Belakang: <?php echo $sawah['nama_belakang']?></p>
                                      <p>No Hp/WA: <?php echo $sawah['no_handphone']?></p>
                                      <p>Alamat: <?php echo $sawah['alamat']?></p>
                                      <p>Email: <?php echo $sawah['email']?></p>
                                      <p>Tanggal Lahir: <?php echo $sawah['tanggal_lahir']?></p>
                                      <p>Tanggal Daftar: <?php echo $sawah['tanggal_daftar']?></p>
                                  </div>
                          </div>
                    </div>
                    
                    
                  </div>
                  
                </div>
              </div>
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div>
                        <h4 style="text-align:center;justify-content: center; align-content:center: center;" class="card-title mb-0">Lokasi Sawah</h4>
                      </div>
                      Deskripsi: <?php echo $sawah['sawah.deskripsi']?>
                    </div>
                    <div style="margin-top:20px">
                          <div class="card mb-3" style="text-align:center; justify-content: center; align-content:center: center; max-height: 300px;">
                              <div class="mb-3">
                                <input type="hidden" name="lokasi_sawah" id="lokasi_sawah" value="<?php echo $sawah['lokasi_sawah']?>"/>
                                <div id="map" style="height:300px; border-radius:8px"></div>
                                
                              </div>
                              
                          </div>
                          
                    </div>
                    
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <div>
                <?php
                  // Ambil tanggal tanam dari $sawah
                  $tanggal_tanam = new DateTime($sawah['tanggal_tanam']);
                  $durasi_penanaman = $sawah['durasi_penanaman'];
                  $durasi_anakan = $sawah['durasi_anakan'];;
                  $durasi_bunting = $sawah['durasi_bunting'];;
                  $durasi_pemasakan = $sawah['durasi_pemasakan'];;

                  // Hitung tanggal-tanggal berdasarkan durasi
                  $tanggal_anakan = clone $tanggal_tanam;
                  $tanggal_anakan->add(new DateInterval("P{$durasi_penanaman}D"))->add(new DateInterval("P1D"));

                  $tanggal_bunting = clone $tanggal_anakan;
                  $tanggal_bunting->add(new DateInterval("P{$durasi_anakan}D"))->add(new DateInterval("P1D"));

                  $tanggal_pemasakan = clone $tanggal_bunting;
                  $tanggal_pemasakan->add(new DateInterval("P{$durasi_bunting}D"))->add(new DateInterval("P1D"));

                  $tanggal_panen = clone $tanggal_pemasakan;
                  $tanggal_panen->add(new DateInterval("P{$durasi_pemasakan}D"))->add(new DateInterval("P1D"));
?>
                <div class="c-chart-wrapper" >
                                      

                  <h1 style=" 	  
                    color:#333;
                    font-weight:700;
                    margin-top:55px;	 
                    text-align:center;
                    text-transform:uppercase;
                    letter-spacing:4px;
                    line-height:23px;">Kalender Padi</h1>
                  <br> 
                  <div class="process-wrapper">
                  <div id="progress-bar-container">
                    <ul>
                      <li class="step step01 active"><div class="step-inner">PENANAMAN
                        <div class="subtitle" style="font-size:10px; margin: 0;"><?php echo $tanggal_tanam->format('j M') . " - " . $tanggal_anakan->format('j M')?></div>
                      </div></li>
                      <li class="step step02"><div class="step-inner">ANAKAN
                        <div class="subtitle" style="font-size:10px; margin: 0;"><?php echo ($tanggal_anakan->format('j M')) . " - " . $tanggal_bunting->format('j M')?></div>
                      </div></li>
                      <li class="step step03"><div class="step-inner">BUNTING
                        <div class="subtitle" style="font-size:10px; margin: 0;"><?php echo ($tanggal_bunting->format('j M')) . " - " . $tanggal_pemasakan->format('j M')?></div>
                      </div></li>
                      <li class="step step04"><div class="step-inner">PEMASAKAN
                        <div class="subtitle" style="font-size:10px; margin: 0;"><?php echo ($tanggal_pemasakan->format('j M')) . " - " . $tanggal_pemasakan->add(new DateInterval("P{$durasi_pemasakan}D"))->format('j M')?></div>
                      </div></li>
                      <li class="step step05"><div class="step-inner">PANEN
                        <div class="subtitle" style="font-size:10px; margin: 0;"><?php echo ($tanggal_pemasakan->format('j M')) . " - " . $tanggal_panen->format('j M')?></div>
                      </div></li>
                    </ul>
                    
                    <div id="line">
                      <div id="line-progress"></div>
                    </div>
                  </div>

                  <div id="progress-content-section">
                    <div class="section-content discovery active">
                      <h2>Tahapan Penanaman</h2>
                      <p>Tahapan penanaman adalah awal dari siklus pertumbuhan padi. Pada tahap ini, bibit padi ditanam di sawah dengan cermat. Proses ini memerlukan perhatian khusus untuk memastikan pertumbuhan yang sehat.</p>
                    </div>
                    
                    <div class="section-content strategy">
                      <h2>Tahapan Anakan</h2>
                      <p>Pada tahap anakan, padi mulai tumbuh dan membentuk anak-anak daun pertamanya. Ini adalah fase penting dalam perkembangan tanaman padi, dan perlu perawatan ekstra untuk memastikan pertumbuhan yang optimal.</p>
                    </div>
                    
                    <div class="section-content creative">
                      <h2>Tahapan Bunting</h2>
                      <p>Tahapan bunting adalah ketika padi mulai membentuk malai bunga dan butir-butir padi. Proses pembuahan ini membutuhkan kondisi lingkungan yang baik dan perawatan yang cermat untuk memastikan hasil panen yang maksimal.</p>
                    </div>
                    
                    <div class="section-content production">
                      <h2>Tahapan Pemasakan</h2>
                      <p>Pada tahap pemasakan, butir-butir padi mengalami pematangan. Warna padi berubah menjadi kuning, dan butir-butirnya mengeras. Tahapan ini menentukan kualitas dan kuantitas hasil panen yang akan didapatkan.</p>
                    </div>
                    
                    <div class="section-content analysis">
                      <h2>Tahapan Panen</h2>
                      <p>Tahapan panen adalah saat yang dinanti-nantikan, di mana padi yang telah matang dipanen untuk diambil hasilnya. Proses panen memerlukan keahlian khusus untuk memastikan kualitas butir padi tetap terjaga hingga masuk ke pasaran.</p>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-body">
              <div>
                <div class="c-chart-wrapper" >
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button style="color: #2eb85c" class="nav-link active" id="nav-home-tab" data-coreui-toggle="tab" data-coreui-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pra Tanam</button>
                                    <button style="color: #2eb85c" class="nav-link" id="nav-profile-tab" data-coreui-toggle="tab" data-coreui-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Tanam</button>
                                    <button style="color: #2eb85c" class="nav-link" id="nav-contact-tab" data-coreui-toggle="tab" data-coreui-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Pasca Tanam</button>
                                </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                  
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div style="margin: 20px; margin-bottom: 50px;">
                                        <h4 style="margin-left: 10px;">Persemaian</h4>

                                        <?php
                                        $no = 1;
                                        $resultPenyemaian = mysqli_query($conn, "SELECT catatan_semai.id_catatan_semai, catatan_semai.tanggal as 'catatan_semai.tanggal', catatan_semai.jenis_semai, catatan_semai.deskripsi as 'catatan_semai.deskripsi', catatan_semai.id_user, catatan_semai.id_sawah FROM catatan_semai JOIN sawah ON sawah.id_sawah=catatan_semai.id_sawah WHERE catatan_semai.id_sawah=$id");
                                        while ($penyemaian = mysqli_fetch_array($resultPenyemaian)) {
                                        ?>
                                            <div class="d-flex justify-content-between">
                                                <div class="small text-medium-emphasis">
                                                    <h5 style="color: #12121D;"><?php echo $penyemaian['jenis_semai']; ?></h5>
                                                    <p style="color:#12121D;"><?php echo $penyemaian['catatan_semai.deskripsi']; ?></p>
                                                    <p style="color:#12121D;"><?php echo $penyemaian['catatan_semai.tanggal']; ?></p>
                                                </div>

                                                <div style="margin: 0; top: 50%;">
                                                    <h1><?php echo $no; ?></h1>
                                                </div>
                                            </div>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <div style="margin: 20px;">
                                        <h4 style="margin-left: 10px;">Pemupukan</h4>

                                        <?php
                                        $noPemupukanPenyemprotan = 1;
                                        $resultPemupukan = mysqli_query($conn, "SELECT catatan_pemupukan.id_catatan_pemupukan, catatan_pemupukan.tanggal as 'catatan_pemupukan.tanggal', catatan_pemupukan.jenis_pemupukan, catatan_pemupukan.id_user, catatan_pemupukan.id_pupuk, catatan_pemupukan.id_sawah, catatan_pemupukan.id_pupuk, pupuk.nama_pupuk, pupuk.jumlah, pupuk.harga,pupuk.kegunaan, pupuk.kegunaan as 'pupuk.kegunaan', pupuk.detail_pupuk, pupuk.deskripsi_singkat, pupuk.gambar_path_main, pupuk.gambar_path_1, pupuk.gambar_path_2, pupuk.gambar_path_3 FROM catatan_pemupukan JOIN pupuk ON pupuk.id_pupuk=catatan_pemupukan.id_pupuk WHERE catatan_pemupukan.id_sawah=$id");
                                        while ($pemupukan = mysqli_fetch_array($resultPemupukan)) {
                                        ?>
                                            <div class="d-flex justify-content-between">
                                                <div class="small text-medium-emphasis">
                                                    <h5 style="color:#12121D;"><?php echo $pemupukan['jenis_pemupukan']; ?></h5>
                                                    <p style="color:#12121D;">
                                                        <?php echo $pemupukan['nama_pupuk'] . ': ' . $pemupukan['jumlah'] . ' kg'; ?>
                                                    </p>
                                                    <p style="color:#12121D;"><?php echo $pemupukan['catatan_pemupukan.tanggal']; ?></p>
                                                </div>

                                                <div style="margin: 0; top: 50%;">
                                                    <h1><?php echo $noPemupukanPenyemprotan; ?></h1>
                                                </div>
                                            </div>
                                        <?php
                                            $noPemupukanPenyemprotan++;
                                        }
                                        ?>
                                    </div>

                                    <div style="margin: 20px; margin-bottom: 50px;">
                                        <h4 style="margin-left:10px">Penyemprotan</h4>
                                        <div class="d-flex justify-content-between">
                                            <?php
                                            $no = 1;
                                            $resultPenyemprotan = mysqli_query($conn, "SELECT catatan_penyemprotan.id_catatan_penyemprotan, catatan_penyemprotan.tanggal as 'catatan_penyemprotan.tanggal', catatan_penyemprotan.jenis_penyemprotan, catatan_penyemprotan.jumlah_penggunaan, catatan_penyemprotan.id_user, catatan_penyemprotan.id_semprotan, catatan_penyemprotan.id_sawah, semprotan.id_semprotan, semprotan.nama_semprotan, semprotan.jumlah, semprotan.harga, semprotan.kegunaan as 'semprotan.kegunaan', semprotan.detail_semprotan, semprotan.deskripsi_singkat, semprotan.gambar_path_main, semprotan.gambar_path_1, semprotan.gambar_path_2, semprotan.gambar_path_3 FROM catatan_penyemprotan JOIN semprotan ON semprotan.id_semprotan=catatan_penyemprotan.id_semprotan WHERE catatan_penyemprotan.id_sawah=$id");
                                            while ($penyemprotan = mysqli_fetch_array($resultPenyemprotan)) {
                                            ?>
                                                <div class="small text-medium-emphasis">
                                                    <h5 style="color:#12121D;"><?php echo $penyemprotan['jenis_penyemprotan']; ?></h5>
                                                    <p style="color:#12121D;"><?php echo $penyemprotan['nama_semprotan'] . ': ' . $penyemprotan['jumlah_penggunaan'] . ' kg'; ?></p>
                                                    <p style="color:#12121D;"><?php echo $penyemprotan['catatan_penyemprotan.tanggal']; ?></p>
                                                </div>

                                                <div style="margin: 0; top: 50%;">
                                                    <h1><?php echo $noPemupukanPenyemprotan; ?></h1>
                                                </div>
                                            <?php
                                                $noPemupukanPenyemprotan++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                  <div class="wrapper" style="background: var(--white);
                                  padding: 2rem;
                                  max-width: 576px;
                                  width: 100%;
                                  border-radius: .75rem;
                                  box-shadow: var(--shadow);
                                  text-align: center;        
                                  margin-left: auto;
                                  margin-right: auto;
                                  margin-top:20px;
                                  margin-bottom:50px;">
                                    <h3>Tanggal Panen</h3>
                                    <h5><?php echo $sawah['tanggal_panen']?></h5>
                                    <p></p>
                                    <h2>Jumlah: <?php echo $sawah['jumlah_panen']?> Kwn</h2>

                                  </div>
                                </div>
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
        
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- CoreUI and necessary plugins-->
    <script src="../../../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../../../vendor/@coreui/utils/js/coreui-utils.js"></script>

     <!-- for leaflet's css -->
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
     <script>

        // var popup = L.popup();

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

        const map = L.map('map').setView([latitude, longitude], 10);
        const tiles= L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([latitude, longitude]).addTo(map)
		    .bindPopup('<b>Titik Lokasi!</b><br />Sawah anda.').openPopup();

        // Set peta ke koordinat yang ditemukan
        // map.setView([latitude, longitude], 10);

        // Tampilkan popup pada koordinat tersebut
        // popup
        // .setLatLng([latitude, longitude])
        // .setContent("Anda menekan lokasi pada koordinat (" + latitude + ", " + longitude+")")
        // .openOn(map);
        L.Control.geocoder().addTo(map);

    </script>
    <script>
    const allStar = document.querySelectorAll('.rating .star')
    const ratingValue = document.querySelector('.rating input')

    allStar.forEach((item, idx)=> {
      item.addEventListener('click', function () {
        let click = 0
        ratingValue.value = idx + 1

        allStar.forEach(i=> {
          i.classList.replace('bxs-star', 'bx-star')
          i.classList.remove('active')
        })
        for(let i=0; i<allStar.length; i++) {
          if(i <= idx) {
            allStar[i].classList.replace('bx-star', 'bxs-star')
            allStar[i].classList.add('active')
          } else {
            allStar[i].style.setProperty('--i', click)
            click++
          }
        }
      })
    })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        
        $(".step").click( function() {
      $(this).addClass("active").prevAll().addClass("active");
      $(this).nextAll().removeClass("active");
    });

    $(".step01").click( function() {
      $("#line-progress").css("width", "3%");
      $(".discovery").addClass("active").siblings().removeClass("active");
    });

    $(".step02").click( function() {
      $("#line-progress").css("width", "25%");
      $(".strategy").addClass("active").siblings().removeClass("active");
    });

    $(".step03").click( function() {
      $("#line-progress").css("width", "50%");
      $(".creative").addClass("active").siblings().removeClass("active");
    });

    $(".step04").click( function() {
      $("#line-progress").css("width", "75%");
      $(".production").addClass("active").siblings().removeClass("active");
    });

    $(".step05").click( function() {
      $("#line-progress").css("width", "100%");
      $(".analysis").addClass("active").siblings().removeClass("active");
    });

    
        </script>
  </body>
</html>