<?php
$id = $_GET['id'];
include '../controller.php';
include './fungsi.php';
$anggota = show("anggota", $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
<div class="card" style="width:40%">
    <div class="card-header bg-success text-white">
      <h3>KARTU ANGGOTA</h3>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-md-4">
          <img src="../<?= $anggota['foto']; ?>" class="img-thumbnail" alt="Foto Anggota" width="20%">
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

  </div>

  <script>
    window.print()
  </script>
</body>


</html>