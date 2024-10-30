<?php include '../layouts/header.php';
$id = $_GET['id'];
$book = show('e_book', $id);
?>

<div class="container mx-auto my-8">
  <div class="bg-white rounded-lg shadow-lg">
    <div class="bg-green-500 text-white p-6 rounded-t-lg">
      <h3 class="text-3xl font-bold"><?= htmlspecialchars($book['judul']); ?></h3>
    </div>

    <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex justify-center">
          <img src="../admin/e-book/image/<?= htmlspecialchars($book['image']); ?>" class="w-full h-auto rounded-lg shadow" alt="<?= htmlspecialchars($book['judul']); ?>">
        </div>
        <div>
          <ul class="space-y-4">
            <li><strong>Pengarang:</strong> <?= htmlspecialchars($book['pengarang']); ?></li>
            <li><strong>Penerbit:</strong> <?= htmlspecialchars($book['penerbit']); ?></li>
            <li><strong>Tahun Terbit:</strong> <?= htmlspecialchars($book['tahun_terbit']); ?></li>
          </ul>
          <div class="mt-6">
            <h1 class="text-xl font-semibold">Deskripsi</h1>
            <p class="mt-2 p-4 bg-gray-100 rounded-lg text-lg"><?= htmlspecialchars($book['deskripsi']); ?></p>
          </div>
          <a href="../admin/e-book/file-book/<?= htmlspecialchars($book['file']); ?>" target="_blank" class="inline-block py-2 px-4 bg-green-500 text-white rounded-md hover:bg-green-400 my-6">Baca</a>
        </div>
      </div>
      <div class="mt-6">
        <a href="../home" class="inline-block py-2 px-4 bg-green-500 text-white rounded-md hover:bg-green-400">Kembali</a>
      </div>
    </div>
  </div>
</div>

<?php include '../layouts/footer.php' ?>