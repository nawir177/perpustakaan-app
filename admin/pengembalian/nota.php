<?php
include '../controller.php';
include 'fungsi.php';

$id = $_GET['id'];
$value = show("pengembalian", $id);
// $peminjaman = all("peminjaman");
// $dipinjam = show("peminjaman", $val['id_peminjaman'])
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nota Peminjaman Buku</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    .nota-container {
      background: #fff;
      max-width: 600px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nota-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .nota-header h1 {
      margin: 0;
      font-size: 24px;
    }

    .nota-header p {
      margin: 5px 0;
    }

    .nota-body {
      margin-bottom: 20px;
    }

    .nota-body .info {
      margin-bottom: 10px;
    }

    .nota-body .info label {
      font-weight: bold;
      display: block;
    }

    .nota-body .info p {
      margin: 0;
    }

    .nota-footer {
      border-top: 1px solid #ddd;
      padding-top: 10px;
    }

    .nota-footer .total {
      font-size: 18px;
      font-weight: bold;
    }

    .nota-footer .denda {
      font-size: 16px;
      color: #e74c3c;
    }

    .btn-print {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      color: #fff;
      background: #3498db;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      margin-top: 20px;
    }

    .btn-print:hover {
      background: #2980b9;
    }
  </style>
</head>

<body>

  <div class="nota-container">
    <div class="nota-headr">
      <h1>Nota Peminjaman Buku</h1>
      <table style="margin-bottom: 50px; border-bottom: solid 2px black; width: 100%;">
        <tr>
          <td style="width: 150px;">
            <img src="../assets/image/logo.png" alt="" style="width: 70px;">
          </td>
          <td>
            <div style="text-align: center; width: 80%; line-height: 2px; margin-bottom:20px;">
              <h4>Perpustakaan Madrasah Tsanawiyah Negeri 1 </h4>
              <h4>Kota Banjarmasin</h4>
              <i>Jl.Kelayan A Gg.Setuju Rt 12</i>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <div class="nota-body">
      <div class="info">
        <label for="tanggalPinjam">Tanggal Pinjam:</label>
        <p id="tanggalPinjam"><?= hasOne($value['id_peminjaman'], "peminjaman", "tanggal"); ?></p>
      </div>
      <div class="info">
        <label for="tanggalKembali">Tanggal Kembali:</label>
        <p id="tanggalKembali"><?= dateFormat($value['tanggal']); ?></p>
      </div>
      <div class="info">
        <label for="judulBuku">Judul Buku:</label>
        <p id="judulBuku"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nis'); ?></p>
      </div>
      <div class="info">
        <label for="namaPeminjam">Nama Peminjam:</label>
        <p id="namaPeminjam"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nama'); ?></p>
      </div>
      <div class="info">
        <label for="nis">NIS:</label>
        <p id="nis"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nis'); ?></p>
      </div>
      <div class="info">
        <label for="status">Status:</label>
        <p id="status"><?= $value['status'] ?></p>
      </div>
      <div class="info">
        <label for="denda">Denda:</label>
        <p id="denda" class="denda">Rp <?= number_format($value['denda'], 0, 00) ?></p>
      </div>
    </div>

    <div class="nota-footer">
      <p class="total">Total Denda: <?= number_format($value['denda'], 0, 00) ?></p>
    </div>


  </div>
  <script>
    window.print()
  </script>
</body>

</html>