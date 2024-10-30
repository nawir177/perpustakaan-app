<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

function kirimEmailPemberitahuan($emailPenerima, $tanggalKembali, $namaBuku)
{
  $mail = new PHPMailer(true);

  try {
    // Konfigurasi server email
    $mail->isSMTP(); // Set mailer ke menggunakan SMTP
    $mail->Host = 'smtp.example.com'; // Tentukan SMTP server
    $mail->SMTPAuth = true; // Aktifkan autentikasi SMTP
    $mail->Username = 'nurbaity4894@gmail.com'; // Username SMTP
    $mail->Password = 'onaqmtqlynpftsml'; // Password SMTP
    $mail->SMTPSecure = 'tls'; // Aktifkan enkripsi TLS, bisa juga `ssl`
    $mail->Port = 587; // Port TCP yang digunakan

    // Pengirim dan Penerima
    $mail->setFrom('no-reply@perpustakaan.com', 'Perpustakaan Anda');
    $mail->addAddress($emailPenerima); // Tambahkan penerima

    // Konten Email
    $mail->isHTML(true); // Set email format ke HTML
    $mail->Subject = 'Pemberitahuan Pengembalian Buku Terlambat';
    $mail->Body = "
Dear Pengguna,<br><br>
Kami ingin mengingatkan Anda bahwa buku yang Anda pinjam, '$namaBuku', sudah melewati tanggal pengembalian yang seharusnya pada $tanggalKembali.<br><br>
Mohon segera mengembalikan buku tersebut untuk menghindari denda keterlambatan.<br><br>
Terima kasih.<br><br>
Perpustakaan Anda
";

    // Mengirim email
    $mail->send();
    return true;
  } catch (Exception $e) {
    echo "Email tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}";
    return false;
  }
}

?>