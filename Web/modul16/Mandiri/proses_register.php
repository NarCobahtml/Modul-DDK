<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $level = "user";

    if ($nama_lengkap === "" || $username === "" || $password === "") {
        header("Location: register.php?pesan=kosong");
        exit();
    }

    $cek = $conn->prepare("SELECT id_user FROM tb_user WHERE username=?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $hasil = $cek->get_result();

    if ($hasil->num_rows > 0) {
        header("Location: register.php?pesan=sudah");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO tb_user (nama_lengkap, username, password, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_lengkap, $username, $hash, $level);

    if ($stmt->execute()) {
        header("Location: login.php?pesan=berhasil");
    } else {
        header("Location: register.php?pesan=gagal");
    }
    exit();
}
header("Location: register.php");
exit();
?>
