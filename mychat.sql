-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 18:01:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mychat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL,
  `user_hora` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`, `user_hora`) VALUES
(1, 'prueba12', 'prueba12', 'prueba12@gmail.com', 'images/8e225eb0d45b936da0895ce67d1cb8dd.jpg.83', 'Brasil', 'Mujer', 'elpepe', 'Offline', ''),
(2, 'prueba13', 'prueba13', 'prueba13@gmail.com', 'images/57a7c044f94369d2e368fe2e99cecefe.jpg.87', 'Argentina', 'Female', '', 'Offline', ''),
(3, 'prueba14', 'prueba14', 'prueba14@gmail.com', 'images/b3bc1baf429da3d6509431ea26768d39.jpg.78', 'Argentina', 'Male', '', 'Offline', ''),
(4, 'prueba15', 'prueba15', 'prueba15@gmail.com', 'images/imagen-girly-wallpapers-profil-pics-for-girls-0thumb.jpeg.41', 'Paraguay', 'Female', '', 'Offline', ''),
(6, 'josue123', 'josue123', 'josue123@gmail.com', 'images/imagen3.jpg', 'Argentina', 'Male', '', 'Offline', ''),
(7, 'nehui123', 'nehui123', 'nehui123@gmail.com', 'images/imagen2.jpg', 'Argentina', 'Male', '', 'Offline', ''),
(8, 'facun123', 'facunn12', 'facun123@gmail.com', 'images/imagen3.jpg', 'Venezuela', 'Male', 'nehui123', 'Offline', ''),
(10, 'tomit123', 'tomit123', 'tomit123@gmail.com', 'images/imagen2.jpg', 'Argentina', 'Hombre', 'etesech', '', ''),
(13, 'matut123', 'matut123', 'matut123@gmail.com', 'images/imagen3.jpg', 'Argentina', 'Hombre', '', 'Offline', '17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `recelver_username` varchar(100) NOT NULL,
  `mdg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `recelver_username`, `mdg_content`, `msg_status`, `msg_date`) VALUES
(142, 'prueba13', 'prueba12', 'hola como estas prueba12?', 'read', '2020-11-09 00:10:45'),
(143, 'prueba12', 'prueba13', 'todo bien y vos prueba13?', 'read', '2020-11-09 00:11:21'),
(144, 'prueba13', 'prueba12', 'bastante bien, probando que el chat ande por lo menos en cuanto a mensajes de uno en pc, vos ?', 'read', '2020-11-09 00:14:24'),
(145, 'prueba12', 'prueba13', 'igualmente, alto bardo esto', 'read', '2020-11-09 00:17:15'),
(146, 'prueba13', 'prueba12', 'sigo intentando hacer esto', 'read', '2020-11-09 00:32:23'),
(147, 'prueba12', 'prueba13', 'y yo tambien, si somos 2 pruebas kpo', 'read', '2020-11-09 01:22:04'),
(148, 'prueba13', 'prueba12', 'si?', 'read', '2020-11-09 01:28:58'),
(149, 'prueba13', 'prueba12', 'mira vos', 'read', '2020-11-09 01:29:21'),
(150, 'prueba13', 'prueba12', 'a ver si me respondes manga de careta', 'read', '2020-11-09 01:29:45'),
(151, 'prueba13', 'prueba12', 'miau', 'read', '2020-11-09 01:30:06'),
(152, 'prueba13', 'prueba12', 'wof', 'read', '2020-11-09 01:30:13'),
(153, 'prueba13', 'prueba12', 'wow', 'read', '2020-11-09 01:30:20'),
(154, 'prueba12', 'prueba13', 'hola', 'unread', '2020-11-09 02:27:34'),
(155, 'prueba12', 'prueba13', 'como estas ?', 'unread', '2020-11-09 02:27:40'),
(156, 'prueba12', 'prueba13', 'maestroooo', 'unread', '2020-11-09 04:15:17'),
(157, 'prueba12', 'prueba13', 'como tas ?', 'unread', '2020-11-09 04:15:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
