<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$anggota = all("anggota");
$buku = all("buku");
$id = $_GET['id'];
$pinjam = show("peminjaman", $id);


?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h2>Edit Peminjaman</h2>
      </div>
      <div class="card-body">
         <form method="POST" action="">

            <div class="mb-3 col-6">
               <label for="" class="form-label">Pilih Anggota </label>
               <select name="id_anggota" id="" class="form-select">
                  <?php foreach ($anggota as $value) :  ?>
                     <option value="<?= $value['id'] ?> <?= $value['id'] === $pinjam['id_anggota'] ? 'selected' : '' ?>"><?= $value['nama']; ?></option>
                  <?php endforeach  ?>
               </select>
            </div>
            <div class="mb-3 col-6">
               <label for="" class="form-label">Pilih Buku </label>
               <select name="id_buku" id="" class="form-select">
                  <?php foreach ($buku as $value) :  ?>
                     <option value="<?= $value['id']; ?>" <?= $value['id'] === $pinjam['id_buku'] ? 'selected' : '' ?>> <?= $value['judul']; ?></option>
                  <?php endforeach  ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
               <input type="date" class="form-control" value="<?= $pinjam['tanggal_kembali'] ?>" name="tanggal_kembali" id="tanggal_kembali">
            </div>
            <input type="hidden" name="id" value="<?= $pinjam['id'] ?>">
            <button class="btn btn-primary" type="submit" name="edit">Edit</button>
         </form>

      </div>

   </div>
</div>

<?php include '../template/footer.php'  ?>
<?php
if (isset($_POST['edit'])) {
   if (edit($_POST) > 0) {
      echo "<script>alert('data berhasil di Update');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
}

?>