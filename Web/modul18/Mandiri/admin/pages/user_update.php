<?php
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

if (isset($_POST['submit'])) {
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $username = trim($_POST['username']);
    $level = $_POST['level'] === 'admin' ? 'admin' : 'user';

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE tb_user SET nama_lengkap=?, username=?, password=?, level=? WHERE id_user=?");
        $stmt->bind_param("ssssi", $nama_lengkap, $username, $password, $level, $id);
    } else {
        $stmt = $conn->prepare("UPDATE tb_user SET nama_lengkap=?, username=?, level=? WHERE id_user=?");
        $stmt->bind_param("sssi", $nama_lengkap, $username, $level, $id);
    }

    if ($stmt->execute()) {
        if ($id === (int)$_SESSION['id_user']) {
            $_SESSION['nama_lengkap'] = $nama_lengkap;
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $level;
        }
        redirect_page("index.php?page=user");
    }

    $error = "Gagal mengupdate user. Username mungkin sudah digunakan.";
}

$stmt = $conn->prepare("SELECT id_user, nama_lengkap, username, level FROM tb_user WHERE id_user=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    redirect_page("index.php?page=user");
}
?>

<div class="page-card p-4 p-md-5">
    <h3 class="fw-bold mb-4">Edit User</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="index.php?page=user_update&id=<?= (int)$data['id_user'] ?>" method="post">
        <input type="hidden" name="id" value="<?= (int)$data['id_user'] ?>">
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($data['username']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control">
            <div class="form-text">Kosongkan jika password tidak diganti.</div>
        </div>
        <div class="mb-4">
            <label class="form-label">Level</label>
            <select name="level" class="form-select" required>
                <option value="user" <?= $data['level'] === 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $data['level'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Update</button>
        <a class="btn btn-secondary" href="index.php?page=user">Batal</a>
    </form>
</div>
