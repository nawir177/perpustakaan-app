<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../pengembalian/fungsi.php';
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$pengembalian = getFilter("pengembalian");
$no = 1;
$date = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Pengembalian</title>
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

   <h2 style="text-align: center;">LAPORAN PENGEMBALIAN BUKU</h2 <h2>
   </h2>

   <table border="1" cellspacing="0" cellpadding="5" style="width: 100%; font-size: 12px;">
      <thead>
         <tr>
            <th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Tangga kembali</th>
            <th>Judul</th>
            <th>NIS</th>
            <th>Nama Peminjam</th>
            <th>Selisih Hari</th>
            <th>Status</th>
            <th>Denda</th>

         </tr>
      </thead>
      <tbody>
         <?php foreach ($pengembalian as $value) : ?>

            <tr>
               <td><?= $no++; ?></td>
               <td><?= ubahFormatTanggal(hasOne($value['id_peminjaman'], "peminjaman", "tanggal")); ?></td>
               <td><?= dateFormat($value['tanggal']); ?></td>
               <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_buku"), 'buku', 'judul'); ?></td>
               <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nis'); ?></td>
               <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nama'); ?></td>
               <td><?= selisihHari(hasOne($value['id_peminjaman'], "peminjaman", "tanggal_kembali"),$value['tanggal']) ?></td>
               <td><?= $value['status'] ?></td>
               <td>Rp.<?= number_format($value['denda'], 0, 0) ?></td>

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