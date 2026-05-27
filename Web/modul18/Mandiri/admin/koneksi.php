<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_berita";

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

$conn->query("CREATE TABLE IF NOT EXISTS tb_user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    level ENUM('admin','user') NOT NULL DEFAULT 'user'
)");

$conn->query("CREATE TABLE IF NOT EXISTS tb_berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$cek_user = $conn->query("SELECT COUNT(*) AS total FROM tb_user")->fetch_assoc();
if ((int)$cek_user['total'] === 0) {
    $stmt = $conn->prepare("INSERT INTO tb_user (nama_lengkap, username, password, level) VALUES (?, ?, ?, ?)");

    $nama = "Administrator";
    $username = "admin";
    $password = password_hash("admin", PASSWORD_DEFAULT);
    $level = "admin";
    $stmt->bind_param("ssss", $nama, $username, $password, $level);
    $stmt->execute();

    $nama = "User Berita";
    $username = "user";
    $password = password_hash("user", PASSWORD_DEFAULT);
    $level = "user";
    $stmt->bind_param("ssss", $nama, $username, $password, $level);
    $stmt->execute();
}
?>
