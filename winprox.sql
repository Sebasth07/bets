-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2021 a las 20:56:11
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `winprox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

CREATE TABLE `apuestas` (
  `apuesta_id` int(100) NOT NULL,
  `ticket_id` varchar(20) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `taquilla_id` varchar(100) NOT NULL,
  `evento` int(20) NOT NULL,
  `cuota` varchar(10) NOT NULL,
  `tipo_apuesta` varchar(50) NOT NULL,
  `apostado_a` varchar(10) NOT NULL,
  `inversion` varchar(10) NOT NULL,
  `ganancia` varchar(10) NOT NULL,
  `fecha_evento` datetime NOT NULL,
  `fecha_ticket` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('abierto','perdido','ganado','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`apuesta_id`, `ticket_id`, `usuario_id`, `taquilla_id`, `evento`, `cuota`, `tipo_apuesta`, `apostado_a`, `inversion`, `ganancia`, `fecha_evento`, `fecha_ticket`, `status`) VALUES
(30, 'WPX-6101d8bc2a591', 28, '', 673186, '3.40', 'Match Winner', 'empate', '15', '51', '2021-07-28 10:30:00', '2021-07-28 17:22:52', 'abierto'),
(31, 'WPX-6101d8bc2a591', 28, '', 673187, '3.30', 'Match Winner', 'empate', '15', '49.5', '2021-07-28 10:30:00', '2021-07-28 17:22:52', 'abierto'),
(32, 'WPX-6101d8bc2a591', 28, '', 673188, '2.00', 'Match Winner', 'local', '15', '30', '2021-07-28 10:30:00', '2021-07-28 17:22:52', 'abierto'),
(33, 'WPX-6101d9a3df8bb', 28, '', 673185, '3.60', 'Match Winner', 'empate', '10', '36', '2021-07-28 10:30:00', '2021-07-28 17:26:43', 'abierto'),
(34, 'WPX-6101d9a3df8bb', 28, '', 673186, '3.40', 'Match Winner', 'empate', '10', '34', '2021-07-28 10:30:00', '2021-07-28 17:26:43', 'abierto'),
(35, 'WPX-6101d9a3df8bb', 28, '', 673187, '2.10', 'Match Winner', 'local', '10', '21', '2021-07-28 10:30:00', '2021-07-28 17:26:43', 'abierto'),
(36, 'WPX-6101da7db6c64', 28, '', 673185, '3.60', 'Match Winner', 'empate', '10', '36', '2021-07-28 10:30:00', '2021-07-28 17:30:21', 'abierto'),
(37, 'WPX-6101da7db6c64', 28, '', 673186, '3.40', 'Match Winner', 'visitante', '10', '34', '2021-07-28 10:30:00', '2021-07-28 17:30:21', 'abierto'),
(38, 'WPX-6101da7db6c64', 28, '', 673187, '2.10', 'Match Winner', 'local', '1', '2.1', '2021-07-28 10:30:00', '2021-07-28 17:30:21', 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billetera`
--

CREATE TABLE `billetera` (
  `billetera_id` int(100) NOT NULL,
  `usuario_id` int(100) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `saldo` int(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `billetera`
--

INSERT INTO `billetera` (`billetera_id`, `usuario_id`, `direccion`, `saldo`, `status`) VALUES
(4, 27, '659e7dd7edbd6ef9f9e8687dad89d272cec3e2b910848b0d8fc78b45ed290780', 10, 1),
(5, 28, 'dc5c587053f349773b6de9316c08f15abd6abe0f3e4f2c814840023e26687b40', 29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roles_id`, `nombre`, `descripcion`, `status`) VALUES
(1, 'Admin', 'Controla todo el sistema', 1),
(2, 'Taquillas', 'Gestiona tareas dentro del sistema', 1),
(3, 'Usuario', 'Cliente de apuestas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_users`
--

CREATE TABLE `tab_users` (
  `usuario_id` int(100) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `snombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `identificacion` int(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_rol` int(2) NOT NULL,
  `token` varchar(500) NOT NULL,
  `taquilla_id` varchar(150) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_users`
--

INSERT INTO `tab_users` (`usuario_id`, `nombre`, `snombre`, `apellidos`, `identificacion`, `correo`, `contrasena`, `fecha`, `user_rol`, `token`, `taquilla_id`, `status`) VALUES
(27, 'Sebastian', '', 'Herrera', 1047444002, 'sebasth0709@gmail.com', '747e87ebc45d6713ee72355c7d01de98a0be0a15b8de30de18b9888408193afd', '2021-07-02 00:32:33', 3, ' ', '', 1),
(28, 'Elizabeth', '', 'Restrepo', 43183343, 'sebasdisena@gmail.com', '747e87ebc45d6713ee72355c7d01de98a0be0a15b8de30de18b9888408193afd', '2021-07-26 17:46:39', 3, '', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD PRIMARY KEY (`apuesta_id`);

--
-- Indices de la tabla `billetera`
--
ALTER TABLE `billetera`
  ADD PRIMARY KEY (`billetera_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`);

--
-- Indices de la tabla `tab_users`
--
ALTER TABLE `tab_users`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  MODIFY `apuesta_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `billetera`
--
ALTER TABLE `billetera`
  MODIFY `billetera_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tab_users`
--
ALTER TABLE `tab_users`
  MODIFY `usuario_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
