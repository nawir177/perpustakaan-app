<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';

?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h2>Tambah Pengguna</h2>
      </div>
      <div class="card-body">
         <form method="POST" action="">
            <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" name="nama" id="nama">
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
               <label class="form-label" for="telpon">Telpon</label>
               <input type ="text" class="form-control" name="telpon" id="telpon">
            </div>
            <div class="mb-3">
               <label class="form-label" for="username">Username</label>
               <input type ="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
               <label class="form-label" for="password">Password</label>
               <input type ="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
               <label class="form-label" for="verifikasi">Verifikasi</label>
               <input type ="password" class="form-control" name="verifikasi" id="verifikasi">
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
      mysqli_error($conn);
   }
}

?>
<?php include '../template/footer.php'  ?>