-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2018 a las 03:49:47
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ahorro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Carniceria'),
(2, 'Verduleria'),
(3, 'Kiosco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `url` varchar(345) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int(11) NOT NULL,
  `nombre_negocio` varchar(45) DEFAULT NULL,
  `categoria_negocio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `nombre_negocio`, `categoria_negocio`) VALUES
(1, 'Carniceria Don Tito', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_ofertas` int(11) NOT NULL,
  `id_usuario` varchar(45) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `linea1` varchar(45) DEFAULT NULL,
  `linea2` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `foto` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_ofertas`, `id_usuario`, `id_categoria`, `linea1`, `linea2`, `precio`, `foto`) VALUES
(9, '4', 2, 'Oferta de Miercoles', 'Zanahoria 1Kg', '22', 'https://mejorconsalud.com/wp-content/uploads/2015/09/shutterstock_101720998-500x325.jpg'),
(14, '4', 1, 'Todos los dias', 'Tapa de Nalga x Kg', '168', 'https://www.elabastecedor.com.ar/images/productos/11.jpg'),
(16, '4', 1, 'Todos los dias', 'Morcilla x6', '38.00', 'http://www.tipiquisimo.com/443-large_default/morcilla-fresca-de-leon-en-tripa-morvega.jpg'),
(17, '6', 2, 'Oferta de Jueves', 'Lechuga Francesa', '33', 'http://lechuga.info/wp-content/uploads/2018/05/Lechuga-francesa.jpg'),
(18, '6', 2, 'Lunes de Oferta', 'Maple de Huevos x 68', '100', 'http://www.carnesdonluis.com/wp-content/uploads/2017/11/huevos-carnes-don-luis.jpg'),
(19, '4', 2, 'Promo Frutillas 1Kg', 'Solos desde este Lunes al Miercoles de Agosto', '55', 'https://www.comunidadfitnessecuador.com/wp-content/uploads/2015/05/rsz_frutillas.jpg'),
(20, '4', 2, 'Cebolla de Verdeo', 'Atado de 500Gr', '27', 'https://www.organiclife.ec/wp-content/uploads/2015/06/Cebolla-de-Verdeo.png'),
(22, '4', 2, 'Limones x Kg', 'Todos los martes de Agosto.', '16', 'https://images2cdn.sanalmarket.com.tr/images/1000/urun//large/27262000_large.jpg'),
(23, '4', 1, 'Tira de Asado con Hueso', 'X Kg', '168', 'https://d1oxl6deenw6qu.cloudfront.net/wp-content/uploads/2016/07/18232907/asado-tira.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `id_negocio` varchar(45) DEFAULT NULL,
  `id_oferta` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cant_ofertas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuario`, `password`, `id_negocio`, `id_oferta`, `username`, `email`, `cant_ofertas`) VALUES
(4, 'carlomagno', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '1', NULL, 'carlo', 'magno@hotmail.com', 10),
(6, 'diego', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, NULL, 'dbiasatti', 'diego_biasatti@hotmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_ofertas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_ofertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
