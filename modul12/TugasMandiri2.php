<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TugasMandiri2</title>
</head>
<body>
    <?php
    $harga = 5000;
 
        if ($harga >= 500000){
            echo $harga." Diskon 50%";
        } else if ($harga >= 100000){
            echo $harga." Diskon 10%";
        } else if ($harga >= 50000){
            echo $harga." Diskon 5%";
        } else {
            echo $harga." Tidak Ada Diskon";
        }  
    
    ?>
</body>
</html>