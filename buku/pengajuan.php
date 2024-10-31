<?php
session_start();
include '../admin/controller.php';
$user_id = $_SESSION['user'];

function setNotification($user, $content)
{
   global $conn;
   $query = "INSERT INTO notifikasi (anggota_id, content, time) VALUES ('$user', '$content', NOW())";
   $result = mysqli_query($conn, $query);
   if (!$result) {
    echo "<script>alert('Gagal menambahkan notifikasi')</script>";
   }
}


// Ambil ID dari query string
$id = $_GET['id'];

// Format tanggal sesuai Indonesia (dd/mm/YYYY)
$tanggal = date('d/m/Y');

// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

// Periksa koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$anggota  = where('anggota','user_id',$user_id)[0];

if($anggota['verifikasi']==0){

  echo "<script>alert('data anda belum di verifikasi');location.href='index.php'</script>";
  exit;
};


// Buat query untuk menyimpan data pengajuan
$query = "INSERT INTO pengajuan (tanggal, id_user, id_buku) VALUES ('$tanggal', $user_id, $id)";

// Jalankan query
if (mysqli_query($conn, $query)) {
  echo "<script>alert('Data pengajuan berhasil ditambah');location.href='index.php'</script>";
} else {
  echo "<script>alert('Data gagal ditambah');</script>";
  echo "Error: " . mysqli_error($conn);
}

setNotification($anggota['id'], "Melakukan pengajuan peminjaman dengan judul buku ".show('buku',$id)['judul']);
// Tutup koneksi database
mysqli_close($conn);
