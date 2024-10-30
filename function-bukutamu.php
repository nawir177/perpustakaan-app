	<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';
	function kirimEmail()
	{
		$pengirim = 'fauziyusarahman@gmail.com';
		$subjek = 'Notifikasi Buku Tamu';
		$pesan = "<h1> Data masuk dari buku tamu ... </h1>";
		$tujuan = ['fyusarahman@gmail.com', 'm.nawir177@gmail.com'];
		$mail = new PHPMailer(true);

		try {
			foreach ($tujuan as $t) {
				// Konfigurasi SMTP
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'fyusarahman@gmail.com';
				$mail->Password = 'hyksfstubnnrbqvb';
				$mail->SMTPSecure = 'tls';
				$mail->Port = 587;

				// Pengaturan email
				$mail->setFrom($pengirim);
				$mail->addAddress($t);
				$mail->isHTML(true);
				$mail->Subject = $subjek;
				$mail->Body = $pesan;

				$mail->send();
			}
			echo "<script>alert('pesan berhasil di kirimkan')</script>";
		} catch (Exception $e) {
			echo "Gagal mengirim email: {$mail->ErrorInfo}";
		}
	}
