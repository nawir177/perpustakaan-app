<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{
   global $conn;
   $tanggal = date('d/m/Y');
   $judul = htmlspecialchars($data['judul']);
   $pengarang = htmlspecialchars($data['pengarang']);
   $penerbit = htmlspecialchars($data['penerbit']);
   $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
   $isbn = htmlspecialchars($data['isbn']);
   $jumlah = htmlspecialchars($data['jumlah']);
   $lokasi = htmlspecialchars($data['lokasi']);
   $kategori = htmlspecialchars($data['kategori']);
   $deskripsi = htmlspecialchars($data['deskripsi']);
   $bulan = 'bulan';
   $tahun = '2023';
   $pemilik = htmlspecialchars($data['pemilik']);
   $ketersediaan = htmlspecialchars($data['ketersediaan']);


   // Upload gambar
   $image = upload();
   if (!$image) {
      return false;
   }

   $query = "INSERT INTO buku VALUES ('','$kategori','$tanggal', '$judul','$pengarang', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$lokasi','$deskripsi','$image')";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}


function edit($data)
{
   global $conn;
   $id = htmlspecialchars($data['id']);
   $judul = htmlspecialchars($data['judul']);
   $pengarang = htmlspecialchars($data['pengarang']);
   $penerbit = htmlspecialchars($data['penerbit']);
   $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
   $isbn = htmlspecialchars($data['isbn']);
   $jumlah = htmlspecialchars($data['jumlah']);
   $lokasi = htmlspecialchars($data['lokasi']);
   $kategori = htmlspecialchars($data['id_kategori']); // Sesuaikan dengan nama kolom yang benar
   $deskripsi = htmlspecialchars($data['deskripsi']);
   $imageLama = htmlspecialchars($data['imageLama']);

   // Cek apakah user pilih gambar baru atau tidak
   if ($_FILES['image']['error'] === 4) {
      $image = $imageLama;
   } else {
      $image = upload();
      if (!$image) {
         return false;
      }
      // Hapus gambar lama jika ada gambar baru
      if ($imageLama && file_exists(__DIR__ . '/image/' . $imageLama)) {
         unlink(__DIR__ . '/image/' . $imageLama);
      }
   }

   $query = "UPDATE buku SET 
                judul='$judul', 
                pengarang='$pengarang', 
                penerbit='$penerbit', 
                tahun_terbit='$tahun_terbit', 
                isbn='$isbn', 
                jumlah='$jumlah', 
                lokasi='$lokasi', 
                id_kategori='$kategori', 
                deskripsi='$deskripsi', 
                image='$image' 
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
