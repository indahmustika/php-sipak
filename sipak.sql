-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2020 pada 08.08
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_pak`
--

CREATE TABLE `berkas_pak` (
  `id_berkas` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `kode_rubrik` int(11) NOT NULL,
  `bukti_berkas` text NOT NULL,
  `status_berkas` varchar(50) NOT NULL,
  `volume` int(11) NOT NULL DEFAULT '0',
  `poin_1` double NOT NULL DEFAULT '0',
  `poin_2` double NOT NULL DEFAULT '0',
  `poin_akhir` double NOT NULL DEFAULT '0',
  `catatan_berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas_pak`
--

INSERT INTO `berkas_pak` (`id_berkas`, `id_pengajuan`, `kode_rubrik`, `bukti_berkas`, `status_berkas`, `volume`, `poin_1`, `poin_2`, `poin_akhir`, `catatan_berkas`) VALUES
(11, 16, 8, 'drive.google.com/asASADureroerenmnJIQWQAYU', 'VALID', 2, 8, 8, 8, ''),
(12, 16, 28, 'drive.google.com/asASADureroerenmnJIQWQE/aadadadAS', 'VALID', 2, 10, 10, 10, ''),
(13, 17, 6, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 2, 3, 2.5, ''),
(14, 17, 79, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 80, 80, 80, ''),
(15, 12, 1, 'drive.google.com/asASADureroerenmnJIQWQE/aadadadnjjbadf', 'VALID', 1, 200, 210, 205, ''),
(16, 12, 3, 'drive.google.com/asASADureroerenmnJIQWQE/aadadadnjjb', 'VALID', 1, 2, 3, 2.5, ''),
(17, 12, 6, 'https://drive.google.com/adad/erefcdsadae/SADAEmnasas', 'VALID', 4, 12, 4, 8, ''),
(19, 11, 8, 'https://drive.google.com/adad/erefcdsadae/SADAE', '', 2, 8, 8, 8, ''),
(23, 18, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 210, 220, 215, ''),
(24, 17, 77, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 120, 120, 120, ''),
(25, 17, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 200, 200, 200, ''),
(26, 17, 78, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 100, 100, 100, ''),
(27, 17, 9, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 4, 6, 4, ''),
(28, 17, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 300, 300, 300, ''),
(29, 17, 80, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 60, 60, 60, ''),
(30, 19, 53, 'https://drive.google.com/adad/erefcdsadae/SADAEAAAaw', 'VALID', 2, 80, 80, 80, ''),
(31, 19, 54, 'https://drive.google.com/adad/erefcdsadae/SADAEqwa', 'VALID', 3, 90, 90, 90, ''),
(32, 19, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 200, 200, 200, ''),
(33, 19, 27, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 20, 20, 20, ''),
(34, 19, 75, 'https://drive.google.com/adad/erefcdsadae/SADAEwq', 'VALID', 1, 15, 15, 15, ''),
(35, 16, 1, 'https://drive.google.com/adad/erefcdsadaKAR', 'TELAH REVISI', 5, 1000, 1000, 1000, ''),
(36, 20, 3, 'https://drive.google.com/adad/erefcdsadae/SADAEa', 'TELAH REVISI', 1, 3, 3, 3, ''),
(37, 20, 4, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 1, 1, 1, ''),
(38, 20, 8, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 4, 4, 4, ''),
(39, 20, 1, 'https://drive.google.com/adad/erefcdsadae/SADAEsasassdds', 'TELAH REVISI', 5, 1000, 1000, 1000, ''),
(40, 21, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 220, 210, 215, ''),
(41, 22, 1, 'https://drive.google.com/adad/erefcdsadae/SAD', 'TELAH REVISI', 1, 200, 200, 200, ''),
(42, 23, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 260, 300, 280, ''),
(43, 24, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 200, 200, 200, ''),
(44, 24, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 150, 150, 150, ''),
(45, 24, 78, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 50, 50, 50, ''),
(46, 25, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 200, 200, 200, ''),
(47, 25, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 150, 150, 150, ''),
(48, 25, 77, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 3, 180, 180, 180, ''),
(49, 25, 78, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 100, 100, 100, ''),
(50, 25, 53, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 80, 80, 80, ''),
(51, 26, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', '', 1, 200, 200, 200, ''),
(52, 26, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', '', 1, 150, 150, 150, ''),
(53, 27, 1, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'TELAH REVISI', 2, 400, 400, 400, 'File tidak asli'),
(54, 12, 2, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 300, 300, 300, ''),
(55, 28, 27, 'https://drive.google.com/adad/erefcdsadae/SADAEa', 'VALID', 2, 42, 40, 41, ''),
(56, 28, 42, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 28, 30, 29, ''),
(57, 28, 19, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 12, 12, 12, ''),
(58, 28, 4, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 1, 0.5, 0.5, 0.5, ''),
(59, 28, 50, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 2, 40, 40, 40, ''),
(60, 28, 117, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 3, 15, 15, 15, ''),
(61, 28, 148, 'https://drive.google.com/adad/erefcdsadae/SADAE', 'VALID', 3, 15, 15, 15, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip_dosen` char(18) NOT NULL,
  `password_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `unit_kerja_dosen` varchar(50) NOT NULL,
  `alamat_dosen` text NOT NULL,
  `telepon_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip_dosen`, `password_dosen`, `nama_dosen`, `unit_kerja_dosen`, `alamat_dosen`, `telepon_dosen`) VALUES
('195812311986031025', '12345', 'DEWA NYOMAN REDANA', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK', 'BANYUNING INDAH BLOK A NO.10, JL. PULAU MENJANGAN, BANYUNING, SINGARAJA', '081339752000'),
('196106011989031002', '12345', 'DEWA MADE JONI ARDANA', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK', 'JALAN BEKISAR 1 SINGARAJA', '081338515114'),
('197010122005011001', '12345', 'GEDE SANDIASA', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK', 'LINGKUNGAN SANGKET, KEL./KEC. SUKASADA, KAB. BULELENG, KODE POST 81161', '081338724721'),
('197603122003122001', '12345', 'BUDI SANTOSO', 'FAKULTAS TARBIYAH DAN KEGURUAN', 'JALAN PAHLAWAN SIDOARJO', '087654223112'),
('198503302003122002', '12345', 'SRI SULASTRI', 'FAKULTAS SAINS DAN TEKNOLOGI', 'JALAN KEMBANG BARAT SURABAYA', '081234621232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip_pegawai` char(18) NOT NULL,
  `password_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `unit_kerja_pegawai` varchar(50) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `telepon_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip_pegawai`, `password_pegawai`, `nama_pegawai`, `unit_kerja_pegawai`, `alamat_pegawai`, `telepon_pegawai`) VALUES
('199905042019102001', '12345', 'SAPTO', 'FAKULTAS SAINS DAN TEKNOLOGI', 'JALAN JERUK KEDUNGTURI TAMAN SIDOARJO', '0853456785554');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_kum` int(11) NOT NULL,
  `nip_dosen` char(18) NOT NULL,
  `nip_pegawai` char(18) NOT NULL,
  `nip_penilai_1` char(19) NOT NULL,
  `nip_penilai_2` char(19) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jabatan_asal` varchar(50) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `jabatan_tujuan` varchar(50) NOT NULL,
  `dokumen_pendukung` text NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL DEFAULT 'BELUM DIKIRIM',
  `total_pak_akhir` int(11) NOT NULL DEFAULT '0',
  `file_sk` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_kum`, `nip_dosen`, `nip_pegawai`, `nip_penilai_1`, `nip_penilai_2`, `tanggal_pengajuan`, `jabatan_asal`, `tanggal_sk`, `jabatan_tujuan`, `dokumen_pendukung`, `status_pengajuan`, `total_pak_akhir`, `file_sk`) VALUES
(11, 8, '198503302003122002', '', '', '', '2019-10-26', 'Asisten Ahli III/b', '2019-10-01', 'Guru Besar IV/d', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BELUM DIKIRIM', 8, ''),
(12, 5, '198503302003122002', '', '199706122018032001', '195312101987021001', '2019-12-01', 'Asisten Ahli III/b', '2019-10-03', 'Lektor Kepala IV/a', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'PENILAIAN SELESAI', 516, ''),
(16, 8, '197603122003122001', '', '', '', '2019-10-27', 'Lektor Kepala IV/c', '2019-10-10', 'Guru Besar IV/d', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XThkn', 'TELAH REVISI', 1018, ''),
(17, 8, '197603122003122001', '', '195312101987021001', '199706122018032001', '2019-10-27', 'Lektor Kepala IV/c', '2019-10-10', 'Guru Besar IV/d', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XThknMBM', 'BERKAS DITERIMA', 867, ''),
(18, 3, '197010122005011001', '', '195312101987021001', '195912081986011003', '2019-11-07', 'Asisten Ahli III/a', '2017-08-24', 'Lektor III/c', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0P', 'DITOLAK', 215, ''),
(19, 5, '196106011989031002', '', '196305151992031003', '196301161988101001', '2019-11-08', 'Lektor III/c', '2016-07-12', 'Lektor Kepala IV/a', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XThknAD', 'BERKAS DITERIMA', 405, ''),
(20, 2, '197603122003122001', '', '', '', '2019-11-11', 'Asisten Ahli III/a', '2017-04-01', 'Asisten Ahli III/b', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh0PNSZjhP4BDi8PY', 'TELAH REVISI', 1008, ''),
(21, 2, '195812311986031025', '', '195312101987021001', '196301161988101001', '2019-11-15', 'Asisten Ahli III/a', '2019-11-02', 'Asisten Ahli III/b', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'DITERIMA', 215, 'https://drive.google.com/drive/my-drive'),
(22, 2, '195812311986031025', '', '', '', '2019-11-15', 'Asisten Ahli III/a', '2019-10-31', 'Asisten Ahli III/b', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BERKAS DITERIMA', 200, ''),
(23, 3, '195812311986031025', '', '195312101987021001', '195912081986011003', '2019-11-28', 'Asisten Ahli III/a', '2019-11-05', 'Lektor III/c', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PYsas', 'PENILAIAN SELESAI', 280, ''),
(24, 5, '195812311986031025', '', '196305151992031003', '196301161988101001', '2019-11-28', 'Lektor III/c', '2019-11-28', 'Lektor Kepala IV/a', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BERKAS DITERIMA', 400, ''),
(25, 7, '195812311986031025', '', '195912081986011003', '196509251990022001', '2019-11-29', 'Asisten Ahli III/b', '2019-11-27', 'Lektor Kepala IV/c', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BERKAS DITERIMA', 710, ''),
(26, 7, '195812311986031025', '', '', '', '2019-11-29', 'Asisten Ahli III/b', '2019-11-27', 'Lektor Kepala IV/c', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BELUM DIKIRIM', 350, ''),
(27, 5, '195812311986031025', '', '', '', '2019-11-29', 'Asisten Ahli III/b', '2019-11-27', 'Lektor Kepala IV/a', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0PNSZjhP4BDi8PY', 'BERKAS DITOLAK', 400, ''),
(28, 2, '198503302003122002', '', '195912081986011003', '196301161988101001', '2019-12-06', 'Asisten Ahli III/a', '2017-06-20', 'Asisten Ahli III/b', 'https://drive.google.com/folderview?id=1qsBJ7J6cCO5XTh93S0NSZjhP4BDi8PY', 'DITERIMA', 153, 'drive.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilai`
--

CREATE TABLE `penilai` (
  `nip_penilai` char(18) NOT NULL,
  `password_penilai` varchar(20) NOT NULL,
  `nama_penilai` varchar(50) NOT NULL,
  `unit_kerja_penilai` varchar(50) NOT NULL,
  `rumpun_ilmu` varchar(50) NOT NULL,
  `alamat_penilai` text NOT NULL,
  `telepon_penilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilai`
--

INSERT INTO `penilai` (`nip_penilai`, `password_penilai`, `nama_penilai`, `unit_kerja_penilai`, `rumpun_ilmu`, `alamat_penilai`, `telepon_penilai`) VALUES
('195312101987021001', '12345', 'HARRYANTO', 'FAKULTAS EKONOMI DAN BISNIS ISLAM', 'ILMU-ILMU SOSIAL', 'KOMP. UNHAS TAMALANREA BLOK. GB/73', '081144422674'),
('195912081986011003', '12345', 'ALIMUDDIN', 'FAKULTAS EKONOMI DAN BISNIS ISLAM', 'ILMU-ILMU SOSIAL', 'KOMP. UNHAS TAMALANREA BLOK. EB/35', '0811464000'),
('196301161988101001', '12345', 'GAGARING PAGALUNG', 'FAKULTAS EKONOMI DAN BISNIS ISLAM', 'ILMU-ILMU SOSIAL', 'KOMP. UNHAS TAMALANREA BLOK. GB/61', '08114108070'),
('196305151992031003', '12345', 'ABDUL HAMID HABBE', 'FAKULTAS EKONOMI DAN BISNIS ISLAM', 'ILMU-ILMU SOSIAL', 'JL. SUNGAI SADDANG BARU LR. MUKMIN NO.14', '0811469002'),
('196509251990022001', '12345', 'MEDIATY', 'FAKULTAS EKONOMI DAN BISNIS ISLAM', 'ILMU-ILMU SOSIAL', 'KOMP. UNHAS TAMALANREA BLOK. EC/10', '085242070144'),
('199706122018032001', '12345', 'SUTIJONO', 'FAKULTAS SAINS DAN TEKNOLOGI', 'TEKNIK', 'JALAN PRAJURIT GUNUNGSARI TIMUR SURABAYA', '087656667443'),
('199706122018032021', '12345', 'MEDIATY', 'FAKULTAS ADAB DAN HUMANIORA', 'AGAMA', 'SURABAYA', '0910210223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rubrik`
--

CREATE TABLE `rubrik` (
  `kode_rubrik` int(11) NOT NULL,
  `aspek_rubrik` varchar(50) NOT NULL,
  `kegiatan_rubrik` text NOT NULL,
  `poin_rubrik` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rubrik`
--

INSERT INTO `rubrik` (`kode_rubrik`, `aspek_rubrik`, `kegiatan_rubrik`, `poin_rubrik`) VALUES
(1, 'Pendidikan', 'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijasah Doktor/sederajat', 200),
(2, 'Pendidikan', 'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah Magister/sederajat', 150),
(3, 'Pendidikan', 'Mengikuti diklat prajabatan golongan III', 3),
(4, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) sebagai Asisten Ahli untuk beban mengajar 10 sks pertama', 0.5),
(5, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) sebagai Asisten Ahli untuk beban mengajar 2 sks berikutnya', 0.25),
(6, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) sebagai Lektor/Lektor Kepala/Profesor untuk beban mengajar 10 sks pertama', 1),
(7, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) sebagai Lektor/Lektor Kepala/Profesor untuk beban mengajar 2 sks berikutnya', 0.5),
(8, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) berupa Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis dengan Melakukan pengajaran untuk peserta pendidikan dokter melalui tindakan medik spesialistik', 4),
(9, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) berupa Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis dengan Melakukan pengajaran Konsultasi spesialis kepada peserta pendidikan dokter', 2),
(10, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) berupa Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis dengan Melakukan pemeriksaan luar dengan pembimbingan terhadap peserta pendidikan dokter', 2),
(11, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) berupa Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis dengan Melakukan pemeriksaan dalam dengan pembimbingan terhadap peserta pendidikan dokter', 3),
(12, 'Pelaksanaan Pendidikan', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing. menguji serta menyelenggarakan pendidikan di laboratorium. praktik keguruan. bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester) berupa Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis dengan Menjadi saksi ahli dengan pembimbingan terhadap peserta pendidikan dokter', 1),
(13, 'Pelaksanaan Pendidikan', 'Membimbing seminar mahasiswa (setiap semester)', 1),
(14, 'Pelaksanaan Pendidikan', 'Membimbing KKN. Praktik Kerja Nyata. Praktik Kerja  Lapangan (setiap semester)', 1),
(15, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan disertasi yang sesuai bidang penugasannya sebagai Pembimbing utama per orang (setiap mahasiswa)', 8),
(16, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan tesis yang sesuai bidang penugasannya sebagai Pembimbing utama per orang (setiap mahasiswa) ', 3),
(17, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan skripsi yang sesuai bidang penugasannya sebagai Pembimbing utama per orang (setiap mahasiswa) ', 1),
(18, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan laporan akhir studi yang sesuai bidang penugasannya sebagai Pembimbing utama per orang (setiap mahasiswa) ', 1),
(19, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan disertasi yang sesuai bidang penugasannya sebagai Pembimbing Pendamping/ Pembantu per orang (setiap mhs)', 6),
(20, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan tesis yang sesuai bidang penugasannya sebagai Pembimbing Pendamping/ Pembantu per orang (setiap mhs) ', 2),
(21, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan skripsi yang sesuai bidang penugasannya sebagai Pembimbing Pendamping/ Pembantu per orang (setiap mhs) ', 0.5),
(22, 'Pelaksanaan Pendidikan', 'Membimbing dan ikut membimbing dalam menghasilkan laporan akhir studi yang sesuai bidang penugasannya sebagai Pembimbing Pendamping/ Pembantu per orang (setiap mhs) ', 0.5),
(23, 'Pelaksanaan Pendidikan', 'Bertugas sebagai penguji pada ujian akhir/Profesi (setiap mahasiswa) sebagai Ketua penguji', 1),
(24, 'Pelaksanaan Pendidikan', 'Bertugas sebagai penguji pada ujian akhir/Profesi (setiap mahasiswa) sebagai Anggota penguji', 0.5),
(25, 'Pelaksanaan Pendidikan', 'Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan. termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (setiap semester)', 2),
(26, 'Pelaksanaan Pendidikan', 'Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi (setiap produk)', 2),
(27, 'Pelaksanaan Pendidikan', 'Mengembangkan bahan pengajaran/bahan kuliah yang mempunyai nilai kebaharuan (setiap produk) berupa Buku ajar', 20),
(28, 'Pelaksanaan Pendidikan', 'Mengembangkan bahan pengajaran/bahan kuliah yang mempunyai nilai kebaharuan (setiap produk) berupa Diktat.Modul. Petunjuk praktikum. Model. Alat bantu. Audio visual. Naskah tutorial. Job sheet praktikum terkait  dengan  mata  kuliah  yang diampu', 5),
(29, 'Pelaksanaan Pendidikan', 'Menyampaikan orasi ilmiah di tingkat perguruan tinggi', 5),
(30, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Rektor', 6),
(31, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Wakil rektor/dekan/direktur program pasca sarjana/ketua lembaga', 5),
(32, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik/kepala LLDikti', 4),
(33, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Pembantu ketua sekolah tinggi/pembantu direktur politeknik ', 4),
(34, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Direktur akademi', 4),
(35, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Pembantu direktur politeknik. ketua jurusan/ bagian pada universitas/ institut/sekolah tinggi', 3),
(36, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Pembantu direktur akademi/ketua jurusan/ketua prodi pada universitas/politeknik/akademi. sekretaris jurusan/bagian pada universitas/institut/sekolah tinggi', 3),
(37, 'Pelaksanaan Pendidikan', 'Menduduki jabatan pimpinan perguruan tinggi sesuai tugas pokok. fungsi dan kewenangan dan/atau setara (setiap semester) sebagai Sekretaris jurusan pada politeknik/akademi dan kepala laboratorium (bengkel) universitas/institut/sekolah tinggi/politeknik/akademi', 3),
(38, 'Pelaksanaan Pendidikan', 'Membimbing dosen yang mempunyai jabatan akademik lebih rendah setiap semester (bagi dosen Lektor Kepala ke atas) berupa Pembimbing pencangkokan', 2),
(39, 'Pelaksanaan Pendidikan', 'Membimbing dosen yang mempunyai jabatan akademik lebih rendah setiap semester (bagi dosen Lektor Kepala ke atas) berupa Regular', 1),
(40, 'Pelaksanaan Pendidikan', 'Melaksanakan kegiatan detasering di luar institusi tempat bekerja setiap semester (bagi dosen Lektor kepala ke atas)', 5),
(41, 'Pelaksanaan Pendidikan', 'Melaksanakan kegiatan pencangkokan di luar institusi tempat bekerja setiap semester (bagi dosen Lektor kepala ke atas)', 4),
(42, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya lebih dari 960 jam', 15),
(43, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 641- 960 jam', 9),
(44, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 481- 640 jam', 6),
(45, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 161- 480 jam', 3),
(46, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 81- 160 jam', 2),
(47, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 30 - 80 jam', 1),
(48, 'Pelaksanaan Pendidikan', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi Lamanya antara 10 - 30 jam', 0.5),
(49, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk Buku referensi', 40),
(50, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk Monograf', 20),
(51, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) dalam tingkat Internasional', 15),
(52, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) dalam tingkat Nasional', 10),
(53, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak)', 40),
(54, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal internasional terindeks pada basis data internasional bereputasi', 30),
(55, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal internasional terindeks pada basis data internasional di luar kategori 2)', 20),
(56, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal Nasional terakreditasi Dikti', 25),
(57, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal nasional terakreditasi Kemenristekdikti peringkat 1 dan 2', 25),
(58, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal Nasional berbahasa Inggris atau bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti', 20),
(59, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal nasional terakreditasi peringkat 3 dan 4', 20),
(60, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal Nasional berbahasa Indonesia terindeks pada basis data yang diakui Kemenristekdikti', 15),
(61, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal Nasional', 10),
(62, 'Penelitian', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya berupa Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional', 10),
(63, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) pada tingkat Internasional terindeks pada Scimagojr dan Scopus', 30),
(64, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) pada tingkat Internasional terindeks pada SCOPUS. IEEE Explore. SPIE', 25),
(65, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) pada tingkat Internasional', 15),
(66, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) pada tingkat Nasional', 10),
(67, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan pada tingkat Internasional', 10),
(68, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan pada tingkat Nasional', 5),
(69, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Disajikan dalam seminar/simposium/ lokakarya. tetapi tidak dimuat dalam prosiding yang dipublikasikan pada tingkat Internasional', 5),
(70, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan Disajikan dalam seminar/simposium/ lokakarya. tetapi tidak dimuat dalam prosiding yang dipublikasikan pada tingkat Nasional', 3),
(71, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan tidak disajikan dalam seminar/ simposium/ lokakarya. tetapi dimuat dalam prosiding pada tingkat Internasional', 10),
(72, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan tidak disajikan dalam seminar/ simposium/ lokakarya. tetapi dimuat dalam prosiding pada tingkat nasional', 5),
(73, 'Penelitian', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan disajikan dalam koran/majalah populer/umum', 1),
(74, 'Penelitian', 'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga', 2),
(75, 'Penelitian', 'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)', 15),
(76, 'Penelitian', 'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)', 10),
(77, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Internasional yang sudah diimplementasikan di industri (paling sedikit diakui oleh 4 Negara)', 60),
(78, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Internasional (paling sedikit diakui oleh 4 Negara)', 50),
(79, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional (yang sudah diimplementasikan di industri', 40),
(80, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional ', 30),
(81, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual. Kemenkumham', 20),
(82, 'Penelitian', 'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara Nasional dalam bentuk Karya ciptaan. desain industri. indikasi geografis yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual. Kemenkumham', 15),
(83, 'Penelitian', 'Membuat rancangan dan karya teknologi yang tidak dipatenkan. rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda Tingkat Internasional', 20),
(84, 'Penelitian', 'Membuat rancangan dan karya teknologi yang tidak dipatenkan. rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda Tingkat Nasional', 15),
(85, 'Penelitian', 'Membuat rancangan dan karya teknologi yang tidak dipatenkan. rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum yang teragenda Tingkat Lokal', 10),
(86, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual tingkat Internasional ', 20),
(87, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual tingkat Nasional', 15),
(88, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual tingkat Lokal', 10),
(89, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor Tingkat Internasional', 10),
(90, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor Tingkat Nasional', 6),
(91, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor Tingkat Lokal', 3),
(92, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat Foto Dokumentasi/Pewarta Foto/Pembawa Acara/Reporter/Redaktur Pelaksana Tingkat Internasional', 6),
(93, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat Foto Dokumentasi/Pewarta Foto/Pembawa Acara/Reporter/Redaktur Pelaksana Tingkat Nasional', 4),
(94, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat Foto Dokumentasi/Pewarta Foto/Pembawa Acara/Reporter/Redaktur Pelaksana Tingkat Lokal', 2),
(95, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Naskah Drama/Novel Tingkat Internasioanal', 20),
(96, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Naskah Drama/Novel Tingkat Nasional', 15),
(97, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Naskah Drama/Novel Tingkat Lokal', 10),
(98, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Cerpen Tingkat Internasioanal', 20),
(99, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Cerpen Tingkat Nasional', 15),
(100, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Cerpen Tingkat Lokal', 10),
(101, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Puisi Tingkat Internasioanal', 20),
(102, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Puisi Tingkat Nasional', 15),
(103, 'Penelitian', 'Membuat rancangan dan karya seni yang tidak terdaftar HaKI Sebagai Penulis Buku Kumpulan Puisi Tingkat Lokal', 10),
(104, 'Pengabdian', 'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester', 5.5),
(105, 'Pengabdian', 'Melaksanakan pengembangan hasil pendidikan. dan penelitian yang dapat dimanfaatkan oleh masyarakat/ industry setiap program', 3),
(106, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram Dalam satu semester atau lebih Tingkat Internasional tiap program', 4),
(107, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram Dalam satu semester atau lebih Tingkat Nasional. tiap program', 3),
(108, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram Dalam satu semester atau lebih Tingkat Lokal. tiap program', 2),
(109, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram ) Kurang dari satu semester dan minimal satu bulan Tingkat Internasional. tiap program', 3),
(110, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram ) Kurang dari satu semester dan minimal satu bulan Tingkat Nasional. tiap program', 2),
(111, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram ) Kurang dari satu semester dan minimal satu bulan Tingkat Lokal. tiap program', 1),
(112, 'Pengabdian', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat. terjadwal/terprogram ) Kurang dari satu semester dan minimal satu bulan Insidental. tiap kegiatan/program', 1),
(113, 'Pengabdian', 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan Berdasarkan bidang keahlian. tiap program', 1.5),
(114, 'Pengabdian', 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan Berdasarkan penugasan lembaga terguruan tinggi. tiap program', 1),
(115, 'Pengabdian', 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan Berdasarkan fungsi/jabatan tiap program', 0.5),
(116, 'Pengabdian', 'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan.tiap karya', 3),
(117, 'Pengabdian', 'Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala/jurnal pengabdian kepada masyarakat atau teknologi tepat guna. merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat. tiap karya', 5),
(118, 'Pengabdian', 'Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun) sebagai Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional', 1),
(119, 'Pengabdian', 'Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun) sebagai Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional', 0.5),
(120, 'Penunjang', 'Menjadi anggota dalam suatu Panitia/Badan pada Perguruan Tinggi Sebagai Ketua/Wakil Ketua merangkap Anggota. tiap tahun', 3),
(121, 'Penunjang', 'Menjadi anggota dalam suatu Panitia/Badan pada Perguruan Tinggi Sebagai Anggota. tiap tahun', 2),
(122, 'Penunjang', 'Menjadi anggota panitia/badan pada lembaga pemerintah pada  Panitia Pusat. sebagai Ketua/Wakil Ketua. tiap kepanitiaan', 3),
(123, 'Penunjang', 'Menjadi anggota panitia/badan pada lembaga pemerintah pada  Panitia Pusat. sebagai Anggota. tiap kepanitiaan', 2),
(124, 'Penunjang', 'Menjadi anggota panitia/badan pada lembaga pemerintah pada  Panitia Daerah. sebagai Ketua/Wakil Ketua. tiap kepanitiaan', 2),
(125, 'Penunjang', 'Menjadi anggota panitia/badan pada lembaga pemerintah pada  Panitia Daerah. sebagai Anggota. tiap kepanitiaan', 1),
(126, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Internasional. sebagai Pengurus. tiap periode jabatan', 2),
(127, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Internasional. sebagai Anggota atas permintaan. tiap periode jabatan', 1),
(128, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Internasional. sebagai Anggota. tiap periode jabatan', 0.5),
(129, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Nasional. sebagai Pengurus. tiap periode jabatan', 1.5),
(130, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Nasional. sebagai Anggota atas permintaan. tiap periode jabatan', 1),
(131, 'Penunjang', 'Menjadi anggota organisasi profesi Tingkat Nasional. sebagai Anggota. tiap periode jabatan', 2),
(132, 'Penunjang', 'Mewakili Perguruan Tinggi/Lembaga Pemerintah duduk dalam Panitia Antar Lembaga. tiap kepanitiaan', 1),
(133, 'Penunjang', 'Menjadi anggota delegasi Nasional ke pertemuan Internasional Sebagai Ketua delegasi. tiap kegiatan', 3),
(134, 'Penunjang', 'Menjadi anggota delegasi Nasional ke pertemuan Internasional Sebagai Anggota. tiap kegiatan', 2),
(135, 'Penunjang', 'Berperan serta aktif dalam pertemuan ilmiah Tingkat Internasional/Nasional/Regional sebagai Ketua. tiap kegiatan', 3),
(136, 'Penunjang', 'Berperan serta aktif dalam pertemuan ilmiah Tingkat Internasional/Nasional/Regional sebagai Anggota/peserta. tiap kegiatan', 2),
(137, 'Penunjang', 'Berperan serta aktif dalam pertemuan ilmiah Di lingkungan Perguruan Tinggi sebagai Ketua. tiap kegiatan', 2),
(138, 'Penunjang', 'Berperan serta aktif dalam pertemuan ilmiah Di lingkungan Perguruan Tinggi sebagai Anggota/peserta. tiap kegiatan', 1),
(139, 'Penunjang', 'Mendapatkan Penghargaan/tanda jasa Satya lencana 30 tahun', 3),
(140, 'Penunjang', 'Mendapatkan Penghargaan/tanda jasa Satya lencana 20 tahun', 2),
(141, 'Penunjang', 'Mendapatkan Penghargaan/tanda jasa Satya lencana 10 tahun', 1),
(142, 'Penunjang', 'Mendapat tanda jasa/penghargaan Tingkat Internasional. tiap tanda jasa/penghargaan', 5),
(143, 'Penunjang', 'Mendapat tanda jasa/penghargaan Tingkat Nasional. tiap tanda jasa/penghargaan', 3),
(144, 'Penunjang', 'Mendapat tanda jasa/penghargaan Tingkat Daerah/Lokal. tiap tanda jasa/penghargaan', 1),
(145, 'Penunjang', 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional berupa Buku SMTA atau setingkat. tiap buku', 5),
(146, 'Penunjang', 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional berupa Buku SMTP atau setingkat. tiap buku', 5),
(147, 'Penunjang', 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional berupa Buku SD atau setingkat. tiap buku', 5),
(148, 'Penunjang', 'Mempunyai prestasi di bidang olahraga/ Humaniora Tingkat Internasional. tiap piagam/medali', 5),
(149, 'Penunjang', 'Mempunyai prestasi di bidang olahraga/ Humaniora Tingkat Nasional. tiap piagam/medali', 3),
(150, 'Penunjang', 'Mempunyai prestasi di bidang olahraga/ Humaniora Tingkat Daerah/Lokal. tiap piagam/medali', 1),
(151, 'Penunjang', 'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)', 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_kum`
--

CREATE TABLE `syarat_kum` (
  `id_kum` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `total_pak` int(11) NOT NULL,
  `pelaksanaan_pendidikan` double NOT NULL,
  `penelitian` double NOT NULL,
  `pengabdian` double NOT NULL,
  `penunjang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat_kum`
--

INSERT INTO `syarat_kum` (`id_kum`, `nama_jabatan`, `total_pak`, `pelaksanaan_pendidikan`, `penelitian`, `pengabdian`, `penunjang`) VALUES
(1, 'Asisten Ahli III/a', 100, 55, 25, 10, 10),
(2, 'Asisten Ahli III/b', 150, 82.5, 37.5, 15, 15),
(3, 'Lektor III/c', 200, 90, 70, 20, 20),
(4, 'Lektor III/d', 300, 135, 105, 30, 30),
(5, 'Lektor Kepala IV/a', 400, 160, 160, 40, 40),
(6, 'Lektor Kepala IV/b', 550, 220, 220, 55, 55),
(7, 'Lektor Kepala IV/c', 700, 280, 280, 70, 70),
(8, 'Guru Besar IV/d', 850, 297.5, 382.5, 85, 85),
(9, 'Guru Besar IV/e', 1050, 367.5, 472.5, 105, 105);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_pak`
--
ALTER TABLE `berkas_pak`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `kode_rubrik` (`kode_rubrik`),
  ADD KEY `berkas_pak_ibfk_1` (`id_pengajuan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip_dosen`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip_pegawai`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_kum` (`id_kum`),
  ADD KEY `nip_dosen` (`nip_dosen`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`nip_penilai`);

--
-- Indexes for table `rubrik`
--
ALTER TABLE `rubrik`
  ADD PRIMARY KEY (`kode_rubrik`);

--
-- Indexes for table `syarat_kum`
--
ALTER TABLE `syarat_kum`
  ADD PRIMARY KEY (`id_kum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_pak`
--
ALTER TABLE `berkas_pak`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `syarat_kum`
--
ALTER TABLE `syarat_kum`
  MODIFY `id_kum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas_pak`
--
ALTER TABLE `berkas_pak`
  ADD CONSTRAINT `berkas_pak_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berkas_pak_ibfk_2` FOREIGN KEY (`kode_rubrik`) REFERENCES `rubrik` (`kode_rubrik`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_kum`) REFERENCES `syarat_kum` (`id_kum`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
