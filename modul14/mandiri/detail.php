<?php

require_once __DIR__ . '/../latihan/koneksi.php';

$nis = $_GET['nis'] ?? '';
$stmt = mysqli_prepare($koneksi, 'SELECT nis, nama, kelas, ttl, alamat, kota, jk, hoby, ekskul FROM tb_siswa WHERE nis = ?');
mysqli_stmt_bind_param($stmt, 's', $nis);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    exit('Data pendaftaran tidak ditemukan.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4">Detail Pendaftaran Ekstrakurikuler</h1>
                        <table class="table table-bordered mb-0">
                            <tr><th width="220">NIS</th><td><?= htmlspecialchars($data['nis']); ?></td></tr>
                            <tr><th>Nama</th><td><?= htmlspecialchars($data['nama']); ?></td></tr>
                            <tr><th>Kelas</th><td><?= htmlspecialchars($data['kelas'] ?: '-'); ?></td></tr>
                            <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($data['ttl'] ?: '-'); ?></td></tr>
                            <tr><th>Alamat</th><td><?= nl2br(htmlspecialchars($data['alamat'] ?: '-')); ?></td></tr>
                            <tr><th>Kota</th><td><?= htmlspecialchars($data['kota'] ?: '-'); ?></td></tr>
                            <tr><th>Jenis Kelamin</th><td><?= htmlspecialchars(($data['jk'] ?? '') === 'L' ? 'Laki-Laki' : (($data['jk'] ?? '') === 'P' ? 'Perempuan' : '-')); ?></td></tr>
                            <tr><th>Hobi</th><td><?= htmlspecialchars($data['hoby'] ?: '-'); ?></td></tr>
                            <tr><th>Pilihan Ekskul</th><td><?= htmlspecialchars($data['ekskul'] ?: '-'); ?></td></tr>
                        </table>
                        <div class="mt-4 d-flex gap-2">
                            <a href="form.php?nis=<?= urlencode($data['nis']); ?>" class="btn btn-primary">Edit</a>
                            <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
