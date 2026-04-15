<?php
$username = $_POST['username'];
$password = $_POST['password'];

// login sederhana (sesuai gambar)
if ($username == "aku" && $password == "123456") {
    header("Location: form.php");
} else {
    echo "Login gagal!";
}
?>