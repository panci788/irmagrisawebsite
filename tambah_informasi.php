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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>    <!-- Section Tambah Informasi -->
<section id="tambah-informasi" class="tambah-informasi">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="section-title">
<h2>Tambah Informasi Baru</h2>
<p>Silakan isi formulir di bawah ini untuk menambahkan informasi baru ke website.</p>
</div>

<!-- Form Tambah Informasi -->
<form action="proses_tambah_informasi.php" method="POST">
  <div class="mb-3">
    <label for="judul" class="form-label">Judul Informasi</label>
    <input type="text" class="form-control" id="judul" name="judul" required>
  </div>
  
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi Informasi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
  </div>
  
  <div class="mb-3">
    <label for="link" class="form-label">Link (Opsional)</label>
    <input type="url" class="form-control" id="link" name="link">
    <small class="form-text text-muted">Masukkan link yang relevan dengan informasi ini (opsional).</small>
  </div>

  <div class="mb-3">
    <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan Informasi</button>
    <a href="info.php" class="btn btn-secondary">Kembali</a>
  </div>
</form>
</div>
</div>
</div>
</section>
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
