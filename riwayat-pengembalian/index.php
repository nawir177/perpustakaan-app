<?php include '../layouts/header.php';
$user = show("user", $_SESSION['user']);
$anggota = where('anggota', 'user_id', $user['id'])[0];
$peminjaman = wherePeminjaman('peminjaman', 'id_anggota', $anggota['id']);

$pengembalian = userPengembalian($peminjaman);
$no = 1;


?>

<section class="mb-10 min-h-screen">
  <h1 class="text-3xl font-bold">Riwayat Pengembalian</h1>

  <div class="my-6">


    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th class="py-6 px-3">No</th>
            <th class="py-6 px-3">ID PENGEMBALIAN</th>
            <th class="py-6 px-3">Tanggal Pinjam</th>
            <th class="py-6 px-3">Tangga kembali</th>
            <th class="py-6 px-3">Judul</th>
            <th class="py-6 px-3">NIS</th>
            <th class="py-6 px-3">Nama Peminjam</th>
            <th class="py-6 px-3">Status</th>
            <th class="py-6 px-3">Denda</th>
            <th class="py-6 px-3">NOTA</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach ($pengembalian as $value) : ?>

            <tr>
              <td class="py-6 px-3"><?= $no++; ?></td>
              <td class="py-6 px-3">PN_<?= $value['id']; ?></td>
              <td class="py-6 px-3"><?= hasOne($value['id_peminjaman'], "peminjaman", "tanggal"); ?></td>
              <td class="py-6 px-3"><?= $value['tanggal'] ?></td>
              <td class="py-6 px-3"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_buku"), 'buku', 'judul'); ?></td>
              <td class="py-6 px-3"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nis'); ?></td>
              <td class="py-6 px-3"><?= hasOne(hasOne($value['id_peminjaman'], "peminjaman", "id_anggota"), 'anggota', 'nama'); ?></td>
              <td class="py-6 px-3"><?= $value['status'] ?></td>
              <td class="py-6 px-3">Rp.<?= number_format($value['denda'], 0, 0) ?></td>
              <td class="py-6 px-3">
                <div class="flex">
                  <a href="../admin/pengembalian/nota.php?id=<?= $value['id'] ?>" class="py-4 px-6 rounded-xl bg-green-500 text-white hover:bg-green-400">Cetak Nota</a>
                </div>
              </td>
            </tr>
          <?php endforeach  ?>
      </table>
    </div>

  </div>
</section>


<?php include '../layouts/footer.php' ?>