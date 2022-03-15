

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `crudmatricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumno` int(10) UNSIGNED NOT NULL,
  `codeducando` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `apellidopaterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidomaterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primernombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otrosnombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `iddepartamento` int(10) UNSIGNED NOT NULL,
  `escala` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anioingreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(10) UNSIGNED NOT NULL,
  `nombrecu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codcurso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnivel` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `iddepartamento` int(10) UNSIGNED NOT NULL,
  `nombrede` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`iddepartamento`, `nombrede`) VALUES
(1, 'LA LIBERTAD'),
(2, 'AMAZONAS'),
(3, 'LAMBAYEQUE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `idmatricula` int(10) UNSIGNED NOT NULL,
  `idalumno` int(10) UNSIGNED NOT NULL,
  `idnivel` int(10) UNSIGNED NOT NULL,
  `idperiodo` int(10) UNSIGNED NOT NULL,
  `fechamatricula` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

-- CREATE TABLE `migrations` (
-- `id` int(10) UNSIGNED NOT NULL,
--  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--  `batch` int(11) NOT NULL
-- )  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

-- INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
-- (1, '2022_03_14_152056_create_departamentos_table', 1),
-- (2, '2022_03_14_152347_create_nivels_table', 1),
-- (3, '2022_03_14_152624_create_cursos_table', 1),
-- (4, '2022_03_14_152642_create_alumnos_table', 1),
-- (5, '2022_03_14_152714_create_periodos_table', 1),
-- (6, '2022_03_14_152730_create_matriculas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivels`
--

CREATE TABLE `nivels` (
  `idnivel` int(10) UNSIGNED NOT NULL,
  `nombreni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `idperiodo` int(10) UNSIGNED NOT NULL,
  `periodo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`idperiodo`, `periodo`) VALUES
(1, 'Periodo 2022');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumno`),
  ADD UNIQUE KEY `alumnos_codeducando_unique` (`codeducando`),
  ADD UNIQUE KEY `alumnos_dni_unique` (`dni`),
  ADD KEY `alumnos_iddepartamento_index` (`iddepartamento`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`),
  ADD UNIQUE KEY `cursos_codcurso_unique` (`codcurso`),
  ADD KEY `cursos_idnivel_index` (`idnivel`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idmatricula`),
  ADD UNIQUE KEY `matriculas_idalumno_unique` (`idalumno`),
  ADD KEY `matriculas_idnivel_index` (`idnivel`),
  ADD KEY `matriculas_idperiodo_index` (`idperiodo`);

--
-- Indices de la tabla `migrations`
--
-- ALTER TABLE `migrations`
--  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivels`
--
ALTER TABLE `nivels`
  ADD PRIMARY KEY (`idnivel`),
  ADD UNIQUE KEY `nivels_nombreni_unique` (`nombreni`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`idperiodo`),
  ADD UNIQUE KEY `periodos_periodo_unique` (`periodo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcurso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `iddepartamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idmatricula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
-- ALTER TABLE `migrations`
--  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nivels`
--
ALTER TABLE `nivels`
  MODIFY `idnivel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `idperiodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_iddepartamento_foreign` FOREIGN KEY (`iddepartamento`) REFERENCES `departamentos` (`iddepartamento`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_idnivel_foreign` FOREIGN KEY (`idnivel`) REFERENCES `nivels` (`idnivel`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_idalumno_foreign` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriculas_idnivel_foreign` FOREIGN KEY (`idnivel`) REFERENCES `nivels` (`idnivel`) ON DELETE CASCADE,
  ADD CONSTRAINT `matriculas_idperiodo_foreign` FOREIGN KEY (`idperiodo`) REFERENCES `periodos` (`idperiodo`) ON DELETE CASCADE;
COMMIT;

