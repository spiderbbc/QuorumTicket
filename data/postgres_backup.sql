--
-- Generated from mysql2pgsql.perl
-- http://gborg.postgresql.org/project/mysql2psql/
-- (c) 2001 - 2007 Jose M. Duarte, Joseph Speigle
--

-- warnings are printed for drop tables if they do not exist
-- please see http://archives.postgresql.org/pgsql-novice/2004-10/msg00158.php

-- ##############################################################
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-09-2016 a las 11:51:43
-- Versión del servidor: 10.0.27-MariaDB-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.2




--
-- Base de datos: qtelecom
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla afectado
--

DROP TABLE "afectado" CASCADE\g
CREATE TABLE  "afectado" (
   "id"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla departamentos
--

DROP TABLE "departamentos" CASCADE\g
CREATE TABLE  "departamentos" (
   "id"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla gravedad
--

DROP TABLE "gravedad" CASCADE\g
CREATE TABLE  "gravedad" (
   "id"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla group
--

DROP TABLE "group" CASCADE\g
CREATE TABLE  "group" (
   "id"   int NOT NULL, 
   "name"   varchar(20) NOT NULL, 
   "permissions"   text NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla perfiles
--

DROP TABLE "perfiles" CASCADE\g
CREATE TABLE  "perfiles" (
   "id"   int NOT NULL, 
   "user_id"   int NOT NULL, 
   "id_departamento"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL, 
   "cargo"   varchar(50) NOT NULL, 
   "ext"   varchar(10) NOT NULL, 
   "img"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla respuestas
--

DROP TABLE "respuestas" CASCADE\g
CREATE TABLE  "respuestas" (
   "id"   int NOT NULL, 
   "uuid"   varchar(11) NOT NULL, 
   "user_id"   int NOT NULL, 
   "msg"   text NOT NULL, 
   "date_added"   timestamp without time zone NOT NULL, 
   "date_update"   timestamp without time zone NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla resp_img
--

DROP TABLE "resp_img" CASCADE\g
CREATE TABLE  "resp_img" (
   "id_ticket"   int NOT NULL, 
   "path"   varchar(100) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla servicios
--

DROP TABLE "servicios" CASCADE\g
CREATE TABLE  "servicios" (
   "id"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla status
--

DROP TABLE "status" CASCADE\g
CREATE TABLE  "status" (
   "id"   int NOT NULL, 
   "nombre"   varchar(50) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tickets
--

DROP TABLE "tickets" CASCADE\g
CREATE TABLE  "tickets" (
   "id"   int NOT NULL, 
   "uuid"   varchar(11) NOT NULL, 
   "user_id"   int NOT NULL, 
   "id_afectado"   int NOT NULL, 
   "id_gravedad"   int NOT NULL, 
   "id_servicios"   int NOT NULL, 
   "titulo"   varchar(150) NOT NULL, 
   "msg"   text NOT NULL, 
   "date_added"   timestamp without time zone NOT NULL, 
   "date_update"   timestamp without time zone NOT NULL, 
   "date_closed"   timestamp without time zone NOT NULL, 
   "id_status"   int NOT NULL, 
   "private"    smallint NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ticket_img
--

DROP TABLE "ticket_img" CASCADE\g
CREATE TABLE  "ticket_img" (
   "id"   int NOT NULL, 
   "path"   varchar(100) NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ticket_users
--

DROP TABLE "ticket_users" CASCADE\g
CREATE TABLE  "ticket_users" (
   "id"   int NOT NULL, 
   "id_ticket"   int NOT NULL, 
   "id_user"   int NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users
--

DROP TABLE "users" CASCADE\g
CREATE TABLE  "users" (
   "id"   int NOT NULL, 
   "username"   varchar(20) NOT NULL, 
   "password"   varchar(64) NOT NULL, 
   "salt"   bytea NOT NULL, 
   "email"   varchar(50) NOT NULL, 
   "joined"   timestamp without time zone NOT NULL, 
   "grupo"   int NOT NULL 
)  ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users_sessions
--

DROP TABLE "users_sessions" CASCADE\g
CREATE TABLE  "users_sessions" (
   "id"   int NOT NULL, 
   "user_id"   int NOT NULL, 
   "hash"   varchar(64) NOT NULL 
)  ;
ALTER TABLE afectado
  ADD PRIMARY KEY (id);
ALTER TABLE departamentos
  ADD PRIMARY KEY (id);
ALTER TABLE gravedad
  ADD PRIMARY KEY (id);
ALTER TABLE group
  ADD PRIMARY KEY (id);
ALTER TABLE perfiles
  ADD PRIMARY KEY (id);
ALTER TABLE respuestas
  ADD PRIMARY KEY (id);
ALTER TABLE resp_img
  ADD PRIMARY KEY (id_ticket);
ALTER TABLE servicios
  ADD PRIMARY KEY (id);
ALTER TABLE status
  ADD PRIMARY KEY (id);
ALTER TABLE tickets
  ADD PRIMARY KEY (id);
ALTER TABLE ticket_img
  ADD PRIMARY KEY (id);
ALTER TABLE ticket_users
  ADD PRIMARY KEY (id);
ALTER TABLE users
  ADD PRIMARY KEY (id);
ALTER TABLE users_sessions
  ADD PRIMARY KEY (id);
ALTER TABLE afectado
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE departamentos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE gravedad
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE group
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE perfiles
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
ALTER TABLE respuestas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
ALTER TABLE resp_img
  MODIFY id_ticket int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE servicios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE status
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE tickets
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
ALTER TABLE ticket_img
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE ticket_users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE users_sessions
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
