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
   $kategori = htmlspecialchars($data['kategori']);
   $deskripsi = htmlspecialchars($data['deskripsi']);

   // Upload gambar
   $image = upload();
   if (!$image) {
      return false;
   }

   // Upload file e-book
   $file = uploadFile();
   if (!$file) {
      return false;
   }

   $query = "INSERT INTO e_book VALUES ('','$tanggal','$kategori', '$judul','$pengarang', '$penerbit','$tahun_terbit','$deskripsi','$image','$file')";

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
   $kategori = htmlspecialchars($data['id_kategori']); // Sesuaikan dengan nama kolom yang benar
   $deskripsi = htmlspecialchars($data['deskripsi']);
   $imageLama = htmlspecialchars($data['oldImage']);
   $fileLama = htmlspecialchars($data['fileLama']);

   // Cek apakah user pilih gambar baru atau tidak
   if ($_FILES['image']['error'] === 4) {
      $image = $imageLama;
   } else {
      $image = upload();
      if (!$image) {
         return false;
      }
      // Hapus gambar lama jika ada gambar baru
      if ($imageLama && file_exists('image/'.$imageLama)) {
         unlink('image/'.$imageLama);
      }
   }

   // Cek apakah user pilih file baru atau tidak
   if ($_FILES['file']['error'] === 4) {
      $file = $fileLama;
   } else {
      $file = uploadFile();
      if (!$file) {
         return false;
      }
      // Hapus file lama jika ada file baru
      if ($fileLama && file_exists(__DIR__ . '/file-book/' . $fileLama)) {
         unlink('file-book/'.$fileLama);
      }
   }


   $query = "UPDATE e_book SET 
                judul = '$judul',
                pengarang = '$pengarang',
                penerbit = '$penerbit',
                tahun_terbit = '$tahun_terbit',
                id_kategori = '$kategori',
                deskripsi = '$deskripsi',
                image = '$image',
                file = '$file'
              WHERE id = '$id'";

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

function uploadFile()
{
   $namaFile = $_FILES['file']['name'];
   $ukuranFile = $_FILES['file']['size'];
   $error = $_FILES['file']['error'];
   $tmpName = $_FILES['file']['tmp_name'];

   // Cek apakah tidak ada file yang diupload
   if ($error === 4) {
      echo "<script>
                alert('Pilih file e-book terlebih dahulu!');
              </script>";
      return false;
   }

   // Cek apakah yang diupload adalah file PDF
   $ekstensiFileValid = ['pdf'];
   $ekstensiFile = explode('.', $namaFile);
   $ekstensiFile = strtolower(end($ekstensiFile));
   if (!in_array($ekstensiFile, $ekstensiFileValid)) {
      echo "<script>
                alert('Yang Anda upload bukan file PDF!');
              </script>";
      return false;
   }

   // Cek jika ukurannya terlalu besar
   if ($ukuranFile > 20000000) {
      echo "<script>
                alert('Ukuran file terlalu besar!');
              </script>";
      return false;
   }

   // Lolos pengecekan, file siap diupload
   // Generate nama file baru
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiFile;

   move_uploaded_file($tmpName, __DIR__ . '/file-book/' . $namaFileBaru);

   return $namaFileBaru;
}
