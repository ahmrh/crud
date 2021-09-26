-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 10:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `kota`, `reg_date`) VALUES
('001', 'Abigail', 'Pelican Town', '2021-09-26 07:59:37'),
('002', 'Bryan', 'Aurora Village', '2021-09-26 07:58:26'),
('003', 'Johnson', 'Vorrzak', '2021-09-26 07:59:17'),
('004', 'Georgia', 'Aurora Village', '2021-09-26 08:00:31'),
('005', 'Mary Jane', 'Pelican Town', '2021-09-26 08:02:08'),
('006', 'Rembardth Claus', 'Vorrzak', '2021-09-26 08:05:22'),
('007', 'Zephyr', 'Aurora Village', '2021-09-26 08:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `tabelmahasiswa`
--

CREATE TABLE `tabelmahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelmahasiswa`
--

INSERT INTO `tabelmahasiswa` (`id_mhs`, `nim`, `nama`, `email`, `lahir`) VALUES
(1, '205150200111064', 'Amry Yahya', 'amryyahya@student.ub.ac.com', '2001-07-03'),
(2, '205150207111006', 'Ahmad Rolandi Hernafahreza', 'ahmadrolandi01@gmail.com', '2001-08-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabelmahasiswa`
--
ALTER TABLE `tabelmahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelmahasiswa`
--
ALTER TABLE `tabelmahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
