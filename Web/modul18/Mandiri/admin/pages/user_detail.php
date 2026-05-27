<?php
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT id_user, nama_lengkap, username, level FROM tb_user WHERE id_user=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    redirect_page("index.php?page=user");
}
?>

<div class="mb-3">
    <a class="btn btn-secondary" href="index.php?page=user">Kembali</a>
    <?php if ($_SESSION['level'] === 'admin'): ?>
        <a class="btn btn-warning" href="index.php?page=user_update&id=<?= (int)$data['id_user'] ?>">Edit</a>
    <?php endif; ?>
</div>

<div class="page-card p-4 p-md-5">
    <h3 class="fw-bold mb-4">Detail User</h3>
    <dl class="row mb-0">
        <dt class="col-sm-3">Nama Lengkap</dt>
        <dd class="col-sm-9"><?= htmlspecialchars($data['nama_lengkap']) ?></dd>
        <dt class="col-sm-3">Username</dt>
        <dd class="col-sm-9"><?= htmlspecialchars($data['username']) ?></dd>
        <dt class="col-sm-3">Level</dt>
        <dd class="col-sm-9"><span class="badge text-bg-primary text-capitalize"><?= htmlspecialchars($data['level']) ?></span></dd>
    </dl>
</div>
