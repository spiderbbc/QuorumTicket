-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2016 a las 09:34:49
-- Versión del servidor: 10.0.23-MariaDB-0ubuntu0.15.04.1
-- Versión de PHP: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `qtelecom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afectado`
--

CREATE TABLE IF NOT EXISTS `afectado` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `afectado`
--

INSERT INTO `afectado` (`id`, `nombre`) VALUES
(1, 'No hay Afectados'),
(2, 'Pocos Afectados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Sala tecnica'),
(2, 'Medios'),
(3, 'Administracion'),
(4, 'Presidencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gravedad`
--

CREATE TABLE IF NOT EXISTS `gravedad` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gravedad`
--

INSERT INTO `gravedad` (`id`, `nombre`) VALUES
(1, 'Un problema temporal'),
(2, 'Algunos servicios no estan Disponibles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `group`
--

INSERT INTO `group` (`id`, `name`, `permissions`) VALUES
(1, 'Standar User', ''),
(2, 'Manager', '{\r\n  "departamento_id":1, \r\n  "admin":1\r\n}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `user_id`, `id_departamento`, `nombre`, `cargo`, `ext`, `img`) VALUES
(1, 51, 2, 'xavier', '', '', ''),
(2, 52, 2, 'Username test', 'Some test', '0000', ''),
(3, 53, 2, 'Thais Ravelo', 'Gerente de Medios', '1103', ''),
(4, 54, 1, 'Raul Piedra', 'Gerente de Informatica y Tecnologia', '1105', ''),
(5, 55, 3, 'Rosa Nuccio', 'Contador', '1107', ''),
(6, 56, 3, 'Jose Di Benedetto', 'Gerente de Administracion', '1106', ''),
(7, 57, 2, 'Johana Carreño', 'Asistente de Administracion', '1115', ''),
(8, 58, 2, 'Carmen Marquez', 'Ejecutiva de Medios', '1199', ''),
(9, 59, 1, 'Marisel Martinez', 'Operador Tecnico', '1120', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE IF NOT EXISTS `respuestas` (
`id` int(11) NOT NULL,
  `uuid` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `uuid`, `user_id`, `msg`, `date_added`, `date_update`) VALUES
(13, '57ade2628f9', 54, 'Entendido se procede ...', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '57ade2628f9', 53, 'Cojonudo', '2016-08-25 00:00:00', '2016-08-25 00:00:00'),
(15, '57ade28d041', 52, '<p>Vale ...</p>\r\n', '2016-08-24 14:59:19', '2016-08-24 14:59:19'),
(16, '57ade28d041', 52, '<p>jejejejeje</p>\r\n', '2016-08-24 15:23:44', '2016-08-24 15:23:44'),
(17, '57ade1bd52e', 53, '<p>Entendido ...</p>\r\n', '2016-08-25 16:53:52', '2016-08-25 16:53:52'),
(18, '57ade28d041', 53, '<p>jejeejejejejej</p>\r\n', '2016-08-29 08:56:09', '2016-08-29 08:56:09'),
(19, '57ade28d041', 53, '<p><br />\r\njejejeejejejej</p>\r\n', '2016-08-29 08:57:18', '2016-08-29 08:57:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resp_img`
--

CREATE TABLE IF NOT EXISTS `resp_img` (
`id_ticket` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'Telefonia/Central Telefonica'),
(2, 'Internet/Conectividad'),
(3, 'Impresora/Conectividad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`) VALUES
(1, 'Abierto'),
(2, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `user_id`, `id_afectado`, `id_gravedad`, `id_servicios`, `titulo`, `msg`, `date_added`, `date_update`, `date_closed`, `id_status`, `private`) VALUES
(70, '57ade1bd52e', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-12 10:48:29', '2016-08-12 10:48:29', '0000-00-00 00:00:00', 1, 0),
(71, '57ade203af5', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejejeje</p>\r\n', '2016-08-12 10:49:39', '2016-08-12 10:49:39', '0000-00-00 00:00:00', 1, 0),
(72, '57ade21a65c', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejejeje</p>\r\n', '2016-08-12 10:50:02', '2016-08-12 10:50:02', '0000-00-00 00:00:00', 1, 0),
(73, '57ade2628f9', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejeej</p>\r\n', '2016-08-12 10:51:14', '2016-08-12 10:51:14', '0000-00-00 00:00:00', 1, 0),
(74, '57ade28d041', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejeej</p>\r\n', '2016-08-12 10:51:57', '2016-08-12 10:51:57', '0000-00-00 00:00:00', 1, 0),
(75, '57ade75f0dd', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejejej</p>\r\n', '2016-08-12 11:12:31', '2016-08-12 11:12:31', '0000-00-00 00:00:00', 1, 1),
(76, '57aded40233', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejejeje</p>\r\n', '2016-08-12 11:37:36', '2016-08-12 11:37:36', '0000-00-00 00:00:00', 1, 1),
(77, '57aded5975a', 53, 1, 1, 1, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-12 11:38:01', '2016-08-12 11:38:01', '0000-00-00 00:00:00', 1, 1),
(78, '57adeda00ff', 53, 1, 1, 1, 'email invol', '<p>jejejejeje</p>\r\n', '2016-08-12 11:39:12', '2016-08-12 11:39:12', '0000-00-00 00:00:00', 1, 1),
(79, '57adedb460d', 53, 2, 2, 2, 'email invol ...', '<p>jejejeje</p>\r\n', '2016-08-12 11:39:32', '2016-08-12 11:39:32', '0000-00-00 00:00:00', 1, 1),
(80, '57b1dfe9361', 51, 2, 2, 3, 'Problemas con mi Outlook 2013', '<p>jejejeje</p>\r\n', '2016-08-15 11:29:45', '2016-08-15 11:29:45', '0000-00-00 00:00:00', 1, 1),
(81, '57b21b3450d', 53, 2, 2, 2, 'Extra Extra Quorum Apesta', '<p>jejejejejje</p>\r\n', '2016-08-15 15:42:44', '2016-08-15 15:42:44', '0000-00-00 00:00:00', 1, 1),
(82, '57b21b8ee5a', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejejeje</p>\r\n', '2016-08-15 15:44:14', '2016-08-15 15:44:14', '0000-00-00 00:00:00', 1, 1),
(83, '57b21c701b4', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-15 15:48:00', '2016-08-15 15:48:00', '0000-00-00 00:00:00', 1, 1),
(84, '57b21f47966', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeej</p>\r\n', '2016-08-15 16:00:07', '2016-08-15 16:00:07', '0000-00-00 00:00:00', 1, 1),
(85, '57b22600a80', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejejeej</p>\r\n', '2016-08-15 16:28:48', '2016-08-15 16:28:48', '0000-00-00 00:00:00', 1, 1),
(86, '57b2263287f', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejeje</p>\r\n', '2016-08-15 16:29:38', '2016-08-15 16:29:38', '0000-00-00 00:00:00', 1, 1),
(87, '57b226cb868', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-15 16:32:11', '2016-08-15 16:32:11', '0000-00-00 00:00:00', 1, 1),
(88, '57b31f4a0aa', 53, 2, 2, 2, 'Prueba Email ....', '<p>jejejejejeeje</p>\r\n', '2016-08-16 10:12:26', '2016-08-16 10:12:26', '0000-00-00 00:00:00', 1, 1),
(89, '57b321b6905', 53, 2, 2, 3, 'Probando SwiftMailer', '<p>jejejejejeje</p>\r\n', '2016-08-16 10:22:46', '2016-08-16 10:22:46', '0000-00-00 00:00:00', 1, 1),
(90, '57b32261878', 51, 2, 2, 2, 'Probando SwiftMailer', '<p>jejejejeje</p>\r\n', '2016-08-16 10:25:37', '2016-08-16 10:25:37', '0000-00-00 00:00:00', 1, 1),
(91, '57b322a44d6', 51, 2, 2, 3, 'Probando SwiftMailer', '<p>jejejejeje</p>\r\n', '2016-08-16 10:26:44', '2016-08-16 10:26:44', '0000-00-00 00:00:00', 1, 1),
(92, '57b32384ec0', 51, 2, 2, 2, 'Probando SwiftMailer', '<p>jejejejeje</p>\r\n', '2016-08-16 10:30:28', '2016-08-16 10:30:28', '0000-00-00 00:00:00', 1, 1),
(93, '57b3239dda3', 51, 2, 2, 2, 'Probando SwiftMailer', '<p>jejejejeej</p>\r\n', '2016-08-16 10:30:53', '2016-08-16 10:30:53', '0000-00-00 00:00:00', 1, 1),
(94, '57b32539f0a', 53, 2, 2, 3, 'Probando SwiftMailer', '<p>jejejejejeje</p>\r\n', '2016-08-16 10:37:45', '2016-08-16 10:37:45', '0000-00-00 00:00:00', 1, 1),
(95, '57b32716a00', 53, 2, 2, 3, 'Probando SwiftMailer 2', '<p>Buen dia por medio de la presente procedo con este tipo de correo:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Negritas........................</strong></p>\r\n\r\n<p><em>Cursiva ...............................</em></p>\r\n\r\n<p><u>Subrayado ....................................</u></p>\r\n\r\n<p><s>Tachado ............................................</s></p>\r\n\r\n<p><sub>Sub Indice ........................................................</sub></p>\r\n\r\n<p><sup>Super Indice ..........................................................</sup></p>\r\n\r\n<ol>\r\n	<li>Numeracion</li>\r\n	<li>Numeracio 2</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Vi&ntilde;etas</li>\r\n	<li>otra Vi&ntilde;eta</li>\r\n</ul>\r\n\r\n<blockquote>\r\n<p>Esto es una cita textual</p>\r\n</blockquote>\r\n\r\n<p><a href="http://localhost/QTelecom/?accion=home" target="_blank">http://localhost/QTelecom/?accion=home</a></p>\r\n\r\n<p><a id="https://www.youtube.com/?hl=es-419" name="https://www.youtube.com/?hl=es-419"></a></p>\r\n\r\n<p><img alt="swiftMailer" src="data:image/png;base64,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" style="height:54px; width:144px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&diams;</p>\r\n\r\n<h2 style="font-style:italic;">hola holaA</h2>\r\n\r\n<h1>ESTO ES UN ENCABEZADO</h1>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<caption>Prueba</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-08-16 10:45:42', '2016-08-16 10:45:42', '0000-00-00 00:00:00', 1, 1),
(96, '57b32d8a4bb', 53, 2, 2, 2, 'Probando SwiftMailer 3', '<p>jejejejejeje</p>\r\n', '2016-08-16 11:13:14', '2016-08-16 11:13:14', '0000-00-00 00:00:00', 1, 1),
(97, '57b32e36a39', 53, 2, 2, 3, 'Probando SwiftMailer 3', '<p>esto es una prueba ....</p>\r\n', '2016-08-16 11:16:06', '2016-08-16 11:16:06', '0000-00-00 00:00:00', 1, 1),
(98, '57b32f744e9', 53, 2, 2, 3, 'Probando SwiftMailer 4', '<p>jejejejejeej</p>\r\n', '2016-08-16 11:21:24', '2016-08-16 11:21:24', '0000-00-00 00:00:00', 1, 1),
(99, '57b33011e9b', 53, 2, 2, 3, 'Probando SwiftMailer 5', '<p>Probando ando</p>\r\n', '2016-08-16 11:24:01', '2016-08-16 11:24:01', '0000-00-00 00:00:00', 1, 1),
(100, '57b330a00a5', 53, 2, 2, 3, 'Probando SwiftMailer 6', '<p>jejejejeejej</p>\r\n', '2016-08-16 11:26:24', '2016-08-16 11:26:24', '0000-00-00 00:00:00', 1, 1),
(101, '57b47845bd3', 53, 2, 2, 2, 'Probando ando', '<p>jejejejejeej</p>\r\n', '2016-08-17 10:44:21', '2016-08-17 10:44:21', '0000-00-00 00:00:00', 1, 1),
(102, '57b47a76571', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeej</p>\r\n', '2016-08-17 10:53:42', '2016-08-17 10:53:42', '0000-00-00 00:00:00', 1, 1),
(103, '57b49025203', 53, 2, 2, 3, 'Probando UUid', '<p>jejejejejeje</p>\r\n', '2016-08-17 12:26:13', '2016-08-17 12:26:13', '0000-00-00 00:00:00', 1, 1),
(104, '57b4905c2eb', 53, 2, 2, 2, 'Probando UUid', '<p>jejejeejej</p>\r\n', '2016-08-17 12:27:08', '2016-08-17 12:27:08', '0000-00-00 00:00:00', 1, 1),
(105, '57b490e02d9', 53, 2, 2, 3, 'Probando UUid', '<p>jejejejej</p>\r\n', '2016-08-17 12:29:20', '2016-08-17 12:29:20', '0000-00-00 00:00:00', 1, 1),
(106, '57b492c2525', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-17 12:37:22', '2016-08-17 12:37:22', '0000-00-00 00:00:00', 1, 1),
(107, '57b4930038d', 53, 2, 2, 3, 'Extra Extra Quorum Apesta', '<p>jejejejeje</p>\r\n', '2016-08-17 12:38:24', '2016-08-17 12:38:24', '0000-00-00 00:00:00', 1, 1),
(108, '57b49395224', 53, 2, 2, 3, 'Probando UUid', '<p>jejejejejej</p>\r\n', '2016-08-17 12:40:53', '2016-08-17 12:40:53', '0000-00-00 00:00:00', 1, 1),
(109, '57b5c0ac4b4', 53, 2, 2, 3, 'Probando Invol email', '<p>jejejejeje</p>\r\n', '2016-08-18 10:05:32', '2016-08-18 10:05:32', '0000-00-00 00:00:00', 1, 1),
(110, '57bdad77e9f', 53, 1, 1, 1, 'llamar a tal persona', '<p>llamar ...</p>\r\n', '2016-08-24 10:21:43', '2016-08-24 10:21:44', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_img`
--

CREATE TABLE IF NOT EXISTS `ticket_img` (
`id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_users`
--

CREATE TABLE IF NOT EXISTS `ticket_users` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket_users`
--

INSERT INTO `ticket_users` (`id`, `id_user`, `id_ticket`) VALUES
(1, 54, 77),
(2, 51, 77),
(3, 54, 78),
(4, 51, 78),
(5, 54, 79),
(6, 51, 79),
(7, 51, 80),
(8, 51, 81),
(9, 51, 82),
(10, 51, 83),
(11, 51, 84),
(12, 51, 85),
(13, 51, 86),
(14, 51, 87),
(15, 51, 88),
(16, 51, 89),
(17, 54, 90),
(18, 53, 91),
(19, 51, 92),
(20, 54, 93),
(21, 53, 94),
(22, 51, 95),
(23, 51, 96),
(24, 51, 97),
(25, 51, 98),
(26, 54, 99),
(27, 54, 100),
(28, 51, 101),
(29, 51, 102),
(30, 51, 104),
(31, 51, 105),
(32, 51, 106),
(33, 51, 107),
(34, 51, 108),
(35, 53, 109),
(36, 51, 109),
(37, 53, 110),
(38, 51, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` binary(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `joined`, `grupo`) VALUES
(51, 'spiderbbc', '51295805f2024ff56523e8b0ccdc576660b0812071ebb40b193304c413a1b866', 0xcb05b3bf75ff5f85a7ac334d32805b4d8534eb405067d891fcf2523398ddc434, 'spiderbbc@gmail.com', '2016-08-01 12:50:29', 1),
(52, 'username', 'f6715854278f24a3dc9cc33ec992808edadba56e78b5522c880cf1ffa974a54f', 0x5773dad84369231e2c1582cf6679a48efe38d78ff9f5471de38c7ab04e2afc3a, 'username@gmail.com', '2016-08-01 12:51:13', 1),
(53, 'thais', '6fac3cc3fe895dedd5b8b608b074fb06d23f6412006159a3fbc24dbe5947fc4c', 0x88180b9f5c649fb3e65986c2b820c4cdffff5a946f2910f017b533a14c160404, 'ecastro@quorumtelecom.info', '2016-08-01 16:22:30', 2),
(54, 'rpiedra', '17f07a7db46e18c1d38e4f5eb50200d2ba533fa5dc24a83f2eaa53d90da25eda', 0xb236bba6c8a1a69a5ce248b87ad985faaa1dc7d3916063aa90431902b58b2923, 'ecastro@openmailbox.org', '2016-08-09 11:11:17', 2),
(55, 'rnuccio', 'b410fc78dc4332c4c032bf61ea98e2094dc5c1d4b85d2f72a28aac9385841a5c', 0x337e9013e9246830b5ee1bee56c782b303bb9a47d52431f6954620b6723d37f4, 'rnuccio@gmail.com', '2016-08-09 11:12:20', 2),
(56, 'benedetto', '78b604f799787bff51c878d272d873b9cc59fc6e48a6d2fdd6a82b65b96de181', 0x8a9fb6b2a6edb7e7ff8887ccf52c38c4e929bee2050baabbc7a63ddec5f3a3e9, 'abenedetto@gmail.com', '2016-08-09 11:13:17', 2),
(57, 'johana', 'd5018ea6d1f2568c18cbd04d9d4ff6248011f374b067c7cd444a5a305c671b2e', 0xc17abe6dbb7e34255888cbe7e4455ea57d8a80534186cafd25ee540f89867893, 'johana@gmail.com', '2016-08-09 11:13:58', 1),
(58, 'carmen', 'c2ec1932401a1b8c5f9d461720255eb2bfa836f4a382b3c3bc38561c81b8ed84', 0x1836ce2c9de67480a7e7d747a772b1ab80a68c7a6935401a5697f9b26d8f4c96, 'carmen@gmail.com', '2016-08-09 11:14:34', 1),
(59, 'marisel', '72b2ecc4a983303d583ab7f1e18cb87d9d1f32da752804e80af1dfa8bc7234ce', 0xf889d6fffaa71601e259f1308f08802c6e59bb1326bc6e76808e28bc11c30c2d, 'marisel@gmail.com', '2016-08-09 11:15:07', 1),
(60, 'cesar', '972adcb2039755c372f77069456d432e53a10f07cd5198f90d6ce589fdd5deb7', 0x237df4c6ede65c279a6c81bc0496f5ac44c2dcf69ae371af18d60a43cc4c479f, 'test@quorumtelecom.info', '2016-08-16 14:29:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_sessions`
--

CREATE TABLE IF NOT EXISTS `users_sessions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afectado`
--
ALTER TABLE `afectado`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gravedad`
--
ALTER TABLE `gravedad`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resp_img`
--
ALTER TABLE `resp_img`
 ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket_img`
--
ALTER TABLE `ticket_img`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_sessions`
--
ALTER TABLE `users_sessions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afectado`
--
ALTER TABLE `afectado`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `gravedad`
--
ALTER TABLE `gravedad`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `resp_img`
--
ALTER TABLE `resp_img`
MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `ticket_img`
--
ALTER TABLE `ticket_img`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `users_sessions`
--
ALTER TABLE `users_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
