<?php
include "cek.php";
include "koneksi.php";

$page = $_GET['page'] ?? 'dashboard';
$allowed = [
    'dashboard',
    'user',
    'user_detail',
    'user_insert',
    'user_update',
    'user_delete',
    'berita',
    'berita_detail',
    'berita_insert',
    'berita_update',
    'berita_delete',
];

if (!in_array($page, $allowed, true)) {
    $page = 'dashboard';
}

$admin_only = [
    'user_insert',
    'user_update',
    'user_delete',
    'berita_insert',
    'berita_update',
    'berita_delete',
];

if (in_array($page, $admin_only, true)) {
    cek_level('admin');
}

function redirect_page($url)
{
    if (!headers_sent()) {
        header("Location: $url");
    } else {
        echo '<script>window.location.href = ' . json_encode($url) . ';</script>';
    }
    exit();
}
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/sidebar.php'; ?>

<main class="main">
    <div class="topbar">
        <div>
            <div class="text-muted small">Login sebagai</div>
            <strong><?= htmlspecialchars($_SESSION['nama_lengkap']) ?></strong>
            <span class="badge text-bg-primary text-capitalize ms-2"><?= htmlspecialchars($_SESSION['level']) ?></span>
        </div>
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </div>

    <section class="content">
        <?php include "pages/$page.php"; ?>
    </section>

    <?php include 'templates/footer.php'; ?>
</main>
