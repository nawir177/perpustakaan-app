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
               <label class="form-label" for="nama">nama</label>
               <input type="text" class="form-control" name="nama" id="nama">
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