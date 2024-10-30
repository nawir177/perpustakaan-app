
<?php
$id = $_GET['id'];
include '../controller.php';
include '../template/header.php';
include './fungsi.php';

$anggota = show("anggota", $id);

?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h1>Form tambah anggota</h1>
      </div>
      <div class="card-body">
         <form action="" method="POST">

            <div class="mb-3">
               <label class="form-label" for="nis">NIS</label>
               <input type="text" class="form-control" name="nis" id="nis" value="<?= $anggota['nis'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="nama">Nama</label>
               <input type="text" class="form-control" name="nama" id="nama" value="<?= $anggota['nama'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="email">Email</label>
               <input type="email" class="form-control" name="email" id="email" value="<?= $anggota['email'] ?>">
            </div>
            <div class="mb-3 d-flex gap-1 align-items-center">
               <div class="col-1">
                  <label class="form-label" for="laki">Laki-laki</label>
                  <input type="radio" value="laki-laki" class="radio" name="kelamin" id="laki" <?= $anggota['kelamin'] === "laki-laki" ? 'checked' : '' ?>>
               </div>
               <div class="col-1">
                  <label class="form-label" for="perempuan">Perempuan</label>
                  <input type="radio" value="perempuan" class="form-radio" name="kelamin" id="perempuan" <?= $anggota['kelamin'] === "perempuan" ? 'checked' : '' ?>>
               </div>
            </div>
            <div class="mb-3">
               <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
               <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $anggota['tempat_lahir'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggal_lahi">Tanggal Lahir</label>
               <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $anggota['tanggal_lahir'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="TA">TA</label>
               <input type="text" class="form-control" name="TA" id="TA" value="<?= $anggota['TA'] ?>">
            </div>
            <input type="hidden" name="id" value="<?= $anggota['id'] ?>">
            <button class="btn btn-primary" type="submit" name="edit">Edit</button>
         </form>
      </div>
   </div>

</div>
<?php

if (isset($_POST['edit']))
   if (edit($_POST) > 0) {
      echo "<script>alert('data berhasil di Upadate');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
?>


<?php include '../template/footer.php'  ?>