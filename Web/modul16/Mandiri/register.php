<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Ekstrakurikuler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #102a43, #1f7a8c 55%, #f0f4f8); min-height: 100vh; }
        .card-glass { background: rgba(255,255,255,.92); backdrop-filter: blur(10px); border: 0; }
    </style>
</head>
<body class="d-flex align-items-center py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
            <div class="card shadow-lg card-glass rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-2">Pendaftaran User</h3>
                    <p class="text-muted mb-4">Daftarkan akun untuk melihat informasi ekstrakurikuler.</p>
                    <?php if (isset($_GET['pesan'])): ?>
                        <div class="alert alert-warning">Username sudah dipakai atau data tidak valid.</div>
                    <?php endif; ?>
                    <form action="proses_register.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg w-100">Register</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="login.php" class="text-decoration-none">Sudah punya akun? Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
