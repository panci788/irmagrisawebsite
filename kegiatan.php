<?php
session_start();

$data_file = 'kegiatan.json';
$kegiatan = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRMA GRISA</title>
    <link href="assets/img/irma1.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
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
              <li><a href="data_pembina.php">Data Guru Agama</a></li>
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
    <hr>
    <br>
    <div class="container mt-7">
    <h2 class="text-center mb-4 fw-bold mt-5 text-dark">Daftar Kegiatan</h2>

    <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'): ?>
        <a href="tambah_kegiatan.php" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Kegiatan
        </a>
    <?php endif; ?>

    <?php if (!empty($kegiatan)): // Cek apakah ada kegiatan ?>
    <?php foreach ($kegiatan as $item): ?>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm border-0">
                <img src="uploads/<?php echo htmlspecialchars($item['foto'] ?? 'default.jpg'); ?>" class="card-img-top" alt="Kegiatan">
                <div class="card-body text-center">
                    <p class="card-text fw-semibold"><?php echo htmlspecialchars($item['keterangan'] ?? 'Tanpa Keterangan'); ?></p>

                    <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'Admin'): ?>
                        <a href="hapus_kegiatan.php?id=<?php echo urlencode($item['id'] ?? ''); ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Apakah Kamu yakin ingin menghapus kegiatan ini?');">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center text-muted">Belum ada kegiatan.</p>
<?php endif; ?>

</div>

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
