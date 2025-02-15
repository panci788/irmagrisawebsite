<?php
include 'koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_anggota']; // Sesuaikan dengan nama kolom di database
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Gunakan Prepared Statement untuk keamanan
    $stmt = $koneksi->prepare("UPDATE data_anggota SET nama = ?, jk = ?, kelas = ?, no_hp = ?, email = ? WHERE id_anggota = ?");
    $stmt->bind_param("sssssi", $nama, $jk, $kelas, $no_hp, $email, $id);
    $result = $stmt->execute();

    if ($result) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='data_anggota.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='edit_anggota.php?id_anggota=$id';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Akses tidak valid!'); window.location='data_anggota.php';</script>";
}
?>
