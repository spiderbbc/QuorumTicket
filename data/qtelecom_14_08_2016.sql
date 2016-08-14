-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2016 at 11:36 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qtelecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `afectado`
--

CREATE TABLE `afectado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `afectado`
--

INSERT INTO `afectado` (`id`, `nombre`) VALUES
(1, 'Ningun Usuario y solo Uno'),
(2, 'Varios Afectados'),
(3, 'Ningun Usuario y solo Uno'),
(4, 'Varios Afectados');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Sala tecnica'),
(2, 'Sistemas'),
(3, 'Medios');

-- --------------------------------------------------------

--
-- Table structure for table `gravedad`
--

CREATE TABLE `gravedad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gravedad`
--

INSERT INTO `gravedad` (`id`, `nombre`) VALUES
(1, 'Un Fallo Menor'),
(2, 'No hay Servicio Disponible');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `permissions`) VALUES
(1, 'Standar User', ''),
(2, 'Manager', '{"departamento_id":1,\r\n "admin":1}');

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
(1, 32, 1, 'xavier', 'Operador Tecnico', '0130', ''),
(2, 45, 2, 'Username test', 'Desconocido', '0000', ''),
(3, 43, 1, 'Raul Piedra', 'Supervisor Departamento Tecnico', '0101', ''),
(4, 41, 3, 'Thais Ravelo', 'Supervisor Medios', '0000', '');

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

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'Telefonia/Central Telefonica'),
(2, 'Internet/Conectividad'),
(3, 'Impresora/Conectividad'),
(4, 'Red/Carpetas');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nombre`) VALUES
(1, 'Abierto'),
(2, 'Cerrado'),
(3, 'Pendiente');

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
  `id_servicios` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `msg` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `date_closed` datetime NOT NULL,
  `id_status` int(1) NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `user_id`, `id_afectado`, `id_gravedad`, `id_servicios`, `titulo`, `msg`, `date_added`, `date_update`, `date_closed`, `id_status`, `private`) VALUES
(65, '57ae43b3009', 41, 3, 2, 3, 'Ivr \' problems #', '<p>jejejejejej</p>\r\n', '2016-08-12 21:46:26', '2016-08-12 21:46:26', '0000-00-00 00:00:00', 1, 1),
(66, '57ae43deea8', 41, 2, 2, 2, 'probando ando', '<p>jejejejejeej</p>\r\n', '2016-08-12 21:47:10', '2016-08-12 21:47:10', '0000-00-00 00:00:00', 1, 1),
(67, '57ae4db0937', 41, 1, 1, 1, 'probando ando', '<p>jejejejejej</p>\r\n', '2016-08-12 22:29:04', '2016-08-12 22:29:04', '0000-00-00 00:00:00', 1, 1),
(68, '57afb05a763', 41, 3, 2, 3, 'Probando ando ....email class', '<p>test test</p>\r\n', '2016-08-13 23:42:18', '2016-08-13 23:42:18', '0000-00-00 00:00:00', 1, 1),
(69, '57afb148d28', 41, 3, 2, 3, 'ando ando', '<p>hehhehhehe</p>\r\n', '2016-08-13 23:46:16', '2016-08-13 23:46:16', '0000-00-00 00:00:00', 1, 1),
(70, '57afb193ac9', 41, 1, 1, 1, 'probando ando', '<p>aaaaaaaaaaaaaaaaa</p>\r\n', '2016-08-13 23:47:31', '2016-08-13 23:47:31', '0000-00-00 00:00:00', 1, 1),
(71, '57afb1de7bd', 41, 1, 1, 1, 'asasasass', '<p>aaaaaaaaaaaaaa</p>\r\n', '2016-08-13 23:48:46', '2016-08-13 23:48:46', '0000-00-00 00:00:00', 1, 1),
(72, '57afb293bde', 41, 1, 1, 1, 'aaaaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaaa</p>\r\n', '2016-08-13 23:51:47', '2016-08-13 23:51:47', '0000-00-00 00:00:00', 1, 1),
(73, '57afb324a05', 41, 1, 1, 1, 'AAAAAAAA', '<p>aaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n', '2016-08-13 23:54:12', '2016-08-13 23:54:12', '0000-00-00 00:00:00', 1, 1),
(74, '57afb36a270', 41, 1, 1, 1, 'aaaaaaaaaaaaa', '<p>aaaaaaaaaaaaaaaaa</p>\r\n', '2016-08-13 23:55:22', '2016-08-13 23:55:22', '0000-00-00 00:00:00', 1, 1),
(75, '57afb42a667', 41, 3, 2, 3, 'error mesage', '<p>jejejejej</p>\r\n', '2016-08-13 23:58:34', '2016-08-13 23:58:34', '0000-00-00 00:00:00', 1, 1),
(76, '57afb4658f1', 41, 3, 2, 3, 'error mesage', '<p>jejejejejeje</p>\r\n', '2016-08-13 23:59:33', '2016-08-13 23:59:33', '0000-00-00 00:00:00', 1, 1),
(77, '57afb48930f', 41, 3, 2, 3, 'probando ando', '<p>jejejejejje</p>\r\n', '2016-08-14 00:00:09', '2016-08-14 00:00:09', '0000-00-00 00:00:00', 1, 1),
(78, '57afb4bdcdf', 41, 3, 2, 3, 'error mesage', '<p>jejejejejejej</p>\r\n', '2016-08-14 00:01:01', '2016-08-14 00:01:01', '0000-00-00 00:00:00', 1, 1),
(79, '57afb4fa26e', 41, 3, 2, 3, 'error mesage', '<p>jejejejejej</p>\r\n', '2016-08-14 00:02:02', '2016-08-14 00:02:02', '0000-00-00 00:00:00', 1, 1),
(80, '57afb5715ee', 41, 3, 2, 3, 'error mesage', '<p>jejejejeej</p>\r\n', '2016-08-14 00:04:01', '2016-08-14 00:04:01', '0000-00-00 00:00:00', 1, 1),
(81, '57afb597451', 41, 3, 2, 3, 'probando ando', '<p>jejejejej</p>\r\n', '2016-08-14 00:04:39', '2016-08-14 00:04:39', '0000-00-00 00:00:00', 1, 1),
(82, '57afb5b0614', 41, 3, 2, 3, 'aaaaaaaaaaaaaa', '<p>jejejejej</p>\r\n', '2016-08-14 00:05:04', '2016-08-14 00:05:04', '0000-00-00 00:00:00', 1, 1),
(83, '57afb646a70', 41, 3, 2, 3, 'Ivr \' problems #', '<p>jejejejej</p>\r\n', '2016-08-14 00:07:34', '2016-08-14 00:07:34', '0000-00-00 00:00:00', 1, 1),
(84, '57afb6d68c4', 41, 3, 2, 3, 'Ivr \' problems #', '<p>jejjejejej</p>\r\n', '2016-08-14 00:09:58', '2016-08-14 00:09:58', '0000-00-00 00:00:00', 1, 1),
(85, '57afb7166b7', 41, 3, 2, 3, 'probando ando', '<p>jejejejejejje</p>\r\n', '2016-08-14 00:11:02', '2016-08-14 00:11:02', '0000-00-00 00:00:00', 1, 1),
(86, '57afb799d86', 41, 3, 2, 3, 'aaaaaaaaaaaaaaa', '<p>jejejjej</p>\r\n', '2016-08-14 00:13:13', '2016-08-14 00:13:13', '0000-00-00 00:00:00', 1, 1),
(87, '57afb7ccbe1', 41, 3, 2, 3, 'aaaaaaaaaaaaa', '<p>jejjejejeje</p>\r\n', '2016-08-14 00:14:04', '2016-08-14 00:14:04', '0000-00-00 00:00:00', 1, 1),
(88, '57b0cd612ea', 41, 2, 2, 3, 'probando ando', '<p>jejejejej</p>\r\n', '2016-08-14 19:58:25', '2016-08-14 19:58:25', '0000-00-00 00:00:00', 1, 1),
(89, '57b0cdc44a6', 41, 1, 1, 1, 'AAAAAAAA', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>\r\n', '2016-08-14 20:00:04', '2016-08-14 20:00:04', '0000-00-00 00:00:00', 1, 1),
(90, '57b0ce36071', 41, 3, 2, 3, 'Ivr \' problems #', '<p>jejjejejejejeje</p>\r\n', '2016-08-14 20:01:58', '2016-08-14 20:01:58', '0000-00-00 00:00:00', 1, 1),
(91, '57b0ceb891b', 41, 1, 1, 1, 'Ivr \' problems #', '<p>jejejejejje</p>\r\n', '2016-08-14 20:04:08', '2016-08-14 20:04:08', '0000-00-00 00:00:00', 1, 1),
(92, '57b0cf4cab9', 41, 3, 2, 3, 'Ivr \' problems #', '<p>jejejejejejjee</p>\r\n', '2016-08-14 20:06:36', '2016-08-14 20:06:36', '0000-00-00 00:00:00', 1, 1),
(93, '57b0cf675f5', 41, 3, 2, 3, 'aaaaaaaaaaaaaa', '<p>dsdsdsd</p>\r\n', '2016-08-14 20:07:03', '2016-08-14 20:07:03', '0000-00-00 00:00:00', 1, 1),
(94, '57b0d199d48', 41, 3, 2, 3, 'probando ando', '<p>jejejejejej</p>\r\n', '2016-08-14 20:16:25', '2016-08-14 20:16:25', '0000-00-00 00:00:00', 1, 1),
(95, '57b0d50b662', 41, 1, 2, 3, 'probando ando', '<p>jejejej</p>\r\n', '2016-08-14 20:31:07', '2016-08-14 20:31:07', '0000-00-00 00:00:00', 1, 1),
(96, '57b0d66bc3f', 41, 3, 2, 3, 'error mesage', '<p>jejejeje</p>\r\n', '2016-08-14 20:36:59', '2016-08-14 20:36:59', '0000-00-00 00:00:00', 1, 1),
(97, '57b0d7b98da', 41, 2, 1, 3, 'error mesage', '<p>jejejejejej</p>\r\n', '2016-08-14 20:42:33', '2016-08-14 20:42:33', '0000-00-00 00:00:00', 1, 1),
(98, '57b0e10ea59', 41, 3, 2, 3, 'error mesage', '<p>jejejejej</p>\r\n', '2016-08-14 21:22:22', '2016-08-14 21:22:22', '0000-00-00 00:00:00', 1, 1),
(99, '57b0e15a489', 41, 3, 2, 3, 'error mesage', '<p>jejejejej</p>\r\n', '2016-08-14 21:23:38', '2016-08-14 21:23:38', '0000-00-00 00:00:00', 1, 1),
(100, '57b0e191a5d', 41, 3, 2, 3, 'probando ando', '<p>jejejjej</p>\r\n', '2016-08-14 21:24:33', '2016-08-14 21:24:33', '0000-00-00 00:00:00', 1, 1),
(101, '57b0e257e20', 41, 4, 2, 3, 'probando ando', '<p>jejejejeje</p>\r\n', '2016-08-14 21:27:51', '2016-08-14 21:27:51', '0000-00-00 00:00:00', 1, 1),
(102, '57b0e2a04a1', 41, 4, 2, 3, 'probando ando', '<p>jejejejejeje</p>\r\n', '2016-08-14 21:29:04', '2016-08-14 21:29:04', '0000-00-00 00:00:00', 1, 1),
(103, '57b0e2f6239', 41, 3, 2, 3, 'error mesage', '<p>jejejejej</p>\r\n', '2016-08-14 21:30:30', '2016-08-14 21:30:30', '0000-00-00 00:00:00', 1, 1),
(104, '57b0e3b0c9b', 41, 2, 2, 4, 'Ivr \' problems #', '<p>jejejejej</p>\r\n', '2016-08-14 21:33:36', '2016-08-14 21:33:36', '0000-00-00 00:00:00', 1, 1),
(105, '57b0e3d5247', 41, 3, 2, 2, 'probando ando', '<p>jejejejej</p>\r\n', '2016-08-14 21:34:13', '2016-08-14 21:34:13', '0000-00-00 00:00:00', 1, 1),
(106, '57b0e41998b', 41, 2, 2, 3, 'aaaaaaaaaaaaaa', '<p>jejejjejej</p>\r\n', '2016-08-14 21:35:21', '2016-08-14 21:35:21', '0000-00-00 00:00:00', 1, 1),
(107, '57b0e49b2cb', 41, 2, 2, 2, 'probando ando', '<p>jejejejeje</p>\r\n', '2016-08-14 21:37:31', '2016-08-14 21:37:31', '0000-00-00 00:00:00', 1, 1),
(108, '57b0e50b8bc', 41, 3, 2, 3, 'probando ando', '<p>jejejeje</p>\r\n', '2016-08-14 21:39:23', '2016-08-14 21:39:23', '0000-00-00 00:00:00', 1, 1),
(109, '57b0e5289f5', 41, 3, 2, 3, 'probando ando', '<p>jejejejejej</p>\r\n', '2016-08-14 21:39:52', '2016-08-14 21:39:52', '0000-00-00 00:00:00', 1, 1),
(110, '57b0e6e6006', 41, 3, 2, 3, 'probando ando', '<p>jejejejeje</p>\r\n', '2016-08-14 21:47:17', '2016-08-14 21:47:17', '0000-00-00 00:00:00', 1, 1),
(111, '57b0e71bc14', 41, 3, 2, 4, 'error mesage', '<p>jejejejejej</p>\r\n', '2016-08-14 21:48:11', '2016-08-14 21:48:11', '0000-00-00 00:00:00', 1, 1),
(112, '57b0e7b04b5', 41, 3, 2, 3, 'probando ando', '<p>jejejejej</p>\r\n', '2016-08-14 21:50:40', '2016-08-14 21:50:40', '0000-00-00 00:00:00', 1, 1),
(113, '57b0e7fc6f6', 41, 3, 2, 3, 'error mesage', '<p>jejejejje</p>\r\n', '2016-08-14 21:51:56', '2016-08-14 21:51:56', '0000-00-00 00:00:00', 1, 1),
(114, '57b0eac6297', 41, 4, 2, 3, 'aaaaaaaaaaaaaa', '<p>jejejejej</p>\r\n', '2016-08-14 22:03:50', '2016-08-14 22:03:50', '0000-00-00 00:00:00', 1, 1),
(115, '57b0eae7381', 41, 3, 2, 3, 'probando ando', '<p>jejejejejej</p>\r\n', '2016-08-14 22:04:23', '2016-08-14 22:04:23', '0000-00-00 00:00:00', 1, 1),
(116, '57b0f8fe212', 32, 3, 2, 2, 'Probando ando ....email class 2', '<p>Buen dia !!!</p>\r\n', '2016-08-14 23:04:30', '2016-08-14 23:04:30', '0000-00-00 00:00:00', 1, 1),
(117, '57b0fa041b3', 32, 3, 2, 3, 'error mesage', '<p>jejejejeje</p>\r\n', '2016-08-14 23:08:52', '2016-08-14 23:08:52', '0000-00-00 00:00:00', 1, 1),
(118, '57b0fabe6b9', 32, 3, 2, 3, 'error mesage', '<p>jejejejej</p>\r\n', '2016-08-14 23:11:58', '2016-08-14 23:11:58', '0000-00-00 00:00:00', 1, 1),
(119, '57b0fb4b878', 32, 3, 2, 3, 'error mesage', '<p>jejejeje</p>\r\n', '2016-08-14 23:14:19', '2016-08-14 23:14:19', '0000-00-00 00:00:00', 1, 1),
(120, '57b0fb9b457', 32, 3, 2, 3, 'error mesage', '<p>jejejejejeje</p>\r\n', '2016-08-14 23:15:39', '2016-08-14 23:15:39', '0000-00-00 00:00:00', 1, 1),
(121, '57b0fd259ab', 32, 3, 2, 3, 'probando ando', '<p>jejejejejeje</p>\r\n', '2016-08-14 23:22:13', '2016-08-14 23:22:13', '0000-00-00 00:00:00', 1, 1),
(122, '57b0fe00f0d', 32, 3, 2, 3, 'error mesage', '<p>jejejejejeje</p>\r\n', '2016-08-14 23:25:52', '2016-08-14 23:25:52', '0000-00-00 00:00:00', 1, 1),
(123, '57b0ff65723', 32, 3, 2, 3, 'probando ando', '<p>jejejejejej</p>\r\n', '2016-08-14 23:31:49', '2016-08-14 23:31:49', '0000-00-00 00:00:00', 1, 1);

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
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_users`
--

INSERT INTO `ticket_users` (`id`, `id_ticket`, `id_user`) VALUES
(1, 65, 44),
(2, 65, 32),
(3, 66, 44),
(4, 66, 32),
(5, 67, 42),
(6, 67, 41),
(7, 68, 44),
(8, 68, 43),
(9, 69, 32),
(10, 69, 42),
(11, 69, 43),
(12, 70, 32),
(13, 70, 42),
(14, 70, 43),
(15, 71, 32),
(16, 71, 42),
(17, 71, 43),
(18, 72, 32),
(19, 72, 42),
(20, 72, 43),
(21, 73, 32),
(22, 73, 42),
(23, 73, 43),
(24, 74, 32),
(25, 74, 42),
(26, 74, 43),
(27, 75, 32),
(28, 75, 42),
(29, 75, 43),
(30, 76, 32),
(31, 76, 42),
(32, 76, 43),
(33, 77, 32),
(34, 77, 42),
(35, 77, 43),
(36, 78, 32),
(37, 78, 42),
(38, 78, 43),
(39, 79, 32),
(40, 79, 42),
(41, 79, 43),
(42, 80, 32),
(43, 80, 42),
(44, 80, 43),
(45, 81, 32),
(46, 81, 42),
(47, 81, 43),
(48, 82, 32),
(49, 82, 42),
(50, 82, 43),
(51, 83, 32),
(52, 83, 42),
(53, 83, 43),
(54, 84, 32),
(55, 84, 42),
(56, 84, 43),
(57, 85, 32),
(58, 85, 42),
(59, 85, 43),
(60, 86, 32),
(61, 86, 42),
(62, 86, 43),
(63, 87, 32),
(64, 87, 42),
(65, 87, 43),
(66, 88, 32),
(67, 88, 42),
(68, 88, 43),
(69, 89, 32),
(70, 89, 42),
(71, 89, 43),
(72, 90, 32),
(73, 90, 42),
(74, 90, 43),
(75, 91, 32),
(76, 91, 43),
(77, 91, 42),
(78, 92, 32),
(79, 92, 42),
(80, 92, 43),
(81, 93, 42),
(82, 93, 43),
(83, 94, 32),
(84, 94, 42),
(85, 94, 43),
(86, 95, 32),
(87, 95, 42),
(88, 95, 43),
(89, 96, 32),
(90, 96, 42),
(91, 96, 43),
(92, 97, 32),
(93, 97, 42),
(94, 97, 43),
(95, 98, 32),
(96, 98, 42),
(97, 98, 43),
(98, 99, 32),
(99, 99, 42),
(100, 99, 43),
(101, 100, 32),
(102, 100, 42),
(103, 100, 43),
(104, 101, 32),
(105, 101, 42),
(106, 101, 43),
(107, 102, 32),
(108, 102, 42),
(109, 102, 43),
(110, 103, 32),
(111, 103, 42),
(112, 103, 43),
(113, 104, 32),
(114, 104, 42),
(115, 104, 43),
(116, 105, 32),
(117, 105, 42),
(118, 105, 43),
(119, 106, 32),
(120, 106, 42),
(121, 106, 43),
(122, 107, 32),
(123, 107, 42),
(124, 107, 43),
(125, 108, 32),
(126, 108, 42),
(127, 108, 43),
(128, 109, 32),
(129, 109, 42),
(130, 109, 43),
(131, 110, 32),
(132, 110, 42),
(133, 110, 43),
(134, 111, 32),
(135, 111, 42),
(136, 111, 43),
(137, 112, 32),
(138, 112, 42),
(139, 112, 43),
(140, 113, 32),
(141, 113, 42),
(142, 113, 43),
(143, 114, 32),
(144, 114, 42),
(145, 114, 43),
(146, 115, 32),
(147, 115, 42),
(148, 115, 43),
(149, 116, 44),
(150, 117, 44),
(151, 118, 44),
(152, 119, 44),
(153, 120, 44),
(154, 121, 44),
(155, 122, 44),
(156, 123, 44);

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
(32, 'xavier', '536d769f672bc52cc23a23257630ffb04e19acd0382a3087c1ad55f2224c5d96', 0xb252b2970df242a71c3ef2ce71a88a0eca612682a055499fdd22df59b9f6683b, 'ecastro@quorumtelecom.info', '2016-07-29 23:58:07', 1),
(40, 'xcastro', '63000259af8210bea8b1a1bab59c0451b625ad8f32f0faf3b92fa368cc918b79', 0xf679ad64c30c80bb3843f521402eda38617788b74bf271f36c7aeac846db90ab, 'ecastro@quorumtelecom.info', '2016-07-30 15:19:25', 1),
(41, 'thais', '33a44ecc9f4502c81e5bfd9cf8e48b151d84d4c42174cf6735441eeef4fa347f', 0xea4ea54d485ca6c6fec5e493c4a9a676dedfac80257a1f9fe42f3fc074a08551, 'spiderbbc@hotmail.com', '2016-07-30 15:21:13', 2),
(42, 'chateing', '334cef1596c7cc4ba6d7e76207ccce24017f2ff4a5745720b03998333acd2f8f', 0xf4f64d58eef852091ee0b14c617f8f445635e89eb8cd74ed17cf33651500b4c5, 'mtvmodel@mtvla.com', '2016-07-30 15:23:14', 1),
(43, 'rpiedra', 'a0a8f03420418a0511d05a92fcdf0c627b77ffd561657f6dd91944075a68fed3', 0xea2652cd83592685a23fed8ba45b71f088a0d156197da13c6aebe2740a8ad4d2, 'ecastro@openmailbox.org', '2016-07-30 15:32:43', 2),
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
-- Indexes for table `status`
--
ALTER TABLE `status`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gravedad`
--
ALTER TABLE `gravedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `ticket_img`
--
ALTER TABLE `ticket_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_users`
--
ALTER TABLE `ticket_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
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
