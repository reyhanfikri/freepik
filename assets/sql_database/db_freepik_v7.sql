-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:30 AM
-- Server version: 10.1.30-MariaDB
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
-- Database: `db_freepik`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

CREATE TABLE `t_comment` (
  `id_comment` int(11) NOT NULL,
  `id_gambar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_ekstensi_gambar`
--

CREATE TABLE `t_ekstensi_gambar` (
  `id_ekstensi_gambar` int(11) NOT NULL,
  `ekstensi_gambar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ekstensi_gambar`
--

INSERT INTO `t_ekstensi_gambar` (`id_ekstensi_gambar`, `ekstensi_gambar`) VALUES
(1, 'jpg'),
(2, 'png');

-- --------------------------------------------------------

--
-- Table structure for table `t_gambar`
--

CREATE TABLE `t_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ekstensi_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `jumlah_like` int(11) NOT NULL,
  `jumlah_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_gambar`
--

INSERT INTO `t_gambar` (`id_gambar`, `id_user`, `id_ekstensi_gambar`, `nama_gambar`, `nama_file`, `jumlah_like`, `jumlah_view`) VALUES
(9, 5, 1, 'Comedy_2', 'Comedy_2.jpg', 0, 1),
(10, 6, 1, 'fantasy_background1', 'fantasy_background1.jpg', 0, 1),
(11, 6, 1, 'cute_kitten1', 'cute_kitten1.jpg', 0, 1),
(12, 6, 1, 'rumah', 'rumah.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `role`) VALUES
(1, 'user_biasa'),
(2, 'user_admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `id_role`, `email`, `username`, `password`) VALUES
(1, 2, 'admin@gmail.com', 'admin', 'admin'),
(3, 1, 'r@gmail.com', 'rrr', '654321'),
(5, 1, 'abc@gmail.com', 'abc', '123456'),
(6, 1, 'reyhanfikri@student.upi.edu', 'reyhanfikri', '123');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_profile`
--

CREATE TABLE `t_user_profile` (
  `id_user_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_profile`
--

INSERT INTO `t_user_profile` (`id_user_profile`, `id_user`, `nama_lengkap`, `jenis_kelamin`, `alamat`) VALUES
(2, 3, NULL, NULL, NULL),
(4, 5, 'Atang Budi Cahyo', 'Laki-laki', 'Bojongsoang	                        '),
(5, 6, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk3` (`id_gambar`),
  ADD KEY `fk4` (`id_user`);

--
-- Indexes for table `t_ekstensi_gambar`
--
ALTER TABLE `t_ekstensi_gambar`
  ADD PRIMARY KEY (`id_ekstensi_gambar`);

--
-- Indexes for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk2` (`id_user`),
  ADD KEY `fk_ekstensi_gambar` (`id_ekstensi_gambar`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`id_role`);

--
-- Indexes for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  ADD PRIMARY KEY (`id_user_profile`),
  ADD KEY `fk_name` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ekstensi_gambar`
--
ALTER TABLE `t_ekstensi_gambar`
  MODIFY `id_ekstensi_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_gambar`
--
ALTER TABLE `t_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  MODIFY `id_user_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_gambar`) REFERENCES `t_gambar` (`id_gambar`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);

--
-- Constraints for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`),
  ADD CONSTRAINT `fk_ekstensi_gambar` FOREIGN KEY (`id_ekstensi_gambar`) REFERENCES `t_ekstensi_gambar` (`id_ekstensi_gambar`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`);

--
-- Constraints for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
