<?php
// Ambil ID dari query string
$id = $_GET['id'];

// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

// Periksa koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "DELETE FROM pengeluaran WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
  // Hapus file gambar jika ada
  if ($image && file_exists(__DIR__ . '/image/' . $image)) {
    unlink(__DIR__ . '/image/' . $image);
  }
  echo "<script>alert('Data berhasil dihapus');location.href='index.php'</script>";
} else {
  echo "<script>alert('Data gagal dihapus');</script>";
  echo "Error: " . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
