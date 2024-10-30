<?php
function tambah($data)
{
  global $conn;

  // Tangkap data
  $id_Book = $data['id_ebook'];

  // Hapus semua data rekomendasi yang ada
  mysqli_query($conn, "DELETE FROM rekomendasi_ebook");

  // Masukkan rekomendasi e-book baru
  foreach ($id_Book as $val) {
    // Escape the value to prevent SQL injection
    $val = mysqli_real_escape_string($conn, $val);
    mysqli_query($conn, "INSERT INTO rekomendasi_ebook (id, id_ebook) VALUES('', '$val')");
  }

  // Kembalikan jumlah baris yang terpengaruh
  return mysqli_affected_rows($conn);
}
