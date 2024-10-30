<?php
include '../controller.php';
include './fungsi.php';
include '../template/header.php';

// Retrieve existing data based on ID
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $data = show('pengeluaran', $id); // Assuming 'peneluaran' is your table name
}

// Update data when the form is submitted
if (isset($_POST['update'])) {
   if (edit($_POST, $id) > 0) {
      echo "<script>alert('Data berhasil diubah'); location.href='index.php'</script>";
   } else {
      echo "<script>alert('Gagal mengubah data');</script>";
   }
}
?>

<div class="container">
   <div class="card col-10 justify-content-center">
      <div class="card-header">
         <h1>EDIT PENELUARAN</h1>
      </div>
      <div class="card-body">
         <form method="POST" action="">

            <div class="mb-3">
               <label class="form-label" for="nama">Nama Barang</label>
               <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label" for="harga">HARGA</label>
               <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $data['harga']; ?>" oninput="calculateTotal()">
            </div>
            <div class="mb-3">
               <label class="form-label" for="jumlah">JUMLAH</label>
               <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?php echo $data['jumlah']; ?>" oninput="calculateTotal()">
            </div>
            <div class="mb-3">
               <label class="form-label" for="total">Total</label>
               <input type="text" class="form-control" name="total" id="total" value="<?php echo $data['harga'] * $data['jumlah']; ?>" readonly>
            </div>

            <button class="btn btn-primary" name="update">UPDATE</button>
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

<?php include '../template/footer.php'; ?>