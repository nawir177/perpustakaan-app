<?php include '../controller.php'; ?>
<?php include '../template/header.php';
include 'fungsi.php';
$anggota = all("anggota");
$id_buku = $_GET['id_buku'] ?? [];
$buku = [];

// Fetch the books' details for selected IDs
if ($id_buku) {
   foreach ($id_buku as $id) {
      $buku[] = show("buku", $id);
   }
}
?>

<div class="container">
   <div class="card">
      <div class="card-header">
         <h2>Tambah Peminjaman</h2>
      </div>
      <div class="card-body">
         <form method="POST" action="">
            <?php foreach ($buku as $book): ?>
               <div class="mb-3">
                  <label for="buku" class="form-label">Judul Buku</label>
                  <input type="text" class="form-control disabled" disabled value="<?= $book['judul'] ?>">
                  <input type="hidden" name="id_buku[]" value="<?= $book['id'] ?>">
               </div>
            <?php endforeach; ?>
            
            <div class="mb-3 col-6">
               <label for="" class="form-label">Pilih Anggota</label>
               <select name="id_anggota" id="" class="form-select">
                  <?php foreach ($anggota as $value): ?>
                     <option value="<?= $value['id']; ?>"><?= $value['nama']; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
               <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
            </div>
            <button class="btn btn-primary" name="tambah">Tambah</button>
         </form>
      </div>
   </div>
</div>

<?php
if (isset($_POST['tambah'])) {
   if (tambah($_POST) > 0) {
      echo "<script>alert('data berhasil di tambah');location.href='index.php'</script>";
   } else {
      echo mysqli_error($conn);
   }
}

?>

<?php include '../template/footer.php'; ?>
