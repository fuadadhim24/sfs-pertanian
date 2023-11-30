<?php
  include_once '../../config/database.php';
  $no = 1;
  $result = mysqli_query($conn, "SELECT
    (SELECT COUNT(id_user) FROM users) AS jumlah_users,
    (SELECT COUNT(id_beras) FROM produk_beras) AS jumlah_beras,
    (SELECT COUNT(id_literasi) FROM literasi) as jumlah_literasi;
  ");
  $data = mysqli_fetch_array($result)?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JejakPadi | Sistem Ketelusuran Pertanian</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="resources/views/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../vendor/aos/aos.css" rel="stylesheet">
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../resources/css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="../resources/css/auth/stylenew.css">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
  <div id="modal-container">
    <div class="modal-background">
      <div id="modal-container-transparent" class="container-transparent">
        <div class="login-container" style="justify-items: center; align-items: center;">
          <div class="btn-close-form-login" id="close-form-login" style="position: absolute; top: 18px; right: 30px; cursor: pointer;" onclick="closeModal()">
              <img src="../../public/assets/icons/close-line-icon.svg" alt="Close Icon" style="width: 20px; height: 20px;">
          </div>
            <div id="sign-in">
                <h2 style="color:white;">Selamat Datang Admin!</h2>
                <form id="sign-in-form" method="post" action="../../app/Http/Controllers/auth/signInController.php">
                  <input class="form-control" name="email" id="email" type="text" placeholder="Email" required></input>
                  <p></p>
                  <input class="form-control" name="password" id="password" type="password" placeholder="Password" required></input>
                    <p style="margin-top: 5px; text-align:right;"><a href="resources/views/auth/index.php" style="color: white;" >Lupa Password?</a></p>
                  <button type="submit" style="border-radius: 10px;background-color: white;padding:8px; padding-right:40px; padding-left:40px;">Masuk</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"><img src="../../public/assets/img/logo_ud.png" alt=""></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../../public/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a id="beranda" class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#scan">Scan QR Code</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Jelajahi Fitur</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Literasi</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li class="dropdown"><a href="#"><span>Pra Tanam</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Pemilihan Bibit</a></li>
                  <li><a href="#">Panduan Semai</a></li>
                  <li><a href="#">Artikel dan Video Terkait</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Tanam</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Jenis Pupuk</a></li>
                  <li><a href="#">Panduan Pemupukan</a></li>
                  <li><a href="#">Jenis Penyemprotan</a></li>
                  <li><a href="#">Panduan Penyemprotan</a></li>
                  <li><a href="#">Artikel dan Video Terkait</a></li>
                </ul>
              </li>
              <li><a href="#">Pasca Tanam</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="nav-link scrollto" href="#">Unduh App</a></li>
          <li><a id="one" class="nav-link scrollto login button" href="#hero" >Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <div class="container-transparent">
        <div class="row no-gutters">
          <div class="content col-xl-7 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content" >
              <h1>JejakPadi</h1>
              <h10 style="margin-top:20px; color:white;">Sistem jejak pertanian padi untuk petani mandiri. Memberdayakan petani dengan sistem pelacakan pertanian yang mudah.</h10>
              <p></p>
              <h7 style="padding:5px 20px; background: rgba(255, 255, 255, 0.28); border-radius: 16px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); backdrop-filter: blur(13.1px); -webkit-backdrop-filter: blur(13.1px); border: 1px solid rgba(255, 255, 255, 0.3);"><a href="#scan" class="about-btn">Scan QR Produk Beras<i class="bx bx-chevron-right"></i></a></h7>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
          </div>  
        </div>
        
      </div>
      <!-- <h1>PadiTrace</h1>
      <h2>Sistem Jejak Pertanian Padi untuk Petani Mandiri. Memberdayakan Petani dengan Sistem Pelacakan Pertanian yang Mudah</h2> -->
      <a href="#about" class="btn-get-started scrollto"><i class="bx bx-chevrons-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
            <div class="content">
              <h3>Pencatatan waktunya beralih ke digital</h3>
              <p>
                Petani mencatat aktivitas pertanian dimana dan situasi apapun tanpa perlu khawatir catatan terselip atau hilang. Memudahkan petani adalah prioritas kami.
              </p>
              <a href="#" class="about-btn">Unduh Aplikasi PadiTrace Mobile<i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Pencatatan Ketelusuran Padi</h4>
                  <p>Pengguna dapat mencatatat dan melihat segala aktivitas sebuah produk beras</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Manajemen Sawah</h4>
                  <p>Mengatur sawah untuk meningkatkan produktivitas</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Literasi Petani</h4>
                  <p>Mendukung petani untuk belajar dan berkembang bersama PadiTrace</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Quality Control</h4>
                  <p>Pencegahan terhadap hal yang merugikan dapat diantisipasi</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Keunggulan</h2>
          <p>PadiTrace menghadirkan fitur-fitur unggul untuk menjawab kebutuhan petani modern. Kecepatan dan ketepatan menjadi prioritas kami, menyelaraskan dengan perkembangan terus-menerus dalam dunia pertanian. Kami memberikan solusi efisien dan efektif, mempertimbangkan segala aspek untuk menjawab setiap permasalahan Anda.</p>
      </div>

      <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up">
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4 class="title"><a href="">Seperti Permainan</a></h4>
                  <p class="description">Fitur ini dirancang seperti permainan untuk memudahkan penggunaan dan memastikan pengalaman yang menyenangkan.</p>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4 class="title"><a href="">Data Aman</a></h4>
                  <p class="description">PadiTrace menjamin keamanan data Anda, melindungi informasi penting petani dari risiko pencurian atau penyalahgunaan.</p>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon"><i class="bx bx-tachometer"></i></div>
                  <h4 class="title"><a href="">Performa Baik</a></h4>
                  <p class="description">PadiTrace memastikan performa tinggi, memberikan pengalaman yang lancar dan efisien bagi pengguna.</p>
              </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon"><i class="bx bx-world"></i></div>
                  <h4 class="title"><a href="">Jangkauan Luas</a></h4>
                  <p class="description">PadiTrace menjangkau luas, memberikan akses terluas kepada petani untuk mengoptimalkan produksi mereka.</p>
              </div>
          </div>
      </div>


      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts  section-bg">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data['jumlah_literasi']?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Literasi Panduan</strong> untuk petani independen</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data['jumlah_beras']?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Produk Beras</strong> dengan riwayat ketelusuran</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Jam siap melayani</strong> dimanapun dan kapanpun</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $data['jumlah_users']?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Pengguna Aktif</strong> saling berkolaborasi</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Cta Section ======= -->
    <section id="scan" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Scan QR</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#">Scan Beras Anda</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="text-center"></div>

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Jelajahi Fitur</h2>
          <p>Mitra PadiTrace merupakan UD Tani Rejo. Sebuah usaha yang beroperasi di jenggawah. Segala jenis beras terdapat pada toko ini. UD Tani Rejo didukung oleh PadiTrace dengan fungsi dan visual yang memberikan pengalaman luar biasa bagi pengguna.</p>
        </div>

        <div class="row" data-aos="fade-in">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Aktivitas</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="../../public/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="../../public/assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Apa kata mereka?</h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Saya, M. Angga Gumilang, seorang Dosen Riset di JejakPadi, ingin mengungkapkan......
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../../public/assets/img/testimonials/testimonials-1.png" class="testimonial-img" alt="">
                <h3>M. Angga Gumilang</h3>
                <h4>Dosen Riset JejakPadi</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Sebagai pemilik bisnis, saya sangat senang bekerjasama dengan tim ini. Mereka tidak hanya memahami kebutuhan bisnis saya tetapi juga memberikan solusi yang terukur dan tepat sasaran. JejakPadi membantu bisnis saya berkembang dengan cepat dan efisien. Saya sungguh bersyukur atas kerjasama yang sukses ini.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../../public/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sucipto Trisno</h3>
                <h4>Owner Bisnis</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Sebagai Ketua Research Development Team, saya ingin menyampaikan apresiasi yang tinggi kepada tim pengembang. Mereka tidak hanya berdedikasi tinggi dalam setiap proyek, tetapi juga membawa keahlian dan visi yang baik. Juga saya sampaikan terimakasih kepada UD Tani Rejo Jenggawah selaku mitra JejakPadi
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../../public/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Fuad Adhim A. H.</h3>
                <h4>Ketua Research Development Team</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Saya, Sucipto Trisno, seorang petani, merasa sangat terbantu dengan kerjasama saya bersama JejakPadi. Mereka tidak hanya memberikan solusi praktis untuk meningkatkan hasil panen saya tetapi juga memberikan dukungan yang berkelanjutan. Kemitraan ini benar-benar mengubah cara saya menjalankan pertanian, dan hasilnya sungguh memuaskan.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../../public/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Sucipto Trisno</h3>
                <h4>Petani</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Sebagai distributor, saya memiliki pengalaman ....
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="../../public/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Bayu Candra</h3>
                <h4>Distributor</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Kontak</h2>
            <p>Hubungi kami untuk pertanyaan, informasi lebih lanjut, atau berbagi pandangan Anda. Jejak Padi menghadirkan sistem ketelusuran pertanian komoditas padi yang memungkinkan Anda mengeksplorasi sumber daya alam dengan transparansi dan keberlanjutan. Kami siap memberikan layanan terbaik dan menjembatani informasi antara Anda dan dunia pertanian modern.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Alamat Kami</h3>
              <p>Jenggawah, Jember</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>jejakPadi@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Hubungi Kami</h3>
              <p>+62 878 4019 9095</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15792.556047407033!2d113.6663902!3d-8.2889614!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69a20f47d88ff%3A0xb0bddd47527cde49!2sUd.%20Tani%20Rejo!5e0!3m2!1sid!2sid!4v1700829330028!5m2!1sid!2sid" style="border:0; width: 100%; height: 384px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Gmail Anda" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>JejakPadi</h3>
              <p class="pb-3"><em>Lebih dekat dengan pemanfaatan teknologi untuk pertanian.</em></p>
              <p>
              Jenggawah, Jember<br><br>
                <strong>Phone:</strong> +62 878 4019 9095<br>
                <strong>Email:</strong> jejakpadi@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links ms-auto" >
            <h4>Link Tautan</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#scan">Scan QR Code</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Dokumentasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Unduh App</a></li>
            </ul>
          </div>

          <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Berita Terbaru Kami</h4>
            <p>Apakah anda tertarik untuk mendapat informasi terbaru kami? Kirim email anda</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Build by <strong><span>Politeknik Negeri Jember</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">NexGen Team</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    $('.button').click(function(){
        var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
    })
    
    $('#close-form-login').click(function(){
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="../../vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../vendor/aos/aos.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../resources/js/main.js"></script>
  <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  
  <!-- sweet alert and redirect -->
  <script>
        // sign-In form
      document
        .getElementById("sign-in-form")
        .addEventListener("submit", function (e) {
          e.preventDefault();
          var formData = new FormData(this);

          fetch("../../app/Http/Controllers/auth/signInController.php", {
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
                  window.location.href = "resources/views/admin/index.php";
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

  <script>
      document.addEventListener('DOMContentLoaded', function () {
          const authButtons = document.querySelectorAll('authBtn');

          authButtons.forEach(button => {
              button.addEventListener('click', function () {
                  // Assuming $client is a PHP object available in the current context
                  window.location.href = "<?php echo $client->createAuthUrl(); ?>";
              });
          });
      });
  </script>


</body>

</html>