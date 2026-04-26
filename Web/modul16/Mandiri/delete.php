<?php
include "cek.php";
include "koneksi.php";

if ($_SESSION['level'] !== 'admin') {
    header("Location: dashboard.php?pesan=akses");
    exit();
}

$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("DELETE FROM tb_ekskul WHERE id_ekskul=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: dashboard.php");
exit();
?>
