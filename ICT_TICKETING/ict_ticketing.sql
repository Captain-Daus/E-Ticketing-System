-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 11:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `assign` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `start` date NOT NULL,
  `due` date NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `email`, `phone`, `department`, `assign`, `status`, `start`, `due`, `comments`) VALUES
(40, 'NAIM', 'a2a@S', 324345334, 'Jajaran Armada', 'Azim Omar', '', '2023-03-16', '2023-03-27', 'dfsgdsgdas'),
(41, 'sd', 'sa', 12324535, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-16', 'sdadasd'),
(42, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'admin@stealthsolutio', 122795659, 'Jajaran Armada', 'Mokhsin Zamani', '', '2023-03-16', '2023-03-24', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'),
(43, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'admin@stealthsolutio', 132569823, 'Jajaran Armada', 'Mokhsin Zamani', '', '2023-03-16', '2023-03-24', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'),
(44, 'Saidah binyi Abu Hurairah', 'asd@S', 12334534, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-30', 'assadasdasdada'),
(45, 'Saidah binyi Abu Hurairah', 'asd@S', 12334534, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-30', 'assadasdasdada'),
(46, 'Saidah binyi Abu Hurairah', 'asd@S', 12334534, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-30', 'assadasdasdada'),
(47, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'amirul@stealthsoluti', 1656980236, 'Jajaran Armada', 'Mokhsin Zamani', '', '2023-03-16', '0000-00-00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(48, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'amirul@stealthsoluti', 1656980236, 'Jajaran Armada', 'Mokhsin Zamani', '', '2023-03-16', '0000-00-00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(49, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'amirul@stealthsoluti', 1656980236, 'Jajaran Armada', 'Mokhsin Zamani', '', '2023-03-16', '0000-00-00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(50, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'admin@stealthsolutio', 78, 'DA Auto', 'Mokhsin Zamani', '', '2023-03-16', '2023-03-16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(51, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'admin@stealthsolutio', 78, 'DA Auto', 'Mokhsin Zamani', '', '2023-03-16', '2023-03-16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(52, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'r@a', 2147483647, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-16', 'http://localhost/ICT_TICKETING/index.php'),
(53, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'sda@asd', 12324535, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-16', 'http://localhost/ICT_TICKETING/index.php'),
(54, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'sda@asd', 12324535, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-16', 'http://localhost/ICT_TICKETING/index.php'),
(55, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'a@A', 1234567891, 'DA Auto', 'Azim Omar', '', '2023-03-16', '2023-03-16', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p'),
(56, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'm@g', 2147483647, 'Jajaran Armada', 'Azim Omar', '', '2023-03-16', '2023-03-05', 'saddfgsdgdfgd'),
(57, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'm@g', 1245465565, 'Jajaran Armada', 'Azim Omar', '', '2023-03-16', '2023-03-05', 'saddfgsdgdfgd'),
(58, 'ARMIN AZRAI', 'armin@stealthsolutio', 145678970, 'Danascreen', 'Azim Omar', '', '2023-03-17', '2023-03-17', 'please Tell Naim Create one banner for jajaran armada'),
(59, 'ARMIN AZRAI', 'armin@stealthsolutio', 145678970, 'Danascreen', 'Azim Omar', '', '2023-03-17', '2023-03-17', 'please Tell Naim Create one banner for jajaran armada'),
(60, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'firdaus@stealthsolut', 2147483647, 'Premium Pineapple', 'Azim Omar', '', '2023-03-20', '2023-03-20', 'sadsadadadasdasda'),
(61, 'MOHAMAD FIRDAUS BIN MOHD BAKRI', 'firdaus@stealthsolut', 156987895, 'Premium Pineapple', 'Azim Omar', '', '2023-03-20', '2023-03-20', 'sadsadadadasdasda'),
(62, 'sad', 'sad@stealthsolutions', 1234567891, 'DA Auto', 'Azim Omar', 'New Task', '2023-03-20', '2023-03-20', 'asfdfdsfdsfdfsdfdsfsdfsdfsdfsfs'),
(63, 'dsf', 'a@A', 1789014567, 'DA Auto', 'Azim Omar', 'New Task', '2023-03-20', '2023-03-20', 'sdfasdfasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
