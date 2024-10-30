<?php include '../template/header.php';


$Books = getFilter("katalog");

$no = 1;
?>

<div class="container ">
   <h1>DATA BUKU</h1>
   <form action="" method="get" class="mb-3" id="filterForm">
      <div class="row">
         <div class="col-md-3">
            <label for="bulan" class="form-label">Bulan:</label>
            <select name="bulan" id="bulan" class="form-select" onchange="submitForm()">
               <option value="">Pilih Bulan</option>
               <?php
               for ($i = 1; $i <= 12; $i++) {
                  $formattedBulan = sprintf("%02d", $i);
                  $selected = isset($_GET['bulan']) && $_GET['bulan'] == $formattedBulan ? 'selected' : '';
                  echo "<option value='$formattedBulan' $selected>$formattedBulan</option>";
               }
               ?>
            </select>
         </div>
         <div class="col-md-3">
            <label for="tahun" class="form-label">Tahun:</label>
            <select name="tahun" id="tahun" class="form-select" onchange="submitForm()">
               <option value="">Pilih Tahun</option>
               <?php
               $currentYear = date('Y');
               for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                  $selected = isset($_GET['tahun']) && $_GET['tahun'] == $i ? 'selected' : '';
                  echo "<option value='$i' $selected>$i</option>";
               }
               ?>
            </select>
         </div>
         <!-- ... (bagian tombol Filter dihapus) ... -->
      </div>
   </form>


   <div class="d-flex gap-2">
      <a href="tambah.php" class="btn btn-primary my-4">Tambah Buku</a>
      <div>
         <button type="button" class="btn btn-success mt-4" onclick="printData()">Cetak</button>
      </div>

   </div>

   <table class="table" id="table">
      <thead class="mt-3">
         <tr>
            <th>NO</th>
            <th>ID Buku</th>
            <th>JUDUL BUKU</th>
            <th>PENGARANG</th>
            <th>KATEGORI</th>
            <th>ACTION</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($Books as $book) :   ?>
            <tr>
               <td><?= $no++; ?></td>
               <td>BK_<?= $book['id']; ?></td>
               <td><?= $book['judul']; ?></td>
               <td><?= $book['pengarang']; ?></td>
               <td><?= hasOne($book['id_kategori'], 'kategori', 'nama') ?></td>
               
               <td>
                  <div class="d-flex gap-3">
                     <a href="delete.php?id=<?= $book['id'] ?>" onclick="return confirm('yakin ingin menghapus data ini ?')" class=" fs-1 text-secondary">
                        <i class="bi bi-trash"></i>
                     </a>
                     <a href="edit.php?id=<?= $book['id'] ?>" class="fs-1 text-secondary">
                        <i class="bi bi-pencil-square"></i>
                     </a>
                     <a href="detail.php?id=<?= $book['id'] ?>" class="fs-1 text-secondary">
                        <i class="bi bi-eye-fill"></i>
                     </a>
                  </div>
               </td>
            </tr>
         <?php endforeach  ?>
      </tbody>
   </table>
</div>
<script>
   function submitForm() {
      document.getElementById('filterForm').submit();
   }

   function printData() {
      // Mendapatkan nilai bulan dan tahun dari dropdown
      var bulan = document.getElementById('bulan').value;
      var tahun = document.getElementById('tahun').value;

      // Membuat URL untuk halaman cetak dengan parameter bulan dan tahun
      var printUrl = 'print.php?bulan=' + bulan + '&tahun=' + tahun;
      location.href = 'print.php?bulan=' + bulan + '&tahun=' + tahun;
   }
</script>

<?php include '../template/footer.php'; ?>