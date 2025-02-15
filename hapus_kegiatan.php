<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != 'Admin') {
    header("Location: kegiatan.php");
    exit;
}

$data_file = 'kegiatan.json';
$kegiatan = file_exists($data_file) ? json_decode(file_get_contents($data_file), true) : [];

if (isset($_GET['id'])) {
    $id_hapus = $_GET['id'];

    foreach ($kegiatan as $key => $item) {
        if ($item['id'] == $id_hapus) {
            if (file_exists("uploads/" . $item['foto'])) {
                unlink("uploads/" . $item['foto']); // Hapus gambar terkait
            }
            unset($kegiatan[$key]);
            file_put_contents($data_file, json_encode(array_values($kegiatan), JSON_PRETTY_PRINT));
            break;
        }
    }
}

header("Location: kegiatan.php");
exit;
?>
