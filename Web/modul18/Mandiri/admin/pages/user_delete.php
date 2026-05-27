<?php
$id = (int)($_GET['id'] ?? 0);

if ($id !== (int)$_SESSION['id_user']) {
    $stmt = $conn->prepare("DELETE FROM tb_user WHERE id_user=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

redirect_page("index.php?page=user");
?>
