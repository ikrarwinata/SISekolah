-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 10.37
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

CREATE TABLE `admin` (
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(22) DEFAULT NULL
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

CREATE TABLE `alumni` (
  `nis` varchar(26) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(21) NOT NULL,
  `tahun_masuk` int(4) NOT NULL DEFAULT 2021,
  `tahun_lulus` int(4) NOT NULL DEFAULT 2020,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(22) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tahun_masuk`, `tahun_lulus`, `email`, `hp`, `alamat`) VALUES
('12323456789', 'Alumni 1', 'Pria', 'Jambi', '25-07-1984', 2010, 2019, 'debuger@mail.com', '123123', 'J');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `foto` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `user` varchar(26) NOT NULL,
  `dilihat` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `caption`, `foto`, `deskripsi`, `tanggal`, `user`, `dilihat`) VALUES
(2, 'CCCCC ads asCCC CCCC a', './files/berita/berita_img1614397978.jpg', '<p>sad asd as dsa das dsa dsa as as as as asdsadasdas asd asd as</p>', '1614470400', 'admin', 0),
(3, 'CCCCC ads asCCC CCCC a  qw dq', './files/berita/berita_img1614528857.jpg', '<p>Keterangann .as dalsk dlas jdlals lkj askdja jl sjl aslk aslk jasdlk jasd</p>\r\n\r\n<p>as ljdlas jlj alkjas d</p>\r\n\r\n<p>a sldjak jdlk</p>\r\n\r\n<p>111111111111111111111111111</p>\r\n\r\n<p>22222222222222222222222222222222222222222222222222</p>\r\n\r\n<p>3333333333333333333333333333333333</p>\r\n\r\n<p>44444444444444444444444444444444444444</p>', '1614038400', 'admin', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `header` varchar(200) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carousel`
--

INSERT INTO `carousel` (`id`, `file`, `header`, `text`) VALUES
(7, './files/profil_sekolah/carousel_img1614527388.jpg', 'IN ........... ULTRICES MAURIS 4', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'),
(6, './files/profil_sekolah/carousel_img1614448443.jpg', 'NULLAM UT DAPIBUS 1', 'LOREM IPSUM DOLOR'),
(5, './files/profil_sekolah/carousel_img1614448407.jpg', 'LOREM IPSUM DOLOR 2', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit..'),
(4, './files/profil_sekolah/carousel_img1614448372.jpg', 'IN ULTRICES MAURIS 3', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `jumlah` int(3) NOT NULL DEFAULT 1,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `caption` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `file`, `caption`) VALUES
(3, './files/gallery/gallery_img1614510097.jpg', 'CCCCC ads asCCC CCCC'),
(4, './files/gallery/gallery_img1614528093.jpg', 'asd1'),
(5, './files/gallery/gallery_img1614528104.jpg', 'a sd2'),
(7, './files/gallery/gallery_img1614528140.jpg', 'ads q qw4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(26) NOT NULL,
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
  `whatsapp` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `jabatan`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `email`, `hp`, `alamat`, `foto`, `fb`, `twitter`, `whatsapp`) VALUES
('12312321132', 'Guru 1', 'Staff TU', 'Wanita', 'Jambi', '24-06-2021', 'ikrarwinata@gmail.com', '123123', 'Jambiiiiiiiiii', NULL, '', '', ''),
('123232132', 'Guru 1111122222', 'G', 'Pria', 'Jambi', '16-06-2021', 'mail@mail.com', '123123', 'J', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_siswa`
--

CREATE TABLE `kegiatan_siswa` (
  `id` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `jam` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `pendaftar` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `nilai_ujian` int(3) NOT NULL DEFAULT 0,
  `hubungan_wali` enum('Ayah Kandung','Ibu Kandung','Wali') NOT NULL,
  `nama_ortu` varchar(150) NOT NULL,
  `pekerjaan_ortu` varchar(250) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `email_ortu` varchar(50) DEFAULT NULL,
  `hp_ortu` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `asal_sekolah`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nilai_ujian`, `hubungan_wali`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `email_ortu`, `hp_ortu`) VALUES
('1624069516', 'calon siswa', 'sekolah', 'Jambi', 2021, 'Pria', 55, 'Ayah Kandung', 'ayah', 'pns', 'j', 'm@mail.com', '0101010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `useragent` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `bulan` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(22, '::1', 'Windows 10, Chrome 91.0.4472.114', '1624869161', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tingkat` varchar(150) NOT NULL,
  `foto` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama`, `tingkat`, `foto`, `tanggal`, `deskripsi`) VALUES
(2, 'Prestasi 1..', 'Nasional', './files/profil_sekolah/prestasi_img1614504938.jpg', '01-02-2021', '<p>das dasd as w wq</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `nilai` text NOT NULL,
  `inputtype` enum('text','textarea','file','int') NOT NULL DEFAULT 'textarea'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `text`, `nilai`, `inputtype`) VALUES
('alamat', 'Alamat Sekolah', 'Jln. Melati RT 007 Dusun Pada Idi Desa Kota Harapan Kecematan Muara Sabak Timur Kabupaten Tanjung Jabung Timur.', 'textarea'),
('phone', 'Telepon Sekolah', '082281549345', 'text'),
('email', 'Email Sekolah', 'ikrarwinata04@gmail.com', 'text'),
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
('email_petugas_psb', 'Email Petugas Penerimaan Siswa Baru', 'ikrarwinata@gmail.com', 'text'),
('password_email', 'Password Email Sekolah', 'natadecoco13', 'textarea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(26) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(21) NOT NULL,
  `tahun_masuk` int(4) NOT NULL DEFAULT 2021,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(22) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tahun_masuk`, `email`, `hp`, `alamat`) VALUES
('12323456789', 'siswa1', 'Wanita', 'Jmb', '04-03-2021', 2007, 'mail@mail.com', '909090090090', 'asdsad'),
('234234234', 'siswa2', 'Wanita', 'Jmb', '04-03-2021', 2008, 'mail@mail.com', '909090090090', 'asdsad');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `kegiatan_siswa`
--
ALTER TABLE `kegiatan_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_siswa`
--
ALTER TABLE `kegiatan_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
