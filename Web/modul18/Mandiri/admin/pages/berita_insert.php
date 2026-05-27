<?php
if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);
    $image_baru = null;

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $allowed, true)) {
            $error = "Format gambar tidak valid. Gunakan jpg, jpeg, png, atau gif.";
        } else {
            $image_baru = time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($image));
            $upload_dir = __DIR__ . "/../upload/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (!move_uploaded_file($tmp, $upload_dir . $image_baru)) {
                $error = "Gagal upload gambar.";
            }
        }
    }

    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO tb_berita (title, content, author, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $author, $image_baru);
        $stmt->execute();
        redirect_page("index.php?page=berita");
    }
}
?>

<div class="page-card p-4 p-md-5">
    <h3 class="fw-bold mb-4">Tambah Berita</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="index.php?page=berita_insert" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konten</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($_SESSION['nama_lengkap']) ?>" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
        <a class="btn btn-secondary" href="index.php?page=berita">Batal</a>
    </form>
</div>
