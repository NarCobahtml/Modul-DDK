<?php
if (isset($_POST['Login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == "smkn4malang" && $pass == "123") {
        echo "Login Berhasil $user";
    } else {
        echo "Login Gagal";
    }
}
?>