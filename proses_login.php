<?php
session_start(); 

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

include 'koneksi.php';

if (empty($username) || empty($password)) {
    echo "<script>
        alert('Username dan Password tidak boleh kosong!');
        window.location.assign('login.php');
    </script>";
    exit();
}

$stmt = $koneksi->prepare("SELECT * FROM pengguna WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $hashed_password);

$hashed_password = md5($password);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>
        alert('Username atau Password salah!');
        window.location.assign('login.php');
    </script>";
} else {
    $data = $result->fetch_assoc();

    $_SESSION["username"] = $data['username'];
    $_SESSION["status"] = $data['status'];
    $_SESSION["nama"] = $data['nama_lengkap'];

    // Redirect berdasarkan status
    if ($data['status'] === 'Admin') {
        header("Location: admin.php");
    } else {
        header("Location: pengguna.php");
    }
    exit();
}

$stmt->close();
$koneksi->close();
?>
