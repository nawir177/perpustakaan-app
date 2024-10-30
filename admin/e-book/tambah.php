<?php include '../controller.php'  ?>
<?php include './fungsi.php'  ?>
<?php include '../template/header.php';

$kategori = all('kategori');

?>

<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>TAMBAH E-BOOK</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
               <label class="form-label" for="judul">Judul</label>
               <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="mb-3">
               <label class="form-label" for="judul">Kategori</label>
               <select class="form-select" aria-label="Default select example" name="kategori">
                  <option selected>Pilih kategori</option>
                  <?php foreach ($kategori as $val) :   ?>
                     <option value="<?= $val['id']; ?>"><?= $val['nama']; ?></option>
                  <?php endforeach  ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="pengarang">Pengarang</label>
               <input type="text" class="form-control" name="pengarang" id="pengarang">
            </div>
            <div class="mb-3">
               <label class="form-label" for="penerbit">Penerbit</label>
               <input type="text" class="form-control" name="penerbit" id="penerbit">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
               <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit">
            </div>
          
            <div class="mb-3">
               <label for="formFile" class="form-label">E-Book File</label>
               <input class="form-control" type="file" id="formFile" name="file">
               <small class="text-danger mt-2">jenis format file:pdf</small>
            </div>
            <div class="mb-3">
               <label for="formFile" class="form-label">image</label>
               <input class="form-control" type="file" id="formFile" name="image">
               <small class="text-danger mt-2">jenis format file:jpg,png</small>
            </div>
            <div class="form-floating mb-3">
               <textarea class="form-control" placeholder="masukkan deskripsi buku..." name="deskripsi" style="height: 100px"></textarea>
               <label for="floatingTextarea2">Deskripsi buku</label>
            </div>
            <button class="btn btn-primary" name="tambah">TAMBAH</button>
         </form>
      </div>
   </div>
</div>
<?php
if (isset($_POST['tambah']))
   if (tambah($_POST) > 0) {
      echo "<script>alert('data berhasil di tambah');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
?>
<?php include '../template/footer.php'  ?>