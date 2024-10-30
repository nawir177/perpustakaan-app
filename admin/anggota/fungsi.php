<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{
   $nis = $data['nis'];
   $nama = $data['nama'];
   $kelamin = $data['kelamin'];
   $tempat_lahir = $data['tempat_lahir'];
   $tanggal_lahir = $data['tanggal_lahir'];
   $ta = $data['TA'];
   $email =$data['email'];
   global $conn;
   $query = "INSERT INTO anggota VALUES('','$nis','$nama','$email','$tempat_lahir','$tanggal_lahir', '$kelamin','$ta')";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function edit($data){

   $nis = $data['nis'];
   $nama = $data['nama'];
   $kelamin = $data['kelamin'];
   $tempat_lahir = $data['tempat_lahir'];
   $tanggal_lahir = $data['tanggal_lahir'];
   $email =$data['email'];
   $ta = $data['TA'];
   $id = $data['id'];
   global $conn;
   $query = "UPDATE anggota SET nis ='$nis', nama='$nama',email ='$email', kelamin='$kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', TA='$ta' WHERE id ='$id'";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}
