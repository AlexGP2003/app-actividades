-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2022 a las 11:37:01
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gestion`
--
CREATE DATABASE IF NOT EXISTS `bd_gestion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_gestion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `Id` int(4) NOT NULL,
  `Fecha_subida` date NOT NULL,
  `Descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `tiempo_estimado` text NOT NULL,
  `autor` int(5) NOT NULL,
  `topico` int(3) NOT NULL,
  `Publica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`Id`, `Fecha_subida`, `Descripcion`, `imagen`, `tiempo_estimado`, `autor`, `topico`, `Publica`) VALUES
(3, '2018-10-23', 'Hacer una TO DO list de la creación del videojuego Fifa 22', 'annie-spratt-Ki0-ea-Hgx4-unsplash.jpg', '1 hora y media', 7, 1, 0),
(4, '2021-12-16', 'Tenemos que comprar entre 30 alumnos 60 bolis, 40 lápices, y 30 paquetes de clínex, si los 30 ponemos la misma cantidad de dinero, el precio total es de 130,46€, de ese precio, los bolis son un 25% del gasto total y el paquete de clínex cuesta 1,5€.\r\nCuanto cuesta 1 boli y 1 lápiz?', 'dan-cristian-padure-QQkQcaz7qmY-unsplash.jpg', '15 minutos', 2, 2, 0),
(5, '2021-04-06', 'Creación de una página web sobre un museo de reliquias antiguas que se dedicará a informar y vender entradas.', 'etienne-girardet-j2Soo4TfFMk-unsplash.jpg', '2 días', 7, 1, 0),
(6, '2021-12-08', 'Realiza el análisis completo de la función f(x)=(x**3)/(2x-4) ', 'eva-gour-94mm2Txn12s-unsplash.jpg', '1 hora', 3, 2, 0),
(7, '2021-12-15', 'Documentación sobre las gamas de colores mas usadas en las páginas webs según Adobe. ', 'keila-hotzel-lFmuWU0tv4M-unsplash.jpg', '4 horas', 5, 1, 0),
(8, '2021-12-14', 'Queremos pintar las paredes (color pastel), el techo (color blanco) y las puertas y ventanas (color pino) de una casa con 6 habitaciones de dimensiones (en metros): 3 habitaciones de 5x4, una de 6x4,30, una de 4x4,50 y otra de 3x2,40. La altura de todas las habitaciones de la casa es de 2,80 metros. Debemos tener en cuenta que cada habitación dispone de una puerta de 2,10 x 0,90 metros y de una ventana de 1 metro de alta y 160 centímetros de ancha.\r\nLos precios de las pinturas son 2 euros/kg la pintura blanca, 2,80 euros/kg. la pintura pastel y 3 euros/kg. la pintura de puertas color pino. Todas la pinturas se pueden comprar en latas de 3 kg. o latas de 5 kg. (en las latas dice que con 1 kg. hay para pintar 6 metros cuadrados).\r\nHaz un presupuesto detallando lo que necesitaríamos gastar en pintura.', 'kelly-sikkema-TS6FasMlQWs-unsplash.jpg', '2 horas', 1, 2, 1),
(9, '2021-06-29', 'Haz un videojuego de adivinanzas sobre cuadros famosos.\r\nTiene que tener ASCII ART cuando aciertas una adivinanza.', 'lucas-hoang-mwfBszKf5Xw-unsplash.jpg', '6 horas', 7, 1, 1),
(10, '2021-05-04', 'Realización de un resumen sobre los logaritmos y sus aplicaciones.', 'mathilde-langevin-tbzSgZbEuz4-unsplash.jpg', '3 horas', 1, 2, 1),
(11, '2021-05-09', 'Creación del videojuego Apalabrados.', 'nick-fewings-EkyuhD7uwSM-unsplash.jpg', '3 días', 5, 1, 1),
(12, '2021-10-07', 'Creación de un Active Directory y una red de una escuela.', 'susanna-marsiglia-Yjr6EafseQ8-unsplash.jpg', '2 semanas', 1, 1, 0),
(14, '2022-05-07', 'Suma 2+2', '450_1000.jpg', '10 minutos', 7, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Id` int(5) NOT NULL,
  `Actividad` int(4) NOT NULL,
  `Usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topicos`
--

CREATE TABLE `topicos` (
  `Id` int(3) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `topicos`
--

INSERT INTO `topicos` (`Id`, `Nombre`) VALUES
(1, 'Informatica'),
(2, 'Matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(5) NOT NULL,
  `mail` text NOT NULL,
  `pass` text NOT NULL,
  `usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `mail`, `pass`, `usuario`) VALUES
(1, 'joan_garres@fje.edu\r\n', '5d724fdf5377cdf66a59f83477e6cb79e76620f7', 'joan'),
(2, 'alex_navarro@gmail.com', '6427f5b5e9afd43cb23dd7e83baf39a33b9f0261', 'alex'),
(3, 'gerardo_fernandez@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'gerardo'),
(4, 'perico_delgado@gmail.com', 'b925951c3b1fe61eba35c9cb06c77adc3dd427f4', 'perico'),
(5, 'joan_capdevila@gmail.com', 'b925951c3b1fe61eba35c9cb06c77adc3dd427f4', 'joan1234'),
(6, 'alex_garcia@fje.edu', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'alex1234'),
(7, 'paco@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Paco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_act_use` (`autor`),
  ADD KEY `fk_act_top` (`topico`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_act_fav` (`Actividad`),
  ADD KEY `fk_use_fav` (`Usuario`);

--
-- Indices de la tabla `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `topicos`
--
ALTER TABLE `topicos`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_act_top` FOREIGN KEY (`topico`) REFERENCES `topicos` (`Id`),
  ADD CONSTRAINT `fk_act_use` FOREIGN KEY (`autor`) REFERENCES `usuario` (`Id`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_act_fav` FOREIGN KEY (`Actividad`) REFERENCES `actividad` (`Id`),
  ADD CONSTRAINT `fk_use_fav` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
