<?php
$id = $_GET['id'];
?>
<?php include '../controller.php' ?>
<?php include './fungsi.php' ?>
<?php include '../template/header.php';
$kategori = show("kategori", $id);

?>
<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>EDIT DATA BUKU</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
               <label class="form-label" for="nama">Nama</label>
               <input require type="text" class="form-control" name="nama" id="nama" value="<?= htmlspecialchars($kategori['nama']) ?>">
            </div>
     
            <input require type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>">
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