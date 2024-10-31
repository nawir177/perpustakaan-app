-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2024 pada 13.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `username`, `tanggal`, `waktu`, `tujuan`) VALUES
(7, 9, 'amel', '20/08/2024', '04:09:32', 'berkunjung'),
(8, 9, 'amel', '20/08/2024', '04:09:49', 'membaca buku'),
(9, 9, 'amel', '20/08/2024', '04:10:05', 'me wifi'),
(10, 9, 'amel', '20/08/2024', '04:10:21', 'cari buku'),
(11, 9, 'amel', '20/08/2024', '04:10:40', 'pinjam buku'),
(12, 13, 'baity', '20/08/2024', '04:19:50', 'cari buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_tamu`
--

CREATE TABLE `absensi_tamu` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `tujuan` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi_tamu`
--

INSERT INTO `absensi_tamu` (`id`, `nama`, `instansi`, `tujuan`, `tanggal`, `waktu`) VALUES
(1, 'nawir', 'uniska', 'baca buku', '19/08/2024', '07:22:47'),
(2, 'nawir', 'uniska', 'kerjaka tugas', '19/08/2024', '15:19:49'),
(3, 'baity', 'ww', 'www', '19/08/2024', '17:26:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT 'm.nawir177@gmail.com',
  `telpon` varchar(15) NOT NULL DEFAULT '082255445566',
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `TA` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `verifikasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `nis`, `nama`, `email`, `telpon`, `tempat_lahir`, `tanggal_lahir`, `kelamin`, `TA`, `alamat`, `foto`, `verifikasi`) VALUES
(18, 9, '123', 'amelia', 'Nurbaity4894@gmail.com', '082255445566', 'banjarmasin', '2012-10-19', 'perempuan', '2024', '1111', '../admin/anggota/image/kemenag.png', 1),
(19, 10, '123', 'nadiatul', 'ibrahimmuhammad0314@gmail.com', '082255445566', 'banjarmasin', '2010-03-04', 'perempuan', '2024', 'jl. vetran', '../admin/anggota/image/Foto baity.JPG', 1),
(20, 11, '1234', 'ramlah', 'Nurbaity4894@gmail.com', '082255445566', 'banjarmasin', '2010-08-19', 'perempuan', '2024', 'jl. pemurus', '../admin/anggota/image/Foto baity.JPG', 1),
(21, 12, '12345', 'ahmad salaby', 'Nurbaity4894@gmail.com', '082255445566', 'banjarmasin', '2009-08-07', 'perempuan', '2024', 'jl. sungai andai', '../admin/anggota/image/Foto baity.JPG', 1),
(22, 13, '123456', 'Nur Baity', 'ibrahimmuhammad0314@gmail.com', '082255445566', 'banjarmasin', '2006-08-12', 'perempuan', '2024', 'jl, sungai andai', '../admin/anggota/image/Foto baity.JPG', 1),
(23, 14, '1234567', 'agustina', 'Nurbaity4894@gmail.com', '082255445566', 'banjarmasin', '2009-08-19', 'perempuan', '2024', 'jl. sungai andai', '../admin/anggota/image/Foto baity.JPG', 1),
(24, 15, '123', 'ana', 'nurbaity4894@gmail.com', '082255445566', 'banjarmasin', '2024-08-21', '', '2024', 'jl. sungai andai', '../admin/anggota/image/Foto baity.JPG', 0),
(25, 16, '456', 'ajeng', 'm.nawir177@gmail.com', '082255445566', 'banjarmasin', '2002-08-12', 'Perempuan', '2024', 'jl. sungai andai', '../admin/anggota/image/Foto baity.JPG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT 1,
  `tanggal` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(50) NOT NULL,
  `isbn` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_kategori`, `tanggal`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah`, `lokasi`, `deskripsi`, `image`) VALUES
(12, 1, '11/02/2024', 'matematika', 'Abdur Rahman As’ari, Mohammad Tohir, Erik Valentino, Zainul Imron, dan Ibnu Taufiq', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud', '2017', '978-602-282-984-3', 23, 'rak 1', 'Buku Matematika Kelas VII', '66c3d52ce6f12.jpeg'),
(13, 1, '20/02/2024', 'Bahasa Indonesia ', 'Titik Harsiati, Agus Trianto, dan E. Kosasih', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud', '2017', '978-602-282-968-3', 17, 'rak 2', 'Buku Bahasa Indonesia Kelas VII', '66c3d5857353d.jpg'),
(14, 1, '20/02/2024', 'Bahasa Inggris ', 'Ika Lestari Damayanti, Yusnita Febrianti, Pipit Prihartanti Suharto, Iyen Nurlaelawati, Aji Jehan Fe', 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi ', '2022', '978-602-244-884-6', 18, 'rak 1', 'Buku Bahasa Inggris Kelas 9', '66c3d5fb6d881.jpeg'),
(18, 1, '23/07/2024', 'Ilmu Pengetahuan Alam', 'Cece Sutia, Victoriani Inabuy, Okky Fajar Tri Maryana,Budiyanti Dwi Hardanie, Sri Handayani Lestari', 'Pusat Perbukuan Badan Standar, Kurikulum, dan Asesmen Pendidikan  Kementerian Pendidikan, Kebudayaan', '2022', '978-602-244-383-4', 32, 'rak71', 'Buku Ilmu Pengetahuan Alam Kelas 9', '66c3d696564c1.jpeg'),
(19, 1, '04/08/2024', 'Ilmu Pengetahuan Sosial', 'Mohammad Rizky Satria, Sari Oktafiana, M. Nursa’ban, Supardi', 'Pusat Perbukuan Badan Standar, Kurikulum, dan Asesmen Pendidikan  Kementerian Pendidikan, Kebudayaan', '2022', ' 978-602-244-306-3', 2, 'rak1', 'Buku Ilmu Pengetahuan Sosial Kelas 9', '66c3d6e63247d.jpeg'),
(22, 3, '25/08/2024', 'Bung Hatta dan Pendidikan Karakter', 'Dr.Silfa Hanani, M.Si', 'AR-RUZZ Media', '2018', '978-602-313-266-9', 11, 'rak1', '', '66ca98690aa1b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_book`
--

CREATE TABLE `e_book` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `e_book`
--

INSERT INTO `e_book` (`id`, `tanggal`, `id_kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `deskripsi`, `image`, `file`) VALUES
(3, '28/07/2024', 1, 'matematika', 'Abdur Rahman As’ari, Mohammad Tohir, Erik Valentino, Zainul Imron, dan Ibnu Taufiq', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud', '2012', 'Buku Matematika Kelas VII', '66c3d8f3b439d.jpeg', ''),
(4, '28/07/2024', 1, 'Bahasa Inggris ', 'Ika Lestari Damayanti, Yusnita Febrianti, Pipit Prihartanti Suharto, Iyen Nurlaelawati, Aji Jehan Fe', 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi ', '2022', 'Buku Bahasa Inggris Kelas 9', '66c3d7e611ab4.jpeg', '66c3d7e612cf1.pdf'),
(5, '04/08/2024', 1, 'Ilmu Pengetahuan Alam', 'Cece Sutia, Victoriani Inabuy, Okky Fajar Tri Maryana,Budiyanti Dwi Hardanie, Sri Handayani Lestari', 'Pusat Perbukuan Badan Standar, Kurikulum, dan Asesmen Pendidikan  Kementerian Pendidikan, Kebudayaan', '2022', 'Buku Ilmu Pengetahuan Alam Kelas 9', '66c3d79f6a4fc.jpeg', '66c3d79f6af8f.pdf'),
(6, '14/08/2024', 1, 'Ilmu Pengetahuan Sosial', 'Mohammad Rizky Satria, Sari Oktafiana, M. Nursa’ban, Supardi', 'Pusat Perbukuan Badan Standar, Kurikulum, dan Asesmen Pendidikan  Kementerian Pendidikan, Kebudayaan', '2022', 'Buku Ilmu Pengetahuan Sosial Kelas 9', '66c3d72b99258.jpeg', '66c3d72b9b01d.pdf'),
(13, '20/08/2024', 1, 'Bahasa Indonesia', 'Titik Harsiati, Agus Trianto, dan E. Kosasih', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud', '2024', 'mm', '66c3dcd0a7217.jpg', ''),
(14, '26/08/2024', 3, 'Bung Hatta dan Pendidikan Karakter', 'Dr.Silfa Hanani, M.Si', 'AR-RUZZ Media', '2018', 'Bung Hatta', '66cbd8014ee61.jpg', '66cbd80150771.pdf'),
(15, '28/08/2024', 2, 'Bahasa Indonesia', 'Titik Harsiati, Agus Trianto, dan E. Kosasih', 'Pusat Kurikulum dan Perbukuan, Balitbang, Kemendikbud', '2017', 'Buku Bahasa Indonesia kelas 7', '66cef7f51f921.jpg', '66cef7f521121.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id`, `judul`, `pengarang`, `id_kategori`) VALUES
(1, 'matematika', 'ana', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'pelajaran'),
(2, 'fiksi'),
(3, 'non fiksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_buku`
--

CREATE TABLE `kondisi_buku` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kondisi_buku`
--

INSERT INTO `kondisi_buku` (`id`, `id_buku`, `tanggal`, `kondisi`, `keterangan`, `jumlah`) VALUES
(1, 13, '2024-08-22', 'rusak parah', 'terkena air', 4),
(2, 12, '20/10/2023', 'rusak parah', 'terbakar', 2),
(3, 12, '2024-08-17', 'rusak parah', 'asdf', 2),
(4, 19, '2024-08-22', 'rusak parah', 'asdf', 2),
(5, 12, '2024-08-22', 'rusak sedikit', 'Lorem ipsum dolor sit amet consectetur adipiscing elit enim tempor diam sociis quisque, ut suspendisse aliquet et vestibulum aptent scelerisque per laoreet velit tempus, bibendum dui rhoncus netus facilisi neque sem tellus gravida tortor parturient. Auctor dignissim neque torquent intege', 2),
(6, 12, '20/10/2023', 'rusak parah', 'edfsfd', 2),
(8, 14, '2024-08-28', 'rusak', '', 3),
(9, 12, '20/10/2023', 'rusak', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `anggota_id` int(100) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `anggota_id`, `content`, `time`) VALUES
(1, 19, 'meminjam buku', '2024-10-31 07:35:39'),
(2, 25, 'mengembalikan buku', '2024-10-31 07:35:39'),
(4, 22, 'Buku dengan judul Bung Hatta dan Pendidikan Karakter telah dikembalikan', '2024-10-31 07:58:47'),
(5, 25, 'Buku dengan judul matematika telah dikembalikan', '2024-10-31 07:59:24'),
(7, 22, 'Melakukan pengajuan peminjaman dengan judul buku Bahasa Indonesia ', '2024-10-31 08:10:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(100) NOT NULL,
  `id_peminjaman` int(100) NOT NULL,
  `id_buku` int(100) NOT NULL,
  `jumlah_denda` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_peminjaman`, `id_buku`, `jumlah_denda`) VALUES
(10, 35, 13, 4000),
(11, 36, 19, 3000),
(12, 37, 18, 1000),
(13, 38, 14, 3000),
(14, 38, 14, 5000),
(16, 37, 18, 5000),
(17, 36, 19, 4000),
(18, 47, 19, 4000),
(19, 35, 13, 8000),
(20, 36, 19, 9000),
(21, 52, 14, 1000),
(22, 52, 14, 4000),
(23, 46, 13, 70000),
(24, 48, 22, 60000),
(25, 56, 12, 57000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(50) NOT NULL,
  `id_anggota` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `id_buku`, `tanggal`, `tanggal_kembali`, `status`) VALUES
(35, 22, 13, '20/08/2024', '2024-08-23', 'dikembalikan'),
(36, 22, 19, '20/08/2024', '2024-08-23', 'dikembalikan'),
(37, 24, 18, '20/08/2024', '2024-08-19', 'dikembalikan'),
(38, 24, 14, '20/08/2024', '2024-08-19', 'dikembalikan'),
(46, 24, 13, '20/08/2024', '2024-08-19', 'dikembalikan'),
(47, 22, 19, '20/08/2024', '2024-08-23', 'dikembalikan'),
(48, 22, 22, '26/08/2024', '2024-08-30', 'dikembalikan'),
(49, 22, 12, '28/08/2024', '2024-08-31', 'dipinjam'),
(50, 22, 13, '28/08/2024', '2024-08-31', 'dipinjam'),
(51, 22, 12, '28/08/2024', '2024-08-31', 'dipinjam'),
(52, 22, 14, '28/08/2024', '2024-08-31', 'dikembalikan'),
(53, 24, 12, '28/08/2024', '2024-08-31', 'dipinjam'),
(54, 22, 13, '28/08/2024', '2024-08-31', 'dipinjam'),
(55, 22, 12, '29/08/2024', '2024-09-01', 'dipinjam'),
(56, 25, 12, '29/08/2024', '2024-09-01', 'dikembalikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_buku` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `tanggal`, `id_user`, `id_buku`) VALUES
(48, '20/08/2024', 9, 12),
(49, '20/08/2024', 9, 13),
(53, '20/08/2024', 13, 18),
(54, '29/08/2024', 13, 22),
(55, '31/10/2024', 13, 22),
(56, '31/10/2024', 13, 22),
(57, '31/10/2024', 13, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `nama`, `harga`, `jumlah`, `total`) VALUES
(2, '18/08/2024', 'pulpen', 3000, 5, 15000),
(3, '20/08/2024', 'tip x', 5000, 2, 10000),
(4, '20/08/2024', 'penggaris', 1000, 1, 1000),
(5, '20/08/2024', 'buku', 3000, 1, 3000),
(6, '20/08/2024', 'tinta', 20000, 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_peminjaman`, `tanggal`, `status`, `denda`) VALUES
(22, 35, '03/09/2024', 'Terlambat', 8000),
(23, 36, '04/09/2024', 'Terlambat', 9000),
(24, 37, '31/08/2024', 'Terlambat', 5000),
(25, 38, '31/08/2024', 'Terlambat', 5000),
(26, 47, '30/08/2024', 'Terlambat', 4000),
(27, 52, '07/09/2024', 'Terlambat', 4000),
(28, 46, '31/10/2024', 'Terlambat', 70000),
(29, 48, '01/11/2024', 'Terlambat', 60000),
(30, 56, '31/10/2024', 'Terlambat', 57000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi_ebook`
--

CREATE TABLE `rekomendasi_ebook` (
  `id` int(15) NOT NULL,
  `id_ebook` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekomendasi_ebook`
--

INSERT INTO `rekomendasi_ebook` (`id`, `id_ebook`) VALUES
(36, 3),
(35, 4),
(34, 5),
(33, 6),
(32, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `kelamin`, `telpon`, `email`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', 'laki-laki', '08229077395100', '', 'admin', '$2y$10$p0KO3rtPBX7EPd.cfw0FVOamOSDTacawDvX1hTv0rtCyt8IgE1oge', 1),
(9, 'amelia', 'Perempuan', '082145623564', 'Nurbaity4894@gmail.com', 'amel', '$2y$10$aSTsZBJrGwtIJSFXF0yXiOSkgO4mxriWvLgfYLT4Yskruulgs/jEu', 0),
(10, 'nadiatul', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'nadia', '$2y$10$aCnHdMKiq5HlXdfBxQGEx.JIuXqJDb3yz8s2G5D7ouRo5xf8ixwLa', 0),
(11, 'ramlah', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'ramlah', '$2y$10$AJRBfBLW0hKvcEMf7TKrhe22G1HOmyI.it5oEsyeC/RF.WqYqd/T2', 0),
(12, 'ahmad salaby', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'salaby', '$2y$10$9oRbMuxndH.nDcdWIc5JH.2DZHhHLpgOCEWYC7/2f3J4kTtF7DFnS', 0),
(13, 'Nur Baity', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'baity', '$2y$10$p0KO3rtPBX7EPd.cfw0FVOamOSDTacawDvX1hTv0rtCyt8IgE1oge', 0),
(14, 'agustina', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'agustina', '$2y$10$lMubaLigrfTUxMDh.V4rLufMhpqFjEXuEvUNn33VvfpdepcCdfZm2', 0),
(15, 'ana', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'ana', '$2y$10$/qrA/QkJrkFo7r2Bsec2/Ob6gDqCMwnGT1GmcPIfLL1etLwVV696K', 0),
(16, 'ajeng', 'Perempuan', '08215555555', 'Nurbaity4894@gmail.com', 'ajeng', '$2y$10$HuCVZVhs3fagOiQWVmkQWOODujFeYGkZcpsbMWqKCHrEKxncjLp4.', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `absensi_tamu`
--
ALTER TABLE `absensi_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `e_book`
--
ALTER TABLE `e_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `pemasukan_ibfk_2` (`id_peminjaman`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `rekomendasi_ebook`
--
ALTER TABLE `rekomendasi_ebook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ebook` (`id_ebook`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `absensi_tamu`
--
ALTER TABLE `absensi_tamu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `e_book`
--
ALTER TABLE `e_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi_ebook`
--
ALTER TABLE `rekomendasi_ebook`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `e_book`
--
ALTER TABLE `e_book`
  ADD CONSTRAINT `e_book_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kondisi_buku`
--
ALTER TABLE `kondisi_buku`
  ADD CONSTRAINT `kondisi_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekomendasi_ebook`
--
ALTER TABLE `rekomendasi_ebook`
  ADD CONSTRAINT `rekomendasi_ebook_ibfk_1` FOREIGN KEY (`id_ebook`) REFERENCES `e_book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
