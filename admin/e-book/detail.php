<?php include '../controller.php'; ?>
<?php include '../template/header.php';
$id = $_GET['id'];
$book = show('e_book', $id);
?>

<div class="container my-4">
   <h1 class="mb-4">Detail Buku</h1>

   <div class="card">
      <div class="card-header bg-success text-dark">
         <h3 class="card-title text-light"><?= htmlspecialchars($book['judul']); ?></h3>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-md-4">
               <img src="../e-book/image/<?= htmlspecialchars($book['image']); ?>" class="img-fluid rounded shadow-sm" alt="<?= htmlspecialchars($book['judul']); ?>">
            </div>
            <div class="col-md-8">
               <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Pengarang:</strong> <?= htmlspecialchars($book['pengarang']); ?></li>
                  <li class="list-group-item"><strong>Penerbit:</strong> <?= htmlspecialchars($book['penerbit']); ?></li>
                  <li class="list-group-item"><strong>Tahun Terbit:</strong> <?= htmlspecialchars($book['tahun_terbit']); ?></li>
               </ul>
               <div class="p-2">
                  <h1>Deskripsi</h1>
                  <p class="p-5 rounded-2 fs-3" style="background-color: #eaeaea;"> <?= htmlspecialchars($book['deskripsi']); ?></p>
               </div>
            </div>
         </div>
         <div class="mt-4">
            <a href="index.php" class="btn btn-success">Kembali</a>
         </div>
      </div>
   </div>
</div>

<style>
   .bg-light-green {
      background-color: #d4edda;
      /* Light green color */
   }

   .text-dark {
      color: #212529;
      /* Dark text color for contrast */
   }

   .shadow-sm {
      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
   }
</style>

<?php include '../template/footer.php'; ?>