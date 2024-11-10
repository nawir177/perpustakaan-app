<?php
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function getFilter($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    $conditions = [];

    // Filter by month
    if (isset($_GET['bulan']) && $_GET['bulan'] != "") {
        $bulan = mysqli_real_escape_string($conn, $_GET['bulan']);
        $conditions[] = "DATE_FORMAT(STR_TO_DATE(tanggal, '%d/%m/%Y'), '%m') = '$bulan'";
    }

    // Filter by year
    if (isset($_GET['tahun']) && $_GET['tahun'] != "") {
        $tahun = mysqli_real_escape_string($conn, $_GET['tahun']);
        $conditions[] = "DATE_FORMAT(STR_TO_DATE(tanggal, '%d/%m/%Y'), '%Y') = '$tahun'";
    }

    // Filter by status
    if (isset($_GET['status']) && $_GET['status'] != "") {
        $status = mysqli_real_escape_string($conn, $_GET['status']);
        $conditions[] = "status = '$status'";
    }

    // Combine conditions with AND
    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $rows = [];
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $rows;
}

function getFilterPemasukan(){
   global $conn;
   $query = "SELECT * FROM pemasukan";
   $rows = [];

   if(isset($_GET['sumber'])){
      $sumber = mysqli_real_escape_string($conn, $_GET['sumber']);
      $query .= " WHERE sumber = '$sumber'";
   }

   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}




function all($table)
{
   // Pastikan Anda mengurutkan berdasarkan kolom yang sesuai untuk menampilkan data terbaru
   $query = "SELECT * FROM $table ORDER BY id DESC";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}


function dateFormat($tanggal)
{
   // Mendefinisikan array nama hari
   $namaHari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

   // Mengecek format tanggal dalam tabel
   if (strpos($tanggal, '-') !== false) {
      // Jika format tanggal adalah Y-m-d (seperti 2023-12-02)
      // Mengonversi tanggal ke format timestamp
      $timestamp = strtotime($tanggal);
   } else {
      // Jika format tanggal adalah d-m-Y (seperti 02/12/2023)
      // Mengonversi tanggal ke format timestamp
      $timestamp = strtotime(str_replace('/', '-', $tanggal));
   }

   // Mendapatkan nama hari dari timestamp
   $hari = date('w', $timestamp);
   $namaHari = $namaHari[$hari];

   // Mendapatkan format tanggal DD-MM-YYYY
   $formatTanggal = date('d-m-Y', $timestamp);

   // Menggabungkan nama hari dan format tanggal
   $hasil = $namaHari . ', ' . $formatTanggal;

   return $hasil;
}


function show($table, $id)
{
   $query = "SELECT * FROM $table WHERE id='$id'";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows[0];
}

function where($table, $where, $isWhere)
{
   $query = "SELECT * FROM $table WHERE $where='$isWhere'";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}
function userPengembalian($idPeminjaman)
{
   // Extract 'id' values from the array
   $ids = [];
   foreach ($idPeminjaman as $item) {
      $ids[] = intval($item['id']);
   }

   // Convert array to a comma-separated string for use in the IN clause
   $idString = implode(',', $ids);

   // Prepare the query using the IN clause
   $query = "SELECT * FROM pengembalian WHERE id_peminjaman IN ($idString)";

   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);

   // Fetch the results and store them in the $rows array
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   return $rows;
}

function wherePeminjaman($table, $where, $isWhere)
{
   $query = "SELECT id FROM $table WHERE $where='$isWhere'";
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}

function delete($table, $id)
{
   global $conn;

   $query = mysqli_query($conn, "DELETE $table WHERE id = '$id'");
   if (mysqli_affected_rows($conn) > 0) {
      echo "<script>alert('Data berhasil di hapus')</script>";
   } else {
      echo "<script>alert('Data Gagal di hapus')</script>";
      return mysqli_error($conn);
   }
}

function hasOne($id_relation, $table_relation, $field)
{

   $conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
   $query = "SELECT $field FROM $table_relation WHERE id = $id_relation";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      die("Error in query: " . mysqli_error($conn));
   }

   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   // Check if the query returned a result
   if ($row) {
      return $row[$field];
   } else {
      return null; // Return null if no result is found
   }
}
function beLongs($id_relation, $table_relation, $field)
{

   $conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');
   $query = "SELECT $field FROM $table_relation WHERE user_id = $id_relation";
   $result = mysqli_query($conn, $query);

   if (!$result) {
      die("Error in query: " . mysqli_error($conn));
   }

   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

   // Check if the query returned a result
   if ($row) {
      return $row[$field];
   } else {
      return null; // Return null if no result is found
   }
}
function bulan($bulan)
{
   $bulanDict = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember'
   );

   // Mengembalikan hasil bulan saja
   return $bulanDict[$bulan];
}

// new book functino
function newData($table, $limit)
{
   $query = "SELECT * FROM $table ORDER BY id DESC LIMIT $limit"; // Asumsikan bahwa kolom id menyimpan urutan data
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}

// filter book
function filterBook($keyFilter)
{
   $query = "SELECT * FROM e_book where id_kategori='$keyFilter' LIMIT 8"; // Asumsikan bahwa kolom id menyimpan urutan data
   global $conn;
   $rows = [];
   $result = mysqli_query($conn, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }
   return $rows;
}


function grafik()
{
   global $conn;
   $q = "SELECT k.nama, COUNT(p.id_buku) as jumlah 
          FROM peminjaman p
          JOIN buku b ON p.id_buku = b.id
          JOIN kategori k ON b.id_kategori = k.id
          GROUP BY k.nama";

   $result = mysqli_query($conn, $q);
   $counts = []; // Array untuk menyimpan jumlah kemunculan setiap nama_kategori

   while ($row = mysqli_fetch_assoc($result)) {
      $nama_kategori = $row['nama'];
      $jumlah = $row['jumlah'];

      // Menyimpan jumlah kemunculan berdasarkan nama_kategori
      $counts[$nama_kategori] = $jumlah;
   }

   return $counts;
}


function timeAgo($timestamp) {
   // Ubah menjadi timestamp jika inputnya adalah string tanggal
   if (!is_numeric($timestamp)) {
       $timestamp = strtotime($timestamp);
   }

   $time = time() - $timestamp; // selisih waktu dalam detik
   $units = [
       'tahun' => 365*24*60*60,
       'bulan' => 30*24*60*60,
       'minggu' => 7*24*60*60,
       'hari' => 24*60*60,
       'jam' => 60*60,
       'menit' => 60,
       'detik' => 1,
   ];

   foreach ($units as $unit => $value) {
       $elapsed = floor($time / $value);
       if ($elapsed >= 1) {
           return "$elapsed $unit" . ($elapsed > 1 ? '' : '') . " yang lalu";
       }
   }

   return "baru saja";
}

