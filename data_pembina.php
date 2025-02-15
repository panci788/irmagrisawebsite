<?php 
include 'koneksi.php';
session_start();
$query = mysqli_query($koneksi, "SELECT * FROM data_pembina");
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
  <main class="container mt-5 pt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-right">DATA GURU AGAMA</h5>
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'):?>
        <div class="text-end mb-3">
          <a href="tambah_pembina.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Pembina
          </a>
        </div>
        <?php endif ?>
        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>No Hp</th>
                <th>Email</th>
                <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'):?>
                <th>Aksi</th>
                <?php endif?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              while ($data = mysqli_fetch_assoc($query)) {
                $no++;
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= htmlspecialchars($data['nama']); ?></td>
                  <td><?= htmlspecialchars($data['jk']); ?></td>
                  <td><?= htmlspecialchars($data['no_hp']); ?></td>
                  <td><?= htmlspecialchars($data['email']); ?></td>
                  <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'):?>
                  <td>
                    <div class="btn-group" role="group">
                    <a href="edit_pembina.php?id_pembina=<?= $data['id_pembina']; ?>" class="btn btn-primary">
                     <i class="bi bi-pencil-square"></i> Edit
                    </a>
                      <a href="hapus_pembina.php?id_pembina=<?= isset($data['id_pembina']) ? $data['id_pembina'] : ''; ?>" 
                          class="btn btn-danger" 
                          onclick="return confirm('Yakin ingin menghapus data ini?')"> <i class="bi bi-person-x-fill"></i>
                          Hapus
                        </a>
                    </div>
                  </td>
                  <?php endif?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- End Table -->
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
  <!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
</body>
</html>