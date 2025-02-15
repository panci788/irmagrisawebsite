<?php
session_start();

// Cek apakah pengguna sudah login dan memiliki status 'Admin'
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'Admin') {
    // Jika belum login atau bukan admin, tampilkan alert dan alihkan ke halaman login
    echo "<script>
            alert('Anda harus login terlebih dahulu!.');
            window.location.href = 'login.php';
          </script>";
    exit();
}

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'Admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keterangan = htmlspecialchars($_POST['keterangan'], ENT_QUOTES, 'UTF-8');
    
    $foto = $_FILES['foto'];
    $foto_name = time() . '_' . $foto['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto_name);
    
    if (move_uploaded_file($foto['tmp_name'], $target_file)) {
        $data_file = 'kegiatan.json';
        $kegiatan = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];
        
        $new_kegiatan = [
            'foto' => $foto_name,
            'keterangan' => $keterangan,
            'timestamp' => time()
        ];
        
        $kegiatan[] = $new_kegiatan;
        file_put_contents($data_file, json_encode($kegiatan, JSON_PRETTY_PRINT));
        
        echo "<script>alert('Kegiatan berhasil ditambahkan!'); window.location='kegiatan.php';</script>";
    } else {
        echo "<script>alert('Gagal mengunggah foto!');</script>";
    }
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
      <a class="btn-getstarted" href="index.php">Logout</a>
    </div>
  </header>
  <br>
<body>
    <div class="container mt-5">
    <h2 class="text-center">Tambah Kegiatan</h2><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="foto" class="form-label">Unggah Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
            <a href="kegiatan.php" class="btn btn-secondary">Kembali</a>
        </form>
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
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
