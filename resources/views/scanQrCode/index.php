<?php
// Hubungkan ke database
include_once '../../../config/database.php';

// Periksa apakah ada parameter ID yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data sawah berdasarkan ID
    $query = "SELECT bibit.id_bibit, bibit.nama_bibit, bibit.deskripsi_singkat as 'bibit.deskripsi_singkat', bibit.deskripsi as 'bibit.deskripsi', bibit.gambar_path_main as 'bibit.gambar_path_main',
    sawah.id_sawah, sawah.deskripsi as 'sawah.deskripsi', sawah.nama_sawah, sawah.lokasi_sawah, sawah.luas_sawah, sawah.created_at,
    detail_sawah.id_detail_sawah, detail_sawah.jumlah_benih, detail_sawah.tanggal_tanam, detail_sawah.jumlah_benih,
    masa_panen.id_masa_panen, masa_panen.tanggal_panen, masa_panen.jumlah_panen, masa_panen.quest_1, masa_panen.quest_2, masa_panen.quest_3, masa_panen.quest_4,
    kualitas.id_kualitas, kualitas.rate_kualitas, kualitas.catatan_kualitas,
    users.id_user,users.nama_depan,users.nama_belakang,users.no_handphone, users.alamat,users.email, users.tanggal_lahir,users.tanggal_daftar, users.gambar_path as 'users.gambar_path' FROM bibit, sawah, detail_sawah, masa_panen, kualitas, users WHERE sawah.id_sawah = $id;";

    // $queryPenyemaian="SELECT catatan_semai.id_catatan_semai, catatan_semai.tanggal as 'catatan_semai.tanggal', catatan_semai.jenis_semai, catatan_semai.deskripsi as 'catatan_semai.deskripsi', catatan_semai.id_user, catatan_semai.id_sawah FROM catatan_semai WHERE catatan_semai.id_sawah = $id;";
    $result = mysqli_query($conn, $query);
    // $resultPenyemaian = mysqli_query($conn, $queryPenyemaian);

    // $penyemaian = mysqli_fetch_array($resultPenyemaian);
    $sawah = mysqli_fetch_array($result);?>
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
    <link rel="stylesheet" href="../../css/admin/vendors/simplebar.css" />
    <!-- Main styles for this application-->
    <link href="../../css/admin/style.css" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="./../css/admin/examples.css" rel="stylesheet" />
    <link
      href="../../../vendor/@coreui/chartjs/css/coreui-chartjs.css"
      rel="stylesheet"
    />
    <!-- for map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""
    />

    <!-- for rating form -->
    <link href="../../css/admin/pencatatan/style.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- search location -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
  </head>
  <body>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      
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
                  <input type="hidden" name="" value="" />
                  <button type="submit" name="generate"  class="btn btn-success text-white" style="margin-top:10px; justify-content: center;align-items: center;"><img width="20px" style="margin-right:5px" src="../../../public/assets/icons/qr-code-icon.png"/>Cetak QR Code</button>
                </form>
              </div>
              <div style="margin-top:20px">
                    <div class="card mb-3" style="justify-content: center; align-content:center: center; max-height: 350px;">
                      <div class="row g-0">
                          <div class="col-md-4">
                            <img style="max-height:300px" src="../../../public/assets/img/bibit/<?php echo $sawah['bibit.gambar_path_main']?>" class="img-fluid rounded-start" alt="...">

                          </div>
                          <div class="col-md-8">
                            <div class="card-body" style>
                                <h5 class="card-title">Varietas Bibit <?php echo $sawah['nama_bibit']?></h5>
                                <p class="card-text"><?php echo $sawah['bibit.deskripsi_singkat'];?>. <?php echo $sawah['bibit.deskripsi']?>.</p>
                                <p class="card-text"><small class="text-body-secondary">Sawah didaftarkan <?php echo $sawah['created_at']?></small></p>
                                <div class="container text-center" style="margin-right: 50px; ">
                                  <div class="row">
                                    <div class="col" style='background: rgba(15, 255, 255, 0.2);
                                        border-radius: 15px 50px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                        backdrop-filter: blur(5px);
                                        -webkit-backdrop-filter: blur(5px);
                                        border: 1px solid rgba(255, 255, 255, 0.3);'>
                                      <h4><?php echo $sawah['tanggal_tanam']?></h4>
                                      <h5>Tanggal Tanam</h5>
                                    </div>
                                    <div class="col" style='border-radius: 15px 50px;
                                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                        backdrop-filter: blur(5px);
                                        -webkit-backdrop-filter: blur(5px);
                                        border: 1px solid rgba(15, 255, 255, 0.2);'>
                                      <h4><?php echo $sawah['tanggal_panen']?></h4>
                                      <h5>Tanggal Panen</h5>
                                    </div>
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
                                    <h3>Rating & Catatan Kualitas Oleh Petani.</h3>
                                    <form action="#">
                                      <div class="rating">
                                        <input type="number" name="rating" hidden>
                                        <i class='bx bx-star star' style="--i: 0;"></i>
                                        <i class='bx bx-star star' style="--i: 1;"></i>
                                        <i class='bx bx-star star' style="--i: 2;"></i>
                                        <i class='bx bx-star star' style="--i: 3;"></i>
                                        <i class='bx bx-star star' style="--i: 4;"></i>
                                      </div>
                                      <textarea name="opinion" cols="30" rows="5" placeholder="<?php $sawah['catatan_kualitas']?>"></textarea>
                                      <div class="btn-group">
                                        <button type="submit" class="btn submit">Submit</button>
                                        <button class="btn cancel">Cancel</button>
                                      </div>
                                    </form>
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
    <script src="../../../vendor/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../../../vendor/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="../../../vendor/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../../../vendor/@coreui/utils/js/coreui-utils.js"></script>

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
  </body>
</html>