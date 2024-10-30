<?php include '../layouts/header.php';
$user = show("user", $_SESSION['user']);
$anggota = where('anggota', 'user_id', $user['id'])[0];
$values = where('peminjaman', 'id_anggota', $anggota['id']);
$no = 1;

?>

<section class="mb-10 min-h-screen">
  <h1 class="text-3xl font-bold">Riwayat peminjaman</h1>

  <div class="my-6">


    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th class="py-6 px-3">NO</th>
            <th class="py-6 px-3">ID PEMINJAMAN</th>
            <th class="py-6 px-3">TANGGAL PINJAM</th>
            <th class="py-6 px-3">JUDUL</th>
            <th class="py-6 px-3">NIS</th>
            <th class="py-6 px-3">NAMA PEMINJAM</th>
            <th class="py-6 px-3">STOK</th>
            <th class="py-6 px-3">TANGGAL KEMBALI</th>
            <th class="py-6 px-3">STATUS</th>
           
          </tr>
        </thead>
        <tbody>
          <?php foreach ($values as $value):   ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="py-6 px-3"><?= $no++; ?></td>
              <td class="py-6 px-3">PM_<?= $value['id']; ?></td>
              <td class="py-6 px-3"><?= $value['tanggal']; ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_buku'], "buku", "judul"); ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_anggota'], "anggota", "nis"); ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_anggota'], "anggota", "nama"); ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_buku'], "buku", "jumlah"); ?></td>
              <td class="py-6 px-3"><?= $value['tanggal_kembali']; ?></td>
              <td class="py-6 px-3"><?= $value['status']; ?></td>
             
            </tr>
          <?php endforeach;  ?>

        </tbody>
      </table>
    </div>

  </div>
</section>


<?php include '../layouts/footer.php' ?>