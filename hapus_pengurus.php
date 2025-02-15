<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Cek apakah ada parameter ID
if (isset($_GET['id_pengurus']) && !empty($_GET['id_pengurus'])) {
    $id = $_GET['id_pengurus'];

    // Query DELETE untuk menghapus data berdasarkan ID
    $query = "DELETE FROM db_kepengurusan WHERE id_pengurus = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='data_anggota.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='data_anggota.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data_anggota.php';</script>";
}
if (isset($_GET['id_pengurus'])) {
    $id = $_GET['id_pengurus'];
    echo "ID yang diterima: " . $id;
    exit(); // Hentikan eksekusi untuk melihat output
} else {
    echo "ID tidak ditemukan!";
    exit();
}
?>
