<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tugas Mandiri 1</title>
  </head>
   <style>
      .report { width: 600px; border-collapse: collapse; margin-bottom: 20px; font-family: Arial, Helvetica, sans-serif; }
      .report th, .report td { border: 1px solid #ccc; padding: 10px; }
      .report th { background: #f2f2f2; text-align: left; }
      .report .label { width: 60%; }
      .report .value { width: 40%; }
      .report .total, .report .avg { background: #f2f2f2; font-weight: bold; }
      h1 { font-family: Arial, Helvetica, sans-serif; }
    </style>
  <body>
    <h1>Program Pengolahan Nilai Siswa</h1>
    <?php
  
    $siswa = array("nis" => "2026001", "nama" => "Nar", "tugas" => 90, "uts" => 95, "uas" => 90);
    ?>

   

    <?php
    // Tampilkan satu laporan siswa statis
    $total = $siswa["tugas"] + $siswa["uts"] + $siswa["uas"];
    $rata_rata = $total / 3;

    echo "<table class='report'>";
    echo "<tr><th colspan='2'>Laporan Hasil Belajar</th></tr>";
    echo "<tr><td class='label'>NIS</td><td class='value'>: " . $siswa["nis"] . "</td></tr>";
    echo "<tr><td class='label'>Nama Siswa</td><td class='value'>: " . $siswa["nama"] . "</td></tr>";
    echo "<tr><td class='label'>Nilai Tugas</td><td class='value'>: " . $siswa["tugas"] . "</td></tr>";
    echo "<tr><td class='label'>Nilai UTS</td><td class='value'>: " . $siswa["uts"] . "</td></tr>";
    echo "<tr><td class='label'>Nilai UAS</td><td class='value'>: " . $siswa["uas"] . "</td></tr>";
    echo "<tr class='total'><td>Total Nilai</td><td>: " . $total . "</td></tr>";
    echo "<tr class='avg'><td>Rata-rata Nilai</td><td>: " . number_format($rata_rata, 2) . "</td></tr>";
    echo "</table>";
    ?>
  </body>
</html>
