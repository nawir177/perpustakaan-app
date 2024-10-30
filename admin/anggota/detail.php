<?php
$id = $_GET['id'];
include '../controller.php';
include '../template/header.php';
include './fungsi.php';

$anggota = show("anggota", $id);
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-success text-white">
      <h3>Detail Anggota</h3>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-4">
          <img src="../<?= $anggota['foto']; ?>" class="img-thumbnail" alt="Foto Anggota" width="100%">
        </div>
        <div class="col-md-8">
          <h4 class="mb-3">AN_<?= $anggota['id']; ?> - <?= $anggota['nama']; ?></h4>
          <ul class="list-group">
            <li class="list-group-item"><strong>NIS:</strong> <?= $anggota['nis']; ?></li>
            <li class="list-group-item"><strong>Tempat, Tanggal Lahir:</strong> <?= $anggota['tempat_lahir'] ?>, <?= $anggota['tanggal_lahir']; ?></li>
            <li class="list-group-item"><strong>Telepon:</strong> <?= $anggota['telpon']; ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?= $anggota['email']; ?></li>
            <li class="list-group-item"><strong>Jenis Kelamin:</strong> <?= $anggota['kelamin']; ?></li>
            <li class="list-group-item"><strong>Tahun Ajaran:</strong> <?= $anggota['TA']; ?></li>
            <li class="list-group-item"><strong>Alamat:</strong> <?= $anggota['alamat']; ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="card-footer text-right">
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>

<?php include '../template/footer.php'; ?>