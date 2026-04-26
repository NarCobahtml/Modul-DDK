<?php
session_start();

if (!isset($_SESSION['namauser'])) {
   echo "Anda Belum Login";
    exit();
}

?>