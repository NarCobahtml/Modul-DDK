<?php
include "cek.php";
include "koneksi.php";

if ($_SESSION['level'] !== 'admin') {
    header("Location: dashboard.php?pesan=akses");
    exit();
}

if (isset($_POST['submit'])) {
    $id = (int)$_POST['id_ekskul'];
    $nama = $_POST['nama_ekskul'];
    $jadwal = $_POST['jadwal'];
    $pembina = $_POST['pembina'];
    $deskripsi = $_POST['deskripsi'];

    $stmt = $conn->prepare("UPDATE tb_ekskul SET nama_ekskul=?, jadwal=?, pembina=?, deskripsi=? WHERE id_ekskul=?");
    $stmt->bind_param("ssssi", $nama, $jadwal, $pembina, $deskripsi, $id);
    $stmt->execute();
}
header("Location: dashboard.php");
exit();
?>
