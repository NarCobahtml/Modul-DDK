<html>
<head>
    <title>Tampil Data</title>
</head>
<body>
<table border="1">
    <tr>
        <th>NO</th>
        <th>NIS</th>
        <th>Nama</th>
        <th colspan="3">action</th>
    </tr>

<?php
include "koneksi.php";
// SELECT FROM tb_siswa //buat query sql
$query = "SELECT * FROM tb_siswa";
$hasil = mysqli_query($koneksi, $query); //jalankan query sql
$no = 1;
$jum = mysqli_num_rows($hasil); //menghitung banyak row/baris data
echo "Banyak Data : " . $jum . "<br>";
//perulangan untuk nampikan data dari database
while ($data = mysqli_fetch_array($hasil)) {
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><a href="detail.php?nis=<?php echo $data['nis']; ?>">Detail</a></td>
        <td><a href="form_update.php?nis=<?php echo $data['nis']; ?>">Edit</a></td>
        <td><a href="delete.php?nis=<?php echo $data['nis']; ?>" onclick="return confirm('apakah anda yakin?')">Delete</a></td>
    </tr>
<?php
}
?>
</table>
</body>
</html>
<?php
echo "<a href='insert.php'>Daftar</a>";
?>
