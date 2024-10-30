<?php include '../controller.php'  ?>
<?php include './fungsi.php'  ?>
<?php include '../template/header.php';

$kategori = all('kategori');

?>

<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>TAMBAH BUKU</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
               <label class="form-label" for="judul">Judul</label>
               <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="mb-3">
               <label class="form-label" for="pengarang">Pengarang</label>
               <input type="text" class="form-control" name="pengarang" id="pengarang">
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