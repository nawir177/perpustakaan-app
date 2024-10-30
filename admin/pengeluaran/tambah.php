<?php include '../controller.php' ?>
<?php include './fungsi.php' ?>
<?php include '../template/header.php';

$kategori = all('kategori');

?>

<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>TAMBAH PENELUARAN</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="">
            <div class="mb-3">
               <label class="form-label" for="nama">Nama Barang</label>
               <input type="text" class="form-control" name="nama" id="nama">
            </div>

            <div class="mb-3">
               <label class="form-label" for="harga">HARGA</label>
               <input type="number" class="form-control" name="harga" id="harga" oninput="calculateTotal()">
            </div>
            <div class="mb-3">
               <label class="form-label" for="jumlah">JUMLAH</label>
               <input type="number" class="form-control" name="jumlah" id="jumlah" oninput="calculateTotal()">
            </div>
            <div class="mb-3">
               <label class="form-label" for="total">Total</label>
               <input type="text" class="form-control" name="total" id="total" readonly>
            </div>

            <button class="btn btn-primary" name="tambah">TAMBAH</button>
         </form>
      </div>
   </div>
</div>

<script>
   function calculateTotal() {
      var harga = document.getElementById('harga').value;
      var jumlah = document.getElementById('jumlah').value;
      var total = harga * jumlah;
      document.getElementById('total').value = total;
   }
</script>

<?php
if (isset($_POST['tambah'])) {
   if (tambah($_POST) > 0) {
      echo "<script>alert('Data berhasil ditambah'); location.href='index.php'</script>";
   } else {
      echo "<script>alert('Gagal menambah data');</script>";
   }
}
?>
<?php include '../template/footer.php' ?>