<?php include '../layouts/header.php';
$user = show("user", $_SESSION['user']);
$pengajuan = where('pengajuan','id_user',$user['id']);
$no = 1;

?>

<section class="mb-10 min-h-screen">
  <h1 class="text-3xl font-bold">Booking Buku</h1>

  <div class="my-6">


    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th class="py-6 px-3">NO</th>
            <th class="py-6 px-3">TANGGAL</th>
            <th class="py-6 px-3">ID_BUKU</th>
            <th class="py-6 px-3">JUDUL</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pengajuan as $value):   ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="py-6 px-3"><?= $no++; ?></td>
              <td class="py-6 px-3"><?= $value['tanggal']; ?></td>
              <td class="py-6 px-3">PM_<?= hasOne($value['id_buku'],'buku','id') ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_buku'], "buku", "judul"); ?></td>
            </tr>
          <?php endforeach;  ?>

        </tbody>
      </table>
    </div>

  </div>
</section>


<?php include '../layouts/footer.php' ?>