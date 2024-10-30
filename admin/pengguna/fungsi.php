<?php
function tambah($data)
{ 
      global $conn;
      // tangkap data
      $nama = $data['nama'];
      $kelamin = $data['kelamin'];
      $telpon = $data['telpon'];
      $verifikasi = $data['verifikasi'];
      $username = $data['username'];
      $password = $data['password'];


      // validasi verifiaksi salah
      if ($password !== $verifikasi) {
         echo "<script> alert('Verifikasi Password Salah');</script>";
         return false;
      }

      $password = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO user VALUES('','$nama','$kelamin','$telpon','$username','$password')";
      mysqli_query($conn, $query);

      header('location:login.php');
      return mysqli_affected_rows($conn);

  
}

function edit($data)
{
   global $conn;
   // tangkap data
   $nama = $data['nama'];
   $kelamin = $data['kelamin'];
   $telpon = $data['telpon'];
   $verifikasi = $data['verifikasi'];
   $username = $data['username'];
   $password = $data['password'];
   $setPassword = $data['oldPassword'];
   $id = $data['id'];


   // validasi verifiaksi salah
   if ($password) {
      if ($password !== $verifikasi) {
         echo "<script> alert('Verifikasi Password Salah');</script>";
         return false;
      }
      $password = password_hash($password, PASSWORD_DEFAULT);
      $setPassword = $password;
   }


   $query = "UPDATE user SET nama='$nama', kelamin = '$kelamin', telpon='$telpon', username='$username', password='$setPassword' where id='$id'";
   mysqli_query($conn, $query);

   header('location:login.php');
   return mysqli_affected_rows($conn);
}
