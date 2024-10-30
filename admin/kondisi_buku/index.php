<?php include '../controller.php';
include '../template/header.php';
$no = 1;
$book = all('kondisi_buku')


?>
<div class="container">
   <h1>DATA Kondisi Buku </h1>
   <div class="card">
      <div class="card-body">
         <div class="d-flex gap-2">
            <a href="tambah.php" class="btn btn-primary my-4">Tambah Kondisi buku</a>
            <div>
               <a href="print.php" target="_blank">
                  <button type="button" class="btn btn-success mt-4">Cetak</button>
               </a>
            </div>
         </div>
         <table class="table">
            <thead>
               <tr>
                  <th>No</th>
                  <th>ID</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>PENERBIT</th>
                  <th>TAHUN TERBIT</th>
                  <th>ISBN</th>

                  <th>Jumlah</th>
                  <th>Kondisi</th>
                  <th>Action</th>
               </tr>

            </thead>
            <tbody>
               <?php foreach ($book as $value) :  ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td>KB_<?= $value['id']; ?></td>
                     <td><?= hasOne($value['id_buku'], 'buku', 'judul'); ?></td>
                     <td><?= hasOne($value['id_buku'], 'buku', 'pengarang'); ?></td>
                     <td><?= hasOne($value['id_buku'], 'buku', 'penerbit'); ?></td>
                     <td><?= hasOne($value['id_buku'], 'buku', 'tahun_terbit'); ?></td>
                     <td><?= hasOne($value['id_buku'], 'buku', 'isbn'); ?></td>
                     <td><?= $value['jumlah']; ?></td>
                     <td><?= $value['kondisi']; ?></td>
                     <th>
                        <a href="delete.php?id=<?= $value['id'] ?>" onclick="return confirm('yakin ingin menghapus data ini ?')" class=" fs-1 text-secondary">
                           <i class="bi bi-trash"></i>
                        </a>
                        <a href="edit.php?id=<?= $value['id'] ?>" class="fs-1 text-secondary">
                           <i class="bi bi-pencil-square"></i>
                        </a>
                     </th>
                  </tr>
               <?php endforeach  ?>

            </tbody>

         </table>

      </div>

   </div>

</div>
<script>
   function submitForm() {
      document.getElementById('filterForm').submit();
   }
</script>
<?php include '../template/footer.php'  ?>