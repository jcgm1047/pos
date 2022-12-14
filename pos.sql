-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 00:00:53
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos Electromecánicos', '2017-12-22 01:53:29'),
(2, 'Taladros', '2017-12-22 01:53:29'),
(3, 'Andamios', '2017-12-22 01:53:29'),
(4, 'Generadores de energía', '2017-12-22 01:53:29'),
(5, 'Equipos para construcción', '2017-12-22 01:53:29'),
(6, 'Martillos mecánicos', '2017-12-22 04:06:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(3, 'Juan Villegas', 2147483647, 'juan@hotmail.com', '(300) 341-2345', 'Calle 23 # 45 - 56', '1980-11-02', 5, '2017-12-23 20:11:04', '2017-12-24 06:11:04'),
(4, 'Pedro Pérez', 2147483647, 'pedro@gmail.com', '(399) 876-5432', 'Calle 34 N33 -56', '1970-08-07', 0, '0000-00-00 00:00:00', '2017-12-24 04:26:28'),
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '(254) 545-3446', 'calle 34 # 34 - 23', '1976-03-04', 0, '0000-00-00 00:00:00', '2017-12-24 04:25:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'Aspiradora Industrial ', 'view/img/productos/101/105.png', 13, 1000, 1200, 2, '2017-12-24 06:11:04'),
(2, 1, '102', 'Plato Flotante para Allanadora', 'view/img/productos/102/940.jpg', 7, 4500, 6300, 2, '2017-12-24 06:11:04'),
(3, 1, '103', 'Compresor de Aire para pintura', 'view/img/productos/103/763.jpg', 19, 3000, 4200, 1, '2017-12-24 06:11:04'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'view/img/productos/104/957.jpg', 20, 4000, 5600, 0, '2017-12-24 04:26:24'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'view/img/productos/105/630.jpg', 20, 1540, 2156, 0, '2017-12-24 04:38:01'),
(6, 1, '106', 'Disco Punta Diamante ', 'view/img/productos/106/635.jpg', 20, 1100, 1540, 0, '2017-12-24 05:26:37'),
(7, 1, '107', 'Extractor de Aire ', 'view/img/productos/107/848.jpg', 20, 1540, 2156, 0, '2017-12-24 04:27:24'),
(8, 1, '108', 'Guadañadora ', 'view/img/productos/108/163.jpg', 20, 1540, 2156, 0, '2017-12-24 04:25:51'),
(9, 1, '109', 'Hidrolavadora Eléctrica ', 'view/img/productos/109/769.jpg', 20, 2600, 3640, 0, '2017-12-24 04:25:51'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'view/img/productos/110/582.jpg', 20, 2210, 3094, 0, '2017-12-24 04:27:27'),
(11, 1, '111', 'Motobomba a Gasolina', 'view/img/productos/default/anonymous.png', 20, 2860, 4004, 0, '2017-12-22 02:56:28'),
(12, 1, '112', 'Motobomba El?ctrica', 'view/img/productos/default/anonymous.png', 20, 2400, 3360, 0, '2017-12-22 02:56:28'),
(13, 1, '113', 'Sierra Circular ', 'view/img/productos/default/anonymous.png', 20, 1100, 1540, 0, '2017-12-22 02:56:28'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', 'view/img/productos/default/anonymous.png', 20, 4500, 6300, 0, '2017-12-22 02:56:28'),
(15, 1, '115', 'Soldador Electrico ', 'view/img/productos/default/anonymous.png', 20, 1980, 2772, 0, '2017-12-22 02:56:28'),
(16, 1, '116', 'Careta para Soldador', 'view/img/productos/default/anonymous.png', 20, 4200, 5880, 0, '2017-12-22 02:56:28'),
(17, 1, '117', 'Torre de iluminacion ', 'view/img/productos/default/anonymous.png', 20, 1800, 2520, 0, '2017-12-22 02:56:28'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', 'view/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2017-12-22 02:56:28'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', 'view/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2017-12-22 02:56:28'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', 'view/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2017-12-22 02:56:28'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', 'view/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2017-12-22 02:56:28'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', 'view/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2017-12-22 03:28:24'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', 'view/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2017-12-22 02:56:28'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', 'view/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2017-12-22 02:56:28'),
(25, 3, '301', 'Andamio colgante', 'view/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2017-12-22 02:56:28'),
(26, 3, '302', 'Distanciador andamio colgante', 'view/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2017-12-22 02:56:28'),
(27, 3, '303', 'Marco andamio modular ', 'view/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2017-12-22 02:56:28'),
(28, 3, '304', 'Marco andamio tijera', 'view/img/productos/default/anonymous.png', 20, 100, 140, 0, '2017-12-22 02:56:28'),
(29, 3, '305', 'Tijera para andamio', 'view/img/productos/default/anonymous.png', 20, 162, 226, 0, '2017-12-22 02:56:28'),
(30, 3, '306', 'Escalera interna para andamio', 'view/img/productos/default/anonymous.png', 20, 270, 378, 0, '2017-12-22 02:56:28'),
(31, 3, '307', 'Pasamanos de seguridad', 'view/img/productos/default/anonymous.png', 20, 75, 105, 0, '2017-12-22 02:56:28'),
(32, 3, '308', 'Rueda giratoria para andamio', 'view/img/productos/default/anonymous.png', 20, 168, 235, 0, '2017-12-22 02:56:28'),
(33, 3, '309', 'Arnes de seguridad', 'view/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2017-12-22 02:56:28'),
(34, 3, '310', 'Eslinga para arnes', 'view/img/productos/default/anonymous.png', 20, 175, 245, 0, '2017-12-22 02:56:28'),
(35, 3, '311', 'Plataforma Met?lica', 'view/img/productos/default/anonymous.png', 20, 420, 588, 0, '2017-12-22 02:56:28'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', 'view/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2017-12-22 02:56:28'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', 'view/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2017-12-22 02:56:28'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', 'view/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2017-12-22 02:56:28'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', 'view/img/productos/default/anonymous.png', 20, 3650, 5110, 0, '2017-12-22 02:56:28'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', 'view/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2017-12-22 02:56:28'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', 'view/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2017-12-22 02:56:28'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', 'view/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2017-12-22 02:56:28'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', 'view/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2017-12-22 02:56:28'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', 'view/img/productos/default/anonymous.png', 20, 350, 490, 0, '2017-12-22 02:56:28'),
(45, 5, '502', 'Extension Electrica ', 'view/img/productos/default/anonymous.png', 20, 370, 518, 0, '2017-12-22 02:56:28'),
(46, 5, '503', 'Gato tensor', 'view/img/productos/default/anonymous.png', 20, 380, 532, 0, '2017-12-22 02:56:28'),
(47, 5, '504', 'Lamina Cubre Brecha ', 'view/img/productos/default/anonymous.png', 20, 380, 532, 0, '2017-12-22 02:56:28'),
(48, 5, '505', 'Llave de Tubo', 'view/img/productos/default/anonymous.png', 20, 480, 672, 0, '2017-12-22 02:56:28'),
(49, 5, '506', 'Manila por Metro', 'view/img/productos/default/anonymous.png', 20, 600, 840, 0, '2017-12-22 02:56:28'),
(50, 5, '507', 'Polea 2 canales', 'view/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2017-12-22 02:56:28'),
(51, 5, '508', 'Tensor', 'view/img/productos/default/anonymous.png', 20, 100, 140, 0, '2017-12-22 02:56:28'),
(52, 5, '509', 'Bascula ', 'view/img/productos/default/anonymous.png', 20, 130, 182, 0, '2017-12-22 02:56:28'),
(53, 5, '510', 'Bomba Hidrostatica', 'view/img/productos/default/anonymous.png', 20, 770, 1078, 0, '2017-12-22 02:56:28'),
(54, 5, '511', 'Chapeta', 'view/img/productos/default/anonymous.png', 20, 660, 924, 0, '2017-12-22 02:56:28'),
(55, 5, '512', 'Cilindro muestra de concreto', 'view/img/productos/default/anonymous.png', 20, 400, 560, 0, '2017-12-22 02:56:28'),
(56, 5, '513', 'Cizalla de Palanca', 'view/img/productos/default/anonymous.png', 20, 450, 630, 0, '2017-12-22 02:56:28'),
(57, 5, '514', 'Cizalla de Tijera', 'view/img/productos/default/anonymous.png', 20, 580, 812, 0, '2017-12-22 02:56:28'),
(58, 5, '515', 'Coche llanta neumatica', 'view/img/productos/default/anonymous.png', 20, 420, 588, 0, '2017-12-22 02:56:28'),
(59, 5, '516', 'Cono slump', 'view/img/productos/default/anonymous.png', 20, 140, 196, 0, '2017-12-22 02:56:28'),
(60, 5, '517', 'Cortadora de Baldosin', 'view/img/productos/default/anonymous.png', 20, 930, 1302, 0, '2017-12-22 02:56:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$andrescarechinva$', 'Administrador', 'view/img/usuario/admin/144.png', 1, '2022-11-24 17:41:43', '2022-11-24 22:53:08'),
(61, 'camilo', 'camilo', '$2a$07$andrescarechinva$', 'Administrador', 'view/img/usuario/camilo/770.jpg', 0, '0000-00-00 00:00:00', '2022-11-24 23:00:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(17, 10001, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Aspiradora Industrial \",\"cantidad\":\"2\",\"stock\":\"13\",\"precio\":\"1200\",\"total\":\"2400\"},{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"6300\",\"total\":\"12600\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"4200\",\"total\":\"4200\"}]', 3648, 19200, 22848, 'Efectivo', '2017-12-24 06:11:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
