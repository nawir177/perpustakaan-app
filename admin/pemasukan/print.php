<?php
// Pastikan path sesuai dengan struktur direktori proyek Anda
session_start();
include '../controller.php';
$useId = $_SESSION['user'];
$admin = show("user", $useId);
$pemasukan = all('pemasukan');
$no = 1;
$date = date('d/m/Y');
$totalPemasukan = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Data Pemasukan</title>
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

  <h2 style="text-align: center;">LAPORAN DATA PEMASUKAN</h2>

  <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
    <thead>
      <tr style="font-size: small;">
        <th>NO</th>
        <th>TANGGAL</th>
        <th>SUMBER</th>
        <th>NAMA PEMINJAM</th>
        <th>JUDUL BUKU</th>
        <th>NOMINAL</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pemasukan as $value) :   ?>
        <?php $totalPemasukan += $value['jumlah_denda']  ?>
        <tr>
          <td>
            <?= $no++; ?>
          </td>
          <td><?= show('peminjaman', $value['id_peminjaman'])['tanggal']; ?></td>
          <td>Denda peminjaman</td>
          <td><?= show('anggota', show('peminjaman', $value['id_peminjaman'])['id_anggota'])['nama']; ?></td>
          <td><?= show('buku', $value['id_buku'])['judul']  ?></td>
          <td>Rp. <?= number_format($value['jumlah_denda'], 0, 00) ?></td>
        </tr>
      <?php endforeach  ?>
      <tr>
        <td colspan="5" class="font-weight-bold"><b>TOTAL PEMASUKAN</b></td>
        <td><b>Rp. <?= number_format($totalPemasukan, 0, 00) ?></b></td>
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