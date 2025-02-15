<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

// Cek apakah ada parameter ID
if (isset($_GET['id_pembina']) && !empty($_GET['id_pembina'])) {
    $id = $_GET['id_pembina'];

    // Query DELETE untuk menghapus data berdasarkan ID
    $query = "DELETE FROM data_pembina WHERE id_pembina = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='data_pembina.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='data_pembina.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data_pembina.php';</script>";
}
if (isset($_GET['id_pembina'])) {
    $id = $_GET['id_pembina'];
    echo "ID yang diterima: " . $id;
    exit(); // Hentikan eksekusi untuk melihat output
} else {
    echo "ID tidak ditemukan!";
    exit();
}
?>
