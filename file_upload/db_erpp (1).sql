-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 07:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_erpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_datsek`
--

CREATE TABLE `tb_datsek` (
  `id` int(11) NOT NULL,
  `npsn` varchar(15) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `logo` varchar(128) NOT NULL,
  `nama_kepsek` varchar(255) NOT NULL,
  `nip_kepsek` varchar(40) NOT NULL,
  `kurikulum` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datsek`
--

INSERT INTO `tb_datsek` (`id`, `npsn`, `nama_sekolah`, `alamat`, `logo`, `nama_kepsek`, `nip_kepsek`, `kurikulum`, `ket`) VALUES
(1, '20535450', 'SMK PGRI 4 PASURUAN', 'Jalan Ki Hajar Dewantara 27-29, Tembokrejo, Pasuruan.', 'logo.png', 'Iwan Bashori, S.Pd', '13.25.02.00245', '', 'Terakreditasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `bidang_keahlian` varchar(255) NOT NULL,
  `prog_keahlian` varchar(255) NOT NULL,
  `komp_keahlian` varchar(255) NOT NULL,
  `prog_pend` varchar(20) NOT NULL,
  `ket` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `bidang_keahlian`, `prog_keahlian`, `komp_keahlian`, `prog_pend`, `ket`) VALUES
(1, 'Bisnis dan Manajemen', 'Manajemen Perkantoran', 'Otomatisasi dan Tata Kelola Perkantoran', '3 Tahun', 'OTKP'),
(2, 'Bisnis dan Manajemen', 'Akuntansi dan Keuangan', 'Akuntansi dan Keuangan Lembaga', '3 Tahun', 'AKL'),
(3, 'Pariwisata', 'Tata Kecantikan', 'Tata Kecantikan Kulit dan Rambut', '3 Tahun', 'TKKR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kko`
--

CREATE TABLE `tb_kko` (
  `id` int(11) NOT NULL,
  `kko_pengetahuan` varchar(255) NOT NULL,
  `kko_keterampilan` varchar(255) NOT NULL,
  `kko_sikap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kko`
--

INSERT INTO `tb_kko` (`id`, `kko_pengetahuan`, `kko_keterampilan`, `kko_sikap`) VALUES
(1, 'Melaporkan', 'Mengaktifkan', 'Berakhlak mulia'),
(2, 'Memasangkan', 'Menyesuaikan', 'Melaporkan'),
(3, 'Membaca', 'Menggabungkan', 'Melayani'),
(4, 'Membandingkan', 'Melamar', 'Melengkapi'),
(5, 'Membedakan', 'Mengatur', 'Memadukan'),
(6, 'Memberi indeks', 'Mengumpulkan', 'Mematuhi'),
(7, 'Memberi kode', 'Menimbang', 'Membangun'),
(8, 'Memberi label', 'Memperkecil', 'Membantu'),
(9, 'Membilang', 'Membangun', 'Membedakan'),
(10, 'Memecahkan', 'Mengubah', 'Membentuk pendapat'),
(11, 'Memilih', 'Membersihkan', 'Memberi'),
(12, 'Mempelajari', 'Memposisikan', 'Membuktikan'),
(13, 'Memperkirakan', 'Mengonstruksi', 'Memecahkan'),
(14, 'Memperluas', 'Mendemonstrasikan', 'Memenuhi'),
(15, 'Mempertahankan', 'Merancang', 'Memilah'),
(16, 'Mempolakan', 'Memilah', 'Memilih'),
(17, 'Memprediksi', 'Melatih', 'Meminati'),
(18, 'Menafsirkan', 'Memperbaiki', 'Meminta'),
(19, 'Menamai', 'Mengidentifikasikan', 'Mempengaruhi'),
(20, 'Menampilkan', 'Mengisi', 'Memperhatikan'),
(21, 'Menandai', 'Menempatkan', 'Memperjelas'),
(22, 'Mencatat', 'Membuat', 'Mempertahankan'),
(23, 'Mencerahkan', 'Memanipulasi', 'Mempertanyakan'),
(24, 'Menceritakan', 'Mereparasi', 'Memprakarsai'),
(25, 'Mencirikan', 'Mencampur', 'Mempraktikkan'),
(26, 'Mencontohkan', 'Menggantikan', 'Menampilkan'),
(27, 'Mendaftar', 'Memutar', 'Menanyakan'),
(28, 'Mendefinisikan', 'Mengirim', 'Menata'),
(29, 'Mendeteksi', 'Memindahkan', 'Menceritakan'),
(30, 'Mendiagnosis', 'Mendorong', 'Mendengarkan'),
(31, 'Mendiagramkan', 'Menarik', 'Mendiskusikan'),
(32, 'Mendiskusikan', 'Memproduksi', 'Mendukung'),
(33, 'Menegaskan', 'Mencampur', 'Menegosiasi'),
(34, 'Menelusuri', 'Mengoperasikan', 'Menekankan'),
(35, 'Menempatkan', 'Mengemas', 'Mengajukan'),
(36, 'Menerangkan', 'Membungkus', 'Menganut'),
(37, 'Menerbitkan', 'Mengalihkan', 'Mengatakan'),
(38, 'Mengabstraksikan', 'Mempertajam', 'Mengelola'),
(39, 'Menganalisis', 'Membentuk', 'Mengendalikan diri'),
(40, 'Mengartikan', 'Memadankan', 'Menggabungkan'),
(41, 'Mengasosiasikan', 'Menggunakan', 'Mengikuti'),
(42, 'Mengaudit', 'Memulai', 'Mengimani'),
(43, 'Mengelompokkan', 'Menyetir', 'Menginterpretasikan'),
(44, 'Mengemukakan', 'Menjeniskan', 'Mengklasifikasikan'),
(45, 'Mengenal', 'Menempel', 'Mengkualifikasi'),
(46, 'Mengenali', 'Mensketsa', 'Mengombinasikan'),
(47, 'Mengetahui', 'Melonggarkan', 'Mengompromikan'),
(48, 'Menggali', 'Menimbang', 'Mengubah'),
(49, 'Menggambar', 'Mengikuti', 'Mengundang'),
(50, 'Menggarisbawahi', 'Mereplikasi', 'Mengusulkan'),
(51, 'Menggeneralisasi', 'Mengulangi', 'Menjawab'),
(52, 'Menggolongkan', 'Kembali membuat', 'Menolak'),
(53, 'Menghafal', 'Melakukan', 'Menunjukkan'),
(54, 'Menghitung', 'Melaksanakan', 'Menyajikan'),
(55, 'Mengidentifikasi', 'Menerapkan', 'Menyambut'),
(56, 'Mengilustrasikan', 'Menunjukan', 'Menyenangi'),
(57, 'Meng-inferensi', 'Melengkapi', 'Menyetujui'),
(58, 'Mengingat', 'Menyempurnakan', 'Menyumbang'),
(59, 'Menginterpolasi', 'Mengkalibrasi', 'Merembuk'),
(60, 'Menginterpretasi', 'Mengendalikan', 'Meyakini'),
(61, 'Mengkategorikan', 'Mengatasi', 'Meyakinkan'),
(62, 'Mengklasifikasi', 'Mengintegrasikan', 'Mengasumsikan'),
(63, 'Mengkontraskan', 'Meng-adaptasi', 'Berinisiatif'),
(64, 'Mengkorelasikan', 'Mengembangkan', 'Bertindak'),
(65, 'Mengubah', 'Merumuskan', 'Melaksanakan'),
(66, 'Menguji', 'Memodifikasi', 'Melakukan'),
(67, 'Mengulang', 'Menentukan', 'Membandingkan'),
(68, 'Mengulangi', 'Mengelola', 'Membatasi'),
(69, 'Mengungkapkan', 'Meniru', 'Membenarkan'),
(70, 'Menguraikan', 'Menciptakan kembali', 'Membentuk'),
(71, 'Mengutip', 'Mengimplementasikan', 'Membiasakan'),
(72, 'Meninjau', 'Mengontrol', 'Memisahkan'),
(73, 'Meniru', 'Mengkonstruksikan', 'Memodifikasi'),
(74, 'Menjabarkan', 'Memecahkan', 'Memperbaiki'),
(75, 'Menjalin', 'Mengkombinasikan', 'Memperlihatkan'),
(76, 'Menjelajah', 'Mengkoordinasikan', 'Mempersoalkan'),
(77, 'Menjelaskan', 'Memformulasi', 'Mempertahankan Pendapat'),
(78, 'Menominasikan', 'Menspesifikasi', 'Mempertimbangkan'),
(79, 'Mentabulasi', 'Mengoreksi', 'Mempresentasikan'),
(80, 'Menterjemahkan', 'Mematuhi', 'Menahan diri'),
(81, 'Menulis', 'Mendesain', 'Mendemonstrasikan'),
(82, 'Menunjukkan', 'Mengalihkan', 'Mendengar'),
(83, 'Menyadari', 'Menyalin', 'Mengaitkan'),
(84, 'Menyarankan', 'Merancang', 'Mengatur'),
(85, 'Menyatakan', '', 'Menghubungkan'),
(86, 'Menyebutkan', '', 'Mengidentifikasi'),
(87, 'Menyeleksi', '', 'Mengidentifikasikan'),
(88, 'Menyimpulkan', '', 'Mengintegrasikan'),
(89, 'Meramalkan', '', 'Mengorganisir'),
(90, 'Merangkum', '', 'MenjawabMentaati'),
(91, 'Merasionalkan', '', 'Menjelaskan'),
(92, 'Mereproduksi', '', 'Menjustifikasi'),
(93, 'Merinci', '', 'Mentaati'),
(94, 'Meringkas', '', 'Menulis'),
(95, 'Membagankan', '', 'Menyamakan'),
(96, 'Melatih', '', 'Menyatakan pendapat'),
(97, 'Memadukan', '', 'Menyatakan'),
(98, 'Memaksimalkan', '', 'Menyatukan pendapat'),
(99, 'Membangun', '', 'Menyelesaikan'),
(100, 'Membangunkan', '', 'Menyempurnakan'),
(101, 'Membatas', '', 'Menyepakati'),
(102, 'Membenarkan', '', 'Menyesuaikan'),
(103, 'Membentuk', '', 'Menyusun'),
(104, 'Membuat', '', 'Merancang'),
(105, 'Membuktikan', '', 'Merevisi'),
(106, 'Memeriksa', '', 'Merumuskan'),
(107, 'Memerinci', '', ''),
(108, 'Memerintahkan', '', ''),
(109, 'Memfasilitasi', '', ''),
(110, 'Memfokuskan', '', ''),
(111, 'Memformulasikan', '', ''),
(112, 'Memisahkan', '', ''),
(113, 'Memonitor', '', ''),
(114, 'Memperbaharui', '', ''),
(115, 'Memperbaiki', '', ''),
(116, 'Memperindah', '', ''),
(117, 'Memperjelas', '', ''),
(118, 'Memperkuat', '', ''),
(119, 'Mempersiapkan', '', ''),
(120, 'Memproduksi', '', ''),
(121, 'Memproyeksikan', '', ''),
(122, 'Memutuskan', '', ''),
(123, 'Memvalidasi', '', ''),
(124, 'Menaksir', '', ''),
(125, 'Menanggulangi', '', ''),
(126, 'Menanyakan', '', ''),
(127, 'Menata', '', ''),
(128, 'Menciptakan', '', ''),
(129, 'Mencobakan', '', ''),
(130, 'Mendebat', '', ''),
(131, 'Mendiferensiasi', '', ''),
(132, 'Mendikte', '', ''),
(133, 'Mendukung', '', ''),
(134, 'Menelaah', '', ''),
(135, 'Menemukan', '', ''),
(136, 'Menemutunjukan', '', ''),
(137, 'Menentukan', '', ''),
(138, 'Menetapkan sifat/ciri', '', ''),
(139, 'Mengabstraksi', '', ''),
(140, 'Mengaitkan', '', ''),
(141, 'Mengajukan', '', ''),
(142, 'Menganimasi', '', ''),
(143, 'Mengapresiasi', '', ''),
(144, 'Mengarahkan', '', ''),
(145, 'Mengarang', '', ''),
(146, 'Mengatribusi', '', ''),
(147, 'Mengatur', '', ''),
(148, 'Mengecek', '', ''),
(149, 'Mengedit', '', ''),
(150, 'Mengelola', '', ''),
(151, 'Mengetes', '', ''),
(152, 'Mengevaluasi', '', ''),
(153, 'Menggabungkan', '', ''),
(154, 'Menghasilkankarya', '', ''),
(155, 'Menghubungkan', '', ''),
(156, 'Mengingatkan', '', ''),
(157, 'Menginventarisir', '', ''),
(158, 'Mengkode', '', ''),
(159, 'Mengkoleksi', '', ''),
(160, 'Mengkombinasikan', '', ''),
(161, 'Mengkonstruksi', '', ''),
(162, 'Mengkoordinasikan', '', ''),
(163, 'Mengkreasikan', '', ''),
(164, 'Mengkritik', '', ''),
(165, 'Mengkritisi', '', ''),
(166, 'Mengombinasikan', '', ''),
(167, 'Mengoreksi', '', ''),
(168, 'Mengorganisasi', '', ''),
(169, 'Mengstruktur', '', ''),
(170, 'Mengukur', '', ''),
(171, 'Mengumpulkan', '', ''),
(172, 'Mengurai', '', ''),
(173, 'Mengusulkan', '', ''),
(174, 'Menilai', '', ''),
(175, 'Menimbang', '', ''),
(176, 'Meningkatkan', '', ''),
(177, 'Menskor', '', ''),
(178, 'Mentransfer', '', ''),
(179, 'Menugaskan', '', ''),
(180, 'Menyalahkan', '', ''),
(181, 'Menyempurnakan', '', ''),
(182, 'Menyiapkan', '', ''),
(183, 'Menyusun', '', ''),
(184, 'Merancang', '', ''),
(185, 'Meranking', '', ''),
(186, 'Merekonstruksi', '', ''),
(187, 'Merencanakan', '', ''),
(188, 'Mereparasi', '', ''),
(189, 'Merumuskan', '', ''),
(190, 'Hipotesis', '', ''),
(191, 'Memadukan', '', ''),
(192, 'Memproduksi', '', ''),
(193, 'Memunculkan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kko_keterampilan`
--

CREATE TABLE `tb_kko_keterampilan` (
  `id` int(11) NOT NULL,
  `p1_menirukan` varchar(128) NOT NULL,
  `p2_memanipulasi` varchar(128) NOT NULL,
  `p3_pengalamiahan` varchar(128) NOT NULL,
  `p4_artikulasi` varchar(128) NOT NULL,
  `p5_imitasi` varchar(128) NOT NULL,
  `p6_presisi` varchar(128) NOT NULL,
  `p7_naturalisasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kko_keterampilan`
--

INSERT INTO `tb_kko_keterampilan` (`id`, `p1_menirukan`, `p2_memanipulasi`, `p3_pengalamiahan`, `p4_artikulasi`, `p5_imitasi`, `p6_presisi`, `p7_naturalisasi`) VALUES
(1, 'Mengaktifkan', 'Mengoreksi', 'Mengalihkan', 'Mengalihkan', 'Menyalin', 'Menunjukan', 'Mendesain'),
(2, 'Menyesuaikan', 'Mendemonstrasikan', 'Menggantikan', 'Mempertajam', 'Mengikuti', 'Melengkapi', 'Menentukan'),
(3, 'Menggabungkan', 'Merancang', 'Memutar', 'Membentuk', 'Mereplikasi', 'Menyempurnakan', 'Mengelola'),
(4, 'Melamar', 'Memilah', 'Mengirim', 'Memadankan', 'Mengulangi', 'Mengkalibrasi', 'Merancang'),
(5, 'Mengatur', 'Melatih', 'Memindahkan', 'Menggunakan', 'mematuhi ', 'Mengendalikan', 'Menspesifikasi'),
(6, 'Mengumpulkan', 'Memperbaiki', 'Mendorong', 'Memulai', 'Meniru', 'Mendemonstrasikan', ''),
(7, 'Menimbang', 'Mengidentifikasikan', 'Menarik', 'Menyetir', '', 'Mengontrol', ''),
(8, 'Memperkecil', 'Mengisi', 'Memproduksi', 'Menjeniskan', '', '', ''),
(9, 'Membangun', 'Menempatkan', 'Mencampur', 'Menempel', '', '', ''),
(10, 'Mengubah', 'Membuat', 'Mengoperasikan', 'Mensketsa', '', '', ''),
(11, 'Membersihkan', 'Memanipulasi', 'Mengemas', 'Melonggarkan', '', '', ''),
(12, 'Memposisikan', 'Mereparasi', 'Membungkus', 'Menimbang', '', '', ''),
(13, 'Mengonstruksi', 'Mencampur', '', 'Membangun', '', '', ''),
(14, '', 'Kembali membuat', '', 'Mengatasi', '', '', ''),
(15, '', 'Membangun', '', 'Menggabungkan', '', '', ''),
(16, '', 'Melakukan', '', 'Mengintegrasikan', '', '', ''),
(17, '', 'Melaksanakan', '', 'Meng-adaptasi', '', '', ''),
(18, '', 'Menerapkan', '', 'Mengembangkan', '', '', ''),
(19, '', 'Menciptakan kembali', '', 'Merumuskan', '', '', ''),
(20, '', 'Menunjukan', '', 'Memodifikasi', '', '', ''),
(21, '', 'Mengimplementasikan', '', 'Mengkonstruksikan', '', '', ''),
(22, '', '', '', 'Memecahkan', '', '', ''),
(23, '', '', '', 'Mengkombinasikan', '', '', ''),
(24, '', '', '', 'Mengkoordinasikan', '', '', ''),
(25, '', '', '', 'Memformulasi', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kko_pengetahuan`
--

CREATE TABLE `tb_kko_pengetahuan` (
  `id` int(11) NOT NULL,
  `c1_pengetahuan` varchar(128) NOT NULL,
  `c2_pemahaman` varchar(128) NOT NULL,
  `c3_penerapan` varchar(128) NOT NULL,
  `c4_analisis` varchar(128) NOT NULL,
  `c5_penilaian` varchar(128) NOT NULL,
  `c6_sintesis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kko_pengetahuan`
--

INSERT INTO `tb_kko_pengetahuan` (`id`, `c1_pengetahuan`, `c2_pemahaman`, `c3_penerapan`, `c4_analisis`, `c5_penilaian`, `c6_sintesis`) VALUES
(7, 'Pengetahuan 1', 'Pemahaman 1', 'Penerapan 1', 'Analisis 1', 'Penilaian 1', 'Sintesis 1'),
(8, 'Pengetahuan 2', 'Pemahaman 2', 'Penerapan 2', 'Analisis 2', 'Penilaian 2', 'Sintesis 2'),
(9, 'Pengetahuan 3', 'Pemahaman 3', 'Penerapan 3', 'Analisis 3', 'Penilaian 3', 'Sintesis 3'),
(10, 'Pengetahuan 1', 'Pemahaman 1', 'Penerapan 1', 'Analisis 1', 'Penilaian 1', 'Sintesis 1'),
(11, 'Pengetahuan 2', 'Pemahaman 2', 'Penerapan 2', 'Analisis 2', 'Penilaian 2', 'Sintesis 2'),
(12, 'Pengetahuan 3', 'Pemahaman 3', 'Penerapan 3', 'Analisis 3', 'Penilaian 3', 'Sintesis 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kko_sikap`
--

CREATE TABLE `tb_kko_sikap` (
  `id` int(11) NOT NULL,
  `c1_menerima` varchar(128) NOT NULL,
  `c2_menanggapi` varchar(128) NOT NULL,
  `c3_menilai` varchar(128) NOT NULL,
  `c4_menghayati` varchar(128) NOT NULL,
  `c5_mengamalkan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kko_sikap`
--

INSERT INTO `tb_kko_sikap` (`id`, `c1_menerima`, `c2_menanggapi`, `c3_menilai`, `c4_menghayati`, `c5_mengamalkan`) VALUES
(1, 'data 1', 'data 2', 'data 3', 'data 4', 'data 5'),
(2, 'data 1', 'data 2', 'data 3', 'data 4', 'data 5'),
(3, 'data 1', 'data 2', 'data 3', 'data 4', 'data 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurikulum`
--

CREATE TABLE `tb_kurikulum` (
  `id` int(11) NOT NULL,
  `tahun_ajar` varchar(128) NOT NULL,
  `jenis_kurikulum` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kurikulum`
--

INSERT INTO `tb_kurikulum` (`id`, `tahun_ajar`, `jenis_kurikulum`, `ket`) VALUES
(1, '2021/2022', 'K-13 Revisi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `id_kurikulum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `kode_mapel`, `nama_mapel`, `id_kurikulum`) VALUES
(2, 'PABP', 'Pendidikan Agama dan Budi Pekerti', 1),
(3, 'PPKN', 'Pendidikan Pancasila dan Kewarganegaraan', 1),
(4, 'BIND', 'Bahasa Indonesia', 1),
(5, 'MAT', 'Matematika', 1),
(6, 'BING', 'Bahasa Inggris', 1),
(7, 'SI', 'Sejarah Indonesia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_model_pemb`
--

CREATE TABLE `tb_model_pemb` (
  `id` int(11) NOT NULL,
  `jenis_model_pemb` varchar(255) NOT NULL,
  `penjelasan_model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_model_pemb`
--

INSERT INTO `tb_model_pemb` (`id`, `jenis_model_pemb`, `penjelasan_model`) VALUES
(21, 'Model Pembelajaran 1', 'Penjelasan 1'),
(22, 'Model Pembelajaran 2', 'Penjelasan 2'),
(23, 'Model Pembelajaran 3', 'Penjelasan 3'),
(24, 'Model Pembelajaran 4', 'Penjelasan 4'),
(25, 'Model Pembelajaran 5', 'Penjelasan 5'),
(26, 'Model Pembelajaran 6', 'Penjelasan 6'),
(27, 'Model Pembelajaran 7', 'Penjelasan 7'),
(28, 'Model Pembelajaran 8', 'Penjelasan 8'),
(29, 'Model Pembelajaran 9', 'Penjelasan 9'),
(30, 'Model Pembelajaran 10', 'Penjelasan 10'),
(31, 'Model Pembelajaran 11', 'Penjelasan 11'),
(32, 'Model Pembelajaran 12', 'Penjelasan 12'),
(33, 'Model Pembelajaran 13', 'Penjelasan 13'),
(34, 'Model Pembelajaran 14', 'Penjelasan 14'),
(35, 'Model Pembelajaran 15', 'Penjelasan 15'),
(36, 'Model Pembelajaran 16', 'Penjelasan 16'),
(37, 'Model Pembelajaran 17', 'Penjelasan 17'),
(38, 'Model Pembelajaran 18', 'Penjelasan 18'),
(39, 'Model Pembelajaran 19', 'Penjelasan 19'),
(40, 'Model Pembelajaran 20', 'Penjelasan 20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `tingkat_kelas` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rombel`
--

INSERT INTO `tb_rombel` (`id`, `id_jurusan`, `tingkat_kelas`, `nama_kelas`, `ket`) VALUES
(1, 2, 'X', 'X AKL', ''),
(2, 1, 'X', 'X OTKP 1', ''),
(3, 1, 'X', 'X OTKP 2', ''),
(4, 3, 'X', 'X TKKR', ''),
(5, 2, 'XI', 'XI AKL', ''),
(6, 1, 'XI', 'XI OTKP 1', ''),
(7, 1, 'XI', 'XI OTKP 2', ''),
(8, 3, 'XI', 'XI TKKR', ''),
(9, 2, 'XII', 'XII AKL', ''),
(10, 1, 'XII', 'XII OTKP 1', ''),
(11, 1, 'XII', 'XII OTKP 2', ''),
(12, 3, 'XII', 'XII TKKR', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_cetak`
--

CREATE TABLE `tb_rpp_cetak` (
  `id_cetak` int(11) NOT NULL,
  `id_rpp_data` int(11) NOT NULL,
  `id_rpp_tujuan` int(11) NOT NULL,
  `id_rpp_model` int(11) NOT NULL,
  `id_rpp_penilaian` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_data`
--

CREATE TABLE `tb_rpp_data` (
  `id_data` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `kode_kikd_peng` varchar(64) NOT NULL,
  `ket_kd_peng` varchar(255) NOT NULL,
  `kode_kikd_ket` varchar(64) NOT NULL,
  `ket_kd_ket` varchar(255) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `materi_pokok` varchar(255) NOT NULL,
  `alokasi_waktu` varchar(255) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_model`
--

CREATE TABLE `tb_rpp_model` (
  `id_model` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_model_pemb` int(11) NOT NULL,
  `judul_awal` varchar(255) NOT NULL,
  `keg_awal` varchar(255) NOT NULL,
  `judul_akhir` varchar(255) NOT NULL,
  `keg_akhir` varchar(255) NOT NULL,
  `judul_inti` varchar(255) NOT NULL,
  `sintak1` varchar(255) NOT NULL,
  `aktifitas1` varchar(255) NOT NULL,
  `sintak2` varchar(255) NOT NULL,
  `aktifitas2` varchar(255) NOT NULL,
  `sintak3` varchar(255) NOT NULL,
  `aktifitas3` varchar(255) NOT NULL,
  `sintak4` varchar(255) NOT NULL,
  `aktifitas4` varchar(255) NOT NULL,
  `sintak5` varchar(255) NOT NULL,
  `aktifitas5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_penilaian`
--

CREATE TABLE `tb_rpp_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `judul_penilaian` varchar(255) NOT NULL,
  `pengetahuan` varchar(255) NOT NULL,
  `keterampilan` varchar(255) NOT NULL,
  `sikap` varchar(255) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_promes`
--

CREATE TABLE `tb_rpp_promes` (
  `id` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_bulan_semester` int(11) NOT NULL,
  `alokasi_waktu` int(11) NOT NULL,
  `efektif` int(11) NOT NULL,
  `tidak_efektif` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpp_tujuan`
--

CREATE TABLE `tb_rpp_tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `t_audience` varchar(255) NOT NULL,
  `t_behaviour` varchar(255) NOT NULL,
  `kko_1` varchar(255) NOT NULL,
  `t_condition` varchar(255) NOT NULL,
  `t_degree` varchar(255) NOT NULL,
  `kko_2` varchar(255) NOT NULL,
  `t_behaviour_2` varchar(255) NOT NULL,
  `kko_3` varchar(255) NOT NULL,
  `t_behaviour_3` varchar(255) NOT NULL,
  `kko_4` varchar(255) NOT NULL,
  `t_behaviour_4` varchar(255) NOT NULL,
  `sumber_belajar` varchar(255) NOT NULL,
  `id_model_pemb` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id` int(11) NOT NULL,
  `ket_semester` varchar(128) NOT NULL,
  `bulan1` varchar(20) NOT NULL,
  `bulan2` varchar(20) NOT NULL,
  `bulan3` varchar(20) NOT NULL,
  `bulan4` varchar(20) NOT NULL,
  `bulan5` varchar(20) NOT NULL,
  `bulan6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id`, `ket_semester`, `bulan1`, `bulan2`, `bulan3`, `bulan4`, `bulan5`, `bulan6`) VALUES
(25, 'Ganjil', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
(26, 'Genap', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni');

-- --------------------------------------------------------

--
-- Table structure for table `tb_silabus`
--

CREATE TABLE `tb_silabus` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `kode_kikd` varchar(128) NOT NULL,
  `kompetensi_dasar` varchar(255) NOT NULL,
  `indikator_capai` varchar(255) NOT NULL,
  `materi_pokok` varchar(255) NOT NULL,
  `jp` varchar(10) NOT NULL,
  `keg_pembelajaran` varchar(255) NOT NULL,
  `alternatif_nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas_guru`
--

CREATE TABLE `tb_tugas_guru` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_uacc_menu`
--

CREATE TABLE `tb_uacc_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uacc_menu`
--

INSERT INTO `tb_uacc_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(5, 1, 4),
(7, 3, 3),
(15, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umenu`
--

CREATE TABLE `tb_umenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_umenu`
--

INSERT INTO `tb_umenu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Kepsek'),
(4, 'Menu'),
(7, 'RPP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pass_tampil` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_ket_guru` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `image`, `email`, `password`, `pass_tampil`, `role_id`, `id_ket_guru`, `is_active`, `tanggal_buat`) VALUES
(1, 'Mohammad Khusnul Chuluq', '1234567890', 'Pasuruan', '1 Januari 1990', 'Laki-Laki', '1.jpg', 'lukylukk37@gmail.com', '$2y$10$J0uaHvSohImOGSPbO80FSO60nae2yxt8qyoGXXad/J2SgtcjhybEK', '123456', 1, 1, 1, 1616460862),
(3, 'Iwan Bashori', '1234567890', 'Pasuruan', '1 Januari 1990', 'Laki-Laki', 'default.jpg', 'iwanbashori@gmail.com', '$2y$10$J0uaHvSohImOGSPbO80FSO60nae2yxt8qyoGXXad/J2SgtcjhybEK', '123456', 3, 3, 1, 1616461725),
(4, 'Khusnul Chuluq User', '1234567890', 'Pasuruan', '1 Januari 1990', 'Laki-Laki', 'default.jpg', 'ratna_mundir@yahoo.com', '$2y$10$J0uaHvSohImOGSPbO80FSO60nae2yxt8qyoGXXad/J2SgtcjhybEK', '123456', 2, 2, 1, 1622431877),
(9, 'Abdul Rahman', '1234567890', 'Probolinggo', '1 Januari 1990', 'Laki-Laki', 'default.jpg', 'abdulrahman@email.com', '$2y$10$vRa.nf0SUfMwMzm5IdfG0OJOiiBFKalSjJnawOdrr2rr9ruzDckpC', '123456', 2, 2, 1, 1622956713),
(10, 'Khalim Aprilia edit', '7878787878', 'Pasuruan', '2 Januari 1990', 'Perempuan', 'default.jpg', 'khalimaprilia@email.com', '$2y$10$pTxOFQzG4SBe7dRY1FteVu6u89ImNZKl8OgAXaPk4wrDriCQ.qOG.', '123456', 2, 2, 1, 1622956713),
(12, 'Rani Ludiana', '880880880880', 'Mojokerto', '15 April 1995', 'Perempuan', 'default.jpg', 'raniludiana@email.com', '$2y$10$f.INlL.JgIuopFvQKNi5PesvbpRRLTD5navrCUVEyJpxBMw/TQEg.', '123456', 2, 2, 1, 1625025491),
(13, 'Bagus Candra R.R', '789456789456', 'Pasuruan', '21 Januari 1996', 'Laki-laki', 'default.jpg', 'candra@email.com', '$2y$10$RURgQpumhh.mnK9GVxpdf.94d9eqSOB7xE6jNKZZIvcqf7al649oq', '123456789', 2, 2, 1, 1625029946);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `ket_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role`, `ket_role`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Guru', 'GTY/GTT/PTY'),
(3, 'Kepsek', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usub_menu`
--

CREATE TABLE `tb_usub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usub_menu`
--

INSERT INTO `tb_usub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(3, 4, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(4, 4, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-bars', 1),
(6, 4, 'Role', 'menu/role', 'fas fa-fw fa-user-plus', 1),
(10, 1, 'Data Sekolah', 'admin/sekolah', 'fas fa-fw fa-school', 1),
(11, 1, 'Data Guru', 'admin/guru', 'fas fa-fw fa-users', 1),
(12, 1, 'Data Jurusan', 'admin/jurusan', 'fas fa-fw fa-book', 1),
(14, 1, 'Data Rombel', 'admin/rombel', 'fas fa-fw fa-archway', 1),
(15, 1, 'Data Mata Pelajaran', 'admin/mapel', 'fas fa-fw fa-book-open', 1),
(16, 1, 'Data Semester', 'admin/semester', 'fas fa-fw fa-graduation-cap', 1),
(17, 1, 'Data KKO', 'admin/kko', 'fas fa-fw fa-book', 1),
(18, 1, 'Data Model Pembelajaran', 'admin/model_pemb', 'fas fa-fw fa-book-reader', 1),
(19, 1, 'Data Pembagian Tugas', 'admin/tugas', 'fas fa-fw fa-server', 1),
(21, 1, 'Pengaturan', 'admin/pengaturan', 'fas fa-fw fa-tools', 1),
(22, 3, 'Dashboard', 'kepsek', 'fas fa-fw fa-tachometer-alt', 1),
(126, 3, 'Approval Data RPP', 'kepsek/approval', 'fas fa-fw fa-check', 1),
(127, 7, 'Input Data RPP', 'rpp', 'fas fa-fw fa-pencil-alt', 1),
(128, 7, 'Input Program Semester', 'rpp/promes', 'fas fa-fw fa-pencil-alt', 0),
(129, 7, 'Input Tujuan Pembelajaran', 'rpp/tujuan', 'fas fa-fw fa-pencil-alt', 1),
(130, 7, 'Input Model Pembelajaran', 'rpp/model', 'fas fa-fw fa-pencil-alt', 1),
(131, 7, 'Input Penilaian', 'rpp/penilaian', 'fas fa-fw fa-pencil-alt', 1),
(132, 7, 'Cetak RPP 1 Lembar', 'rpp/cetak', 'fas fa-fw fa-print', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_datsek`
--
ALTER TABLE `tb_datsek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kko`
--
ALTER TABLE `tb_kko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kko_keterampilan`
--
ALTER TABLE `tb_kko_keterampilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kko_pengetahuan`
--
ALTER TABLE `tb_kko_pengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kko_sikap`
--
ALTER TABLE `tb_kko_sikap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_model_pemb`
--
ALTER TABLE `tb_model_pemb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rpp_cetak`
--
ALTER TABLE `tb_rpp_cetak`
  ADD PRIMARY KEY (`id_cetak`);

--
-- Indexes for table `tb_rpp_data`
--
ALTER TABLE `tb_rpp_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tb_rpp_model`
--
ALTER TABLE `tb_rpp_model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `tb_rpp_penilaian`
--
ALTER TABLE `tb_rpp_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_rpp_promes`
--
ALTER TABLE `tb_rpp_promes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rpp_tujuan`
--
ALTER TABLE `tb_rpp_tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_silabus`
--
ALTER TABLE `tb_silabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tugas_guru`
--
ALTER TABLE `tb_tugas_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_uacc_menu`
--
ALTER TABLE `tb_uacc_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_umenu`
--
ALTER TABLE `tb_umenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usub_menu`
--
ALTER TABLE `tb_usub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datsek`
--
ALTER TABLE `tb_datsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kko`
--
ALTER TABLE `tb_kko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tb_kko_keterampilan`
--
ALTER TABLE `tb_kko_keterampilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_kko_pengetahuan`
--
ALTER TABLE `tb_kko_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kko_sikap`
--
ALTER TABLE `tb_kko_sikap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_model_pemb`
--
ALTER TABLE `tb_model_pemb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_rpp_cetak`
--
ALTER TABLE `tb_rpp_cetak`
  MODIFY `id_cetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_rpp_data`
--
ALTER TABLE `tb_rpp_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_rpp_model`
--
ALTER TABLE `tb_rpp_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_rpp_penilaian`
--
ALTER TABLE `tb_rpp_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_rpp_promes`
--
ALTER TABLE `tb_rpp_promes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rpp_tujuan`
--
ALTER TABLE `tb_rpp_tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_silabus`
--
ALTER TABLE `tb_silabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tugas_guru`
--
ALTER TABLE `tb_tugas_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_uacc_menu`
--
ALTER TABLE `tb_uacc_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_umenu`
--
ALTER TABLE `tb_umenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_usub_menu`
--
ALTER TABLE `tb_usub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
