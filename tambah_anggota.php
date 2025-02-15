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
$query = mysqli_query($koneksi,"SELECT * FROM data_anggota");

// Proses penyimpanan data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO data_anggota (nama, jk, kelas, no_hp, email) VALUES ('$nama', '$jk', '$kelas', '$no_hp', '$email')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='data_anggota.php';</script>";
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Anggota</h5>
            <form method="post" action="tambah_anggota.php">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-control" name="jk" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <input type="text" class="form-control" name="kelas" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Hp</label>
                    <input type="number" class="form-control" name="no_hp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Simpan</button>
                <a href="data_anggota.php" class="btn btn-secondary">Kembali</a>
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
