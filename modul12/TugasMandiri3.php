<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TugasMandiri3</title>
</head>
<body>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }

    echo "Dan";
    echo '<br>';
    for ($i = 5; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    echo '<hr>';

    for ($i = 5; $i >= 1; $i--) {
       for ($j = 1; $j <= $i; $j++) {
           echo $j;
       }
       echo "<br>";
    }

   
    echo "Dan";
    echo '<br>';
    for ($i = 1; $i <= 5; $i++ ) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j;
        }
        echo "<br>";
    }
    ?>
</body>
</html>