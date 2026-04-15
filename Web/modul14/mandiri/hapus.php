<?php

require_once __DIR__ . '/../latihan/koneksi.php';

$nis = $_GET['nis'] ?? '';

if ($nis !== '') {
    $stmt = mysqli_prepare($koneksi, 'DELETE FROM tb_siswa WHERE nis = ?');
    mysqli_stmt_bind_param($stmt, 's', $nis);
    mysqli_stmt_execute($stmt);
}

header('Location: index.php');
exit;
