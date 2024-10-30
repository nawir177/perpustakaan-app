<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{
   global $conn;
 
   $judul = htmlspecialchars($data['judul']);
   $pengarang = htmlspecialchars($data['pengarang']);
   $kategori = htmlspecialchars($data['kategori']);



 

   $query = "INSERT INTO katalog VALUES ('','$judul','$pengarang', '$kategori')";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}


function edit($data)
{
   global $conn;
   $id = htmlspecialchars($data['id']);
   $judul = htmlspecialchars($data['judul']);
   $pengarang = htmlspecialchars($data['pengarang']);
 
   $kategori = htmlspecialchars($data['id_kategori']); // Sesuaikan dengan nama kolom yang benar
  
 
   $query = "UPDATE katalog SET 
                judul='$judul', 
                pengarang='$pengarang', 
              
                id_kategori='$kategori'
                
              WHERE id='$id'";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}




function upload()
{
   $namaFile = $_FILES['image']['name'];
   $ukuranFile = $_FILES['image']['size'];
   $error = $_FILES['image']['error'];
   $tmpName = $_FILES['image']['tmp_name'];

   // Cek apakah tidak ada gambar yang diupload
   if ($error === 4) {
      echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
      return false;
   }

   // Cek apakah yang diupload adalah gambar
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));
   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
                alert('Yang Anda upload bukan gambar!');
              </script>";
      return false;
   }

   // Cek jika ukurannya terlalu besar
   if ($ukuranFile > 2000000) {
      echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
      return false;
   }

   // Lolos pengecekan, gambar siap diupload
   // Generate nama gambar baru
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;

   move_uploaded_file($tmpName, __DIR__ . '/image/' . $namaFileBaru);

   return $namaFileBaru;
}
