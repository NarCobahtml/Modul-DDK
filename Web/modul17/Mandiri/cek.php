<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

function cek_level($level_akses)
{
    if ($_SESSION['level'] !== $level_akses) {
        header("Location: dashboard.php?pesan=akses");
        exit();
    }
}
?>
