-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 04:15:25
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mindset`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `akira`
--

CREATE TABLE `akira` (
  `id` int NOT NULL,
  `ask` varchar(4000) DEFAULT NULL,
  `response` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `akira`
--

INSERT INTO `akira` (`id`, `ask`, `response`) VALUES
(1, 'hola', 'como estas?'),
(2, 'bien', 'me alegra'),
(3, 'bien', 'me alegra'),
(4, 'como estas', 'muy bien, gracias por preguntar =)'),
(5, 'como estas?', 'muy bien, gracias por preguntar =)'),
(6, 'me siento mal', 'dime, que sucede?'),
(7, 'odio mi vida', 'tienes algun problema, cuentamelo todo, estoy aqui para ayudar'),
(8, 'me quiero morir', 'no digas esas cosas, tal vez pases por una situacion dificil pero recuerda que todo en la vida tiene solución'),
(9, 'le perdi el sentido a la vida', 'has intentado probar nuevas cosas'),
(10, 'y tu?', 'yo muy bien, gracias por preguntar? =)'),
(11, 'y tu', 'yo muy bien, gracias por preguntar? =)'),
(12, 'que cuentas', 'por aqui pasando el rato'),
(13, 'que cuentas?', 'por aqui pasando el rato'),
(14, 'me quiero morir', 'no digas eso, para todo hay una solución'),
(15, 'estoy cansado', 'porque no te tomas un descanso de todo? y asi te recuperas =)'),
(16, 'me rindo', 'toma las cosas con calma, se que la vida puede ser dificil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `ID` int NOT NULL,
  `NOMBRE` varchar(60) DEFAULT NULL,
  `DC` varchar(60) DEFAULT NULL,
  `TEL` varchar(60) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `MOT` varchar(4000) DEFAULT NULL,
  `fecha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`ID`, `NOMBRE`, `DC`, `TEL`, `EMAIL`, `MOT`, `fecha`) VALUES
(4, 'Juan Gonzalez', '1032012019', '3126877562', 'jdvasco1234@gmail.com', '', '2023-09-18 12:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `body` varchar(4000) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `start` varchar(10) DEFAULT NULL,
  `end` varchar(15) DEFAULT NULL,
  `incio_normal` varchar(50) DEFAULT NULL,
  `final_normal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int NOT NULL,
  `evento` varchar(1000) DEFAULT NULL,
  `color_evento` varchar(1000) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id` int NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `fechas`
--

INSERT INTO `fechas` (`id`, `fecha`) VALUES
(3, '2023-09-18 12:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int NOT NULL,
  `dc` varchar(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `contra` varchar(60) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `dc`, `nombre`, `apellidos`, `email`, `usuario`, `contra`, `telefono`, `cargo`) VALUES
(5, '12340876', 'esteban', 'rodriguez', 'algo@gmail.com', 'psicologo', '12345', '098765445', 'psicologo'),
(6, '312321312', 'angel', 'miguel', 'CarlosRueda@gmail.com', 'CarlosRueda', '12345', '31257727382', 'estudiante'),
(7, '1032012019', 'Juan', 'Gonzalez', 'jdvasco1234@gmail.com', 'JuanGonzalez', '123456', '3126877562', 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preg_nores`
--

CREATE TABLE `preg_nores` (
  `id` int NOT NULL,
  `preg` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preg_nores`
--

INSERT INTO `preg_nores` (`id`, `preg`) VALUES
(1, 'que te importa pa'),
(2, 'ganas de suicidio'),
(3, 'mal}'),
(4, 'te amo'),
(5, 'Hola '),
(6, 'lkjhgfds');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `akira`
--
ALTER TABLE `akira`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preg_nores`
--
ALTER TABLE `preg_nores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `akira`
--
ALTER TABLE `akira`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `preg_nores`
--
ALTER TABLE `preg_nores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
