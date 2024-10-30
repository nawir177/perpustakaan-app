<?php

// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function tambah($data)
{

  global $conn;
  $tanggal = date('d/m/Y'); // Format tanggal sesuai Indonesia
  $waktu = date('H:i:s');   // Format waktu
  $username = $data['username'];
  $password = $data['password'];
  $tujuan = $data['tujuan'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_affected_rows($conn) > 0) {
    if (password_verify($password, $row['password'])) {
      $user = show('user', $row['id']);
      $user_id = $user['id'];

      mysqli_query($conn,"INSERT INTO absensi VALUES('','$user_id','$username','$tanggal','$waktu','$tujuan')");
      return true;
    }
  } else {
    return false;
  }
}

