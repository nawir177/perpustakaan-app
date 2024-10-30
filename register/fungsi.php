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

// Fungsi register dengan transaksi dan penanganan error
function register($data)
{
  global $pdo;

  // Ambil data dari parameter array
  $nis = $data['nis'];
  $nama = $data['name'];
  $kelamin = $data['gender'];
  $tempat_lahir = $data['birthplace'];
  $tanggal_lahir = $data['birthdate'];
  $email = $data['email'];
  $telepon = $data['phone'];
  $username = $data['username'];
  $password = $data['password'];
  $confirm_password = $data['confirm_password'];
  $alamat = $data['alamat'];

  // Validasi password
  if ($password !== $confirm_password) {
    return 'Konfirmasi password salah';
  }

  // Upload gambar (fungsi upload harus diimplementasikan)
  $image = upload();
  if (!$image) {
    return 'Gagal mengunggah gambar';
  }

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Mulai transaksi
  try {
    $pdo->beginTransaction();

    // Masukkan data ke tabel user
    $stmt = $pdo->prepare("INSERT INTO user (nama, kelamin, telpon, email, username, password, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nama, $kelamin, $telepon, $email, $username, $hashed_password, false]);

    // Dapatkan ID user yang baru saja ditambahkan
    $user_id = $pdo->lastInsertId();

    // Masukkan data ke tabel anggota
    $stmt = $pdo->prepare("INSERT INTO anggota (user_id, nis, nama, tempat_lahir, tanggal_lahir, kelamin, TA, alamat, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $nis, $nama, $tempat_lahir, $tanggal_lahir, $kelamin, 2024, $alamat, $image]);

    // Commit transaksi jika semua query berhasil
    $pdo->commit();

    return 'Pendaftaran berhasil';
  } catch (Exception $e) {
    // Rollback transaksi jika terjadi kesalahan
    $pdo->rollBack();
    return 'Pendaftaran gagal: ' . $e->getMessage();
  }

}

// Contoh fungsi upload
function upload()
{
  // Pastikan file telah diunggah tanpa error
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['foto']['tmp_name'];
    $fileName = $_FILES['foto']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Tentukan ekstensi file yang diperbolehkan
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');

    // Periksa apakah file memiliki ekstensi yang diizinkan
    if (in_array($fileExtension, $allowedfileExtensions)) {
      $uploadFileDir = '../admin/anggota/image/';
      $dest_path = $uploadFileDir . $fileName;

      // Pindahkan file ke direktori tujuan
      if (move_uploaded_file($fileTmpPath, $dest_path)) {
        return $dest_path;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}
