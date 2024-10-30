<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$anggota = all("anggota");
$id_buku = $_GET['id_buku'];
$id_pengajuan = $_GET['id'];
$anggota = where('anggota', 'user_id', $_GET['id_user'])[0];
$buku = show("buku", $id_buku);
?>
<div class="container">
   <div class="card">
      <div class="card-header">
         <h2>Tambah Peminjaman</h2>
      </div>
      <div class="card-body">
         <form method="POST" action="">
            <div class="mb-3">
               <label for="boku" class="form-label">Judul Buku</label>
               <input type="text" class="form-control disabled" disabled value="<?= $buku['judul'] ?>">
               <input type="hidden" name="id_buku" value="<?= $buku['id'] ?>">
               <input type="hidden" name="id_pengajuan" value="<?= $id_pengajuan ?>">

            </div>
            <div class="mb-3">
               <label for="boku" class="form-label">Nama Anggota</label>
               <input type="text" class="form-control disabled" disabled value="<?= $anggota['nama'] ?>">
               <input type="hidden" name="id_anggota" value="<?= $anggota['id'] ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
               <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali">
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