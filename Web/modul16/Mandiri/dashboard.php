<?php
include "cek.php";
include "koneksi.php";

$result = $conn->query("SELECT * FROM tb_ekskul ORDER BY id_ekskul DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #f8fafc, #dbeafe); min-height: 100vh; }
        .sidebar { background: #0f172a; min-height: 100vh; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 sidebar text-white p-4">
            <h4 class="fw-bold">Ekstrakurikuler</h4>
            <p class="small text-white-50 mb-4">Role: <?= htmlspecialchars($_SESSION['level']) ?></p>
            <div class="d-grid gap-2">
                <a class="btn btn-outline-light" href="dashboard.php">Dashboard</a>
                <a class="btn btn-danger mt-3" href="logout.php">Logout</a>
            </div>
        </aside>
        <main class="col-md-9 col-lg-10 p-4 p-md-5">
            <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm mb-4">
                <h1 class="fw-bold">Selamat datang, <?= htmlspecialchars($_SESSION['nama_lengkap']) ?></h1>
                <p class="lead mb-0">Anda login sebagai <strong><?= htmlspecialchars($_SESSION['level']) ?></strong>.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h3 class="fw-bold mb-1">Data Ekstrakurikuler</h3>
                            <p class="text-muted mb-0">Halaman ini langsung menampilkan data yang tersedia.</p>
                        </div>
                        <?php if ($_SESSION['level'] === 'admin'): ?>
                            <a href="insert.php" class="btn btn-primary">+ Tambah Data</a>
                        <?php endif; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Ekskul</th>
                                <th>Jadwal</th>
                                <th>Pembina</th>
                                <th>Deskripsi</th>
                                <?php if ($_SESSION['level'] === 'admin'): ?><th>Aksi</th><?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_ekskul']) ?></td>
                                    <td><?= htmlspecialchars($row['jadwal']) ?></td>
                                    <td><?= htmlspecialchars($row['pembina']) ?></td>
                                    <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                                    <?php if ($_SESSION['level'] === 'admin'): ?>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="update.php?id=<?= $row['id_ekskul'] ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row['id_ekskul'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
