<?php include '../controller.php'; ?>
<?php include '../template/header.php'; 
$Books = all('buku');
?>

<div class="container">
   <h1>Pilih Buku</h1>

   <form method="GET" action="form.php">
      <table class="table" id="table">
         <thead class="mt-3">
            <tr>
               <th>NO</th>
               <th>JUDUL BUKU</th>
               <th>STOK</th>
               <th>PENGARANG</th>
               <th>ISBN</th>
               <th>SELECT</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; foreach ($Books as $book) : ?>
               <tr onclick="toggleCheckbox(this)">
                  <td><?= $no++; ?></td>
                  <td><?= $book['judul']; ?></td>
                  <td><?= $book['jumlah']; ?></td>
                  <td><?= $book['pengarang']; ?></td>
                  <td><?= $book['isbn']; ?></td>
                  <td>
                     <input type="checkbox" name="id_buku[]" value="<?= $book['id']; ?>" id="checkbox-<?= $book['id']; ?>">
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Pilih</button>
   </form>
</div>

<script>
function toggleCheckbox(row) {
   const checkbox = row.querySelector('input[type="checkbox"]');
   checkbox.checked = !checkbox.checked;
}
</script>

<?php include '../template/footer.php'; ?>
