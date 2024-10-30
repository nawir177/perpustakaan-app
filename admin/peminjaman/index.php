<?php include '../controller.php'  ?>
<?php include '../template/header.php';
include 'fungsi.php';
$Peminjaman = getFilter('peminjaman');

$no = 1;

?>

<div class="container">

   <h1>DATA PEMINJAMAN</h1>
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
      <a href="tambah.php" class="btn btn-primary my-4">Tambah Peminjaman</a>
      <div>
         <button type="button" class="btn btn-success mt-4" onclick="printData()">Cetak</button>
      </div>
   </div>
   <table class="table" id="table">
      <thead class="mt-3">
         <tr>
            <th>NO</th>
            <th>ID PEMINJAMAN</th>
            <th>TANGGAL PINJAM</th>
            <th>JUDUL</th>
            <th>NIS</th>
            <th>NAMA PEMINJAM</th>
            <th>STOK</th>
            <th>TANGGAL KEMBALI</th>
            <th>STATUS</th>
            <th>ACTION</th>
         </tr>

      </thead>
      <tbody>
         <?php foreach ($Peminjaman as $value) :   ?>
            <tr>
               <td>
                  <?= $no++; ?>
               </td>
               <td>PM_<?= $value['id']; ?></td>
               <td><?= $value['tanggal']; ?></td>
               <td><?= hasOne($value['id_buku'], "buku", "judul"); ?></td>
               <td><?= hasOne($value['id_anggota'], "anggota", "nis"); ?></td>
               <td><?= hasOne($value['id_anggota'], "anggota", "nama"); ?></td>
               <td><?= hasOne($value['id_buku'], "buku", "jumlah"); ?></td>
               <td><?=$value['tanggal_kembali']; ?></td>
               <td><?= $value['status']; ?></td>

               <td>
                  <div class="d-flex gap-3">
                     <a href="delete.php?id=<?= $value['id'] ?>" onclick="return confirm('are you sure ?')" class=" fs-1 text-secondary">
                        <i class="bi bi-trash"></i>
                     </a>
                     <a href="edit.php?id=<?= $value['id'] ?>" class="fs-1 text-secondary">
                        <i class="bi bi-pencil-square"></i>
                     </a>
                     <?php if (isPastDueDate($value['tanggal_kembali']) && $value['status'] == 'dipinjam'): ?>
                        <form action="" method="post">
                           <input type="hidden" name="buku" value="<?= hasOne($value['id_buku'], "buku", "judul"); ?>">
                           <input type="hidden" name="kembali" value="<?= dateFormat($value['tanggal_kembali']) ?>">
                           <input type="hidden" name="penerima" value="<?= hasOne($value['id_anggota'], "anggota", "email"); ?>">
                           <button type="submit" name="kirim_email" class="btn btn-danger btn-sm">
                              kirim pemberitahuan
                           </button>
                        </form>
                        <?php
                        if (isset($_POST['kirim_email'])) {
                           if (kirimEmailPemberitahuan($_POST) == true) {
                              echo "<script>alert('Email berhasil di kirim')</script>";
                           }
                        }


                        ?>
                     <?php endif; ?>
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

      // Membuka halaman cetak pada tab baru
      location.href = 'print.php?bulan=' + bulan + '&tahun=' + tahun;
   }
</script>
<?php include '../template/footer.php';


?>