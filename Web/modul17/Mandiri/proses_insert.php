<?php
include "cek.php";
include "koneksi.php";
cek_level('admin');

if (isset($_POST['submit'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($ext, $allowed)) {
        die("Format gambar tidak valid. Gunakan jpg, jpeg, png, atau gif.");
    }

    $image_baru = time() . "_" . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($image));
    $upload_dir = __DIR__ . "/upload/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $target = $upload_dir . $image_baru;

    if (move_uploaded_file($tmp, $target)) {
        $stmt = $conn->prepare("INSERT INTO news (title, content, author, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $content, $author, $image_baru);
        $stmt->execute();

        header("Location: dashboard.php");
        exit();
    }

    die("Gagal upload gambar.");
}

header("Location: insert.php");
exit();
?>
