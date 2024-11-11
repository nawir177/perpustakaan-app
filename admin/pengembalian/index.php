<?php 
include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$pengembalian = getFilter("pengembalian");
$no = 1;
?>

<div class="container">
   <div class="d-flex gap-2">
      <a href="tambah.php" class="btn btn-primary my-4">Tambah Pengembalian</a>
      <div>
         <button type="button" class="btn btn-success mt-4" onclick="printData()">Cetak</button>
      </div>
      <a href="setDenda.php" class="btn btn-primary my-4">Edit Nilai Denda</a>
   </div>
   <h1>DATA PENGEMBALIAN</h1>
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
         <div class="col-md-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" onchange="submitForm()">
               <option value="">Pilih Status</option>
               <option value="onTime" <?= (isset($_GET['status']) && $_GET['status'] == 'onTime') ? 'selected' : '' ?>>On Time</option>
               <option value="terlambat" <?= (isset($_GET['status']) && $_GET['status'] == 'terlambat') ? 'selected' : '' ?>>Terlambat</option>
            </select>
         </div>
      </div>
   </form>
   <div class="card overflow-auto">
      <div class="card-body">
         <table class="table overflow-auto">
            <thead>
               <tr>
                  <th>No</th>
                  <th>ID PENGEMBALIAN</th>
                  <th>Tanggal Pinjam</th>
                  <th>Target Kabali</th>
                  <th>Tanggal Kembali</th>
                  <th >Judul</th>
                  <th>NIS</th>
                  <th>Nama Peminjam</th>
                  <th>Status</th>
                  <th>Selisih Hari</th>
                  <th>Denda</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($pengembalian as $value) : ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td>PN_<?=$value['id']; ?></td>
                     <td><?= ubahFormatTanggal(hasOne($value['id_peminjaman'], "peminjaman", "tanggal")); ?></td>
                     <td><?= ubahFormatTanggal(hasOne($value['id_peminjaman'], "peminjaman", "tanggal_kembali")); ?></td>
                     <td><?= ubahFormatTanggal($value['tanggal']) ?></td>
                     <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_buku"), 'buku', 'judul'); ?></td>
                     <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nis'); ?></td>
                     <td><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nama'); ?></td>
                     <td><?= $value['status'] ?></td>
                     <td><?= selisihHari(hasOne($value['id_peminjaman'], "peminjaman", "tanggal_kembali"),$value['tanggal']) ?></td>
                     <td>Rp.<?= number_format($value['denda'], 0, 0) ?></td>
                     <td>
                        <div class="d-flex gap-3 align-items-center">
                           <a href="delete.php?id=<?= $value['id'] ?>" onclick="return confirm('Are you sure?')" class="fs-1 text-secondary">
                              <i class="bi bi-trash"></i>
                           </a>
                           <a href="edit.php?id=<?= $value['id'] ?>" class="fs-1 text-secondary">
                              <i class="bi bi-pencil-square"></i>
                           </a>
                           <a href="nota.php?id=<?= $value['id'] ?>" class="btn btn-success">Cetak Nota</a>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<script>
   function submitForm() {
      document.getElementById('filterForm').submit();
   }

   function printData() {
      var bulan = document.getElementById('bulan').value;
      var tahun = document.getElementById('tahun').value;
      var status = document.getElementById('status').value;

      var printUrl = 'print.php?bulan=' + bulan + '&tahun=' + tahun + '&status=' + status;
      location.href = printUrl;
   }
</script>

<?php include '../template/footer.php'; ?>
