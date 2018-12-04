-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2018 a las 08:19:45
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_taxi`
--

CREATE TABLE `chofer_taxi` (
  `taxi` int(10) UNSIGNED NOT NULL,
  `chofer` int(10) UNSIGNED NOT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `chofer_taxi`
--

INSERT INTO `chofer_taxi` (`taxi`, `chofer`, `fechainicio`, `fechafin`) VALUES
(1, 1, '2018-12-03', '2018-12-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_11_192534_create_taxis_table', 1),
(4, '2018_11_11_192859_create_solicituds_table', 1),
(5, '2018_11_11_193005_create_ubicacions_table', 1),
(6, '2018_11_11_193054_solicitud_taxi', 1),
(7, '2018_11_11_193109_chofer_taxi', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicituds`
--

CREATE TABLE `solicituds` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origenlatitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origenlongitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinolatitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinolongitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasajerolatitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasajerolongitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parilla` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aire` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `glos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cali` int(11) DEFAULT NULL,
  `stas` int(11) DEFAULT NULL,
  `pasajero` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicituds`
--

INSERT INTO `solicituds` (`id`, `fecha`, `hora`, `origenlatitud`, `origenlongitud`, `destinolatitud`, `destinolongitud`, `pasajerolatitud`, `pasajerolongitud`, `tipo`, `parilla`, `aire`, `glos`, `cali`, `stas`, `pasajero`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2018-12-04', '06:02:26', '-17.795607931416', '-63.142844494432', '-17.798756932837', '-63.150184359401', '-17.795607931416', '-63.142844494432', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(2, '2018-12-04', '06:05:26', '-17.7936025', '-63.14896484375', '-17.801446382829', '-63.152053188533', '-17.7936025', '-63.14896484375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(3, '2018-12-04', '06:07:16', '-17.7936025', '-63.14896484375', '-17.801446382829', '-63.152053188533', '-17.7936025', '-63.14896484375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(4, '2018-12-04', '06:15:22', '-17.7936025', '-63.14896484375', '-17.801446382829', '-63.152053188533', '-17.7936025', '-63.14896484375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(5, '2018-12-04', '06:17:36', '-17.7936025', '-63.14896484375', '-17.801446382829', '-63.152053188533', '-17.7936025', '-63.14896484375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(6, '2018-12-04', '06:21:23', '-17.7936025', '-63.14896484375', '-17.801446382829', '-63.152053188533', '-17.7936025', '-63.14896484375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(7, '2018-12-04', '06:41:47', '-17.7958825', '-63.14283984375', '-17.7718275', '-63.18858203125', '-17.7958825', '-63.14283984375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(8, '2018-12-04', '06:42:52', '-17.7958825', '-63.14283984375', '-17.7718275', '-63.18858203125', '-17.7958825', '-63.14283984375', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(9, '2018-12-04', '06:55:25', '-17.7956225', '-63.14281640625', '-17.749755028121', '-63.175276760012', '-17.7956225', '-63.14281640625', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL),
(10, '2018-12-04', '06:55:54', '-17.7956225', '-63.14281640625', '-17.749755028121', '-63.175276760012', '-17.7956225', '-63.14281640625', 'A', 'S', 'S', NULL, NULL, NULL, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_taxi`
--

CREATE TABLE `solicitud_taxi` (
  `taxi` int(10) UNSIGNED NOT NULL,
  `solicitud` int(10) UNSIGNED NOT NULL,
  `horainicio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horafin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_taxi`
--

INSERT INTO `solicitud_taxi` (`taxi`, `solicitud`, `horainicio`, `horafin`, `estado`, `calificacion`, `created_at`, `updated_at`) VALUES
(1, 6, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 6, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 6, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 6, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 6, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 8, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 8, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 10, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 10, '0606:1212', NULL, 'A', 10, NULL, NULL),
(1, 10, '0606:1212', NULL, 'A', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxis`
--

CREATE TABLE `taxis` (
  `id` int(10) UNSIGNED NOT NULL,
  `placa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `nasiento` int(11) NOT NULL,
  `npuerta` int(11) NOT NULL,
  `parilla` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aire` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `propietario` int(10) UNSIGNED NOT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `taxis`
--

INSERT INTO `taxis` (`id`, `placa`, `marca`, `modelo`, `anio`, `color`, `tipo`, `nasiento`, `npuerta`, `parilla`, `aire`, `foto`, `propietario`, `estado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2010kjd', 'toyota', 'corolla', '2010', 'plomo', 1, 5, 4, 'N', 'N', 'asdasfadfa', 2, 'O', NULL, NULL, '2018-12-04 09:55:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacions`
--

CREATE TABLE `ubicacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `velocidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxi` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacions`
--

INSERT INTO `ubicacions` (`id`, `longitud`, `latitud`, `velocidad`, `taxi`, `created_at`, `updated_at`) VALUES
(1, '-63.1421962', '-17.7954306', '50km/h', 1, '2018-12-04 09:20:58', '2018-12-04 09:20:58'),
(2, '-63.142197', '-17.7954218', '50km/h', 1, '2018-12-04 09:27:19', '2018-12-04 09:27:19'),
(3, '-63.1422077', '-17.7954427', '50km/h', 1, '2018-12-04 09:40:28', '2018-12-04 09:40:28'),
(4, '-63.1463292', '-17.7949585', '50km/h', 1, '2018-12-04 09:44:29', '2018-12-04 09:44:29'),
(5, '-63.142196', '-17.7954239', '50km/h', 1, '2018-12-04 09:44:53', '2018-12-04 09:44:53'),
(6, '-63.142195', '-17.7954205', '50km/h', 1, '2018-12-04 09:55:04', '2018-12-04 09:55:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenfirebase` text COLLATE utf8mb4_unicode_ci,
  `fechanacimiento` date DEFAULT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imei` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nlicencia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechavencimiento` date DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `password`, `tipo`, `tokenfirebase`, `fechanacimiento`, `sexo`, `direccion`, `telefono`, `imei`, `nlicencia`, `categoria`, `fechavencimiento`, `foto`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vladimir', 'vladimir', '123', 'C', 'ftbQ2WJqL_s:APA91bEi5CnIWTHmT7yf_VJQFm-v4InhsF0swrsfGjG5kgC8y1Q8JjLk4Crk-spsxW2yN_wSG0URXLAVKlOhZujZHMYf9ym0YjthZrtCtM406YLTjfJFgzlVdyXZwnuk4A_ko6g6AhyU', '2018-12-26', 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 08:56:03', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taxis`
--
ALTER TABLE `taxis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacions`
--
ALTER TABLE `ubicacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `solicituds`
--
ALTER TABLE `solicituds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `taxis`
--
ALTER TABLE `taxis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ubicacions`
--
ALTER TABLE `ubicacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
