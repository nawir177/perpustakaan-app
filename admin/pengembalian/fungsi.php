<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
function status($tanggal_kembali, $tanggal_target)
{
   // Mengonversi string tanggal menjadi objek DateTime
   $tanggal_kembali_obj = new DateTime($tanggal_kembali);
   $tanggal_target_obj = new DateTime($tanggal_target);

   // Membandingkan tanggal pinjam dan tanggal kembali
   if ($tanggal_kembali_obj > $tanggal_target_obj) {
      return "Terlambat";
   } else {
      return "Ontime";
   }
}

function hitungDenda($tanggalTargetKembali, $tanggalKembali, $id_peminjaman, $id_buku)
{
   global $conn;
   $formatTanggal = "Y-m-d";

   // Konversi string tanggal menjadi objek DateTime
   $tanggalTargetKembaliObj = DateTime::createFromFormat($formatTanggal, $tanggalTargetKembali);
   $tanggalKembaliObj = DateTime::createFromFormat($formatTanggal, $tanggalKembali);

   // Hitung selisih hari
   $selisihHari = $tanggalKembaliObj->diff($tanggalTargetKembaliObj)->days;

   // Tentukan aturan denda
   $dendaPerHari = 1000;

   // Hitung denda hanya jika terlambat lebih dari 3 hari
   $denda = ($selisihHari > 3) ? ($selisihHari - 3) * $dendaPerHari : 0;

   // Simpan denda ke dalam database jika ada
   if ($denda > 0) {
      mysqli_query($conn, "INSERT INTO pemasukan VALUES('', '$id_peminjaman', '$id_buku', '$denda')");
   }

   return $denda;
}


function tambah($data)
{
   global $conn;
   $tanggal_kembali =  $data['tanggal_kembali'];
   $id_peminjaman = $data['id_peminjaman'];
   $tanggal_target_kembali = $data['tanggal_target_kembali'];
   $status = status($tanggal_kembali, $tanggal_target_kembali);
   $peminjaman = show('peminjaman',$id_peminjaman);
   $buku = show('buku',$peminjaman['id_buku']);
   $jumlahBuku = $buku['jumlah'];
   $plusJumlah = $jumlahBuku+1;
   $idBuku = $peminjaman['id_buku'];
   $denda = hitungDenda($tanggal_target_kembali, $tanggal_kembali, $id_peminjaman, $idBuku);
   $qTambahJumlah = "UPDATE buku SET jumlah='$plusJumlah' where id = '$idBuku'";

   $tanggal_kembali = date('d/m/Y', strtotime($tanggal_kembali));
   $query = "INSERT into pengembalian VALUES('', '$id_peminjaman', '$tanggal_kembali', '$status','$denda')";
   $query2 = "UPDATE peminjaman SET status='dikembalikan' WHERE id ='$id_peminjaman'";

   $idAnggota = show('peminjaman',$id_peminjaman)['id_anggota'];

   setNotification($idAnggota, "Buku dengan judul $buku[judul] telah dikembalikan");

   mysqli_query($conn, $qTambahJumlah);
   mysqli_query($conn, $query);
   mysqli_query($conn, $query2);

   return mysqli_affected_rows($conn);
}

function edit($data)
{

   global $conn;
   $tanggal_kembali = $data['tanggal_kembali'];
   $id_peminjaman = $data['id_peminjaman'];
   $id_pengembalian = $data['id_pengembalian'];
   $tanggal_target_kembali = $data['tanggal_target_kembali'];
   $status = status($tanggal_kembali, $tanggal_target_kembali);
   $id_buku = $data['id_buku'];
   $denda = hitungDenda($tanggal_target_kembali, $tanggal_kembali,$id_peminjaman, $id_buku);

   $tanggal_kembali = date('d/m/Y', strtotime($tanggal_kembali));
   $query = "UPDATE pengembalian SET id_peminjaman='$id_peminjaman', tanggal='$tanggal_kembali', status='$status', denda='$denda' WHERE id='$id_pengembalian'";

   $query2 = "UPDATE peminjaman SET status='dikembalikan' WHERE id ='$id_peminjaman'";

   mysqli_query($conn, $query);
   mysqli_query($conn, $query2);

   return 1;
}

function cekTanggalPinjaman($tanggal_pinjam, $tanggal_kembali)
{
   $tanggalPinjam = strtotime($tanggal_pinjam);
   $tanggalKembali = strtotime($tanggal_kembali);

   // Memeriksa apakah tanggal pinjaman melebihi tanggal kembali
   if ($tanggalPinjam > $tanggalKembali) {
      return true;
   } else {
      return false;
   }
}

function setNotification($user, $content)
{
   global $conn;
   $query = "INSERT INTO notifikasi (anggota_id, content, time) VALUES ('$user', '$content', NOW())";
   $result = mysqli_query($conn, $query);
   // if ($result) {
   //    echo "<script>alert('Berhasil menambahkan notifikasi')</script>";
   // } else {
   //    echo "<script>alert('Gagal menambahkan notifikasi')</script>";
   // }
}

