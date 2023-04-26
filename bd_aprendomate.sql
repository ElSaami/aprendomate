-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2023 a las 07:58:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_aprendomate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `idCapitulos` bigint(20) NOT NULL,
  `codigoCapitulos` int(11) NOT NULL,
  `nombreCapitulos` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ruta` varchar(255) NOT NULL,
  `unidadesId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`idCapitulos`, `codigoCapitulos`, `nombreCapitulos`, `status`, `ruta`, `unidadesId`) VALUES
(1, 111, 'Números hasta el 1000', 1, 'numeros-hasta-el-1000', 1),
(2, 112, 'Operaciones: \"Adición\"', 1, 'operaciones-adicion', 1),
(3, 113, 'Operaciones: \"Sustracción\"', 1, 'operaciones-sustraccion', 1),
(4, 114, 'Patrones Numéricos', 1, 'patrones-numericos', 1),
(5, 115, 'Operaciones: \"Multiplicación (1)\"', 1, 'operaciones-multiplicacion-1', 1),
(6, 211, 'Medición: \"Tiempo y Calendario\"', 1, 'medicion-tiempo-y-calendario', 2),
(7, 212, 'Operaciones: \"Multiplicación (2)\"', 1, 'operaciones-multiplicacion-2', 2),
(8, 213, 'Operaciones: \"División\"', 1, 'operaciones-division', 2),
(9, 214, 'Localización de Objetos', 1, 'localizacion-de-objetos', 2),
(10, 215, 'Figuras 3D y 2D', 1, 'figuras-3d-y-2d', 2),
(11, 311, 'Perímetro', 1, 'perimetro', 3),
(12, 312, 'Ángulos y Movimientos', 1, 'angulos-y-movimientos', 3),
(13, 313, 'Representar Datos', 1, 'representar-datos', 3),
(14, 314, 'Datos y Probabilidades', 1, 'datos-y-probabilidades', 3),
(15, 411, 'Fracciones', 1, 'fracciones', 4),
(16, 412, 'Peso', 1, 'peso', 4),
(17, 413, 'Ecuaciones', 1, 'ecuaciones', 4),
(18, 414, '¿Qué Aprendí?', 1, 'que-aprendi', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `idContenidos` bigint(20) NOT NULL,
  `codigoContenidos` int(11) NOT NULL,
  `nombreContenido` varchar(255) NOT NULL,
  `textoContenido` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ruta` varchar(255) NOT NULL,
  `tipoContenidoId` bigint(20) NOT NULL,
  `capitulosId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`idContenidos`, `codigoContenidos`, `nombreContenido`, `textoContenido`, `status`, `ruta`, `tipoContenidoId`, `capitulosId`) VALUES
(1, 121212, 'Ejemplo 1', 'contenido de prueba', 1, 'ejemplo-1', 1, 1),
(2, 10121212, 'ejemplo 2', '<h1>ejemplo de prueba</h1> <p>parrafo del texto</p>', 1, 'ejemplo-2', 1, 1),
(12, 121214, 'Ejercicio 1', '<h1>Ejercicio 1</h1> <p>Ejemplo de ejercicio para AprendoMate</p> <ol> <li>ejercicio 1</li> <li>resultado 1</li> </ol>', 1, 'ejercicio-1', 2, 1),
(13, 121213, 'ejercicio 4', '<h1>sdfsdfsdf</h1> <p>sdfsdfsdfs</p>', 1, 'ejercicio-4', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos-ejercicios`
--

CREATE TABLE `contenidos-ejercicios` (
  `contenidosId` bigint(20) NOT NULL,
  `ejerciciosId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicios` bigint(20) NOT NULL,
  `contenidoEjercicio` varchar(100) NOT NULL,
  `puntajeEjercicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios-evaluaciones`
--

CREATE TABLE `ejercicios-evaluaciones` (
  `ejerciciosId` bigint(20) NOT NULL,
  `evaluacionesId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `idEvaluaciones` bigint(20) NOT NULL,
  `puntajeEvaluacion` float NOT NULL,
  `personaId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios de AprendoMate', 1),
(3, 'Ejemplos', 'Ejemplos de cada capítulo', 1),
(4, 'Ejercicios', 'Ejercicios de cada capítulo', 1),
(5, 'Resultados', 'Resultados de ejercicios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(71, 2, 1, 1, 0, 0, 0),
(72, 2, 2, 1, 0, 0, 0),
(73, 2, 3, 1, 1, 1, 1),
(74, 2, 4, 1, 1, 1, 1),
(75, 2, 5, 1, 0, 0, 0),
(76, 3, 1, 0, 0, 0, 0),
(77, 3, 2, 0, 0, 0, 0),
(78, 3, 3, 1, 0, 0, 0),
(79, 3, 4, 1, 0, 0, 0),
(80, 3, 5, 1, 0, 0, 0),
(86, 1, 1, 1, 1, 1, 1),
(87, 1, 2, 1, 1, 1, 1),
(88, 1, 3, 1, 1, 1, 1),
(89, 1, 4, 1, 1, 1, 1),
(90, 1, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `password`, `rolid`, `datecreated`, `status`) VALUES
(1, '203811640', 'Cristian Andres', 'San Martin Jara', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, '2023-04-01 21:25:55', 1),
(2, '123456789', 'Jacinto Miguel', 'Perez Rodriguez', 'd12847e62c6b22b6624d985f9886591abd18f9d00707b66b5ee2fa864c45e692', 2, '2023-04-01 21:27:16', 1),
(3, '11212123', 'Juan Ignacio', 'Ortega Salazar', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, '2023-04-01 21:30:16', 1),
(13, '100100100', 'UsuarioPrueba', 'ApellidoPrueba', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, '2023-04-04 02:54:42', 2),
(14, '121212121212', 'S', 'S', '332d1ea7aff29aee36646c3c7292ab5f3c42c3b9aa1f0ea25b312a5c6b4ad808', 1, '2023-04-12 19:06:32', 0),
(15, '12312313123', 'Asdasdada', 'Asdadsasda', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 1, '2023-04-12 19:06:46', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Administrador de AprendoMate', 1),
(2, 'Docente', 'Docente de Matemáticas de 3ro Básico del JHZ', 1),
(3, 'Estudiante', 'Estudiantes de 3ro Básico del JHZ', 1),
(11, 'asdasd', 'ssssssss', 0),
(12, 's', 'saa', 0),
(13, 'rolprueba', '22', 0),
(14, 'sprueba2', 'sssssss', 0),
(15, 'ssssasdasdasdasdasdasd', 'asdadasd', 0),
(16, 'asdasdasd', 'sdasdsdasd', 0),
(17, 'sasassaas', 'asasasassa', 0),
(18, 'sdfsdf', 'sdfsd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contenido`
--

CREATE TABLE `tipo_contenido` (
  `idtipoC` bigint(20) NOT NULL,
  `codigotipoC` int(11) NOT NULL,
  `nombretipoC` varchar(255) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_contenido`
--

INSERT INTO `tipo_contenido` (`idtipoC`, `codigotipoC`, `nombretipoC`, `descripcion`, `ruta`, `status`) VALUES
(1, 1001, 'Ejemplos', 'Ejemplo de los distintos capítulos.', 'ejemplos', 1),
(2, 2001, 'Ejercicios', 'Ejercicios de cada capítulo.', 'ejercicios', 1),
(3, 3001, 'Información', 'Información extra de cada contenido.', 'informacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `idUnidades` bigint(20) NOT NULL,
  `codigoUnidad` int(11) NOT NULL,
  `nombreUnidad` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`idUnidades`, `codigoUnidad`, `nombreUnidad`, `status`, `ruta`) VALUES
(1, 100, 'UNIDAD 1', 1, 'unidad-1'),
(2, 200, 'UNIDAD 2', 1, 'unidad-2'),
(3, 300, 'UNIDAD 3', 1, 'unidad-3'),
(4, 400, 'UNIDAD 4', 1, 'unidad-4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`idCapitulos`),
  ADD KEY `unidadesId` (`unidadesId`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`idContenidos`),
  ADD KEY `capitulosId` (`tipoContenidoId`),
  ADD KEY `capitulosId_2` (`capitulosId`);

--
-- Indices de la tabla `contenidos-ejercicios`
--
ALTER TABLE `contenidos-ejercicios`
  ADD KEY `contenidosId` (`contenidosId`),
  ADD KEY `ejerciciosId` (`ejerciciosId`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`idEjercicios`);

--
-- Indices de la tabla `ejercicios-evaluaciones`
--
ALTER TABLE `ejercicios-evaluaciones`
  ADD KEY `ejerciciosId` (`ejerciciosId`),
  ADD KEY `evaluacionesId` (`evaluacionesId`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`idEvaluaciones`),
  ADD KEY `personaId` (`personaId`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipo_contenido`
--
ALTER TABLE `tipo_contenido`
  ADD PRIMARY KEY (`idtipoC`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`idUnidades`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `idCapitulos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `idContenidos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `idEjercicios` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `idEvaluaciones` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipo_contenido`
--
ALTER TABLE `tipo_contenido`
  MODIFY `idtipoC` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `idUnidades` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `capitulos_ibfk_1` FOREIGN KEY (`unidadesId`) REFERENCES `unidades` (`idUnidades`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD CONSTRAINT `contenidos_ibfk_1` FOREIGN KEY (`tipoContenidoId`) REFERENCES `tipo_contenido` (`idtipoC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenidos_ibfk_2` FOREIGN KEY (`capitulosId`) REFERENCES `capitulos` (`idCapitulos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenidos-ejercicios`
--
ALTER TABLE `contenidos-ejercicios`
  ADD CONSTRAINT `contenidos-ejercicios_ibfk_1` FOREIGN KEY (`contenidosId`) REFERENCES `contenidos` (`idContenidos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contenidos-ejercicios_ibfk_2` FOREIGN KEY (`ejerciciosId`) REFERENCES `ejercicios` (`idEjercicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicios-evaluaciones`
--
ALTER TABLE `ejercicios-evaluaciones`
  ADD CONSTRAINT `ejercicios-evaluaciones_ibfk_1` FOREIGN KEY (`ejerciciosId`) REFERENCES `ejercicios` (`idEjercicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ejercicios-evaluaciones_ibfk_2` FOREIGN KEY (`evaluacionesId`) REFERENCES `evaluaciones` (`idEvaluaciones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`personaId`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
