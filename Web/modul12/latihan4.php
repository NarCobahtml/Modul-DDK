<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan4</title>
</head>
<body>
    <?php
      $nilai = 999;
       switch(true){
           case ($nilai > 86 && $nilai <= 100):
               echo $nilai."  A "."Sangat Baik";
               break;
           case ($nilai > 76 && $nilai <= 85):
               echo $nilai."  B "."Baik";
               break;
           case ($nilai > 66 && $nilai <= 75):
               echo $nilai."  C "."Cukup";
               break;
           case ($nilai >= 0 && $nilai <= 65):
               echo $nilai."  D "."Kurang";
               break;
           default:
               echo $nilai. " Nilai Diluar Range";
       }
    
    ?>
</body>
</html>