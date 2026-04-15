<?php
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$tgl = $_POST['tgl'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];
$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : [];
$ekskul = isset($_POST['ekskul']) ? $_POST['ekskul'] : [];

echo "<h2>Hasil Pendaftaran</h2>";

echo "NIS : $nis <br>";
echo "Nama : $nama <br>";
echo "Kelas : $kelas <br>";
echo "Tanggal Lahir : $tgl <br>";
echo "Alamat : $alamat <br>";
echo "Kota : $kota <br>";
echo "Jenis Kelamin : $jk <br>";

echo "Hobby : " . implode(", ", $hobby) . "<br>";
echo "Ekskul : " . implode(", ", $ekskul) . "<br>";
?>