-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 12:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta-desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image_filename`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 'seller', 'sadfsdaf', '1690181194_006ed26b3fd374bde51b.jpg', '2023-07-23 23:46:34', '2023-07-23 23:46:34', NULL),
(21, 'Kegiatan Gotong Royong', 'Gotong royong adalah salah satu ciri khas yang masih melekat dalam kehidupan masyarakat Indonesia. Secara garis besar, gotong royong tertuang pada pancasila dalam sila ke tiga yang berbunyi Persatuan Indonesia.\r\n\r\nGotong royong telah mendarah daging dan bahkan menjadi kepribadian bangsa, serta sebagai budaya yang sudah berakar kuat dalam kehidupan masyarakat. Selain itu, sebagai bagian dari kehidupan bermasyarakat yang hampir semua daerah di Indonesia menanamkan nilai gotong royong.\r\n\r\nGotong royong berasal dari kata gotong berarti bekerja dan royong berarti bersama. Guna mengetahui penjelasan secara lebih lengkap terkait gotong royong. Mari perhatikan pembahasannya di bawah ini.', '1691292297_a8a420f11e120b6e0399.jpeg', '2023-08-05 20:24:57', '2023-08-05 21:12:43', NULL),
(22, 'Tugas dan Kegiatan Karang Taruna', 'Ketika kita sudah memasuki usia remaja, bagi sebagian orang akan masuk ke dalam suatu organisasi. Salah satu organisasi untuk para pemuda yang dekat dengan lingkungan tempat tinggal adalah karang taruna. Organisasi ini mayoritas berisi individu-individu yang usianya masih muda. Meskipun begitu, terkadang ada beberapa anggota yang usianya tidak terbilang mudah dan biasanya membimbing para anggota karang taruna yang baru masuk. Pada saat sudah masuk ke dalam organisasi karang taruna, akan ada banyak sekali kegiatannya terutama kegiatan untuk membangun semangat para pemuda di lingkungan tersebut. \r\n<br> Biasanya kegiatan yang sering dilakukan selalu identik dengan hari-hari besar, seperti 17 Agustus atau hari kemerdekaan Republik Indonesia. Mulai dari acara lomba hingga acara puncak perayaan sekaligus penyerahan hadiah untuk para pemenang lomba.', '1691292995_418ec183bf93707abe74.png', '2023-08-05 20:36:35', '2023-08-05 20:36:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_warga_rw`
--

CREATE TABLE `data_warga_rw` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_rw`
--

CREATE TABLE `keuangan_rw` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan_rw`
--

INSERT INTO `keuangan_rw` (`id`, `tanggal`, `deskripsi`, `jumlah`) VALUES
(6, '2023-07-31', 'kas rw', 700000.00);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jabatan` text NOT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `jabatan`, `image_filename`, `created_at`) VALUES
(10, 'Agus Supratman', 'Ketua RWE', '1690359799_e701926198fe33440c70.jpg', '2023-07-25 07:17:28'),
(11, 'Mamat Alkatiri', 'Sekretaris - RW', '1690359785_94f96146af5beaca97b5.jpg', '2023-07-26 07:39:01'),
(12, 'Arie', 'Bendahara - RW', '1690359805_87d23574d33237824ef0.jpg', '2023-07-26 07:40:05'),
(13, 'Fraz Teguh', 'Ketua RT', '1690359812_6b9c530aa43a876c4a1c.jpg', '2023-07-26 07:40:47'),
(14, 'Brian', 'Sekretaris RT', '1690359819_1ab0402d01db035c7aeb.jpg', '2023-07-26 07:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) NOT NULL,
  `img_satu` varchar(255) DEFAULT NULL,
  `img_dua` varchar(255) DEFAULT NULL,
  `img_tiga` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `row_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id`, `pengaduan_id`, `img_satu`, `img_dua`, `img_tiga`, `created_at`, `updated_at`, `deleted_at`, `row_status`) VALUES
(20, 49, '1689826308_4e052e7626a2a4c22ada.png', NULL, NULL, '2023-07-20 04:11:48', '2023-07-20 04:11:48', NULL, 1),
(21, 50, '1690463003_8fdfae31068d3015d80e.jpg', NULL, NULL, '2023-07-27 13:03:23', '2023-07-27 13:03:23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pengadu` varchar(128) NOT NULL DEFAULT 'Anonym',
  `judul_pengaduan` varchar(255) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `status_pengaduan` int(11) NOT NULL DEFAULT 1 COMMENT '1 = default, 2 = diproses, 3 = selesai.',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `row_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id`, `user_id`, `nama_pengadu`, `judul_pengaduan`, `isi_pengaduan`, `status_pengaduan`, `created_at`, `updated_at`, `deleted_at`, `row_status`) VALUES
(49, 13, 'anonym', 'Fasilitas di RT 3 Rusak', 'banyak fasilitas tidak layak pakai', 3, '2023-07-20 04:11:48', '2023-07-20 04:13:29', NULL, 1),
(50, 17, 'geesangg', 'Fasilitas Gedung Serba Guna Rusak', 'banyak fasilitas rusak di dalam gedung gsg', 1, '2023-07-27 13:03:23', '2023-07-27 13:03:23', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `user_ktp` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT 3,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `row_status` int(11) NOT NULL DEFAULT 1 COMMENT '0: deleted, 1: active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `email`, `password`, `user_image`, `user_ktp`, `user_level`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `row_status`) VALUES
(1, 'Admin', 'admin123', 'admin@example.com', '$2y$10$r2Zl.avNMwfFNAalniQxr.KXzseHcT5UoviUGhHCBDCgYy71KfI7G', 'default.svg', '', 1, 1, '2021-03-01 23:24:20', '2021-05-02 13:04:18', NULL, 1),
(13, 'gesang ragil', 'gesang', 'gesang@gmail.com', '$2y$10$N9VKD83ujKITYvlpkI3WnOICmhc2KZpV6qolawcgCg2X.O7i4fhkC', 'default.svg', '1689826052_d650790e26dc95337587.png', 3, 1, '2023-07-20 04:07:32', '2023-07-20 04:08:55', NULL, 1),
(17, 'geesangg', 'gessang', 'fayudhi@gmail.com', '$2y$10$PYjfUTuXNirXCXUSuiBY6.woNBeWvn5GXNfPzw62x6ACpIxaUnrvW', 'default.svg', '1690462861_502e3d095007564810d6.jpg', 3, 1, '2023-07-27 13:01:01', '2023-07-27 13:01:12', NULL, 1),
(18, 'marufi', 'marufig', 'marufi@gmail.com', '$2y$10$wJaSjmcpZdTwDsy5m0GDQ.qu5sCPYsdFwI1OvkO9EHle.usLgy7Ki', 'default.svg', '1690875523_6021cb36445b4776e4e6.png', 3, 1, '2023-08-01 07:38:43', '2023-08-01 07:43:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `completed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `task`, `completed`) VALUES
(12, 'Rabu Nyunda', 0),
(13, 'Kamis Inggris', 0),
(14, 'Jumat Kerja Bakti', 0),
(16, 'Rapat Karang Taruna', 0),
(17, 'Rapat Warga', 0),
(18, 'Rapat Internal ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nama`, `alamat`, `tanggal_lahir`, `pekerjaan`, `jenis_kelamin`, `agama`) VALUES
(1, 'Gesang Ragil Sabae', 'Kabupaten Bandung Barat', '2023-01-03', 'Mahasiswa', 'Laki-laki', 'Islam'),
(5, 'Adip', 'Padang', '2023-01-02', 'Mahasiswa', 'Laki-laki', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_warga_rw`
--
ALTER TABLE `data_warga_rw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan_rw`
--
ALTER TABLE `keuangan_rw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduan_id` (`pengaduan_id`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_warga_rw`
--
ALTER TABLE `data_warga_rw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuangan_rw`
--
ALTER TABLE `keuangan_rw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD CONSTRAINT `tbl_bukti_ibfk_1` FOREIGN KEY (`pengaduan_id`) REFERENCES `tbl_pengaduan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
