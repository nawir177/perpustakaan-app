<?php
include '../controller.php';
include 'fungsi.php';
include '../template/header.php';
$val = show("denda", 1);
?>
<div class="container">
   <div class="card col-12">
   <div class="card-header">
      <h3>Update Denda</h3>  
   </div>
      <div class="card-body">
         <form method="post" action="">
            <div class="mb-3">
               <label class="form-label" for="namapeminjam">Jumlah Denda / Hari</label>
               <input type="text" class="form-control" name="nilai" id="namapeminjam" value="<?=$val['nilai']?>">
            </div>
           
            <button class="btn btn-info" type="submit" name="tambah">Edit Nilai Denda</button>
         </form>

      </div>
   </div>

</div>


<?php include '../template/footer.php'  ?>
<?php
if (isset($_POST['tambah'])) {
   if (setDenda($_POST) > 0) {
      echo "<script>alert('Nilai Denda berhasil di Update');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
}

?>