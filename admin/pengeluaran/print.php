<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$pengeluaran = all("pengeluaran");
$no = 1;
$date = date('d/m/Y');
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Pengeluaran</title>
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
   <?php include '../src/header-print.php'  ?>

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

   <h2 style="text-align: center;">LAPORAN DATA PENGELUARAN</h2>

   <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
      <thead>
         <tr style="font-size: small;">
            <th>NO</th>
            <td>ID</td>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($pengeluaran as $val) :   ?>
            <?php $total += $val['total']  ?>
            <tr>
               <td><?= $no++; ?></td>
               <td>PN_<?= $val['id']; ?></td>
               <td><?= $val['tanggal']; ?></td>
               <td><?= $val['nama']; ?></td>
               <td>Rp. <?= number_format($val['harga'], 0, 00); ?></td>
               <td><?= $val['jumlah']; ?></td>
               <td>Rp. <?= number_format($val['total'], 0, 00) ?></td>

            </tr>
         <?php endforeach  ?>
         <tr>
            <td colspan="6">TOTAL PENGELUARAN</td>
            <td>Rp. <?= number_format($total, 0, 00) ?></td>
         </tr>
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