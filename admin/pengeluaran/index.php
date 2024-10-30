<?php

include_once '../controller.php';

?>

<?php include '../template/header.php';

$pengeluaran =  all("pengeluaran");

$no = 1;
$total = 0;
$pemasukan = 0;
$dataPemasukan = all('pemasukan');

foreach($dataPemasukan as $val){
    $pemasukan+=$val['jumlah_denda'];
}
?>

<div class="container ">
  <h1><E-Book></E-Book></h1>


  <div class="d-flex gap-2">
    <a href="tambah.php" class="btn btn-primary my-4">Tambah Pemasukan</a>
    <div>
      <a href="print.php" target="_blank" class="btn btn-success mt-4">Cetak</a>
    </div>

  </div>

  <table class="table" id="table">
    <thead class="mt-3">
      <tr>
        <th>NO</th>
        <td>ID</td>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
      
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengeluaran as $val ) :   ?>
        <?php $total+=$val['total']  ?>
        <tr>
          <td><?= $no++; ?></td>
          <td>PN_<?=$val['id']; ?></td>
          <td><?=$val['tanggal']; ?></td>
          <td><?= $val['nama']; ?></td>
          <td>Rp. <?= number_format($val['harga'],0,00); ?></td>
          <td><?= $val['jumlah']; ?></td>
          <td>Rp. <?= number_format($val['total'],0,00) ?></td>
          <td>
            <div class="d-flex gap-3">
              <a href="delete.php?id=<?= $val['id'] ?>" onclick="return confirm('yakin ingin menghapus data ini ?')" class=" fs-1 text-secondary">
                <i class="bi bi-trash"></i>
              </a>
              <a href="edit.php?id=<?= $val['id'] ?>" class="fs-1 text-secondary">
                <i class="bi bi-pencil-square"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach  ?>
    </tbody>
  </table>
  <div class="card">
    <div class="card-body">
      <h3>TOTAL PENGELUARAN :  Rp. <?=number_format($total,0,00); ?></h3>
      <h3>PEMASUKAN :  Rp. <?=number_format($pemasukan,0,00); ?></h3>
      <h3>TOTAL PEMASUKAN :  Rp. <?=number_format($pemasukan-$total,0,00); ?></h3>

    </div>
  </div>
</div>
<script>
  function submitForm() {
    document.getElementById('filterForm').submit();
  }

  function printData() {
    // Mendapatkan nilai bulan dan tahun dari dropdown
    var bulan = document.getElementById('bulan').value;
    var tahun = document.getElementById('tahun').value;

    // Membuat URL untuk halaman cetak dengan parameter bulan dan tahun
    var printUrl = 'print.php?bulan=' + bulan + '&tahun=' + tahun;
    location.href = 'print.php?bulan=' + bulan + '&tahun=' + tahun;
  }
</script>

<?php include '../template/footer.php'; ?>