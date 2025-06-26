-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2025 a las 01:56:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ufcdb_proyectotd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `talle` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `talle`, `descripcion`, `precio`, `foto`, `activo`) VALUES
(1, 'Remera Negra', 'Ropa', 'M', 'Remera de algodón color negro, ideal para el día a día.', 4999.99, 'remera_negra.jpg', 0),
(2, 'Zapatillas Urbanas', 'Calzado', '42', 'Zapatillas cómodas para uso diario.', 15499.00, 'zapatillas_urbanas.jpg', 0),
(3, 'Campera Rompeviento', 'Ropa', 'L', 'Campera liviana, ideal para media estación.', 0.00, '1750893365_e736bfd5696a4ab150a3.webp', 1),
(4, 'Gorra Deportiva', 'Accesorios', 'Único', 'Gorra con visera curva, transpirable.', 0.00, '1750893289_b4fceff5b429ec0edf3f.webp', 1),
(5, 'Pantalón Jogger', 'Ropa', 'S', 'Pantalón tipo jogger con bolsillos y cordón.', 0.00, '1750893442_814c2666401ec7903f94.webp', 1),
(6, 'Botines Fútbol', 'Calzado', '40', 'Botines con tapones para césped natural.', 21499.99, 'botines_futbol.jpg', 0),
(7, 'Buzo Canguro', 'Ropa', 'XL', 'Buzo con capucha y bolsillo central.', 0.00, '1750893530_21a852ce2df074a11fdf.webp', 1),
(8, 'Mochila Urbana', 'Accesorios', 'Único', 'Mochila resistente con compartimentos múltiples.', 0.00, '1750893568_c197d79c9cb35e8e4627.webp', 1),
(9, 'Medias Deportivas', 'Accesorios', 'Único', 'Pack de 3 pares de medias de algodón.', 0.00, '1750893619_d254677431909117bc9a.webp', 0),
(10, 'Camisa Casual', 'Ropa', 'L', 'Camisa manga larga de lino, ideal para primavera.', 8999.00, 'camisa_casual.jpg', 0),
(11, 'remera ufc', 'una remera', 'lakda', 'alksndla', 1500.00, '1750891781_fd7838c9fd0880b6b7a0.avif', 0),
(14, 'venda azul', 'VENDA COMBATE', 'unico', 'una venda', 0.00, '1750895215_10153522829be6292859.webp', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `created_at`, `updated_at`, `rol`) VALUES
(6, 'JUAN', 'FERNANDEZ', 'JUAN.FERNANDEZ@GMAIL.COM', '$2y$10$vTQ8eCKcS5u0uN8vftBNyO9zkWFDxUtThdwSkLo/Vyxk6qJspgja2', '2025-05-27 04:23:25', '2025-05-27 04:23:25', 'cliente'),
(7, 'sadjsklj', 'sajdalksjd', 'aksjdl@GMAIL.COM', '$2y$10$X7N45JT3UNu0B8vygmhIj.uumFsoHPigGbvGY7FfteneLBw9bAdou', '2025-05-27 23:36:36', '2025-05-27 23:36:36', 'cliente'),
(9, 'Augusto', 'Almiron', 'SSSSSSSSSSSSSSSSSSSSS4@gmail.com', '$2y$10$H/S6wyWq2jl54vU68RXZd.Omz3Sl8Mw6sGhDwRFqIgT6xDVB8sgPu', '2025-05-27 23:36:53', '2025-05-27 23:36:53', 'cliente'),
(10, 'Augusto', 'Almiron', 'almironaugusto44@gmail.com', '$2y$10$wg1Ln4o2Tqh1Gz6XtPL7zOh66R7GG1P8guHG8vMYOb7JCbVnndeeK', '2025-05-27 23:42:35', '2025-05-27 23:42:35', 'cliente'),
(11, 'julieta', 'martinez', 'juli@gmail.com', '$2y$10$FsxMsZysd01Vo3pKHTp2uewbm0m.UJ9.g/lu5F7xoaKUDq3yOknwS', '2025-05-27 23:56:06', '2025-05-27 23:56:06', 'cliente'),
(12, 'RAMON', 'GONZALES', 'RAMON@GMAIL.COM', '$2y$10$voNnnpwp6pBepmBWXEB00OqXHXrlEUFugTEockhtOaE9G8cbaDgsO', '2025-05-28 00:12:31', '2025-05-28 00:12:31', 'cliente'),
(13, 'MARIA', 'GONZALES', 'mmaria@gmail.com', '$2y$10$..Tfoj6EbxATxHzHBjkFY.TYUd3gRlm3c7X8j5muo0aCadZOslZja', '2025-05-28 00:23:10', '2025-05-28 00:23:10', 'cliente'),
(14, 'Augusto', 'Almiron', 'prueba11111@gmail.com', '$2y$10$Jl/HLPG.gm.SNACoo.AsQejmv8Obqjxf1Ajhu7zgWX9atdImJYlVK', '2025-06-24 15:59:48', '2025-06-24 15:59:48', 'cliente'),
(15, 'Augusto', 'Almiron', 'pruebita@gmail.com', '$2y$10$DBBRvOKvXzfAzVdd0BJc.upxxpqqe1tBBga5EP3Aq64zQHA8ENQ7m', '2025-06-25 15:51:34', '2025-06-25 15:51:34', 'cliente'),
(16, 'Augusto', 'Almiron', 'prueba2@gmail.com', '$2y$10$ewKIik.kaXtF9gw4.tlM1ekyNpScspIMvusn8RkhaBYq9wdyxGroq', '2025-06-25 16:19:21', '2025-06-25 16:19:21', 'cliente'),
(17, 'Administrador', 'Sistema', 'admin@gmail.com', '$2y$10$uKvKr7cxXx58YC0Es4R75.FPRPxo.9T3EigmEMeCy1QX4nIidG3x.', '2025-06-25 13:57:15', '2025-06-25 14:08:02', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
