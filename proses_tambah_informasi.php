<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link']; // Menambahkan link

    $query = "INSERT INTO informasi (judul, deskripsi, link) VALUES ('$judul', '$deskripsi', '$link')";
    if (mysqli_query($koneksi, $query)) {
        // Menampilkan alert jika berhasil menambahkan informasi
        echo "<script>
                alert('Informasi berhasil ditambahkan!');
                window.location.href = 'info.php'; // Redirect ke halaman admin setelah alert
              </script>";
    } else {
        // Menampilkan alert jika terjadi kesalahan
        echo "<script>
                alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');
                window.location.href = 'info.php'; // Redirect ke halaman admin setelah alert
              </script>";
    }
}
?>
