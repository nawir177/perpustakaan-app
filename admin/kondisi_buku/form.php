<?php
include '../controller.php';
include 'fungsi.php';
include '../template/header.php';
$id_peminjam = $_GET['id_peminjam'];
$val = show("buku", $id_peminjam);
?>
<div class="container">
   <div class="card col-8">
      <div class="card-header">
         <h3>Tambah Kondisi Buku</h3>
      </div>
      <div class="card-body">
         <form method="post" action="">
            <input type="hidden" name="id_buku" value="<?= $val['id']; ?>">
            <div class="mb-3">
            
               <input type="hidden" value="20/10/2023" class="form-control" name="tanggal" >
            </div>
            <div class="mb-3">
               <label class="form-label" for="namapeminjam">Judul Buku</label>
               <input type="text" class="form-control" disabled name="namapeminjam" id="namapeminjam" value="<?= $val['judul']; ?>">
            </div>
            <div class="mb-3">
               <label class="form-label" for="jumlah">Jumlah</label>
               <input type="number" class="form-control" name="jumlah" id="jumlah">
            </div>
            <div class="mb-3">
               <label class="form-label" for="kondisi">Kondisi</label>
               <select class="form-select" aria-label="Default select example" name="kondisi" id="kondisi" required>
                  <option selected>Open this select menu</option>
                  <option value="rusak parah">Rusak Parah</option>
                  <option value="rusak">Rusak</option>
                  <option value="rusak sedikit">Rusak Sedikit</option>
                  <option value="rusak sedikit">baik</option>
               </select>
            </div>
            <label class="form-label" for="ket">Keterangan</label>
            <div class="mb-3">
               <textarea name="ket" id="ket" cols="30" rows="5" placeholder="masukan keterangan" class="form-control"></textarea>
            </div>
            <button class="btn btn-info" type="submit" name="tambah">Tambah</button>
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