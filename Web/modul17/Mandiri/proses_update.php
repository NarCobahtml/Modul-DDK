<?php
include "cek.php";
include "koneksi.php";
cek_level('admin');

if (isset($_POST['submit'])) {
    $id = (int)$_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);
    $image_lama = $_POST['image_lama'];
    $image_baru = $image_lama;

    if (!empty($_FILES['image']['name'])) {
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

        if (!move_uploaded_file($tmp, $target)) {
            die("Gagal upload gambar baru.");
        }

        if (!empty($image_lama) && file_exists($upload_dir . $image_lama)) {
            unlink($upload_dir . $image_lama);
        }
    }

    $stmt = $conn->prepare("UPDATE news SET title=?, content=?, author=?, image=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $content, $author, $image_baru, $id);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}

header("Location: dashboard.php");
exit();
?>
