<?php
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);
    $image_lama = $_POST['image_lama'];
    $image_baru = $image_lama;
    $upload_dir = __DIR__ . "/../upload/";

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $allowed, true)) {
            $error = "Format gambar tidak valid. Gunakan jpg, jpeg, png, atau gif.";
        } else {
            $image_baru = time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($image));
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (!move_uploaded_file($tmp, $upload_dir . $image_baru)) {
                $error = "Gagal upload gambar baru.";
            } elseif (!empty($image_lama) && file_exists($upload_dir . $image_lama)) {
                unlink($upload_dir . $image_lama);
            }
        }
    }

    if (empty($error)) {
        $stmt = $conn->prepare("UPDATE tb_berita SET title=?, content=?, author=?, image=? WHERE id=?");
        $stmt->bind_param("ssssi", $title, $content, $author, $image_baru, $id);
        $stmt->execute();
        redirect_page("index.php?page=berita");
    }
}

$stmt = $conn->prepare("SELECT * FROM tb_berita WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    redirect_page("index.php?page=berita");
}
?>

<div class="page-card p-4 p-md-5">
    <h3 class="fw-bold mb-4">Edit Berita</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="index.php?page=berita_update&id=<?= (int)$data['id'] ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= (int)$data['id'] ?>">
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
                <img class="thumb" src="upload/<?= htmlspecialchars($data['image']) ?>" alt="<?= htmlspecialchars($data['title']) ?>">
            <?php else: ?>
                <span class="text-muted">Tidak ada gambar</span>
            <?php endif; ?>
        </div>
        <div class="mb-4">
            <label class="form-label">Ganti Gambar</label>
            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
            <div class="form-text">Kosongkan jika gambar tidak diganti.</div>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        <a class="btn btn-secondary" href="index.php?page=berita">Batal</a>
    </form>
</div>
