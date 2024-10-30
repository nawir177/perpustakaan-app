<?php
// Koneksi ke database menggunakan PDO
$host = 'localhost'; // Ganti dengan host database Anda
$dbname = 'perpustakaan'; // Nama database
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die('Connection failed: ' . $e->getMessage());
}

function ubahPassword($data)
{
    global $pdo;

    // Ambil data dari parameter array
    $pwLama = $data['password-lama'];
    $pwBaru = $data['password-baru'];
    $verifikasi = $data['verifikasi']; // Diperbaiki dari 'verifiakasi'
    $userId = $data['user_id'];

    // Periksa apakah password baru dan verifikasi cocok
    if ($pwBaru !== $verifikasi) {
        return false;
    }

    try {
        // Mulai transaksi
        $pdo->beginTransaction();

        // Ambil password hash lama dari database
        $stmt = $pdo->prepare("SELECT password FROM user WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result || !password_verify($pwLama, $result['password'])) {
            $pdo->rollBack();
            return false; // Password lama tidak cocok
        }

        // Update password baru
        $newHash = password_hash($pwBaru, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE user SET password = :password WHERE id = :id");
        $stmt->execute(['password' => $newHash, 'id' => $userId]);

        // Commit transaksi
        $pdo->commit();
        return true;
    } catch (PDOException $e) {
        $pdo->rollBack();
        return false; // Error dalam proses
    }
}
