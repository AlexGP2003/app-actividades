-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2022 a las 17:25:46
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
  `topico` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`Id`, `Fecha_subida`, `Descripcion`, `imagen`, `tiempo_estimado`, `autor`, `topico`) VALUES
(3, '2018-10-23', 'Hacer una TO DO list de la creación del videojuego Fifa 22', 'annie-spratt-Ki0-ea-Hgx4-unsplash.jpg', '1 hora y media', 2, 1),
(4, '2021-12-16', 'Tenemos que comprar entre 30 alumnos 60 bolis, 40 lápices, y 30 paquetes de clínex, si los 30 ponemos la misma cantidad de dinero, el precio total es de 130,46€, de ese precio, los bolis son un 25% del gasto total y el paquete de clínex cuesta 1,5€.\r\nCuanto cuesta 1 boli y 1 lápiz?', 'dan-cristian-padure-QQkQcaz7qmY-unsplash.jpg', '15 minutos', 2, 2),
(5, '2021-04-06', 'Creación de una página web sobre un museo de reliquias antiguas que se dedicará a informar y vender entradas.', 'etienne-girardet-j2Soo4TfFMk-unsplash.jpg', '2 días', 3, 1),
(6, '2021-12-08', 'Realiza el análisis completo de la función f(x)=(x**3)/(2x-4) ', 'eva-gour-94mm2Txn12s-unsplash.jpg', '1 hora', 3, 2),
(7, '2021-12-15', 'Documentación sobre las gamas de colores mas usadas en las páginas webs según Adobe. ', 'keila-hotzel-lFmuWU0tv4M-unsplash.jpg', '4 horas', 5, 1),
(8, '2021-12-14', 'Queremos pintar las paredes (color pastel), el techo (color blanco) y las puertas y ventanas (color pino) de una casa con 6 habitaciones de dimensiones (en metros): 3 habitaciones de 5x4, una de 6x4,30, una de 4x4,50 y otra de 3x2,40. La altura de todas las habitaciones de la casa es de 2,80 metros. Debemos tener en cuenta que cada habitación dispone de una puerta de 2,10 x 0,90 metros y de una ventana de 1 metro de alta y 160 centímetros de ancha.\r\nLos precios de las pinturas son 2 euros/kg la pintura blanca, 2,80 euros/kg. la pintura pastel y 3 euros/kg. la pintura de puertas color pino. Todas la pinturas se pueden comprar en latas de 3 kg. o latas de 5 kg. (en las latas dice que con 1 kg. hay para pintar 6 metros cuadrados).\r\nHaz un presupuesto detallando lo que necesitaríamos gastar en pintura.', 'kelly-sikkema-TS6FasMlQWs-unsplash.jpg', '2 horas', 1, 2),
(9, '2021-06-29', 'Haz un videojuego de adivinanzas sobre cuadros famosos.\r\nTiene que tener ASCII ART cuando aciertas una adivinanza.', 'lucas-hoang-mwfBszKf5Xw-unsplash.jpg', '6 horas', 4, 1),
(10, '2021-05-04', 'Realización de un resumen sobre los logaritmos y sus aplicaciones.', 'mathilde-langevin-tbzSgZbEuz4-unsplash.jpg', '3 horas', 1, 2),
(11, '2021-05-09', 'Creación del videojuego Apalabrados.', 'nick-fewings-EkyuhD7uwSM-unsplash.jpg', '3 días', 5, 1),
(12, '2021-10-07', 'Creación de un Active Directory y una red de una escuela.', 'susanna-marsiglia-Yjr6EafseQ8-unsplash.jpg', '2 semanas', 1, 1);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_act_top` FOREIGN KEY (`topico`) REFERENCES `topicos` (`Id`),
  ADD CONSTRAINT `fk_act_use` FOREIGN KEY (`autor`) REFERENCES `usuario` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
