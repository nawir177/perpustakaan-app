<?php include '../controller.php';
include '../template/header.php';
$data = all('absensi_tamu');
$no = 1;
?>

<div class="container">
  <h1>DATA ABSENSI TAMU</h1>
  <div class="my-3">
    <div class="d-flex">
      <a href="index.php" class="btn btn-success">Absensi</a>
    </div>
  </div>

  <table class="table" id="table">
    <thead class="mt-3">
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

</div>
<?php include '../template/footer.php'  ?>