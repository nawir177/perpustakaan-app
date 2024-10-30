<?php include '../controller.php';
include '../template/header.php';
$user_id = $_SESSION['user'];
$anggota = all('anggota');
$user = show('user', $userAuth['id']);
$no = 1;
?>

<div class="container" style="width: 1200px; overflow:scroll">
   <h1>DATA ANGGOTA PERPUSTAKAAN</h1>
   <a href="tambah.php" class="btn btn-primary my-4">Tambah Anggota</a>
   <table class="table" id="table">
      <thead class="mt-3">
         <tr>
            <th>NO</th>
            <th>ID</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>
            <th>TELPON</th>
            <th>EMAIL</th>
            <th>KELAMINT</th>
            <th>TA</th>
            <th>ALAMAT</th>
            <th>FOTO</th>
            <th>ACTION</th>

         </tr>

      </thead>
      <tbody>
         <?php foreach ($anggota as $value) :   ?>
            <tr>
               <td>
                  <?= $no++; ?>
               </td>
               <td>AN_<?= $value['id']; ?></td>
               <td><?= $value['nis']; ?></td>
               <td><?= $value['nama']; ?></td>
               <td>
                  <?= $value['tempat_lahir'] ?>,
               </td>
               <td> <?= $value['tanggal_lahir']; ?></td>
               <td><?= $value['telpon']; ?></td>
               <td><?= $value['email']; ?></td>
               <td><?= $value['kelamin']; ?></td>
               <td><?= $value['TA']; ?></td>
               <td><?= $value['alamat']; ?></td>
               <td> <img src="../<?= $value['foto']; ?>" class="img-thumbnail" alt="..." width=400></td>
               <td>
                  <div class="d-flex gap-3">
                     <a href="delete.php?id=<?= $value['id'] ?>" onclick="return confirm('are you sure ?')" class=" fs-1 text-secondary">
                        <i class="bi bi-trash"></i>
                     </a>
                     <a href="edit.php?id=<?= $value['id'] ?>" class="fs-1 text-secondary">
                        <i class="bi bi-pencil-square"></i>
                     </a>
                     <a href="kartu.php?id=<?= $value['id'] ?>">
                        <button class="btn btn-success">
                           cetak kartu
                        </button>
                     </a>
                     <?php if ($value['verifikasi'] == 0) :   ?>
                        <a href="verifikasi.php?id=<?= $value['id'] ?>">
                           <button class="btn btn-success">
                              verifikasi
                           </button>
                        </a>

                     <?php endif  ?>

                  </div>
               </td>
            </tr>
         <?php endforeach  ?>
      </tbody>

   </table>

</div>
<?php include '../template/footer.php'  ?>