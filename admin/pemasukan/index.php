<?php include '../controller.php'  ?>
<?php include '../template/header.php';

$totalPemasukan = 0;

$pemasukan = all('pemasukan');

$no = 1;

?>

<div class="container">

  <h1>DATA PEMASUKAN</h1>

  <div class="d-flex gap-2">
    <a href="print.php" target="_blank">
      <button type="button" class="btn btn-success mt-4" onclick="printData()">Cetak</button>
    </a>
  </div>
  <table class="w-full table-bordered border-secondary mt-4" cellpadding=8 style="width: 100%;">
    <thead class="mt-3">
      <tr>
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

</div>

<?php include '../template/footer.php';


?>