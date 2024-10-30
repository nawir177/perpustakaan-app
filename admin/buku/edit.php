<?php
$id = $_GET['id'];
?>
<?php include '../controller.php' ?>
<?php include './fungsi.php' ?>
<?php include '../template/header.php';
$buku = show("buku", $id);
$kategori = all('kategori');
?>
<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>EDIT DATA BUKU</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
               <label class="form-label" for="judul">Judul</label>
               <input require type="text" class="form-control" name="judul" id="judul" value="<?= htmlspecialchars($buku['judul']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="kategori">Kategori</label>
               <select class="form-select" aria-label="Default select example" name="id_kategori">
                  <option selected>Pilih kategori</option>
                  <?php foreach ($kategori as $val) : ?>
                     <option value="<?= $val['id']; ?>" <?= $val['id'] == $buku['id_kategori'] ? 'selected' : ''; ?>><?= $val['nama']; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="pengarang">Pengarang</label>
               <input require type="text" class="form-control" name="pengarang" id="pengarang" value="<?= htmlspecialchars($buku['pengarang']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="penerbit">Penerbit</label>
               <input require type="text" class="form-control" name="penerbit" id="penerbit" value="<?= htmlspecialchars($buku['penerbit']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
               <input require type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= htmlspecialchars($buku['tahun_terbit']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="isbn">ISBN</label>
               <input require type="text" class="form-control" name="isbn" id="isbn" value="<?= htmlspecialchars($buku['isbn']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="jumlah">Jumlah</label>
               <input require type="number" class="form-control" name="jumlah" id="jumlah" value="<?= htmlspecialchars($buku['jumlah']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="lokasi">Lokasi</label>
               <input require type="text" class="form-control" name="lokasi" id="lokasi" value="<?= htmlspecialchars($buku['lokasi']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="image">Gambar</label>
               <input require type="file" class="form-control" name="image" id="image">
               <input require type="hidden" name="imageLama" value="<?= htmlspecialchars($buku['image']) ?>">
               <small class="text-danger mt-2">Jenis format file: jpg, png</small>
            </div>
          
            <div class="form-floating mb-3">
               <textarea class="form-control" placeholder="Masukkan deskripsi buku..." name="deskripsi" style="height: 100px"><?= htmlspecialchars($buku['deskripsi']) ?></textarea>
               <label for="floatingTextarea2">Deskripsi buku</label>
            </div>
            <input require type="hidden" name="id" value="<?= htmlspecialchars($buku['id']) ?>">
            <button class="btn btn-primary" name="edit">EDIT</button>
         </form>
      </div>
   </div>
</div>
<?php
if (isset($_POST['edit'])) {
   if (edit($_POST) > 0) {
      echo "<script>alert('Data berhasil diupdate');location.href='index.php'</script>";
   } else {
      echo "<script>alert('Data gagal diupdate');</script>";
      echo mysqli_error($conn);
   }
}
?>
<?php include '../template/footer.php' ?>