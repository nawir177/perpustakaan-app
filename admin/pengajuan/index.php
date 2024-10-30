<?php include '../controller.php'  ?>
<?php include '../template/header.php';
$pengajuan = all('pengajuan');

$no = 1;

?>

<div class="container">

  <h1>DATA Pengajuan</h1>


  <table class="table" id="table">
    <thead class="mt-3">
      <tr>
        <th>NO</th>
        <th>TANGGAL</th>
        <th>JUDUL BUKU</th>
        <th>NAMA ANGGOTA</th>
        <th>NIS</th>
        <th>ACTION</th>
      </tr>

    </thead>
    <tbody>
      <?php foreach ($pengajuan as $value) : ?>
        <tr>
          <td>
            <?= $no++; ?>
          </td>
          <td><?= $value['tanggal']; ?></td>
          <td><?= hasOne($value['id_buku'], "buku", "judul") ?? 'null'; ?></td>
          <td><?= !empty(where('anggota', 'user_id', $value['id_user'])) ? where('anggota', 'user_id', $value['id_user'])[0]['nama'] : 'null'; ?></td>
          <td><?= !empty(where('anggota', 'user_id', $value['id_user'])) ? where('anggota', 'user_id', $value['id_user'])[0]['nis'] : 'null'; ?></td>
          <td>
            <div class="d-flex gap-3">
              <a href="form.php?id_buku=<?= $value['id_buku'] ?>&id_user=<?= $value['id_user'] ?>&id=<?= $value['id'] ?>">
                <button class="btn btn-warning">
                  Terima
                </button>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach ?>

    </tbody>

  </table>

</div>

<?php include '../template/footer.php';


?>