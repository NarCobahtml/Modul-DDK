<?php
$result = $conn->query("SELECT * FROM tb_berita ORDER BY id DESC");
?>

<div class="page-card p-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h3 class="fw-bold mb-1">Data Berita</h3>
            <p class="text-muted mb-0">Daftar berita dari tabel <code>tb_berita</code>.</p>
        </div>
        <?php if ($_SESSION['level'] === 'admin'): ?>
            <a class="btn btn-primary" href="index.php?page=berita_insert">+ Tambah Berita</a>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-dark">
            <tr>
                <th style="width: 70px;">No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Author</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th style="width: 240px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-semibold"><?= htmlspecialchars($row['title']) ?></td>
                        <td><?= htmlspecialchars(substr($row['content'], 0, 90)) ?><?= strlen($row['content']) > 90 ? '...' : '' ?></td>
                        <td><?= htmlspecialchars($row['author']) ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img class="thumb" src="upload/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white" href="index.php?page=berita_detail&id=<?= (int)$row['id'] ?>">Detail</a>
                            <?php if ($_SESSION['level'] === 'admin'): ?>
                                <a class="btn btn-sm btn-warning" href="index.php?page=berita_update&id=<?= (int)$row['id'] ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="index.php?page=berita_delete&id=<?= (int)$row['id'] ?>" onclick="return confirm('Hapus berita ini?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada berita.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
