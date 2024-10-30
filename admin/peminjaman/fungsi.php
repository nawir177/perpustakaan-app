<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function tambah($data)
{
    global $conn;
    $id_buku = $data['id_buku']; // This is now an array
    $id_anggota = $data['id_anggota'];
    $tanggal_kembali = $data['tanggal_kembali'];
    $tanggal_peminjaman = date('Y-m-d'); // Use Y-m-d format for the database

    // Initialize a variable to track successful insertions
    $successfulInserts = 0;

    foreach ($id_buku as $id) {
        // Fetch the book details
        $buku = show('buku', $id);
        
        // Check if there's enough stock
        if ($buku['jumlah'] > 0) {
            // Decrement the stock
            $minJumlah = $buku['jumlah'] - 1;
            $qKurangBuku = "UPDATE buku SET jumlah='$minJumlah' WHERE id ='$id'";
            mysqli_query($conn, $qKurangBuku);
            
            // Insert the loan record
            $qInsert = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal, tanggal_kembali, status) VALUES ('$id_anggota', '$id', '$tanggal_peminjaman', '$tanggal_kembali', 'dipinjam')";
            mysqli_query($conn, $qInsert);
            
            // Increment the success count
            if (mysqli_affected_rows($conn) > 0) {
                $successfulInserts++;
            }
        }
    }

    return $successfulInserts; // Return the number of successful inserts
}


function edit($data)
{
   global $conn;
   $id_buku = $data['id_buku'];
   $id_anggota = $data['id_anggota'];
   $tanggal_kembali = $data['tanggal_kembali'];
   $id = $data['id'];

   mysqli_query($conn, "UPDATE peminjaman SET id_buku='$id_buku', id_anggota='$id_anggota', tanggal_kembali='$tanggal_kembali' WHERE id='$id'");
   return mysqli_affected_rows($conn);
}


function cekTanggalPinjaman($tanggal_pinjam, $tanggal_kembali)
{
   // Konversi tanggal pinjam dari format d/m/Y ke Y-m-d
   $tanggalPinjam = DateTime::createFromFormat('d/m/Y', $tanggal_pinjam)->format('Y-m-d');

   // Tanggal kembali sudah dalam format Y-m-d, tidak perlu diubah
   $tanggalKembali = $tanggal_kembali;

   // Mengubah format ke timestamp
   $timestampPinjam = strtotime($tanggalPinjam);
   $timestampKembali = strtotime($tanggalKembali);

   // Memeriksa apakah tanggal pinjaman melebihi tanggal kembali
   return $timestampPinjam > $timestampKembali;
}
function isPastDueDate($tanggal_kembali)
{
   $tanggalKembali = strtotime($tanggal_kembali);
   $tanggalSekarang = strtotime(date('Y-m-d'));

   return $tanggalSekarang > $tanggalKembali;
}



function kirimEmailPemberitahuan($data)
{
   $emailPenerima = $data['penerima'];
   $tanggalKembali = $data['kembali'];
   $namaBuku = $data['buku'];
   $mail = new PHPMailer(true);

   try {
      // Konfigurasi server email
      $mail->isSMTP(); // Set mailer ke menggunakan SMTP
      $mail->Host = 'smtp.gmail.com'; // Tentukan SMTP server
      $mail->SMTPAuth = true; // Aktifkan autentikasi SMTP
      $mail->Username = 'nurbaity4894@gmail.com'; // Username SMTP
      $mail->Password = 'onaqmtqlynpftsml'; // Password SMTP
      $mail->SMTPSecure = 'tls'; // Aktifkan enkripsi TLS, bisa juga `ssl`
      $mail->Port = 587; // Port TCP yang digunakan

      // Pengirim dan Penerima
      $mail->setFrom('no-reply@perpustakaan.com', 'Perpustakaan Madrasah Tsanawiyah Negeri 1');
      $mail->addAddress($emailPenerima); // Tambahkan penerima

      // Konten Email
      $mail->isHTML(true); // Set email format ke HTML
      $mail->Subject = 'Pemberitahuan Pengembalian Buku Terlambat';
      $mail->Body = "
Dear Pengguna,<br><br>
Kami ingin mengingatkan Anda bahwa buku yang Anda pinjam, '$namaBuku', sudah melewati tanggal pengembalian yang seharusnya pada $tanggalKembali.<br><br>
Mohon segera mengembalikan buku tersebut untuk menghindari denda keterlambatan.<br><br>
Terima kasih.<br><br>
Perpustakaan MADRASAH (SIPMAD)
<br>
MTSN 1 Kota Banjarmasin
";

      // Mengirim email
      $mail->send();
      return true;
   } catch (Exception $e) {
      echo "<script>alert('Email tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}')</script>";
      return false;
   }
}
