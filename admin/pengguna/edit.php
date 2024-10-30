<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$id = $_GET['id'];
$user = show("user", $id);

?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h2>Edit Data Pengguna</h2>
      </div>
      <div class="card-body">
         <form method="POST" action="">
            <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>">
            </div>
            <div class="mb-3 d-flex gap-1 align-items-center">
               <div class="col-1">
                  <label class="form-label" for="laki">Laki-laki</label>
                  <input type="radio" value="laki-laki" class="radio" name="kelamin" id="laki" <?= $user['kelamin'] === "laki-laki" ? 'checked' : '' ?>>
               </div>
               <div class="col-1">
                  <label class="form-label" for="perempuan">Perempuan</label>
                  <input type="radio" value="perempuan" class="form-radio" name="kelamin" id="perempuan" <?= $user['kelamin'] === "perempuan" ? 'checked' : '' ?>>
               </div>
            </div>
            <div class="mb-3">
               <label class="form-label" for="telpon">Telpon</label>
               <input type="text" class="form-control" name="telpon" id="telpon" value="<?= $user['telpon']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="username">Username</label>
               <input type="text" class="form-control" name="username" id="username" value="<?= $user['username']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="password">Password</label>
               <input type="password" class="form-control" name="password" id="password">
               <input type="hidden" name="oldPassword" id="oldPassword" value="<?= $user['password'] ?>">
               <input type="hidden" name="id" value="<?= $user['id'] ?>">
            </div>
            <div class=" mb-3">
               <label class="form-label" for="verifikasi">Verifikasi</label>
               <input type="password" class="form-control" name="verifikasi" id="verifikasi">
            </div>
            <button class="btn btn-primary" name="update">Update</button>
         </form>

      </div>

   </div>
</div>
<?php
if (isset($_POST['update'])) {
   if (edit($_POST) > 0) {
      echo "<script>alert('data berhasil di Update');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
}

?>
<?php include '../template/footer.php'  ?>