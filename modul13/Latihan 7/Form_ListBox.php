<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanganan Form - ListBox</title>
</head>
<body>
   <form action="Proses_ListBox.php" method="post">
    Pilih warna: <br>
    <select name= 'color[]' size="6" multiple>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
        <option value="red">Red</option>
        <option value="yellow">Yellow</option>
        <option value="white">White</option>
        </select>
    <input type="submit">
   </form> 
</body>
</html>