

<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{

   global $conn;
   $id_buku = $data['id_buku'];
   $tanggal = $data['tanggal'];
   $ket = $data['keterangan'];
   $kondisi = $data['kondisi'];
   $ket = $data['ket'];
   $jumlah = $data['jumlah'];


   $query = "INSERT INTO kondisi_buku VALUES('','$id_buku','$tanggal','$kondisi','$ket','$jumlah')";

   mysqli_query($conn, $query);


   return mysqli_affected_rows($conn);
}

function update($data)
{
   global $conn;

   $id = $data['id'];
   $tanggal = $data['tanggal'];
   $jumlah = $data['jumlah'];
   $kondisi = $data['kondisi'];
   $ket = $data['ket'];

   $query = "UPDATE kondisi_buku SET tanggal='$tanggal', jumlah='$jumlah', kondisi='$kondisi', keterangan='$ket' WHERE id='$id'";

   return mysqli_query($conn, $query);
}
