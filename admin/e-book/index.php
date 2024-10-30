<?php

include_once '../controller.php';

?>

<?php include '../template/header.php';

$Books = all("e_book");

$no = 1;
?>

<div class="container ">
   <h1><E-Book></E-Book></h1>


   <div class="d-flex gap-2">
      <a href="tambah.php" class="btn btn-primary my-4">Tambah Buku</a>
      <div>
         <a href="print.php" target="_blank" class="btn btn-success mt-4">Cetak</a>
      </div>

   </div>

   <table class="table" id="table">
      <thead class="mt-3">
         <tr>
            <th>NO</th>
            <th>ID E-Book</th>
            <th>JUDUL BUKU</th>
            <th>PENGARANG</th>
            <th>PENERBIT</th>
            <th>TAHUN TERBIT</th>
            <th>KATEGORI</th>
            <th>IMAGE</th>
            <th>FILE</th>
            <th>ACTION</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($Books as $book) :   ?>
            <tr>
               <td><?= $no++; ?></td>
               <td>EB_<?= $book['id']; ?></td>
               <td><?= $book['judul']; ?></td>
               <td><?= $book['pengarang']; ?></td>
               <td><?= $book['penerbit']; ?></td>
               <td><?= $book['tahun_terbit']; ?></td>
               <td><?= hasOne($book['id_kategori'], 'kategori', 'nama') ?></td>
               <td>
                  <img src="image/<?= $book['image'] ?>" alt="<?= $book['judul']; ?>" width="70">
               </td>
               <td>
                  <a class="btn btn-success" target="_Blank" href="file-book/<?= $book['file']; ?>">View</a>
               </td>
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