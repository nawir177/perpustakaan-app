<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{

   global $conn;
 
   $nama = $data['nama'];
  


   $query = "INSERT INTO kategori VALUES('','$nama')";

   mysqli_query($conn, $query);


   return mysqli_affected_rows($conn);
}

function edit($data)
{
   global $conn;

   $id = $data['id'];
   $nama = $data['nama'];
  

   $query = "UPDATE kategori SET nama='$nama' WHERE id='$id'";

   return mysqli_query($conn, $query);
}
