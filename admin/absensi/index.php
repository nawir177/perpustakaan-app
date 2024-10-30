<?php include '../controller.php';
include '../template/header.php';
$data = all('absensi');
$no = 1;
?>

<div class="container">
  <h1>DATA ABSENSI</h1>

  <div class="my-3">
    <div class="d-flex">
      <a href="absensi-tamu.php" class="btn btn-success">Absensi Tamu</a>
    </div>
  </div>
  <table class="table" id="table">
    <thead class="mt-3">
      <tr>
        <th>NO</th>
        <th>ID</th>
        <th>NAMA</th>
        <th>NIS</th>
        <th>TANGGAL</th>
        <th>WAKTU</th>
        <th>TUJUAN</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data as $val) :   ?>
        <tr>
          <td><?= $no++; ?></td>
          <td>AN_<?=$val['id']; ?></td>
          <td><?= beLongs($val['user_id'], 'anggota', 'nama') ?></td>
          <td><?= beLongs($val['user_id'], 'anggota', 'nis') ?></td>
          <td><?= $val['tanggal']; ?></td>
          <td><?= $val['waktu']; ?></td>
          <td><?= $val['tujuan']; ?></td>
        </tr>
      <?php endforeach  ?>
    </tbody>

  </table>

</div>
<?php include '../template/footer.php'  ?>