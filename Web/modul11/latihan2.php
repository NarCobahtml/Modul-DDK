<?php
echo "<h1>Operator Asignment</h1><br>";
$x = 10; //Nilai awal
echo "Nilai awal x = $x <br><br>";
//Penjumlahan
$a = $x;
$a += 5; // $a = $a + 5
echo "x += 5 hasilnya = $a <br>";
//Pengurangan
$b = $x;
$b -= 3; // $b = $b - 3
echo "x -= 3 -> $b <br>";
//Perkalian
$c = $x;
$c *= 2; // $c = $c * 2
echo "x *= 2 -> $c <br>";
//Pembagian
$d = $x;
$d /= 2; // $d = $d / 2
echo "x /= 2 -> $d <br>";
//Modulus (Sisa bagi)
$e = $x;
$e %= 3; // $e = $e % 3
echo "x %= 3 -> $e <br>";
//Pangkat (PHP 5.6+)
$f = $x;
$f **= 2; // $f = $f ** 2
echo "x **= 2 -> $f <br>";
//Penggabungan string
$teks = "Belajar";
$teks .= " PHP";
echo "<br>Operator .= $teks <br>";
?>