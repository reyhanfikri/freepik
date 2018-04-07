-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 11:19 AM
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
-- Table structure for table `t_gambar`
--

CREATE TABLE `t_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_gambar` varchar(100) NOT NULL,
  `jenis_gambar` varchar(100) NOT NULL,
  `direktori_gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user_account`
--

CREATE TABLE `t_user_account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_account`
--

INSERT INTO `t_user_account` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 'admin'),
(2, 'yamato.reyhan123@gmail.com', 'reyhanfikri', '1232123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_profile`
--

CREATE TABLE `t_user_profile` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_profile`
--

INSERT INTO `t_user_profile` (`id`, `id_user`, `nama_lengkap`, `jenis_kelamin`, `alamat`) VALUES
(1, 2, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `fk2` (`id_user`);

--
-- Indexes for table `t_user_account`
--
ALTER TABLE `t_user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_gambar`
--
ALTER TABLE `t_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user_account`
--
ALTER TABLE `t_user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_gambar`
--
ALTER TABLE `t_gambar`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_user`) REFERENCES `t_user_account` (`id`);

--
-- Constraints for table `t_user_profile`
--
ALTER TABLE `t_user_profile`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_user`) REFERENCES `t_user_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
