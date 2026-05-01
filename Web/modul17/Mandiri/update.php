<?php
include "cek.php";
include "koneksi.php";
cek_level('admin');

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
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .preview-img { width: 180px; height: 120px; object-fit: cover; border-radius: 10px; }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <h2 class="fw-bold mb-4">Edit Berita</h2>
            <form action="proses_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <input type="hidden" name="image_lama" value="<?= htmlspecialchars($data['image']) ?>">
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['title']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea name="content" class="form-control" rows="6" required><?= htmlspecialchars($data['content']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($data['author']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <?php if (!empty($data['image'])): ?>
                        <img class="preview-img" src="upload/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['title']) ?>">
                    <?php else: ?>
                        <span class="text-muted">Tidak ada gambar</span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                    <div class="form-text">Kosongkan jika tidak ingin mengganti gambar.</div>
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                <a href="dashboard.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
