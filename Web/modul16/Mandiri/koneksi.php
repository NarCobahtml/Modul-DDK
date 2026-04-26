<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_ekskul";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal. Pastikan database '$db' sudah dibuat dan diimport.");
}
?>
