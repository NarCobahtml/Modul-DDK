<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanganan Form - ComboBox</title>
</head>
<body>
    <form action="Proses_ComboBox.php" method="post" name="input">
        <h2>Pilih Film Kartun Favorit Anda: </h2>
        <select name="kartun">
            <option value="Sponge Bob" selected> Sponge Bob </option>
            <option value="Shinchan"> Shinchan </option>
            <option value="Conan"> Conan </option>
            <option value="Doraemon"> Doraemon </option>
            <option value="Dragon Ball"> Dragon Ball </option>
            <option value="Naruto"> Naruto </option>
        </select>
        <input type="submit" name="Pilih" value="Pilih">
        </form>

</body>
</html>