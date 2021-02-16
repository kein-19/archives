-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 01:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samsatserpong`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokuments`
--

CREATE TABLE `tbl_dokuments` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `image` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `kelompok_id` int(4) NOT NULL,
  `kode_lemari` varchar(128) NOT NULL,
  `kode_kotak` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokuments`
--

INSERT INTO `tbl_dokuments` (`id`, `title`, `nomor`, `image`, `deskripsi`, `tgl_surat`, `jenis`, `kelompok_id`, `kode_lemari`, `kode_kotak`, `created_at`) VALUES
(30, 'List Images', '2122001', 'CV1.pdf', 'adsfasd', '2021-02-04', 'Masuk', 10, 'LR003', 'BX0003', '2021-02-04 16:48:06'),
(31, 'Hasil Scan', '2122002', 'windows_xp_bliss_then_now_by_i_use_windows_vista-d7d3tq3.jpg', 'asdfasdfasd', '2021-01-31', 'Keluar', 10, 'LR002', 'BX0003', '2021-02-04 23:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `kode_jabatan`, `jabatan`) VALUES
(1, 'PP', 'Petugas Pendapatan\r\n'),
(2, 'SP', 'Satuan Pengamanan\r\n'),
(3, 'DS', 'Driver / Sopir\r\n'),
(4, 'OB', 'Office Boy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `kelompok_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`id`, `kelompok`, `kelompok_id`) VALUES
(6, 'PT. USSI', 10),
(7, 'PT. INFOKOM EXE', 11),
(10, 'MEDIA INFORMASI', 12),
(11, 'UNDANGAN', 13),
(14, 'SURAT', 14),
(15, 'PT. KHBL', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kotak`
--

CREATE TABLE `tbl_kotak` (
  `id_kotak` int(11) NOT NULL,
  `kode_kotak` varchar(10) NOT NULL,
  `kode_lemari` varchar(10) NOT NULL,
  `kotak` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kotak`
--

INSERT INTO `tbl_kotak` (`id_kotak`, `kode_kotak`, `kode_lemari`, `kotak`) VALUES
(1, 'BX0001', 'LR001', 'Surat Ijin'),
(2, 'BX0002', 'LR003', 'Surat Undangan'),
(6, 'BX0003', 'LR002', 'Kop Surat'),
(7, 'BX0004', 'LR003', 'Serah Terima '),
(8, 'BX0005', 'LR004', 'Permintaan Barang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lemari`
--

CREATE TABLE `tbl_lemari` (
  `id_lemari` int(11) NOT NULL,
  `kode_lemari` varchar(10) NOT NULL,
  `lemari` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ruangan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lemari`
--

INSERT INTO `tbl_lemari` (`id_lemari`, `kode_lemari`, `lemari`, `lokasi`, `ruangan`) VALUES
(1, 'LR003', 'Lemari Berkas Arsip Kuning', '', ''),
(2, 'LR002', 'Lemari Finance', 'Lantai 2', 'Meeting'),
(4, 'LR004', 'Lemari HRD', 'Lantai 3', 'Meeting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nrh` int(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL,
  `kode_status` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nrh`, `nama_lengkap`, `kode_jabatan`, `kode_status`, `email`, `password`, `role_id`, `is_active`, `date_created`, `foto`) VALUES
(1, 2120805, 'Sunaryo', 'PP', 'PTT', 'sunaryo@gmail.com', '$2y$10$4Km0WcZkmclpBx7y89HjS.Ge511HPvDZTur2aZnSDXHtfM18tQGIu', 2, 1, 1612918909, 'default.png'),
(2, 2120910, 'Yuni Artanti, S.Si.', 'PP', 'PTT', 'yuniartanti@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o3', 2, 1, 1612918909, 'default.png'),
(3, 2120202, 'Endang Suhendar', 'PP', 'PTT', 'endangsuhendar@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o4', 2, 1, 1612918909, 'default.png'),
(4, 2120606, 'Samsul Jaya', 'PP', 'PTT', 'samsuljaya@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o5', 2, 1, 1612918909, 'default.png'),
(5, 2120718, 'Kiki Kuspiandi', 'OB', 'PTT', 'kikikuspiandi@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o6', 2, 1, 1612918909, 'default.png'),
(6, 2121006, 'Yudi Priadi', 'PP', 'PTT', 'yudipriadi@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o7', 2, 1, 1612918909, 'default.png'),
(7, 2120313, 'Sri Wulaningsih', 'PP', 'PTT', 'sriwulaningsih@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o8', 2, 1, 1612918909, 'default.png'),
(8, 2120217, 'Rizki Pratama', 'OB', 'PTT', 'rizkipratama@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o9', 2, 1, 1612918909, 'default.png'),
(9, 2121804, 'M. Kahfi Maulana', 'PP', 'PTT', 'm.kahfimaulana@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o10', 2, 1, 1612918909, 'default.png'),
(10, 2120302, 'Iwan Mulyana', 'PP', 'PTT', 'iwanmulyana@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o11', 2, 1, 1612918909, 'default.png'),
(11, 2121810, 'Dondi Ahmad S, S.Sos.', 'PP', 'PTT', 'dondiahmads@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o12', 2, 1, 1612918909, 'default.png'),
(12, 2120291, 'H. Erus Rusmana', 'PP', 'PTT', 'h.erusrusmana@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o13', 2, 1, 1612918909, 'default.png'),
(13, 2120214, 'Ahmad Fauzi, S.E.', 'PP', 'PTT', 'ahmadfauzi@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o14', 2, 1, 1612918909, 'default.png'),
(14, 2120112, 'Wawan Sumarji', 'PP', 'PTT', 'wawansumarji@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o15', 2, 1, 1612918909, 'default.png'),
(15, 2120112, 'Ade Firmansyah', 'PP', 'PTT', 'adefirmansyah@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o16', 2, 1, 1612918909, 'default.png'),
(16, 2120102, 'Yuli Ismanto', 'PP', 'PTT', 'yuliismanto@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o17', 2, 1, 1612918909, 'default.png'),
(17, 2120113, 'Ence Janwarudin I', 'OB', 'PTT', 'encejanwarudini@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o18', 2, 1, 1612918909, 'default.png'),
(18, 2120106, 'Herlina, S.E.', 'PP', 'PTT', 'herlina@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o19', 2, 1, 1612918909, 'default.png'),
(19, 2120719, 'Mukhamad Nukman, S.Pd.', 'PP', 'PTT', 'mukhamadnukman@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o20', 2, 1, 1612918909, 'default.png'),
(20, 2127919, 'Wahyu Deswantoro Putra', 'SP', 'PTT', 'wahyudeswantoroputra@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o21', 2, 1, 1612918909, 'default.png'),
(21, 2122400, 'Bella Zatia Haq, S.Ars.', 'PP', 'PTT', 'bellazatiahaq@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o22', 2, 1, 1612918909, 'default.png'),
(22, 2123819, 'Cucu Samsu Suparman', 'SP', 'PTT', 'cucusamsusuparman@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o23', 2, 1, 1612918909, 'default.png'),
(23, 2120319, 'Dani Arifin', 'SP', 'PTT', 'daniarifin@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o24', 2, 1, 1612918909, 'default.png'),
(24, 2126714, 'Wawan Setiawan', 'DS', 'PTT', 'wawansetiawan@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o25', 2, 1, 1612918909, 'default.png'),
(25, 2120305, 'Nopi Syafrudin', 'PP', 'PTT', 'nopisyafrudin@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o26', 2, 1, 1612918909, 'default.png'),
(26, 2120910, 'H. Jamuri Khaerudin, M.M.', 'PP', 'PTT', 'h.jamurikhaerudin@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o27', 2, 1, 1612918909, 'default.png'),
(27, 2120290, 'Tohalim', 'PP', 'PTT', 'tohalim@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o28', 2, 1, 1612918909, 'default.png'),
(28, 2120716, 'Rizka Noviansyah, A.Md.', 'DS', 'PTT', 'rizkanoviansyah@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o29', 2, 1, 1612918909, 'default.png'),
(29, 2120512, 'Bustomy Andriansyah, S.Kom.', 'PP', 'PTT', 'bustomyandriansyah@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o30', 2, 1, 1612918909, 'default.png'),
(30, 2120614, 'Dede Sulistiawati, A.Md.', 'PP', 'PTT', 'dedesulistiawati@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o31', 2, 1, 1612918909, 'default.png'),
(31, 2120614, 'Rizky Maulana, S.T.', 'PP', 'PTT', 'rizkymaulana@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o32', 2, 1, 1612918909, 'default.png'),
(32, 2120115, 'Saeful Hayat', 'SP', 'PTT', 'saefulhayat@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o33', 2, 1, 1612918909, 'default.png'),
(33, 2120102, 'Jam`an', 'PP', 'PTT', 'jaman@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o34', 2, 1, 1612918909, 'default.png'),
(34, 2120102, 'Ade Rosid', 'PP', 'PTT', 'aderosid@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o35', 2, 1, 1612918909, 'default.png'),
(35, 2120702, 'Pardede Hafid Siswanto, S.H.', 'PP', 'PTT', 'pardedehafidsiswanto@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o36', 2, 1, 1612918909, 'default.png'),
(36, 2120104, 'Rahmat Sulaeman', 'SP', 'PTT', 'rahmatsulaeman@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o37', 2, 1, 1612918909, 'default.png'),
(37, 2120103, 'Rendi Mardiandi, S.Sos.', 'PP', 'PTT', 'rendimardiandi@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o38', 2, 1, 1612918909, 'default.png'),
(38, 2120318, 'Nur Mohamad Yusuf, S.Pd.', 'PP', 'PTT', 'nurmohamad@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o39', 2, 1, 1612918909, 'default.png'),
(39, 2120307, 'Tarmani', 'SP', 'PTT', 'tarmani@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o40', 2, 1, 1612918909, 'default.png'),
(40, 2120502, 'Sahrul', 'PP', 'PTT', 'sahrul@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o41', 2, 1, 1612918909, 'default.png'),
(41, 2120506, 'Adi Setiadi', 'PP', 'PTT', 'adisetiadi@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o42', 2, 1, 1612918909, 'default.png'),
(42, 2120107, 'Agung Purnomo', 'SP', 'PTT', 'agungpurnomo@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o43', 2, 1, 1612918909, 'default.png'),
(43, 2120418, 'Rinaldi Vyqri, S.E.', 'OB', 'PTT', 'rinaldivyqri@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o44', 2, 1, 1612918909, 'default.png'),
(44, 2121106, 'Yuliana', 'PP', 'PTT', 'yuliana@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o45', 2, 1, 1612918909, 'default.png'),
(45, 2120205, 'Rohmat', 'PP', 'PTT', 'rohmat@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o46', 2, 1, 1612918909, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `kode_status` varchar(10) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `kode_status`, `status`) VALUES
(1, 'PTT', 'Pegawai Tidak Tetap'),
(6, 'PT', 'Pegawai Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nik` int(128) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kode_jabatan` varchar(10) NOT NULL,
  `kode_status` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nik`, `nama_lengkap`, `kode_jabatan`, `kode_status`, `email`, `password`, `role_id`, `is_active`, `date_created`, `foto`) VALUES
(10, 0, 'admin', 'PP', 'PTT', 'admin@gmail.com', '$2y$10$6hxXElzZcuzO3v2Ghud/X.WjL3DsosMI8TKiauJvRT5aqemeTFPFm', 1, 1, 1589771627, 'default.png'),
(11, 21020, 'fadli', 'PP', 'PTT', 'fadli@gmail.com', '$2y$10$H8.QxVvqV7BvDEgwBkzxruDswWsSBRbsDnO7hcCpUbJeLPwzQe.o2', 2, 1, 1609600795, '97d9ef2b251056b3db0ce363733b5edcca11bc9b.jpg'),
(12, 21021, 'Badan Kepegawaian Daerah', 'DS', 'PTT', 'bkd@gmail.com', '$2y$10$L5D3aggpoSs4R6RzHp2S/.yFjw38XXFQKpM8KeddXx42W1U5Kcr7W', 3, 1, 1612537629, 'pexels-flickr-1499884.jpg'),
(15, 21022, 'Andrei Sator', 'PP', 'PTT', 'andrei@gmail.com', '$2y$10$mSGVyiAQpuExIearBHm45uxiShREp/I/syeusIuCisdiprlnx7n2a', 2, 1, 1612884083, 'default.png'),
(20, 21023, 'Andhika P', 'PP', 'PTT', 'andhika@gmail.com', '$2y$10$kri7MpYD8aJ0bPox60OTz.kXAuD73fJJ.eH1nrYzK8uiuRrr5P.Ae', 2, 1, 1612886094, 'default.png'),
(21, 21024, 'Ari', 'SP', 'PTT', 'ari@gmail.com', '$2y$10$yNgXCfrxQSFF31cnFzG6mO/ElTE0feh/5LcN6oQ1w57QD43YBSlK6', 2, 1, 1612918909, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_access_menu`
--

CREATE TABLE `t_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user_access_menu`
--

INSERT INTO `t_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(10, 1, 9),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(15, 1, 15),
(19, 1, 3),
(20, 1, 5),
(21, 1, 14),
(32, 1, 16),
(36, 7, 2),
(37, 1, 24),
(38, 1, 25),
(39, 1, 26),
(40, 1, 27),
(42, 1, 28),
(46, 2, 29),
(47, 3, 32),
(48, 3, 31),
(49, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_menu`
--

CREATE TABLE `t_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `menu_icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user_menu`
--

INSERT INTO `t_user_menu` (`id`, `menu`, `menu_icon`) VALUES
(1, 'Admin', 'fas fa-fw fa-user-tie'),
(2, 'User', 'fas fa-fw fa-user'),
(3, 'Menu', 'fas fa-fw fa-folder'),
(24, 'Dokuments', 'fas fa-fw fa-archive'),
(25, 'Kelompok', 'fas fa-fw fa-object-group'),
(26, 'Lemari', 'fas fa-fw fa-building'),
(27, 'Kotak', 'fas fa-fw fa-cube'),
(28, 'Pegawai', 'fas fa-fw fa-users'),
(29, 'Documents', 'fas fa-fw fa-archive'),
(31, 'Bkd', 'fas fa-fw fa-user'),
(32, 'Dokumen', 'fas fa-fw fa-archive'),
(33, 'Data_pegawai', 'fas fa-fw fa-users');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_role`
--

CREATE TABLE `t_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user_role`
--

INSERT INTO `t_user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pegawai'),
(3, 'Badan Kepegawaian Daerah');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_sub_menu`
--

CREATE TABLE `t_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user_sub_menu`
--

INSERT INTO `t_user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-alt', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-pencil-ruler', 1),
(10, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(11, 1, 'Change Password', 'admin/changepassword', 'fas fa-fw fa-key', 1),
(39, 21, 'List Images', 'gallery', 'fas fa-fw fa-edit', 1),
(42, 24, 'List Archives', 'dokuments', 'fas fa-fw fa-list-alt', 1),
(43, 24, 'Add Archives', 'dokuments/add', 'fas fa-fw fa-plus', 1),
(44, 25, 'List Kelompok', 'kelompok', 'fas fa-fw fa-list-alt', 1),
(45, 26, 'List Lemari', 'lemari', 'fas fa-fw fa-list-alt', 1),
(46, 27, 'List Kotak', 'kotak', 'fas fa-fw fa-list-alt', 1),
(49, 28, 'Data Pegawai', 'pegawai', 'fas fa-fw fa-id-card', 1),
(50, 28, 'Add Pegawai', 'pegawai/add', 'fas fa-fw fa-user-plus', 1),
(51, 1, 'My Profile', 'admin/myprofile', 'fas fa-fw fa-user-alt', 1),
(52, 1, 'Edit Profile', 'admin/editprofile', 'fas fa-fw fa-user-edit', 1),
(53, 29, 'List Archives', 'documents', 'fas fa-fw fa-list-alt', 1),
(54, 29, 'Add Archives', 'documents/add', 'fas fa-fw fa-plus', 1),
(55, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(56, 32, 'Data Arsip', 'dokumen', 'fas fa-fw fa-list-alt', 1),
(58, 31, 'My Profile', 'bkd', 'fas fa-fw fa-user-alt', 1),
(59, 31, 'Edit Profile', 'bkd/edit', 'fas fa-fw fa-user-edit', 1),
(60, 33, 'Data Pegawai', 'data_pegawai', 'fas fa-fw fa-users', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokuments`
--
ALTER TABLE `tbl_dokuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kotak`
--
ALTER TABLE `tbl_kotak`
  ADD PRIMARY KEY (`id_kotak`);

--
-- Indexes for table `tbl_lemari`
--
ALTER TABLE `tbl_lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_user_access_menu`
--
ALTER TABLE `t_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_menu`
--
ALTER TABLE `t_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_role`
--
ALTER TABLE `t_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_sub_menu`
--
ALTER TABLE `t_user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokuments`
--
ALTER TABLE `tbl_dokuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_kotak`
--
ALTER TABLE `tbl_kotak`
  MODIFY `id_kotak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_lemari`
--
ALTER TABLE `tbl_lemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_user_access_menu`
--
ALTER TABLE `t_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `t_user_menu`
--
ALTER TABLE `t_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `t_user_role`
--
ALTER TABLE `t_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_user_sub_menu`
--
ALTER TABLE `t_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
