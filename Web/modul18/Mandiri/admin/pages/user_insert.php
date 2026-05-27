<?php
if (isset($_POST['submit'])) {
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'] === 'admin' ? 'admin' : 'user';

    $stmt = $conn->prepare("INSERT INTO tb_user (nama_lengkap, username, password, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama_lengkap, $username, $password, $level);

    if ($stmt->execute()) {
        redirect_page("index.php?page=user");
    }

    $error = "Username sudah digunakan atau data tidak valid.";
}
?>

<div class="page-card p-4 p-md-5">
    <h3 class="fw-bold mb-4">Tambah User</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="index.php?page=user_insert" method="post">
        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Level</label>
            <select name="level" class="form-select" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
        <a class="btn btn-secondary" href="index.php?page=user">Batal</a>
    </form>
</div>
