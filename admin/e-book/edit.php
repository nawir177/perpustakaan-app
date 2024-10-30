<?php
$id = $_GET['id'];
?>
<?php include '../controller.php' ?>
<?php include './fungsi.php' ?>
<?php include '../template/header.php';
$ebook = show("e_book", $id);
$kategori = all('kategori');
?>

<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>EDIT E-BOOK</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $ebook['id']; ?>">
            <div class="mb-3">
               <label class="form-label" for="judul">Judul</label>
               <input type="text" class="form-control" name="judul" id="judul" value="<?= $ebook['judul']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="kategori">Kategori</label>
               <select class="form-select" aria-label="Default select example" name="id_kategori">
                  <option selected>Pilih kategori</option>
                  <?php foreach ($kategori as $val) : ?>
                     <option value="<?= $val['id']; ?>" <?= $val['id'] == $ebook['id_kategori'] ? 'selected' : ''; ?>><?= $val['nama']; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="pengarang">Pengarang</label>
               <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $ebook['pengarang']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="penerbit">Penerbit</label>
               <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $ebook['penerbit']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
               <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $ebook['tahun_terbit']; ?>">
            </div>

            <div class="mb-6">
               <label for="formFile" class="form-label">E-Book File</label>
               <input class="form-control" type="file" id="formFile" name="file">
               <small class="text-danger mt-2">Jenis format file: pdf</small>
               <br>
               <a href="file-book/<?= $ebook['file'] ?>" target="_blank">
                  <small>File saat ini: <?= $ebook['file']; ?></small>
               </a>
            </div>
            <div class="mb-3">
               <label for="formFile22" class="form-label">Image</label>
               <input class="form-control" type="file" id="formFile22" name="image">
               <input type="hidden" name="oldImage" value="<?= $ebook['image']; ?>">
               <small class="text-danger mt-2">Jenis format file: jpg, png</small>
               <br>
               <img src="image/<?= $ebook['image']; ?>" width="100">
            </div>
            <div class="form-floating mb-3">
               <textarea class="form-control" placeholder="Masukkan deskripsi buku..." name="deskripsi" style="height: 100px"><?= $ebook['deskripsi']; ?></textarea>
               <label for="floatingTextarea2">Deskripsi buku</label>
            </div>
            <button class="btn btn-primary" name="edit">EDIT</button>
         </form>
      </div>
   </div>
</div>



<?php include '../template/footer.php'; ?>
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