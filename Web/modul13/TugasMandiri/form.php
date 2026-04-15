<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Ekstrakurikuler</title>
</head>
<body>

<h2>Pendaftaran Ekstrakurikuler</h2>

<form method="POST" action="proses_form.php">
    NIS : <input type="text" name="nis" required><br><br>
    Nama : <input type="text" name="nama"><br><br>

    Kelas :
    <select name="kelas">
        <option>X</option>
        <option>XI</option>
        <option>XII</option>
    </select><br><br>

    Tgl Lahir :
    <input type="date" name="tgl"><br><br>

    Alamat : <br>
    <textarea name="alamat"></textarea><br><br>

    Kota : <input type="text" name="kota"><br><br>

    Jenis Kelamin :
    <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki
    <input type="radio" name="jk" value="Perempuan"> Perempuan
    <br><br>

    Hobby : <br>
    <input type="checkbox" name="hobby[]" value="Membaca"> Membaca<br>
    <input type="checkbox" name="hobby[]" value="Olahraga"> Olahraga<br>
    <input type="checkbox" name="hobby[]" value="Menyanyi"> Menyanyi<br>
    <input type="checkbox" name="hobby[]" value="Menari"> Menari<br>
    <input type="checkbox" name="hobby[]" value="Traveling"> Traveling<br><br>

    Pilihan Ekskul : <br>
    <select name="ekskul[]" multiple size="5">
        <option>Pramuka</option>
        <option>Basket</option>
        <option>Volly</option>
        <option>Band</option>
        <option>Seni Tari</option>
        <option>Robotic</option>
        <option>Bulu Tangkis</option>
    </select><br><br>

    <button type="submit">Kirim</button>
    <button type="reset">Cancel</button>
</form>

</body>
</html>