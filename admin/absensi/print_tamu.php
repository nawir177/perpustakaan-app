<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$data = all("absensi_tamu");
$no = 1;
$date = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Absensi Tamu</title>
   <style>
      @media print {
         @page {
            size: landscape;
            margin-top: 30px;
            margin-bottom: 30px;
         }
      }
   </style>
</head>

<body>
  <?php include_once '../src/header-print.php'  ?>

   <table border="0" style="width : 100%; margin-bottom:20px">
      <tr>
         <td>
            Cetak : <?= $admin['nama']; ?>
         </td>
         <td style="text-align: end;">
            Tanggal Cetak : <?= $date; ?>
         </td>
      </tr>
   </table>

   <h2 style="text-align: center;">LAPORAN DATA ABSENSI TAMU</h2>
   </h2>

   <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
      <thead>
      <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>INSTANSI</th>
        <th>TANGGAL</th>
        <th>WAKTU</th>
        <th>TUJUAN</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($data as $val) :   ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $val['nama']; ?></td>
          <td><?= $val['instansi']; ?></td>
          <td><?= $val['tanggal']; ?></td>
          <td><?= $val['waktu']; ?></td>
          <td><?= $val['tujuan']; ?></td>
        </tr>
      <?php endforeach  ?>
    </tbody>
   </table>
   <div style="float:right; text-align: center; line-height:0; margin: 30px;">
      <p>Mengetahui</p>
      <p style="margin-bottom: 80px;">Petugas Perpustakaan</p>

      <u>M.Arifin, SP.d</u>
      <p>NIP.19860525 200904 1 009</p>
   </div>

</body>

</html>
<script>
   window.print()
</script>