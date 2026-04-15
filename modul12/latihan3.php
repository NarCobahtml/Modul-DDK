<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan3</title>
</head>
<body>
    <?php
      $nilai = 999;
        if ($nilai > 86 && $nilai <= 100 ){
            echo $nilai."  A "."Sangat Baik";
        } else if ($nilai > 76 && $nilai <= 85){
            echo $nilai."  B "."Baik";
        } else if ($nilai > 66 && $nilai <= 75){
            echo $nilai."  C "."Cukup";
        } else if ($nilai >= 0 && $nilai <= 65){
            echo $nilai."  D "."Kurang";
        } else {
            echo $nilai. " Nilai Diluar Range";
        }
    
    ?>
</body>
</html>