<?php
include 'koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id_pengurus']) ? (int) $_POST['id_pengurus'] : 0;
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $jabatan = isset($_POST['jabatan']) ? trim($_POST['jabatan']) : '';
    $periode = isset($_POST['periode']) ? trim($_POST['periode']) : '';

    // Pastikan ID valid sebelum update
    if ($id > 0 && !empty($nama) && !empty($jabatan) && !empty($periode)) {
        // Gunakan Prepared Statement
        $stmt = $koneksi->prepare("UPDATE db_kepengurusan SET nama = ?, jabatan = ?, periode = ? WHERE id_pengurus = ?");
        
        if ($stmt) {
            $stmt->bind_param("sssi", $nama, $jabatan, $periode, $id);

            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil diperbarui!'); window.location='data_pengurus.php';</script>";
            } else {
                echo "<script>alert('Gagal memperbarui data!'); window.location='edit_pengurus.php?id_pengurus=$id';</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Kesalahan dalam query: " . $koneksi->error . "');</script>";
        }
    } else {
        echo "<script>alert('Data tidak boleh kosong!'); window.location='edit_pengurus.php?id_pengurus=$id';</script>";
    }
} else {
    echo "<script>alert('Akses tidak valid!'); window.location='data_pengurus.php';</script>";
}
?>
