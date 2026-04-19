-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warung_bimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `gambar`) VALUES
(1, '7 (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `jam_buka` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `whatsapp`, `jam_buka`) VALUES
(1, 'Kabupaten Bogor, Kec. Parung, Desa Iwul, Kp. Lengkong Barang', '0882-1092-1344', '18.00 - 23.45 WIB (Kamis Tutup)');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  `link_wa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `deskripsi`, `harga`, `foto`, `link_wa`) VALUES
(1, 'Nasi Goreng Jowor', 'Nasi Goreng dengan bumbu rempah pilihan, lengkap dengan sayur, telur, acar, dan kerupuk renyah.', 18000, 'nasi_goreng.jpeg', 'UPDATE menu SET link_wa = \'https://wa.me/6288210921344?text=Halo%20Mas%20Bimo,%20saya%20mau%20pesan%20menu%20ini\';'),
(2, 'Mie Goreng Jowor', 'Mie Goreng dengan bumbu pilihan, lengkap dengan sayur, telur, acar, dan kerupuk renyah', 18000, 'mie_goreng.jpeg', 'UPDATE menu SET link_wa = \'https://wa.me/6288210921344?text=Halo%20Mas%20Bimo,%20saya%20mau%20pesan%20menu%20ini\';'),
(3, 'Bihun Goreng', 'Bihun Goreng dengan bumbu rempah pilihan, lengkap dengan sayur, telur, acar, dan kerupuk renyah.', 18000, 'bihun_goreng.jpeg', NULL),
(4, 'Kwitiaw Goreng', 'Kwitiaw Goreng dengan bumbu rempah pilihan, lengkap dengan sayur, telur, acar, dan kerupuk renyah.', 18000, 'kwitiaw_goreng.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_lengkap`
--

CREATE TABLE `menu_lengkap` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_lengkap`
--

INSERT INTO `menu_lengkap` (`id`, `gambar`) VALUES
(1, 'menu_lengkap.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `nama`, `komentar`, `rating`, `created_at`) VALUES
(1, 'Aong', 'mantap deh pokonya jadi langganan', 5, '2025-11-23 03:00:00'),
(2, 'Christina', 'Nasi gorengnya enak, kemasannya super baik dan rasanyaa yummy.', 5, '2025-11-22 07:30:00'),
(3, 'PazriStore', 'enakk parahh, proper juga ga cumn di bungkus pake kertas nasi tpi pake mika', 5, '2025-10-14 12:15:00'),
(4, 'David Famungkas', 'Nasi goreng jowor emang ga ada lawan, bumbunya meresap banget.', 5, '2026-04-10 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `nama`, `pesan`, `tanggal`) VALUES
(1, 'vii', 'enakkkk', '2026-04-12 09:14:47'),
(2, 'vii', 'gils enak ', '2026-04-12 09:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ownerjowor', '$2y$10$SJPwr6SV4z5XusRtTivt2.G/EknW4hHYlSxIwrIOhah/LJZY7EQ1i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_lengkap`
--
ALTER TABLE `menu_lengkap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_lengkap`
--
ALTER TABLE `menu_lengkap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
