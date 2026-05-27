<?php
$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT image FROM tb_berita WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if ($data) {
    $upload_dir = __DIR__ . "/../upload/";
    if (!empty($data['image']) && file_exists($upload_dir . $data['image'])) {
        unlink($upload_dir . $data['image']);
    }

    $stmt = $conn->prepare("DELETE FROM tb_berita WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

redirect_page("index.php?page=berita");
?>
