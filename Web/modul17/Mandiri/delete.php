<?php
include "cek.php";
include "koneksi.php";
cek_level('admin');

$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT image FROM news WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if ($data) {
    $upload_dir = __DIR__ . "/upload/";
    if (!empty($data['image']) && file_exists($upload_dir . $data['image'])) {
        unlink($upload_dir . $data['image']);
    }

    $stmt = $conn->prepare("DELETE FROM news WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: dashboard.php");
exit();
?>
