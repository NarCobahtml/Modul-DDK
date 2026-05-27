<?php
$result = $conn->query("SELECT id_user, nama_lengkap, username, level FROM tb_user ORDER BY id_user DESC");
?>

<div class="page-card p-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
        <div>
            <h3 class="fw-bold mb-1">Manajemen User</h3>
            <p class="text-muted mb-0">Admin dapat menambah, mengedit, dan menghapus user.</p>
        </div>
        <?php if ($_SESSION['level'] === 'admin'): ?>
            <a class="btn btn-primary" href="index.php?page=user_insert">+ Tambah User</a>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mb-0">
            <thead class="table-dark">
            <tr>
                <th style="width: 70px;">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Level</th>
                <th style="width: 240px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-semibold"><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td><span class="badge text-bg-secondary text-capitalize"><?= htmlspecialchars($row['level']) ?></span></td>
                        <td>
                            <a class="btn btn-sm btn-info text-white" href="index.php?page=user_detail&id=<?= (int)$row['id_user'] ?>">Detail</a>
                            <?php if ($_SESSION['level'] === 'admin'): ?>
                                <a class="btn btn-sm btn-warning" href="index.php?page=user_update&id=<?= (int)$row['id_user'] ?>">Edit</a>
                                <a class="btn btn-sm btn-danger" href="index.php?page=user_delete&id=<?= (int)$row['id_user'] ?>" onclick="return confirm('Hapus user ini?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data user.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
