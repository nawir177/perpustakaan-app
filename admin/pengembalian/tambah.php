<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$peminjam = where("peminjaman","status","dipinjam");
$no = 1;
?>

<div class="container">
   <div class="col-10 my-4">
      <div class="card">
         <div class="card-header">
            <h3>Pilih Data peminjaman</h3>
         </div>
         <div class="card-body">
            <table class="table" id="table">
               <thead class="mt-3">
                  <tr>
                     <th>NO</th>
                     <th>TANGGAL PINJAM</th>
                     <th>TANGGAL KEMBALI</th>
                     <th>JUDUL</th>
                     <th>NAMA PEMINJAM</th>
                     <th>Select</th>

                  </tr>

               </thead>
               <tbody>
                  <?php foreach ($peminjam as $value) :   ?>
                     <tr>
                        <td>
                           <?= $no++; ?>
                        </td>
                        <td><?= $value['tanggal']; ?></td>
                        <td><?= $value['tanggal_kembali']; ?></td>
                        <td><?= hasOne($value['id_buku'], "buku", "judul"); ?></td>
                        <td><?= hasOne($value['id_anggota'], "anggota", "nama"); ?></td>

                        <td><a class="btn btn-warning" href="form.php?id_peminjam=<?= $value['id']; ?>">Pilih</a></td>
                     </tr>
                  <?php endforeach  ?>
               </tbody>

            </table>
         </div>
      </div>
   </div>
</div>

<?php include '../template/footer.php'  ?>