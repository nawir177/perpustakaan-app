<?php include '../controller.php'?>
<?php include '../template/header.php' ?>
<?php include 'fungsi.php'  ?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h1>Form tambah anggota</h1>
      </div>
      <div class="card-body">
         <form action="" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
               <label class="form-label" for="nis">NIS</label>
               <input type="text" class="form-control" name="nis" id="nis">
            </div>
            <div class="mb-3">
               <label class="form-label" for="nama">Nama</label>
               <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="mb-3">
               <label class="form-label" for="email">Email</label>
               <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3 d-flex gap-1 align-items-center">
               <div class="col-1">
                  <label class="form-label" for="laki">Laki-laki</label>
                  <input type="radio" value="laki-laki" class="radio" name="kelamin" id="laki">
               </div>
               <div class="col-1">
                  <label class="form-label" for="perempuan">Perempuan</label>
                  <input type="radio" value="perempuan" class="form-radio" name="kelamin" id="perempuan">
               </div>
            </div>
            <div class="mb-3">
               <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
               <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggal_lahi">Tanggal Lahir</label>
               <input type="date" class="form-control" name="tanggal_lahir " id="tanggal_lahi">
            </div>
            <div class="mb-3">
               <label class="form-label" for="TA">TA</label>
               <input type="text" class="form-control" name="TA" id="TA">
            </div>
            <div class="mb-3">
               <label for="alamat">Alamat</label>
               <input type ="text" name="alamat" id="alamat" height="20">
            </div>
            <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
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