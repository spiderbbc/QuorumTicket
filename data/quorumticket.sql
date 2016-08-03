-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2016 at 08:27 PM
-- Server version: 10.1.14-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quorumticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `afectado`
--

CREATE TABLE `afectado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gravedad`
--

CREATE TABLE `gravedad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `impacto`
--

CREATE TABLE `impacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id`, `user_id`, `id_departamento`, `nombre`, `cargo`, `ext`, `img`) VALUES
(1, 5, 2, 'xavier', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `uuid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `respuestas`
--

INSERT INTO `respuestas` (`id`, `uuid`, `user_id`, `msg`, `date_added`, `date_update`) VALUES
(1, 10000, 3, 'Entendido', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resp_img`
--

CREATE TABLE `resp_img` (
  `id_ticket` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `uuid` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_afectado` int(11) NOT NULL,
  `id_gravedad` int(11) NOT NULL,
  `id_impacto` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `msg` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `date_closed` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `user_id`, `id_afectado`, `id_gravedad`, `id_impacto`, `titulo`, `msg`, `date_added`, `date_update`, `date_closed`, `status`, `private`) VALUES
(20, '579e580002e', 5, 1, 1, 1, 'from the controller', 'from the controller', '2016-07-31 19:56:48', '2016-07-31 19:56:48', '0000-00-00 00:00:00', 1, 0),
(21, '579e5803adc', 5, 1, 1, 1, 'from the controller', 'from the controller', '2016-07-31 19:56:51', '2016-07-31 19:56:51', '0000-00-00 00:00:00', 1, 0),
(22, '579e58050ff', 5, 1, 1, 1, 'from the controller', 'from the controller', '2016-07-31 19:56:53', '2016-07-31 19:56:53', '0000-00-00 00:00:00', 1, 0),
(23, '579e58168d4', 5, 1, 1, 1, 'from the controller', 'from the controller', '2016-07-31 19:57:10', '2016-07-31 19:57:10', '0000-00-00 00:00:00', 3, 0),
(24, '579e58215f3', 5, 1, 1, 1, 'from the controller', 'from the controller', '2016-07-31 19:57:21', '2016-07-31 19:57:21', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_img`
--

CREATE TABLE `ticket_img` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_users`
--

CREATE TABLE `ticket_users` (
  `uuid_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` binary(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `joined`, `grupo`) VALUES
(32, 'xavier', '536d769f672bc52cc23a23257630ffb04e19acd0382a3087c1ad55f2224c5d96', 0xb252b2970df242a71c3ef2ce71a88a0eca612682a055499fdd22df59b9f6683b, 'eduuccs@gmail.com', '2016-07-29 23:58:07', 1),
(33, 'Humberto', 'a41201b12eb334944bd6ad0fe154217a9c30c85a40921b1a48af24a18a77dc9d', 0x34b5639f67b101c00c69fac97be746108cb7e2910cb32210b3278e91c9c89f3f, 'spiderbbc@gmail.com', '2016-07-30 15:03:01', 1),
(34, 'jorgue', 'ac4f7e63b43e1a3c502a3553fd84817e8627f68488f7a1291e5871a0353fbd04', 0x50ba6a5a2ce2a4512875e8778218e15650bb591eb7e3bc85acd39dabc8082b97, 'spiderbbc@gmail.com', '2016-07-30 15:04:58', 1),
(35, 'deathnote', '4870678ad3d57a8674026dda3f8ebead6e024db868315ec23c6399d8e1fddd82', 0x2a143afe37066849e6b8dbee2ada6c511a82e14635e08ad03f72fa0b21a03eb3, 'spiderbbc@gmail.com', '2016-07-30 15:07:57', 1),
(36, 'corbata', '31602fa9001bf09119bdba7b91a3dfe3e4385af147d4bef30dc822ea710ed47e', 0x1338cc3d0f9a29606ec3674f25f0bf9efbad634493211059335bdc438a8130dd, 'spiderbbc@gmail.com', '2016-07-30 15:08:39', 1),
(37, 'armando', '623add53e5b48d4dd07d0e2208632a1d63a37844be3b136c69959b724f11a3d8', 0x3942ce01c44d364b7c7ed86d2832d799998b258ef0f40a10357ee1bd0523ea6d, 'spiderbbc@gmail.com', '2016-07-30 15:09:52', 1),
(38, 'sonia', '8a9a98eca7a0219470f64fed9380ca6f3b5c24779db24d97551bc05ba4da946b', 0xb72c0bce9d390d5e154ddead433a071166861213feef40753a9925a5e406e0ff, 'spiderbbc@gmail.com', '2016-07-30 15:10:24', 1),
(39, 'morales', 'af8b81c5cb5157ba158642fa0e208ed437c5b6c8330c791a9fa22785e6e5c2e6', 0x8dcbde1ae920d9aa39a1f881967a9e63073822d295a9c7ee26d99e241580665b, 'spiderbbc@gmail.com', '2016-07-30 15:11:20', 1),
(40, 'xcastro', '63000259af8210bea8b1a1bab59c0451b625ad8f32f0faf3b92fa368cc918b79', 0xf679ad64c30c80bb3843f521402eda38617788b74bf271f36c7aeac846db90ab, 'ecastro@quorumtelecom.info', '2016-07-30 15:19:25', 1),
(41, 'thais', '33a44ecc9f4502c81e5bfd9cf8e48b151d84d4c42174cf6735441eeef4fa347f', 0xea4ea54d485ca6c6fec5e493c4a9a676dedfac80257a1f9fe42f3fc074a08551, 'moralesx@hotmail.com', '2016-07-30 15:21:13', 1),
(42, 'chateing', '334cef1596c7cc4ba6d7e76207ccce24017f2ff4a5745720b03998333acd2f8f', 0xf4f64d58eef852091ee0b14c617f8f445635e89eb8cd74ed17cf33651500b4c5, 'mtvmodel@mtvla.com', '2016-07-30 15:23:14', 1),
(43, 'rpiedra', 'a0a8f03420418a0511d05a92fcdf0c627b77ffd561657f6dd91944075a68fed3', 0xea2652cd83592685a23fed8ba45b71f088a0d156197da13c6aebe2740a8ad4d2, 'rpiedra@quorumtelecom.info', '2016-07-30 15:32:43', 1),
(44, 'castro', '4c0fe7f9a5b860484ee8844a5183912b1cf66a3b2ea7902730ce99b6b973f418', 0x7777671e45fdeebafddac8b51d655f671a5339e2fc11e9a6c47b6e6ff8abce9e, 'spiderbbc@gmail.com', '2016-07-30 15:34:29', 1),
(45, 'username', '4195b2027d958fd1b5e471e804dd0302f8c700b99fa3744420a273a84a822b60', 0x3c74e7eba8a599af6c502431fb9c7a7936275b26d045a9ab5a7d6478731abd39, 'spiderbbc@gmail.com', '2016-07-30 15:35:56', 1),
(46, 'boostrap', '8f105ff1b844515b075b32c9dbcbc24666339511da1dd5c890637a54020b2a2c', 0xc7be4b357635bce76c2363975d2f5b0e92ba18d2d888abccbebc10d6a165a8aa, 'spiderbbc@gmail.com', '2016-07-30 15:38:03', 1),
(47, 'maria', '4bc8b732c8b58ddd2506b6a3e0598fca0844a59700dff9f26e393bb5fd7cc707', 0x49eb0c62976071a0e80d7fa782dd40abe511d3a2f6f44ad1b2c5630c465dc3f7, 'spiderbbc@gmail.com', '2016-07-30 15:39:16', 1),
(48, 'nelly', '3e5d5144653b4da419e6145311396f5cb93587bfdc8923ee1559f628ab431f8a', 0xfb40c7e91c0f9c76e66907801ad9eb51e53463138bd18b287161d343371aad15, 'spiderbbc@gmail.com', '2016-07-30 15:40:02', 1),
(49, 'tests', 'bfd4a1a4fa784b5b7f99848cbc974e790e5a4e19aa84af7047439ec389b47c51', 0x0424246baf84c1ffd0248d33159393f398b01cef3646f38a57966f356dd8b004, 'spiderbbc@gmail.com', '2016-07-30 15:40:56', 1),
(50, 'test2', '449e5844f8682efd1a39fde0cb3b2498e63542616c52e35ac3d17be3711fb35d', 0xc729e91441c090df0c0f01d9b4641d9b8bcae5c0f5398639a8ee9465edfa2c50, 'spiderbbc@gmail.com', '2016-07-30 15:42:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afectado`
--
ALTER TABLE `afectado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gravedad`
--
ALTER TABLE `gravedad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impacto`
--
ALTER TABLE `impacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resp_img`
--
ALTER TABLE `resp_img`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_img`
--
ALTER TABLE `ticket_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_users`
--
ALTER TABLE `ticket_users`
  ADD PRIMARY KEY (`uuid_ticket`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afectado`
--
ALTER TABLE `afectado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gravedad`
--
ALTER TABLE `gravedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `impacto`
--
ALTER TABLE `impacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resp_img`
--
ALTER TABLE `resp_img`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ticket_img`
--
ALTER TABLE `ticket_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_users`
--
ALTER TABLE `ticket_users`
  MODIFY `uuid_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
