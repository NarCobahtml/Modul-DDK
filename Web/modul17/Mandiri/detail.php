<?php
include "cek.php";
include "koneksi.php";

$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f6fb; }
        .hero-img { width: 100%; max-height: 420px; object-fit: cover; border-radius: 16px; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="mb-3">
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        <?php if ($_SESSION['level'] === 'admin'): ?>
            <a href="update.php?id=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
        <?php endif; ?>
    </div>
    <article class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        <h1 class="fw-bold mb-3"><?= htmlspecialchars($data['title']) ?></h1>
        <div class="text-muted mb-4">
            Ditulis oleh <strong><?= htmlspecialchars($data['author']) ?></strong> pada <?= htmlspecialchars($data['date']) ?>
        </div>
        <?php if (!empty($data['image'])): ?>
            <img class="hero-img mb-4" src="upload/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['title']) ?>">
        <?php endif; ?>
        <div class="fs-5 lh-lg"><?= nl2br(htmlspecialchars($data['content'])) ?></div>
    </article>
</div>
</body>
</html>
