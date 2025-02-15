<?php
include 'koneksi.php';

// Cek apakah ada parameter ID yang dikirim
if (isset($_GET['id_pengurus']) && !empty($_GET['id_pengurus'])) {
    $id = $_GET['id_pengurus'];

    // Ambil data dari database berdasarkan ID
    $stmt = $koneksi->prepare("SELECT * FROM db_kepengurusan WHERE id_pengurus = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='data_pengurus.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data_pengurus.php';</script>";
    exit();
}
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
      <a class="btn-getstarted" href="index.php">Logout</a>
    </div>
  </header>
  <br>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Data Pengurus</h5>
            <form method="post" action="proses_edit_pengurus.php">
                <input type="hidden" name="id_pengurus" value="<?= $data['id_pengurus']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?= $data['jabatan']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Periode</label>
                    <input type="text" class="form-control" name="periode" value="<?= $data['periode']; ?>" required>
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan Perubahan</button>
                <a href="data_pengurus.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

</body>
</html>
