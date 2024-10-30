<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function tambah($data)
{
   global $conn;
   $tanggal = date('d/m/Y');
   $nama = htmlspecialchars($data['nama']);
   $harga= htmlspecialchars($data['harga']);
   $jumlah = htmlspecialchars($data['jumlah']);
   $total = htmlspecialchars($data['total']);

   
   $query = "INSERT INTO pengeluaran VALUES ('','$tanggal','$nama', '$harga','$jumlah', '$total')";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}


function edit($data, $id)
{
   global $conn;
   $nama = htmlspecialchars($data['nama']);
   $harga = htmlspecialchars($data['harga']);
   $jumlah = htmlspecialchars($data['jumlah']);
   $total = htmlspecialchars($data['total']);

   // Update query
   $query = "UPDATE pengeluaran SET 
                nama = '$nama', 
                harga = '$harga', 
                jumlah = '$jumlah', 
                total = '$total' 
              WHERE id = $id";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}
