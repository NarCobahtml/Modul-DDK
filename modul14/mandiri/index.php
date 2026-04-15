<?php

require_once __DIR__ . '/../latihan/koneksi.php';

$result = mysqli_query($koneksi, 'SELECT nis, nama, kelas, kota, jk, ekskul FROM tb_siswa ORDER BY nama ASC');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pendaftaran Ekstrakurikuler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h1 class="h3 mb-1">Pendaftaran Ekstrakurikuler</h1>
                <p class="text-secondary mb-0">CRUD data siswa sesuai tugas mandiri modul 14.</p>
            </div>
            <a href="form.php" class="btn btn-primary">Tambah Pendaftaran</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kota</th>
                                <th>JK</th>
                                <th>Ekskul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['nis']); ?></td>
                                        <td><?= htmlspecialchars($row['nama']); ?></td>
                                        <td><?= htmlspecialchars($row['kelas'] ?: '-'); ?></td>
                                        <td><?= htmlspecialchars($row['kota'] ?: '-'); ?></td>
                                        <td><?= htmlspecialchars(($row['jk'] ?? '') === 'L' ? 'Laki-Laki' : (($row['jk'] ?? '') === 'P' ? 'Perempuan' : '-')); ?></td>
                                        <td><?= htmlspecialchars($row['ekskul'] ?: '-'); ?></td>
                                        <td class="text-nowrap">
                                            <a href="detail.php?nis=<?= urlencode($row['nis']); ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                                            <a href="form.php?nis=<?= urlencode($row['nis']); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <a href="hapus.php?nis=<?= urlencode($row['nis']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-secondary">Belum ada data pendaftaran.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
