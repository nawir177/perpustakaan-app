<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$anggota = all("anggota");
$no = 1;
$date = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Data Anggota</title>
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

   <h2 style="text-align: center;">LAPORAN DATA ANGGOTA</h2>
   </h2>

   <table border="1" cellspacing="0" cellpadding="5" style="width: 100%;">
      <thead>
         <tr>
         <th>NO</th>
            <th>ID</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>TELPON</th>
            <th>EMAIL</th>
            <th>KELAMINT</th>
            <th>TA</th>
            <th>ALAMAT</th>
       
         
         </tr>

      </thead>
      <tbody>
         <?php foreach ($anggota as $value) :   ?>
            <tr>
            <td>
                  <?= $no++; ?>
               </td>
               <td>AN_<?= $value['id']; ?></td>
               <td><?= $value['nis']; ?></td>
               <td><?= $value['nama']; ?></td>
               <td>
                  <?= $value['tempat_lahir'] ?>,
               </td>
               <td> <?= $value['tanggal_lahir']; ?></td>
               <td><?= $value['telpon']; ?></td>
               <td><?= $value['email']; ?></td>
               <td><?= $value['kelamin']; ?></td>
               <td><?= $value['TA']; ?></td>
               <td><?= $value['alamat']; ?></td>
               
               
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