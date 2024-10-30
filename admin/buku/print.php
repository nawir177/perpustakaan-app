<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$Books = getFilter("buku");
$no = 1;
$date = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Buku</title>
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

   <h2 style="text-align: center;">LAPORAN DATA BUKU</h2 <h2>
   </h2>

   <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
      <thead>
         <tr style="font-size: small;">
         <th>NO</th>
            <th>ID Buku</th>
            <th>JUDUL BUKU</th>
            <th>PENGARANG</th>
            <th>PENERBIT</th>
            <th>TAHUN TERBIT</th>
            <th>ISBN</th>
            <th>KATEGORI</th>
            <th>STOK</th>
            <th>LOKASI</th>
           
         </tr>
      </thead>
      <tbody>
         <?php foreach ($Books as $book) : ?>
            <tr>
            <td><?= $no++; ?></td>
               <td>BK_<?= $book['id']; ?></td>
               <td><?= $book['judul']; ?></td>
               <td><?= $book['pengarang']; ?></td>
               <td><?= $book['penerbit']; ?></td>
               <td><?= $book['tahun_terbit']; ?></td>
               <td><?= $book['isbn']; ?></td>
               <td><?= hasOne($book['id_kategori'], 'kategori', 'nama') ?></td>
               <td><?= $book['jumlah']; ?></td>
               <td><?= $book['lokasi']; ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>

   </table>
   <div style="float:right; text-align: center; line-height:0; margin: 30px;">
      <p>Mengetahui</p>
      <p style="margin-bottom: 80px;">Petugas Perpustakaan</p>

      <u>Nadiatul Husna, S.IP</u>
      <p>NIP.19860525 200904 1 009</p>
   </div>

</body>

</html>
<script>
   window.print()
</script>