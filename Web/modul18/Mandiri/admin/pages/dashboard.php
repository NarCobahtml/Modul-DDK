<?php
$total_user = $conn->query("SELECT COUNT(*) AS total FROM tb_user")->fetch_assoc()['total'];
$total_berita = $conn->query("SELECT COUNT(*) AS total FROM tb_berita")->fetch_assoc()['total'];
$berita_terbaru = $conn->query("SELECT id, title, author, date FROM tb_berita ORDER BY id DESC LIMIT 5");
?>

<?php if (($_GET['pesan'] ?? '') === 'akses'): ?>
    <div class="alert alert-warning">Akses ditolak. Level user hanya dapat melihat data dan detail.</div>
<?php endif; ?>

<div class="page-card p-4 p-md-5 mb-4">
    <h1 class="fw-bold mb-2">Dashboard</h1>
    <p class="lead text-muted mb-0">
        Selamat datang, <strong><?= htmlspecialchars($_SESSION['nama_lengkap']) ?></strong>.
        Anda login sebagai <strong><?= htmlspecialchars($_SESSION['level']) ?></strong>.
    </p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="stat-card p-4">
            <div class="text-muted">Total User</div>
            <div class="display-6 fw-bold"><?= (int)$total_user ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="stat-card p-4">
            <div class="text-muted">Total Berita</div>
            <div class="display-6 fw-bold"><?= (int)$total_berita ?></div>
        </div>
    </div>
</div>

<div class="page-card p-4">
    <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h3 class="fw-bold mb-1">Berita Terbaru</h3>
            <p class="text-muted mb-0">Ringkasan data berita terakhir.</p>
        </div>
        <a class="btn btn-primary" href="index.php?page=berita">Lihat Berita</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Author</th>
                <th>Tanggal</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($berita_terbaru->num_rows > 0): ?>
                <?php while ($row = $berita_terbaru->fetch_assoc()): ?>
                    <tr>
                        <td class="fw-semibold"><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white" href="index.php?page=berita_detail&id=<?= (int)$row['id'] ?>">Detail</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada berita.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
