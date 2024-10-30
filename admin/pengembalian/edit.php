<?php
include '../controller.php';
include 'fungsi.php';
include '../template/header.php';
$id = $_GET['id'];
$val = show("pengembalian", $id);
$peminjaman = all("peminjaman");
$dipinjam = show("peminjaman", $val['id_peminjaman']);
$id_buku = $dipinjam['id_buku'];
?>
<div class="container">
   <div class="card col-8">
      <div class="card-header">
         <h3>Tambah Pengembalian Buku</h3>
      </div>
      <div class="card-body">
         <form method="post" action="">
            <input type="hidden" name="id_buku" value="<?=$id_buku?>">
            <div class="mb-3">
               <label for="id_peminhama">Nama Buku</label>
               <select name="id_peminjaman" class="form-select">
                  <?php foreach ($peminjaman as $value) :  ?>
                     <option <?= $val['id_peminjaman'] === $value['id'] ? "selected" : ""; ?> value="<?= $value['id'] ?>"> Judul : <?= hasOne($value['id_buku'], "buku", "judul") ?> Anggota :<?= hasOne($value['id_anggota'], "anggota", "nama") ?> </option>
                  <?php endforeach  ?>
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggalkembali">Tanggal Kembali</label>
               <input type="date" class="form-control" name="tanggal_kembali" value="<?= $val['tanggal'] ?>" id="tanggalkembali">
            </div>
            <input type="hidden" name="id_pengembalian" value="<?= $id ?>">
            <input type="hidden" name="id_peminjaman" value="<?= $dipinjam['id'] ?>">
            <input type="hidden" name="tanggal_target_kembali" value="<?= $dipinjam['tanggal_kembali'] ?>">
            <button class="btn btn-info" type="submit" name="edit">Update Pengembalian</button>
         </form>

      </div>
   </div>

</div>
<?php
if (isset($_POST['edit'])) {


   if (edit($_POST) > 0) {
      echo "<script>alert('data berhasil di Update');location.href='index.php'</script>";
   } else {
      echo mysqli_error($conn);
   }
}

?>
<?php include '../template/footer.php'  ?>