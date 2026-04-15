<?php

require_once __DIR__ . '/../latihan/koneksi.php';

$hobiOptions = ['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'];
$ekskulOptions = ['Pramuka', 'Basket', 'Voli', 'Band', 'Seni Tari', 'Bela Diri', 'Robotik', 'Bulu Tangkis'];
$kelasOptions = ['X', 'XI', 'XII'];

$isEdit = isset($_GET['nis']) && $_GET['nis'] !== '';
$error = '';
$data = [
    'nis' => '',
    'nama' => '',
    'kelas' => '',
    'ttl' => '',
    'alamat' => '',
    'kota' => '',
    'jk' => '',
    'hoby' => [],
    'ekskul' => '',
];

if ($isEdit) {
    $nis = $_GET['nis'];
    $stmt = mysqli_prepare($koneksi, 'SELECT nis, nama, kelas, ttl, alamat, kota, jk, hoby, ekskul FROM tb_siswa WHERE nis = ?');
    mysqli_stmt_bind_param($stmt, 's', $nis);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        exit('Data siswa tidak ditemukan.');
    }

    $data = [
        'nis' => $row['nis'],
        'nama' => $row['nama'],
        'kelas' => $row['kelas'] ?? '',
        'ttl' => $row['ttl'] ?? '',
        'alamat' => $row['alamat'] ?? '',
        'kota' => $row['kota'] ?? '',
        'jk' => $row['jk'] ?? '',
        'hoby' => $row['hoby'] ? explode(',', $row['hoby']) : [],
        'ekskul' => $row['ekskul'] ?? '',
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisLama = trim($_POST['nis_lama'] ?? '');
    $data['nis'] = trim($_POST['nis'] ?? '');
    $data['nama'] = trim($_POST['nama'] ?? '');
    $data['kelas'] = trim($_POST['kelas'] ?? '');
    $data['ttl'] = trim($_POST['ttl'] ?? '');
    $data['alamat'] = trim($_POST['alamat'] ?? '');
    $data['kota'] = trim($_POST['kota'] ?? '');
    $data['jk'] = trim($_POST['jk'] ?? '');
    $data['hoby'] = $_POST['hoby'] ?? [];
    $data['ekskul'] = trim($_POST['ekskul'] ?? '');

    if ($data['nis'] === '' || $data['nama'] === '') {
        $error = 'NIS dan Nama wajib diisi.';
    } else {
        $hoby = implode(',', $data['hoby']);

        if ($nisLama === '') {
            $stmt = mysqli_prepare($koneksi, 'INSERT INTO tb_siswa (nis, nama, kelas, ttl, alamat, kota, jk, hoby, ekskul) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            mysqli_stmt_bind_param($stmt, 'sssssssss', $data['nis'], $data['nama'], $data['kelas'], $data['ttl'], $data['alamat'], $data['kota'], $data['jk'], $hoby, $data['ekskul']);
        } else {
            $stmt = mysqli_prepare($koneksi, 'UPDATE tb_siswa SET nis = ?, nama = ?, kelas = ?, ttl = ?, alamat = ?, kota = ?, jk = ?, hoby = ?, ekskul = ? WHERE nis = ?');
            mysqli_stmt_bind_param($stmt, 'ssssssssss', $data['nis'], $data['nama'], $data['kelas'], $data['ttl'], $data['alamat'], $data['kota'], $data['jk'], $hoby, $data['ekskul'], $nisLama);
        }

        if (mysqli_stmt_execute($stmt)) {
            header('Location: index.php');
            exit;
        }

        $error = 'Gagal menyimpan data: ' . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah'; ?> Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h3 mb-4"><?= $isEdit ? 'Edit' : 'Tambah'; ?> Pendaftaran Ekstrakurikuler</h1>

                        <?php if ($error !== ''): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                        <?php endif; ?>

                        <form method="post">
                            <input type="hidden" name="nis_lama" value="<?= htmlspecialchars($isEdit ? $data['nis'] : ''); ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis" name="nis" maxlength="20" value="<?= htmlspecialchars($data['nis']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?= htmlspecialchars($data['nama']); ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select class="form-select" id="kelas" name="kelas">
                                        <option value="">Pilih kelas</option>
                                        <?php foreach ($kelasOptions as $kelas): ?>
                                            <option value="<?= $kelas; ?>" <?= $data['kelas'] === $kelas ? 'selected' : ''; ?>><?= $kelas; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="ttl" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?= htmlspecialchars($data['ttl']); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="kota" class="form-label">Kota</label>
                                    <input type="text" class="form-control" id="kota" name="kota" maxlength="50" value="<?= htmlspecialchars($data['kota']); ?>">
                                </div>
                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= htmlspecialchars($data['alamat']); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-block">Jenis Kelamin</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jk_l" name="jk" value="L" <?= $data['jk'] === 'L' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jk_l">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jk_p" name="jk" value="P" <?= $data['jk'] === 'P' ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jk_p">Perempuan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="ekskul" class="form-label">Pilihan Ekskul</label>
                                    <select class="form-select" id="ekskul" name="ekskul">
                                        <option value="">Pilih ekskul</option>
                                        <?php foreach ($ekskulOptions as $ekskul): ?>
                                            <option value="<?= $ekskul; ?>" <?= $data['ekskul'] === $ekskul ? 'selected' : ''; ?>><?= $ekskul; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label d-block">Hobi</label>
                                    <?php foreach ($hobiOptions as $hobi): ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hobi_<?= strtolower($hobi); ?>" name="hoby[]" value="<?= $hobi; ?>" <?= in_array($hobi, $data['hoby'], true) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="hobi_<?= strtolower($hobi); ?>"><?= $hobi; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="mt-4 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
