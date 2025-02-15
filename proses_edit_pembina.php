<?php
include 'koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_pembina']; // Pastikan sesuai dengan nama kolom di database
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Gunakan Prepared Statement tanpa "kelas"
    $stmt = $koneksi->prepare("UPDATE data_pembina SET nama = ?, jk = ?, no_hp = ?, email = ? WHERE id_pembina = ?");
    $stmt->bind_param("ssssi", $nama, $jk, $no_hp, $email, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='data_pembina.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!'); window.location='edit_pembina.php?id_pembina=$id';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Akses tidak valid!'); window.location='data_pembina.php';</script>";
}
?>
