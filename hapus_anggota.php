<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Cek apakah ada parameter ID
if (isset($_GET['id_anggota']) && !empty($_GET['id_anggota'])) {
    $id = $_GET['id_anggota'];

    // Query DELETE untuk menghapus data berdasarkan ID
    $query = "DELETE FROM data_anggota WHERE id_anggota = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='data_anggota.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='data_anggota.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data_anggota.php';</script>";
}
if (isset($_GET['id_anggota'])) {
    $id = $_GET['id_anggota'];
    echo "ID yang diterima: " . $id;
    exit(); // Hentikan eksekusi untuk melihat output
} else {
    echo "ID tidak ditemukan!";
    exit();
}
?>
