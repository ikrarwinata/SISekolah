-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2021 pada 10.46
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`, `telp`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

DROP TABLE IF EXISTS `alumni`;
CREATE TABLE IF NOT EXISTS `alumni` (
  `nis` varchar(26) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(21) NOT NULL,
  `tahun_masuk` int(11) NOT NULL DEFAULT 2021,
  `tahun_lulus` int(11) NOT NULL DEFAULT 2020,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(22) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tahun_masuk`, `tahun_lulus`, `email`, `hp`, `alamat`) VALUES
('17102309', 'Sindi Claudia', 'Wanita', 'Lambur Luar', '03-12-2004', 2017, 2020, 'cindy.bismhaniac@gmail.com', '082217504443', 'Rt. 02 Karya baru . lambur'),
('17103321', 'Saiful Rizal', 'Pria', 'Kota Harapan', '12-11-2004', 2017, 2020, 'Saiful.rizal.96387@gmail.com', '085378051554', 'Rt. 11 Dusun mandiri , kota harapan'),
('17102258', 'Mery', 'Wanita', 'Lambur Luar', '03-07-2005', 20017, 2020, 'mery,037@gmail.com', '082141012018', 'Rt. 05 Dusun polewali, Lambur luar'),
('17107534', 'Lita Sandra Dewi', 'Wanita', 'Lambur Luar', '02-12-2004', 2017, 2020, 'lita.alhdyt@gmail.com', '081377514246', 'Rt. 01 Dusun Karya baru, Lambur luar'),
('17108692', 'Desmawati', 'Wanita', 'Lambur Luar', '21-12-2004', 2017, 2020, 'deazhy.drills@gmail.com', '082236515715', 'Rt. 05 Dusun Polewali, Lambur Luar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `foto` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `user` varchar(26) NOT NULL,
  `dilihat` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `caption`, `foto`, `deskripsi`, `tanggal`, `user`, `dilihat`) VALUES
(3, 'Banguan sekolah', './files/berita/berita_img1625240365.jpg', '<p>-</p>', '1614038400', 'admin', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `header` varchar(200) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carousel`
--

INSERT INTO `carousel` (`id`, `file`, `header`, `text`) VALUES
(7, './files/profil_sekolah/carousel_img1625238031.jpg', 'KOTA HARAPAN', 'lmiyah'),
(6, './files/profil_sekolah/carousel_img1625238021.jpg', 'MTs DARUL DA\'WAH WAL IRSYAD', 'Beramal'),
(5, './files/profil_sekolah/carousel_img1625237647.jpg', 'DI', 'Amaliyah'),
(4, './files/profil_sekolah/carousel_img1625237656.jpg', 'Selamat Datang', 'Berilmu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` text DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `gambar`, `nama`, `jumlah`, `deskripsi`) VALUES
(4, NULL, 'Ruang Belajar', 3, 'Baik'),
(5, NULL, 'Masjid', 1, 'Baik'),
(6, NULL, 'Ruang UKS', 1, 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `file`, `caption`) VALUES
(5, './files/gallery/gallery_img1614528104.jpg', 'a sd2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(21) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(22) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `fb` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `whatsapp` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jabatan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `hp`, `alamat`, `foto`, `fb`, `twitter`, `whatsapp`) VALUES
(1, 'Wahda, S.P.d', 'Bendahar Madrasah', 'Wanita', 'Simbur Naik', '18-08-1995', 'wahdah.thamrin@gmail.com', '081367450065', 'Rt, 10  Dusun pada idi kota harapan', NULL, 'Wahdah Thamrin', '', '081367450065'),
(2, 'Desi Ismayanti, S.Pd', 'Kepala Madrasah', 'Wanita', 'Kota Harapan, Jambi', '17-04-1995', 'desiisma08@gmail.com', '082371323239', 'Rt. 11 Dusun Mandiri. Kota Harapan', NULL, '-', '-', '082371323239'),
(3, 'Muamar, S.Pd', 'Wakil Kepala Madrasah', 'Pria', 'Lambur, Jambi', '10-03-1988', 'Muammar.muhammad.3@gmail.com', '082289841412', 'Rt. 01 Dusun Karya Baru, Jambi', NULL, 'Moeammar Marly', '-', '-'),
(4, 'Muhammad Lutfi', 'Pembina Osis', 'Pria', 'Lambur Luar', '10-06-19987', 'ahmad.lutfi.1023@gmail.com', '081373393770', 'Rt. 05 Dusun polewali, Lambur luar.', NULL, 'Ahmad Lutfi Anas', '', '081373393770'),
(5, 'Suhartang, SE.Sy', 'Pembina Pramuka', 'Pria', 'Lambur Luar', '03-08-1981', 'Suhartang.damar@gmail.com', '082286364737', 'Rt. 10 Dususn padaidi , kota harapan', NULL, 'Muhammad Suhartang Alfatih', '', '082286364737'),
(6, 'Lisda Yanti, S.Pd', 'Kepala Perpustakaan', 'Wanita', 'Karya Baru', '03-12-1996', 'lissdaaja0396@gmail.com', '082177551214', 'Rt. 02 Dusun Karya Baru, Lambur Luar', NULL, 'Lisda Yanti', '', '082177551214');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_siswa`
--

DROP TABLE IF EXISTS `kegiatan_siswa`;
CREATE TABLE IF NOT EXISTS `kegiatan_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `jam` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_siswa`
--

INSERT INTO `kegiatan_siswa` (`id`, `hari`, `kegiatan`, `jam`, `jam_selesai`, `foto`) VALUES
(2, 'Senin', 'Upacara', '7:15', '8:00', NULL),
(3, 'Senin', 'Belajar aktif, Ishoma', '8:00', '11:45', NULL),
(4, 'Senin', 'Belajar aktif (lanjutan), kembali pulang ke rumah', '12:45', '13:30', NULL),
(5, 'Selasa', 'Apel pagi', '7:15', '8:00', NULL),
(6, 'Selasa', 'Belajar aktif, Ishoma', '8:00', '11:45', NULL),
(7, 'Selasa', 'Belajar aktif (lanjutan), kembali pulang ke rumah', '12:45', '13:30', NULL),
(8, 'Rabu', 'Apel pagi', '7:15', '8:00', NULL),
(9, 'Rabu', 'Belajar aktif, Ishoma', '8:00', '11:45', NULL),
(10, 'Rabu', 'Belajar aktif (lanjutan), kembali pulang ke rumah', '12:45', '13:30', NULL),
(11, 'Kamis', 'Tadarus', '7:15', '8:00', NULL),
(12, 'Kamis', 'Pembelajaran Kosa Kata Dan Muhadaroh Tiga Bahasa, Ishoma', '8:00', '11:45', NULL),
(13, 'Kamis', 'Belajar aktif (lanjutan), kembali pulang ke rumah', '12:45', '13:30', NULL),
(14, 'Sabtu', 'Apel pagi', '7:15', '8:00', NULL),
(15, 'Sabtu', 'Belajar aktif, Ishoma', '8:00', '11:45', NULL),
(16, 'Sabtu', 'Belajar aktif (lanjutan), kembali pulang ke rumah', '12:45', '13:30', NULL),
(17, 'Minggu', 'Olah Raga', '7:15', '8:00', NULL),
(18, 'Minggu', 'Belajar aktif', '8:00', '11:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'VII'),
(2, 'VIII'),
(3, 'IX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

DROP TABLE IF EXISTS `pendaftar`;
CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `nilai_ujian` int(11) NOT NULL DEFAULT 0,
  `hubungan_wali` enum('Ayah Kandung','Ibu Kandung','Wali') NOT NULL,
  `nama_ortu` varchar(150) NOT NULL,
  `pekerjaan_ortu` varchar(250) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `email_ortu` varchar(50) DEFAULT NULL,
  `hp_ortu` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nilai_ujian`, `hubungan_wali`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `email_ortu`, `hp_ortu`) VALUES
('1624069516', 'calon siswa', 'sekolah', 'Jambi', 2021, 'Pria', 55, 'Ayah Kandung', 'ayah', 'pns', 'j', 'm@mail.com', '0101010'),
('1625112119', 'siswa baru 1', 'sd b', 'jambi', 2020, 'Pria', 34, 'Ayah Kandung', 'yahya', 'p', 'alamat', 'mail@mail.com', '0990909090909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

DROP TABLE IF EXISTS `pengunjung`;
CREATE TABLE IF NOT EXISTS `pengunjung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(100) NOT NULL,
  `useragent` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `bulan` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip`, `useragent`, `tanggal`, `bulan`) VALUES
(3, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614433397', 2),
(4, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614447096', 2),
(5, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614500592', 2),
(2, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614395885', 2),
(1, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614332862', 2),
(7, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614584666', 3),
(8, '127.0.0.1', 'Windows 7, Chrome 88.0.4324.190', '1614619686', 3),
(9, '127.0.0.1', 'Windows 7, Chrome 89.0.4389.114', '1617682925', 4),
(10, '::1', 'Windows 10, Chrome 90.0.4430.212', '1623143998', 6),
(11, '::1', 'Windows 10, Chrome 91.0.4472.101', '1623664071', 6),
(12, '::1', 'Windows 10, Chrome 91.0.4472.101', '1623665099', 6),
(13, '127.0.0.1', 'Windows 10, Firefox 88.0', '1623665353', 6),
(14, '127.0.0.1', 'Windows 10, Firefox 88.0', '1623665421', 6),
(15, '127.0.0.1', 'Windows 10, Firefox 88.0', '1623665644', 6),
(16, '::1', 'Windows 10, Chrome 91.0.4472.101', '1623751792', 6),
(17, '::1', 'Windows 10, Chrome 91.0.4472.106', '1624007677', 6),
(18, '::1', 'Windows 10, Chrome 91.0.4472.106', '1624032504', 6),
(19, '::1', 'Windows 10, Chrome 91.0.4472.106', '1624040749', 6),
(20, '::1', 'Windows 10, Chrome 91.0.4472.106', '1624041244', 6),
(21, '::1', 'Windows 10, Chrome 91.0.4472.106', '1624068841', 6),
(22, '::1', 'Windows 10, Chrome 91.0.4472.114', '1624869161', 6),
(23, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625076356', 6),
(24, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625111181', 7),
(25, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625135113', 7),
(26, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625192172', 7),
(27, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625202014', 7),
(28, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625235060', 7),
(29, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625736529', 7),
(30, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625764980', 7),
(31, '::1', 'Windows 10, Chrome 77.0.3865.90', '1625802294', 7),
(32, '::1', 'Windows 10, Chrome 91.0.4472.124', '1626250599', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

DROP TABLE IF EXISTS `prestasi`;
CREATE TABLE IF NOT EXISTS `prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `tingkat` varchar(150) NOT NULL,
  `foto` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama`, `tingkat`, `foto`, `tanggal`, `deskripsi`) VALUES
(2, 'Prestasi 1..', 'Nasional', './files/profil_sekolah/prestasi_img1614504938.jpg', '01-02-2021', '<p>das dasd as w wq</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

DROP TABLE IF EXISTS `profil_sekolah`;
CREATE TABLE IF NOT EXISTS `profil_sekolah` (
  `id` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `nilai` text NOT NULL,
  `inputtype` enum('text','textarea','file','int') NOT NULL DEFAULT 'textarea',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `text`, `nilai`, `inputtype`) VALUES
('alamat', 'Alamat Sekolah', 'Jln. Melati RT 007 Dusun Pada Idi Desa Kota Harapan Kecematan Muara Sabak Timur Kabupaten Tanjung Jabung Timur.', 'textarea'),
('phone', 'Telepon Sekolah', '082281549345', 'text'),
('email', 'Email Sekolah', 'mtsddikotaharapan@gmail.com', 'text'),
('nama_sekolah', 'Nama Sekolah', 'Darud Da’wah Wal Irsyad Kota Harapan', 'text'),
('nama_singkat_sekolah', 'Singkatan Sekolah', 'MTs DDI Kota Harapan', 'text'),
('provinsi', 'Provinsi', 'Jambi', 'text'),
('kode_pos', 'Kode Pos', '36562', 'text'),
('no_stats', 'No Statistik Madrasah', '131215070004', 'text'),
('no_sk_kanwil', 'Nomor SK Kanwil Kemenag Jambi', 'Kw 05.4/4/PP.03.3/417/2006', 'text'),
('akreditasi', 'Akreditasi', 'C', 'text'),
('misi', 'Misi', '<ol>\r\n <li>Menyelenggarakan pendidikan yang berkualitas dalam pencapaian prestasi akademik dan non akademik 2. Mewujudkan pembiasaan dalam mempelajari Al-qur’an dan menjalankan ajaran agama islam</li>\r\n <li>Mewujudkan pembentukan karakter islam yang mampu mengaktualisasikan diri dalam masyarakat</li>\r\n <li>Meningkatkan pengetahuan dan profesionalisme tenaga kependidikan sesuai dengan perkembangan dunia pendidikan.</li>\r\n <li>Menyelenggarakan tata kelola Madrasah yang efektif, efisien, transparan dan akuntabel.</li>\r\n</ol>\r\n', 'textarea'),
('visi', 'Visi', '<p>Berilmu Amaliyah Beramal lmiyah.</p>\r\n', 'textarea'),
('luas_tanah', 'Luas tanah keseluruhan', '5210', 'int'),
('luas_bangunan', 'Luas bangunan', '1922', 'int'),
('luas_lapangan', 'Luas lapangan Olah raga', '1040', 'int'),
('luas_halaman', 'Luas Halaman', '1248', 'int'),
('luas_sisa', 'Luas lahan yang belum digunakan', '1000', 'int'),
('sejarah', 'Sejarah Sekolah', '<p>Pada tahun 1980 Pengurus Yayasan Darud Da’wah Wal Irsyad bersama pemerintah setempat dan warga Desa Kota Harapan bersepakat dalam sebuah musyawarah pendirian Madrasah Tsanawiyah Darud Da’wah Wal Irsyad sebagai bentuk pendidikan formal dengan identitas Madrasah Darud Da’wah Wal Irsyad.</p>\r\n\r\n<p>Didirikan Pada 28 Februari 2006, yang direskimkan oleh Kanwil Kemenag Prov Jambi dengan nomor SK Kanwol Kemenag Jambi No:Kw 05.4/4/PP.03.3/417/2006.</p>\r\n', 'textarea'),
('struktur', 'Gambar Struktur Organisasi', './files/profil_sekolah/struktur_img1614438129.JPG', 'text'),
('keterangan_struktur', 'Keterangan Struktur', '<p>Pengurus Cabang :</p>\r\n\r\n<ul>\r\n <li>Pemerintah Desa Lambur Dan Kota Harapan</li>\r\n <li>Pengurus Cabang Darud Da’wah Wal Irsyad</li>\r\n</ul>\r\n\r\n<p>Kepala Madrasah :</p>\r\n\r\n<ul>\r\n <li>Desi Ismayanti, S.Pd</li>\r\n</ul>\r\n\r\n<p>Wakil Kepala Madrasah :</p>\r\n\r\n<ul>\r\n <li>Muamar, S.Pd</li>\r\n</ul>\r\n\r\n<p>Bendahara Madrasah :</p>\r\n\r\n<ul>\r\n <li>Wahdah, S.Pd</li>\r\n</ul>\r\n\r\n<p>Komite Madrasah :</p>\r\n\r\n<ul>\r\n <li>Sukardi</li>\r\n</ul>\r\n\r\n<p>Pembina Osis :</p>\r\n\r\n<ul>\r\n <li>Muhammad Lutfi</li>\r\n</ul>\r\n\r\n<p>Pembina Pramuka :</p>\r\n\r\n<ul>\r\n <li>Sahartang,SE,SY</li>\r\n</ul>\r\n\r\n<p>Kepala Perpustakaan :</p>\r\n\r\n<ul>\r\n <li>Andi Reski Iriani</li>\r\n</ul>\r\n\r\n<p>BP dan BK :</p>\r\n\r\n<ul>\r\n <li>Rosida,S.Pd</li>\r\n</ul>\r\n\r\n<p>Kepala Tata Usaha :</p>\r\n\r\n<ul>\r\n <li>Muhammad Rudi</li>\r\n</ul>\r\n', 'textarea'),
('email_petugas_psb', 'Email Petugas Penerimaan Siswa Baru', 'sulaimanmei@gmail.com', 'text'),
('password_email', 'Password Email Sekolah', 'kotaharapan123', 'textarea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(26) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(21) NOT NULL,
  `tahun_masuk` int(11) NOT NULL DEFAULT 2021,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(22) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tahun_masuk`, `email`, `hp`, `alamat`) VALUES
('20504291', 'Aksar Ardiansyah', 'Pria', 'Kota Harapan', '02-04-2007', 2020, 'aksas.ardiansyah@gmail.com', '082281303396', 'Rt. 09 dusun pada idi kota harapan'),
('20504210', 'Ayustia Miranda', 'Wanita', 'Lambur Luar', '13-08-2007', 2020, 'ayustia.miranda.1@gmail.com', '085244177664', 'Rt. 02 Setia palapa. lambur luar'),
('20504255', 'M. Fadlan', 'Pria', 'Kota Harapan', '23-04-2008', 2020, 'm.fadlan.3572@gmail,com', '082353479069', 'Rt. 11 Dusun pada idi kota harapan'),
('20504212', 'Kasih Febriyana Haida', 'Wanita', 'Lambur Luar', '02-02-2008', 2020, 'kasih.haida@gmail.com', '082283776636', 'Rt. 02 Dusun setia palapa, Lambur luar'),
('20504207', 'Nurhayati', 'Wanita', 'Kota Harapan', '02-05-2007', 2020, 'inur.inur26@gmail.com', '081367613609', 'Rt. 11 Dusun mandiri, kota harapan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
