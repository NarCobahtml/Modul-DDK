<?php
session_start();

$namauser = $_POST['username'];
$password = $_POST['password'];

if ($namauser == "narnirnur" && $password == "progremer") {

    $_SESSION['namauser'] = $namauser;

  
    header("Location: ../../modul14/mandiri/index.php");
    exit();

} else {
    echo "Login gagal!";
}
?>