<?php
include "cek.php";
include "koneksi.php";

if ($_SESSION['level'] !== 'admin') {
    header("Location: dashboard.php?pesan=akses");
    exit();
}

$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT * FROM tb_ekskul WHERE id_ekskul=?");
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
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h2 class="fw-bold mb-4">Ubah Data Ekstrakurikuler</h2>
            <form action="proses_update.php" method="post">
                <input type="hidden" name="id_ekskul" value="<?= $data['id_ekskul'] ?>">
                <div class="mb-3"><label class="form-label">Nama Ekskul</label><input type="text" name="nama_ekskul" class="form-control" value="<?= htmlspecialchars($data['nama_ekskul']) ?>" required></div>
                <div class="mb-3"><label class="form-label">Jadwal</label><input type="text" name="jadwal" class="form-control" value="<?= htmlspecialchars($data['jadwal']) ?>" required></div>
                <div class="mb-3"><label class="form-label">Pembina</label><input type="text" name="pembina" class="form-control" value="<?= htmlspecialchars($data['pembina']) ?>" required></div>
                <div class="mb-3"><label class="form-label">Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($data['deskripsi']) ?></textarea></div>
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                <a href="dashboard.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
