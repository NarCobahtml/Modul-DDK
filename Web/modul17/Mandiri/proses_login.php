<?php
session_start();

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $users = [
        'admin' => [
            'id_user' => 1,
            'nama_lengkap' => 'Administrator',
            'password' => 'admin',
            'level' => 'admin',
        ],
        'user' => [
            'id_user' => 2,
            'nama_lengkap' => 'User Berita',
            'password' => 'user',
            'level' => 'user',
        ],
    ];

    $data = $users[$username] ?? null;

    if ($data && $password === $data['password']) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];
        header("Location: dashboard.php");
        exit();
    }
}

header("Location: login.php?pesan=gagal");
exit();
?>
