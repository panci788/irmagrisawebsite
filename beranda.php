<?php 
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>IRMA GRISA</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/irma1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <!-- =======================================================
  * Template Name: iLanding
  * Template URL: https://bootstrapmade.com/ilanding-bootstrap-landing-page-template/
  * Updated: Nov 12 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
         <img src="assets/img/irma1.png">
        <h1 class="sitename">IRMA GRISA</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="beranda.php" class="active"> Beranda</a></li>
          <li><a href="kegiatan.php">Kegiatan</a></li>
          <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'):?>
          <li><a href="akun.php">Pengelola Akun</a></li>
          <?php endif ?>
          <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="data_anggota.php">Data Anggota</a></li>
              <li><a href="data_pembina.php">Data Pembina</a></li>
              <li><a href="data_pengurus.php">Data Kepengurusan</a></li>
            </ul>
          </li>
          <li><a href="info.php">Informasi</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'): ?>
            <a class="btn-getstarted" href="index.php">Logout</a>
            <?php endif ?>
            <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Pengguna'): ?>
            <a class="btn-getstarted" href="login.php">Login</a>
            <?php endif ?>
    </div>
  </header>

  <main id="main" class="main">


    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
            </div>
          </div>

          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/a1.jpg" class="d-block w-100 h-400 animate__animated animate__fadeIn" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>IRMA GRISA</h5>
        <p>Mari bersatu memajukan sekolah!.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/a2.jpg" class="d-block w-100 animate__animated animate__fadeIn" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>IRMA GRISA</h5>
        <p>Wujudkan dengan aksi, generasi unggul siap untuk mengabdi.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/a3.jpg" class="d-block w-100 animate__animated animate__fadeIn" alt="">
      <div class="carousel-caption d-none d-md-block">
        <h5>IRMA GRISA</h5>
        <p>Cerdas, kreatif, dan beriman.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>SEJARAH,VISI,MISI,TUJUAN</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="d-flex justify-content-center">

          <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                <h4>SEJARAH</h4>
              </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                <h4>VISI</h4>
              </a><!-- End tab nav item -->

            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                <h4>MISI</h4>
              </a><!-- End tab nav item -->

            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                <h4>TUJUAN</h4>
              </a><!-- End tab nav item -->

            </li>
            <!-- End tab nav item -->

          </ul>

        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>SEJARAH</h3>
                <p class="fst-italic">
                Agama Islam merupakan agama rahmatan lil ‘alamin (rahmat bagi semesta alam) dengan ajaran yang mendorong terwujudnya kemaslahatan dan kesejahteraan hidup bagi segenap umat manusia di dunia dan akhirat.
                Bahwa para remaja masjid terpanggil untuk melanjutkan dakwah Islamiyah dan melaksanakan amar ma’ruf nahi munkar dengan mengorganisasikan kegiatan-kegiatannya dalam suatu wadah organisasi yang bernama Ikatan Remaja Masjid.
                Oleh karena itu, masjid harus berfungsi sebagai pusat ibadah dan pengembangan remaja masjid sekolah dan madrasah dalam meningkatkan keimanan, ketaqwaan, pendidikan, dan keterampilan. Didasarkan atas kesadaran akan hak dan kewajiban
                serta tanggung jawab sebagai remaja masjid yang memiliki potensi ilmu pengetahuan dan dinamika yang melekat pada dirinya.
                Maka atas berkat rahmat Allah SWT pada tanggal 18 Desember 2017 di Bandung kami menyatukan diri dalam suatu Ikatan Remaja Masjid yang diatur dengan ketentuan-ketentuan Peraturan Dasar dan Peraturan Rumah Tangga.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/irma1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>VISI</h3>
                <p class="fst-italic">
                Menjadikan Ikatan Remaja Masjid yang profesional untuk mewujudkan masjid sekolah dan madrasah sebagai pusat ibadah dan 
                pengembangan remaja masjid dalam meningkatkan keimanan, ketaqwaan, pendidikan, dan keterampilan.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/irma1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>MISI</h3>
                <p class="fst-italic">             
                  <b>1.</b> Merevitalisasi peran dan fungsi masjid sekolah dan madrasah.<br>
                  <b>2.</b> Meningkatkan kualitas ubudiyah umat sesuai faham Ahlussunnah Wal Jamaah melalui pengajian, halaqah, dan istighotsah.<br>
                  <b>3.</b> Memberdayakan jamaah masjid sekolah dan madrasah melalui pelatihan pemberdayaan ekonomi.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/irma1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3>TUJUAN</h3>
                <p class="fst-italic">
                Terbinanya remaja masjid sekolah dan madrasah yang beriman, berilmu, dan beramal shalih dalam
                 rangka mengabdi kepada Allah SWT dan mengharap keridhoan-Nya.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/irma1.png" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->

        </div>

      </div>
    </section>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Lokasi</h4>
                  <p>SMEA PGRI 1, Jl. Terusan Gg. Karya, Cimahi, Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat 40125</p>
                </div>
              </div>

              <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>No Hp</h4>
                  <p>083820547476 / Bapak Shofy Mustofa Aziz S.PD.I</p>
                </div>
              </div>

              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email</h4>
                  <p>irmapgri1cimahi@gmail.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
            <div class="map-container" data-aos="fade-up" data-aos-delay="600">
  <h3>Google Maps</h3>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.166648444279!2d107.54534667410584!3d-6.87062576722211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e51ef1452b9b%3A0xf27ba488f11ef50c!2sSMK%20PGRI%201%20CIMAHI!5e0!3m2!1sid!2sid!4v1738022651746!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>

</div>
            </div>

            </div>
          </div>
        </div>
</div>

</div>


  </main>

<footer id="footer" class="footer">

<div class="container d-flex justify-content-between align-items-center text-center mt-4">
    <!-- Logo Kiri -->
    <div class="footer-logo-left">
      <img src="image/pg1.jpeg" alt="Logo" height="100px" width="100px">
    </div>

    <!-- Teks Copyright -->
    <div class="copyright">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">IRMA GRISA</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="#">IRMA DIGITAL</a>
        </div>
    </div>

    <!-- Logo Kanan -->
    <div class="footer-logo-right">
      <img src="image/irma1.1.png" alt="Logo" height="100px" width="100px">
    </div>
</div>

</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>