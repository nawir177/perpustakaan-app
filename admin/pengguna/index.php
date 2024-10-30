<?php include '../controller.php';
include '../template/header.php';
$user = all("user");
$no = 1;
?>

<div class="container">
   <div class="d-flex gap-2">
      <a href="tambah.php" class="btn btn-primary my-4">Tambah Pengguna</a>
   </div>
   <h1>DATA PENGGUNA APLIKASI</h1>

   <div class="card">
      <div class="card-body">
         <table class="table" >
            <thead>
               <tr>
                  <th>No</th>
                  <th>USERNAME</th>
                  <th>NAMA</th>
                  <th>KELAMIN</th>
                  <th>TELPON</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($user as $value) : ?>

                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $value['username']; ?></td>
                     <td><?= $value['nama']; ?></td>
                     <td><?= $value['kelamin']; ?></td>
                     <td><?= $value['telpon']; ?></td>
                     
                     <td>
                        <div class="d-flex gap-3">
                           <a href="delete.php?id=<?= $value['id'] ?>" onclick="return confirm('are you sure ?')" class=" fs-1 text-secondary">
                              <i class="bi bi-trash"></i>
                           </a>
                           <a href="edit.php?id=<?= $value['id'] ?>" class="fs-1 text-secondary">
                              <i class="bi bi-pencil-square"></i>
                           </a>

                        </div>
                     </td>
                  </tr>
               <?php endforeach  ?>
            </tbody>
         </table>


      </div>

   </div>

</div>

<?php include '../template/footer.php'  ?>