-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2017 a las 20:04:19
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mayadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baules`
--

CREATE TABLE `baules` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `receta_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `baules`
--

INSERT INTO `baules` (`id`, `user_id`, `receta_id`) VALUES
(6, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `status`) VALUES
(9, 'Nuevo León', 1),
(10, 'Campeche', 1),
(11, 'Sinaloa', 1),
(12, 'CDMX', 1),
(13, 'Querétaro', 1),
(14, 'Sonora', 1),
(15, 'Chihuaha', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Creador de Contenido'),
(3, 'Usuario Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `lugar` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `aprobacion` tinyint(1) NOT NULL DEFAULT '0',
  `portada` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `lugar`, `descripcion`, `aprobacion`, `portada`) VALUES
(11, 'Mario a la bologna', 12, 'Precaliente el horno a 220 centigrados.\r\nEnjuague las gallinitas bajo un chorro de agua fria, desechando las visceras y secandolas con una toalla de papel.\r\nBarnice las gallinitas con aceite de oliva y espolvoree adentro y por fuero con sal y pimienta.\r\nEn un recipiente, mezcle las calabazas rebanadas, la cebolla, ajo, 3 cucharadas de aceite, vinagre balsámico y hierbas de Provenza.\r\nColoque las gallinas con la pechuga hacia arriba, sobre una charola de horno engrasada con aceite.\r\nColoque la mezcla de verduras alrededor de las gallinas.\r\nHornee por 35-40 minutos, hasta que los jugos salgan claros.\r\nInserte un termómetro en la parte mas gruesa del muslo y asegure que registra 77 grados (para que estén cocidas).\r\nPase las gallinas a una tabla para cortar y cubra con papel de aluminio. Deje reposar 5 minutos.\r\nAcomode en platos individuales con las verduras alrededor y decore con aceitunas negras.', 1, 'files/1493228608mario.jpeg'),
(12, 'dasd', 13, 'asasd', 0, 'files/1493228983mario.jpeg'),
(13, 'dasd', 11, 'asdasd', 0, 'files/1493229089mario.jpeg'),
(14, 'asd', 13, 'asdas', 0, 'files/1493229120mario.jpeg'),
(15, 'asda', 11, 'asdasd', 0, 'files/1493229773mario.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil_id` bigint(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `perfil_id`, `email`) VALUES
(3, 'sudogaryi', 'e178f759fe55c8c9596f2202060dc7dd', 1, 'hi.ed@hotmail.com'),
(5, 'webmaster', '50a9c7dbf0fa09e8969978317dca12e8', 2, 'xbox_live@live.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `baules`
--
ALTER TABLE `baules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `baules`
--
ALTER TABLE `baules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
