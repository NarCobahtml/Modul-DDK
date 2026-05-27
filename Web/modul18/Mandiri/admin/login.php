<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php?page=dashboard");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Portal Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top left, #2563eb, #0f172a 58%);
        }

        .login-panel {
            max-width: 460px;
        }
    </style>
</head>
<body class="d-flex align-items-center py-5 text-white">
<div class="container">
    <div class="row justify-content-center align-items-center g-5">
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold">Portal Berita</h1>
            <p class="lead text-white-50 mb-0">Login untuk mengelola user dan berita sesuai level akses.</p>
        </div>
        <div class="col-lg-5">
            <div class="card border-0 shadow-lg login-panel ms-lg-auto">
                <div class="card-body p-4 p-md-5 text-dark">
                    <h3 class="fw-bold mb-2">Login User</h3>
                    <p class="text-muted mb-4">Masukkan username dan password.</p>

                    <div class="alert alert-info small">
                        Admin: <strong>admin</strong> / <strong>admin</strong><br>
                        User: <strong>user</strong> / <strong>user</strong>
                    </div>

                    <?php if (($_GET['pesan'] ?? '') === 'gagal'): ?>
                        <div class="alert alert-danger">Login gagal. Periksa username dan password.</div>
                    <?php endif; ?>
                    <?php if (($_GET['pesan'] ?? '') === 'logout'): ?>
                        <div class="alert alert-success">Anda berhasil logout.</div>
                    <?php endif; ?>

                    <form action="proses_login.php" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-lg w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
