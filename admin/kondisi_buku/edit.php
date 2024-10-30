<?php
include '../controller.php';
include 'fungsi.php';
include '../template/header.php';

$id = $_GET['id']; // Ambil ID dari URL
$val = show("kondisi_buku", $id); // Ambil data buku berdasarkan ID
$buku = show('buku', $val['id_buku']);
?>
<div class="container">
   <div class="card col-8">
      <div class="card-header">
         <h3>Edit Kondisi Buku</h3>
      </div>
      <div class="card-body">
         <form method="post" action="">
            <input type="hidden" name="id_buku" value="<?= $buku['id']; ?>">
            <input type="hidden" name="id" value="<?= $val['id']; ?>">
            <div class="mb-3">
               <label class="form-label" for="tanggal">Tanggal</label>
               <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $val['tanggal']; ?>" required>
            </div>
            <div class="mb-3">
               <label class="form-label" for="namapeminjam">Judul Buku</label>
               <input type="text" class="form-control" disabled name="namapeminjam" id="namapeminjam" value="<?= $buku['judul']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="jumlah">Jumlah</label>
               <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $val['jumlah']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="kondisi">Kondisi</label>
               <select class="form-select" aria-label="Default select example" name="kondisi" id="kondisi" required>
                  <option value="rusak parah" <?= $val['kondisi'] == 'rusak parah' ? 'selected' : ''; ?>>Rusak Parah</option>
                  <option value="rusak" <?= $val['kondisi'] == 'rusak' ? 'selected' : ''; ?>>Rusak</option>
                  <option value="rusak sedikit" <?= $val['kondisi'] == 'rusak sedikit' ? 'selected' : ''; ?>>Rusak Sedikit</option>
               </select>
            </div>
            <label class="form-label" for="ket">Keterangan</label>
            <div class="mb-3">
               <textarea name="ket" id="ket" cols="30" rows="5" placeholder="masukkan keterangan" class="form-control"><?= $val['keterangan']; ?></textarea>
            </div>
            <button class="btn btn-info" type="submit" name="update">Update</button>
         </form>
      </div>
   </div>
</div>

<?php
if (isset($_POST['update'])) {
   if (update($_POST) > 0) {
      echo "<script>alert('Data berhasil diperbarui');location.href='index.php'</script>";
   } else {
      echo "<script>alert('Gagal memperbarui data');</script>";
   }
}
?>
<?php include '../template/footer.php' ?>