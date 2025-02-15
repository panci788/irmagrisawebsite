<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Cek apakah ada parameter ID
if (isset($_GET['id_pengguna']) && !empty($_GET['id_pengguna'])) {
    $id = $_GET['id_pengguna'];

    // Query DELETE untuk menghapus data berdasarkan ID
    $query = "DELETE FROM pengguna WHERE id_pengguna = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='akun.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='akun.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='akun.php';</script>";
}
if (isset($_GET['id_pengguna'])) {
    $id = $_GET['id_pengguna'];
    echo "ID yang diterima: " . $id;
    exit(); // Hentikan eksekusi untuk melihat output
} else {
    echo "ID tidak ditemukan!";
    exit();
}
?>
