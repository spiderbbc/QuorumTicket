-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-08-2016 a las 19:29:16
-- Versión del servidor: 10.0.25-MariaDB-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qtelecom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afectado`
--

CREATE TABLE `afectado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `afectado`
--

INSERT INTO `afectado` (`id`, `nombre`) VALUES
(1, 'Ningun Usuario y solo Uno'),
(2, 'Varios Afectados'),
(3, 'Ningun Usuario y solo Uno'),
(4, 'Varios Afectados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Sala tecnica'),
(2, 'Sistemas'),
(3, 'Medios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gravedad`
--

CREATE TABLE `gravedad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gravedad`
--

INSERT INTO `gravedad` (`id`, `nombre`) VALUES
(1, 'Un Fallo Menor'),
(2, 'No hay Servicio Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `group`
--

INSERT INTO `group` (`id`, `name`, `permissions`) VALUES
(1, 'Standar User', ''),
(2, 'Manager', '{"departamento_id":1,\r\n "admin":1}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
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
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `user_id`, `id_departamento`, `nombre`, `cargo`, `ext`, `img`) VALUES
(1, 32, 1, 'xavier', 'Operador Tecnico', '0130', ''),
(2, 45, 2, 'Username test', 'Desconocido', '0000', ''),
(3, 43, 1, 'Raul Piedra', 'Supervisor Departamento Tecnico', '0101', ''),
(4, 41, 3, 'Thais Ravelo', 'Supervisor Medios', '0000', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `uuid` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `uuid`, `user_id`, `msg`, `date_added`, `date_update`) VALUES
(1, '10000', 3, 'Entendido', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '57', 41, '<p>esto es una prueba</p>\r\n', '2016-08-27 11:57:30', '2016-08-27 11:57:30'),
(3, '57', 41, '<p>hola hola</p>\r\n', '2016-08-27 12:02:27', '2016-08-27 12:02:27'),
(4, '57', 32, '<p>todos tiene el mismo uuid</p>\r\n', '2016-08-27 19:26:18', '2016-08-27 19:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resp_img`
--

CREATE TABLE `resp_img` (
  `id_ticket` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'Telefonia/Central Telefonica'),
(2, 'Internet/Conectividad'),
(3, 'Impresora/Conectividad'),
(4, 'Red/Carpetas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`) VALUES
(1, 'Abierto'),
(2, 'Cerrado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
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
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `uuid`, `user_id`, `id_afectado`, `id_gravedad`, `id_servicios`, `titulo`, `msg`, `date_added`, `date_update`, `date_closed`, `id_status`, `private`) VALUES
(1, '57c1bb26002', 41, 3, 2, 3, 'Extra Extra Linux Mint a llegado', '<p>jejejejejeje</p>\r\n', '2016-08-27 12:09:09', '2016-08-27 12:09:09', '0000-00-00 00:00:00', 1, 0),
(2, '57c1bb60ced', 41, 3, 2, 2, 'Extra Extra Linux Mint a llegado', '<p>jejejejejejeje</p>\r\n', '2016-08-27 12:10:08', '2016-08-27 12:10:08', '0000-00-00 00:00:00', 1, 0),
(3, '57c21875c2a', 41, 1, 1, 1, 'probando ando -----------------', '<p>jejejejejeejjeje</p>\r\n', '2016-08-27 18:47:17', '2016-08-27 18:47:17', '0000-00-00 00:00:00', 1, 0),
(4, '57c21938248', 41, 3, 2, 3, 'asi andamos todos', '<p>jejejejejejej</p>\r\n', '2016-08-27 18:50:32', '2016-08-27 18:50:32', '0000-00-00 00:00:00', 1, 0),
(5, '57c219a7d2f', 41, 3, 2, 3, 'probando ando -----------------', '<p>jejejejejeje</p>\r\n', '2016-08-27 18:52:23', '2016-08-27 18:52:24', '0000-00-00 00:00:00', 1, 0),
(6, '57c21e0e13d', 41, 3, 2, 3, 'Extra Extra Linux Mint a llegado', '<p>jejejejejej</p>\r\n', '2016-08-27 19:11:10', '2016-08-27 19:11:10', '0000-00-00 00:00:00', 1, 0),
(7, '57c21eba83f', 41, 3, 2, 2, 'Enviando desde Linux Mint', '<p>jejejejejejejejej</p>\r\n', '2016-08-27 19:14:02', '2016-08-27 19:14:02', '0000-00-00 00:00:00', 1, 0),
(8, '57c2208be35', 32, 3, 2, 3, 'probando ando -----------------', '<p>jejejejejejej</p>\r\n', '2016-08-27 19:21:47', '2016-08-27 19:21:47', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_img`
--

CREATE TABLE `ticket_img` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_users`
--

CREATE TABLE `ticket_users` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket_users`
--

INSERT INTO `ticket_users` (`id`, `id_ticket`, `id_user`) VALUES
(1, 1, 41),
(2, 2, 41),
(3, 2, 32),
(4, 3, 41),
(5, 3, 32),
(6, 4, 41),
(7, 5, 41),
(8, 6, 41),
(9, 6, 32),
(10, 7, 41),
(11, 7, 43),
(12, 8, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`, `joined`, `grupo`) VALUES
(32, 'xavier', '536d769f672bc52cc23a23257630ffb04e19acd0382a3087c1ad55f2224c5d96', 0xb252b2970df242a71c3ef2ce71a88a0eca612682a055499fdd22df59b9f6683b, 'ecastro@quorumtelecom.info', '2016-07-29 23:58:07', 1),
(41, 'thais', '33a44ecc9f4502c81e5bfd9cf8e48b151d84d4c42174cf6735441eeef4fa347f', 0xea4ea54d485ca6c6fec5e493c4a9a676dedfac80257a1f9fe42f3fc074a08551, 'spiderbbc@hotmail.com', '2016-07-30 15:21:13', 2),
(42, 'chateing', '334cef1596c7cc4ba6d7e76207ccce24017f2ff4a5745720b03998333acd2f8f', 0xf4f64d58eef852091ee0b14c617f8f445635e89eb8cd74ed17cf33651500b4c5, 'mtvmodel@mtvla.com', '2016-07-30 15:23:14', 1),
(43, 'rpiedra', 'a0a8f03420418a0511d05a92fcdf0c627b77ffd561657f6dd91944075a68fed3', 0xea2652cd83592685a23fed8ba45b71f088a0d156197da13c6aebe2740a8ad4d2, 'ecastro@openmailbox.org', '2016-07-30 15:32:43', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_sessions`
--

CREATE TABLE `users_sessions` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `gravedad`
--
ALTER TABLE `gravedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `resp_img`
--
ALTER TABLE `resp_img`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ticket_img`
--
ALTER TABLE `ticket_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ticket_users`
--
ALTER TABLE `ticket_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
