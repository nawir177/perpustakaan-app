<?php

include_once '../controller.php';
include_once 'fungsi.php';

?>

<?php include '../template/header.php';

$Books = all("e_book");

// Get the list of checked ebook IDs from the 'rekomendasi_ebook' table
$checkbox = array_column(all('rekomendasi_ebook'), 'id_ebook');

$no = 1;
?>

<div class="container">
  <h1>E-Book</h1>

  <form action="" method="POST">
    <table class="table" id="table">
      <thead class="mt-3">
        <tr>
          <th>NO</th>
          <th>ID E-Book</th>
          <th>JUDUL BUKU</th>
          <th>PENGARANG</th>
          <th>PENERBIT</th>
          <th>TAHUN TERBIT</th>
          <th>KATEGORI</th>
          <th>IMAGE</th>
          <th>FILE</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($Books as $book) : ?>
          <tr>
            <td>
              <div class="d-flex gap-3">
                <!-- Check if the book's ID is in the checkbox array -->
                <input type="checkbox" style="width:20px; height: 20px;"
                  value="<?= $book['id'] ?>"
                  id="id_<?= $book['id'] ?>"
                  name="id_ebook[]"
                  <?php if (in_array($book['id'], $checkbox)) echo 'checked'; ?>>

                <label for="id_<?= $book['id'] ?>">
                  <?= $no++; ?>
                </label>
              </div>
            </td>

            <td>EB_<?= $book['id']; ?></td>
            <td><?= $book['judul']; ?></td>
            <td><?= $book['pengarang']; ?></td>
            <td><?= $book['penerbit']; ?></td>
            <td><?= $book['tahun_terbit']; ?></td>
            <td><?= hasOne($book['id_kategori'], 'kategori', 'nama') ?></td>
            <td>
              <img src="../../admin/e-book/image/<?= $book['image'] ?>" alt="<?= $book['judul']; ?>" width="70">
            </td>
            <td>
              <a class="btn btn-success" target="_blank" href="../../admin/e-book/file-book/<?= $book['file']; ?>">View</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <button class="btn btn-success mb-4" type="submit" name="rekomendasi">Update Rekomendasi E-Book</button>
  </form>
</div>

<?php
if (isset($_POST['rekomendasi'])) {
  if (tambah($_POST) > 0) {
    echo "<script>alert('Data berhasil ditambahkan');location.href='index.php'</script>";
  } else {
    // Display the error message
    echo "<script>alert('Data gagal ditambahkan: " . mysqli_error($conn) . "');</script>";
  }
}
?>

<?php include '../template/footer.php'; ?>