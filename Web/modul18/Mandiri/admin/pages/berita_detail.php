<?php
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM tb_berita WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    redirect_page("index.php?page=berita");
}
?>

<div class="mb-3">
    <a class="btn btn-secondary" href="index.php?page=berita">Kembali</a>
    <?php if ($_SESSION['level'] === 'admin'): ?>
        <a class="btn btn-warning" href="index.php?page=berita_update&id=<?= (int)$data['id'] ?>">Edit</a>
    <?php endif; ?>
</div>

<article class="page-card p-4 p-md-5">
    <h1 class="fw-bold mb-3"><?= htmlspecialchars($data['title']) ?></h1>
    <div class="text-muted mb-4">
        Ditulis oleh <strong><?= htmlspecialchars($data['author']) ?></strong>
        pada <?= htmlspecialchars($data['date']) ?>
    </div>
    <?php if (!empty($data['image'])): ?>
        <img class="hero-img mb-4" src="upload/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['title']) ?>">
    <?php endif; ?>
    <div class="fs-5 lh-lg"><?= nl2br(htmlspecialchars($data['content'])) ?></div>
</article>
