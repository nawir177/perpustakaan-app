<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
include '../controller.php';
session_start();
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$buku_hilang = all('kondisi_buku');
$no = 1;
$date = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Kondisi Buku</title>
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
            <?php if (isset($_GET['bulan']) && $_GET['bulan']) :   ?>
               <p>Filter : <?= bulan($_GET['bulan']); ?> / <?= $_GET['tahun']; ?></p>
            <?php endif  ?>

         </td>
         <td style="text-align: end;">
            Tanggal Cetak : <?= $date; ?>
         </td>
      </tr>
   </table>
   <h3 style="text-align: center;">LAPORAN KONDISI BUKU</h3>
   <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
      <thead>
         <tr style="font-size: small;">
         <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Judul Buku</th>
            <th>Jumlah</th>
            <th>Status</th>
           
         </tr>


         </tr>
      </thead>
      <tbody>
         <?php foreach ($buku_hilang as $value) :   ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $value['tanggal']; ?></td>
               <td><?= hasOne($value['id_buku'], 'buku', 'judul'); ?></td>
               <td><?= $value['jumlah']; ?></td>
               <td><?= $value['kondisi']; ?></td>
               

            </tr>
         <?php endforeach  ?>
      </tbody>

   </table>
   <div style="float:right; text-align: center; line-height:0; margin: 30px;">
      <p>Mengetahui</p>
      <p style="margin-bottom: 80px;">Petugas Perpustakaan</p>

      <u>Nadiatul Husna.S.IP</u>
      <p>NIP.19860525 200904 1 009</p>
   </div>

</body>

</html>
<script>
   window.print()
</script>