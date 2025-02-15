<?php 
include 'koneksi.php';
session_start();

// Pastikan hanya admin yang bisa mengakses halaman ini
if(isset($_SESSION['status']) && $_SESSION['status'] == 'Admin') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Ganti 'id' dengan nama kolom yang benar, misalnya 'id'
        $query = "DELETE FROM informasi WHERE id = '$id'"; // Sesuaikan nama kolom ID

        if (mysqli_query($koneksi, $query)) {
            // Menampilkan alert menggunakan JavaScript jika berhasil
            echo "<script>
                    alert('Informasi berhasil dihapus!');
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
} else {
    echo "<script>
            alert('Anda tidak memiliki izin untuk menghapus informasi.');
            window.location.href = 'admin.php'; // Redirect ke halaman admin jika tidak punya izin
          </script>";
}
?>
