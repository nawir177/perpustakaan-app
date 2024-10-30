<?php

// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function tambah($data)
{

  global $conn;
  $tanggal = date('d/m/Y'); // Format tanggal sesuai Indonesia
  $waktu = date('H:i:s');   // Format waktu
  $nama = $data['nama'];
  $instansi = $data['instansi'];
  $tujuan = $data['tujuan'];

  mysqli_query($conn, "INSERT INTO absensi_tamu VALUES('','$nama','$instansi','$tujuan', '$tanggal','$waktu')");
  return true;
}
