<?php
$id = $_GET['id'];
?>
<?php include '../controller.php' ?>
<?php include './fungsi.php' ?>
<?php include '../template/header.php';
$katalog = show("katalog", $id);
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
               <input require type="text" class="form-control" name="judul" id="judul" value="<?= htmlspecialchars($katalog['judul']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="pengarang">Pengarang</label>
               <input require type="text" class="form-control" name="pengarang" id="pengarang" value="<?= htmlspecialchars($katalog['pengarang']) ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="kategori">Kategori</label>
               <select class="form-select" aria-label="Default select example" name="id_kategori">
                  <option selected>Pilih kategori</option>
                  <?php foreach ($kategori as $val) : ?>
                     <option value="<?= $val['id']; ?>" <?= $val['id'] == $katalog['id_kategori'] ? 'selected' : ''; ?>><?= htmlspecialchars($val['nama']); ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
           
        
         
            <input require type="hidden" name="id" value="<?= htmlspecialchars($katalog['id']) ?>">
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