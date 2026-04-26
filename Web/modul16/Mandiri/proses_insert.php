<?php
include "cek.php";
include "koneksi.php";

if ($_SESSION['level'] !== 'admin') {
    header("Location: dashboard.php?pesan=akses");
    exit();
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_ekskul'];
    $jadwal = $_POST['jadwal'];
    $pembina = $_POST['pembina'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare("INSERT INTO tb_ekskul (nama_ekskul, jadwal, pembina, deskripsi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $jadwal, $pembina, $deskripsi);
    $stmt->execute();
}
header("Location: dashboard.php");
exit();
?>
