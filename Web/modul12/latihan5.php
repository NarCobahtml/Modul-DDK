<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Perulangan</title>
</head>
<body>

<?php
$brush_price = 5;

// For
echo "<h3>Loop For</h3>";
echo "<table border='1'>";
echo "<tr><th>Quantity</th><th>Price</th></tr>";

for ($counter = 10; $counter <= 100; $counter += 10) {
    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>$" . ($brush_price * $counter) . "</td>";
    echo "</tr>";
}

echo "</table>";

// While
echo "<h3>Loop While</h3>";
echo "<table border='1'>";
echo "<tr><th>Quantity</th><th>Price</th></tr>";

$counter = 10;

while ($counter <= 100) {
    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>$" . ($brush_price * $counter) . "</td>";
    echo "</tr>";

    $counter += 10;
}

echo "</table>";

// Do while
echo "<h3>Loop Do-While (inkremen +=5)</h3>";
echo "<table border='1'>";
echo "<tr><th>Quantity</th><th>Price</th></tr>";

$counter = 10;

do {
    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>$" . ($brush_price * $counter) . "</td>";
    echo "</tr>";

    $counter += 5; // inkremen diubah
} while ($counter <= 100);

echo "</table>";
?>

</body>
</html>