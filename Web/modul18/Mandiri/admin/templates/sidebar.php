<?php $active = $_GET['page'] ?? 'dashboard'; ?>
<aside class="sidebar">
    <h2>Portal Berita</h2>
    <div class="role">Panel <?= htmlspecialchars($_SESSION['level'] ?? 'user') ?></div>
    <a class="<?= $active === 'dashboard' ? 'active' : '' ?>" href="index.php?page=dashboard">Dashboard</a>
    <a class="<?= str_starts_with($active, 'user') ? 'active' : '' ?>" href="index.php?page=user">Data User</a>
    <a class="<?= str_starts_with($active, 'berita') ? 'active' : '' ?>" href="index.php?page=berita">Data Berita</a>
</aside>
