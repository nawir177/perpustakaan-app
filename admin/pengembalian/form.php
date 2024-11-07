<?php
include '../controller.php';
include 'fungsi.php';
include '../template/header.php';
$id_peminjam = $_GET['id_peminjam'];
$val = show("peminjaman", $id_peminjam);
?>
<div class="container">
   <div class="card col-8">
   <div class="card-header">
      <h3>Tambah Pengembalian Buku</h3>  
   </div>
      <div class="card-body">
         <form method="post" action="">
            <div class="mb-3">
               <label class="form-label" for="namapeminjam">Nama Peminjam</label>
               <input type="text" class="form-control" disabled name="namapeminjam" id="namapeminjam" value="<?= hasOne($val['id_anggota'], "anggota", "nama"); ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="judul">Judul Buku</label>
               <input type="text" class="form-control" disabled name="judul" id="judul" value="<?= hasOne($val['id_buku'], "buku", "judul"); ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggalpinjam">Tanggal Peminjaman</label>
               <input type="data" class="form-control" disabled name="tanggalpinjam" id="tanggalpinjam" value="<?= $val['tanggal'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggalkembali">Tanggal Kembali</label>
               <input type="date" class="form-control" name="tanggal_kembali" id="tanggalkembali">
            </div>
            <div class="mb-3">
               <label class="form-label" for="judul">Denda Rusak (Opsional)</label>
               <input type="number" class="form-control" name="denda_rusak" id="denda" >
            </div>
            <input type="hidden" name="id_peminjaman" value="<?= $val['id']?>" >
            <input type="hidden" name="tanggal_target_kembali" value="<?=$val['tanggal_kembali']?>" >
            <button class="btn btn-info" type="submit" name="tambah">Tambah Pengembalian</button>
         </form>

      </div>
   </div>

</div>


<?php include '../template/footer.php'  ?>
<?php
if (isset($_POST['tambah'])) {
   if (tambah($_POST) > 0) {
      echo "<script>alert('data berhasil di tambah');location.href='index.php'</script>";
   } else {
      mysqli_error($conn);
   }
}

?>