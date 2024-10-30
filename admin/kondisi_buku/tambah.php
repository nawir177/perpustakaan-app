<?php include '../controller.php';
include '../template/header.php';
include 'fungsi.php';
$peminjam = all("buku");
$no = 1;
?>

<div class="container">
   <div class="col-10 my-4">
      <div class="card">
         <div class="card-header">
            <h3>Pilih Buku</h3>
         </div>
         <div class="card-body">
            <table class="table" id="table">
               <thead class="mt-3">
                  <tr>
                     <th>NO</th>
                     <th>ID Buku</th>
                     <th>JUDUL BUKU</th>
                     <th>PENGARANG</th>
                     <th>PENERBIT</th>
                     <th>TAHUN TERBIT</th>
                     <th>ISBN</th>
                     <th>KATEGORI</th>
                     <th>STOK</th>
                    

                     <th>SELECT</th>

                  </tr>

               </thead>
               <tbody>
                  <?php foreach ($peminjam as $book) :   ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td>BK_<?= $book['id']; ?></td>
                        <td><?= $book['judul']; ?></td>
                        <td><?= $book['pengarang']; ?></td>
                        <td><?= $book['penerbit']; ?></td>
                        <td><?= $book['tahun_terbit']; ?></td>
                        <td><?= $book['isbn']; ?></td>
                        <td><?= hasOne($book['id_kategori'], 'kategori', 'nama') ?></td>
                        <td><?= $book['jumlah']; ?></td>

                        <td><a class="btn btn-warning" href="form.php?id_peminjam=<?= $book['id']; ?>">Pilih</a></td>
                     </tr>
                  <?php endforeach  ?>
               </tbody>

            </table>
         </div>
      </div>
   </div>
</div>

<?php include '../template/footer.php'  ?>