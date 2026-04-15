<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Mandiri 2</title>
</head>
<body>
<h1>Program Hitung Luas dan Keliling</h1>
<?php
// Segitiga Siku-siku
$alas = 5;
$tinggi = 10;
$luasSegitiga = 0.5 * $alas * $tinggi;
$kelilingSegitiga = $alas + $tinggi + sqrt(($alas * $alas) + ($tinggi * $tinggi));
echo "<h2>Segitiga Siku-siku</h2>";
echo "Alas: $alas, Tinggi: $tinggi <br>";
echo "Luas: $luasSegitiga <br>";
echo "Keliling: $kelilingSegitiga <br><br>";

// Persegi
$sisi = 5;
$luasPersegi = $sisi * $sisi;
$kelilingPersegi = 4 * $sisi;
echo "<h2>Persegi</h2>";
echo "Sisi: $sisi <br>";
echo "Luas: $luasPersegi <br>";
echo "Keliling: $kelilingPersegi <br><br>";

// Persegi Panjang
$panjang = 8;
$lebar = 4;
$luasPersegiPanjang = $panjang * $lebar;
$kelilingPersegiPanjang = 2 * ($panjang + $lebar);
echo "<h2>Persegi Panjang</h2>";
echo "Panjang: $panjang, Lebar: $lebar <br>";
echo "Luas: $luasPersegiPanjang <br>";
echo "Keliling: $kelilingPersegiPanjang <br><br>";

// Lingkaran
$jariJari = 7;
$luasLingkaran = pi() * ($jariJari * $jariJari);
$kelilingLingkaran = 2 * pi() * $jariJari;
echo "<h2>Lingkaran</h2>";
echo "Jari-jari: $jariJari <br>";
echo "Luas: $luasLingkaran <br>";
echo "Keliling: $kelilingLingkaran <br><br>";

?>
</body>
</html>