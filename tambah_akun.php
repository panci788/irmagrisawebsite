<?php 
include 'koneksi.php';
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
$query = mysqli_query($koneksi,"SELECT * FROM pengguna");

// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO pengguna (username, password, nama_lengkap, status) VALUES ('$username',md5('$password'),'$nama_lengkap','$status')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Akun berhasil ditambahkan!'); window.location='akun.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Akun</h5>
            <form method="post" action="tambah_akun.php">
                <div class="mb-3">
                    <label class="form-label"></label>Username
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status" required>
                        <option value="Admin">Admin</option>
                        <option value="Pengguna">Pengguna</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                <a href="akun.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
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
