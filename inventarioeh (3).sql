-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2020 a las 17:29:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarioeh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_red`
--

CREATE TABLE `configuracion_red` (
  `confRedId` bigint(20) UNSIGNED NOT NULL,
  `tipoRedConfigRed` int(11) NOT NULL,
  `ipImpreConfigRed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redImpreConfigRed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracion_red`
--

INSERT INTO `configuracion_red` (`confRedId`, `tipoRedConfigRed`, `ipImpreConfigRed`, `redImpreConfigRed`, `created_at`, `updated_at`) VALUES
(1, 1, '192.90', 1, NULL, NULL),
(2, 1, '192.90', 1, NULL, NULL),
(3, 1, '192.9.111.12', 1, NULL, NULL),
(4, 1, '192.9.111.12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copias_seguridad`
--

CREATE TABLE `copias_seguridad` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serialCopiS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreCopiS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `canArchCs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanoCopiS` int(11) NOT NULL,
  `fechaCopiS` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato`
--

CREATE TABLE `dato` (
  `datoId` bigint(20) UNSIGNED NOT NULL,
  `responsableDatoId` int(11) NOT NULL,
  `generalDatoId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dato`
--

INSERT INTO `dato` (`datoId`, `responsableDatoId`, `generalDatoId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato_general`
--

CREATE TABLE `dato_general` (
  `datoId` bigint(20) UNSIGNED NOT NULL,
  `nombreDatG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marcaDatG` int(11) DEFAULT NULL,
  `modeloDatG` int(11) DEFAULT NULL,
  `adquisicionDatG` int(11) NOT NULL,
  `añoCompDatG` int(11) NOT NULL,
  `placaDatG` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialDatG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fPlacaDatG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fSerialDatG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fGeneralDatG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dato_general`
--

INSERT INTO `dato_general` (`datoId`, `nombreDatG`, `marcaDatG`, `modeloDatG`, `adquisicionDatG`, `añoCompDatG`, `placaDatG`, `serialDatG`, `fPlacaDatG`, `fSerialDatG`, `fGeneralDatG`, `created_at`, `updated_at`) VALUES
(1, 'ALMACEN', 1, 1, 1, 2012, '134232', 'ADASSAS12312', 'ADASDA1231', 'ADADA123131', '1213123131', NULL, NULL),
(2, 'ALMACEN', 1, 1, 1, 2012, '134232', 'ADASSAS12312', 'ADASDA1231', 'ADADA123131', '1213123131', NULL, NULL),
(3, 'Auxiliar Cartera ', 1, 1, 1, 2019, 'DASDVEAS', 'FASASXAS', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', NULL, NULL),
(4, 'AUXLIAR CARTERA ', 1, 1, 1, 1, 'SDFASDAD', 'ASDASDAW', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', NULL, NULL),
(5, 'Auxiliar Cartera ', 1, 1, 1, 2019, 'DASDVEAS', 'FASASXAS', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', NULL, NULL),
(6, 'AUXLIAR CARTERA ', 1, 1, 1, 1, 'SDFASDAD', 'ASDASDAW', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', 'ASDASDA_2019.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreDetalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maestDetalle` int(11) NOT NULL,
  `desccionDetalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco_duro`
--

CREATE TABLE `disco_duro` (
  `discoDuroId` bigint(20) UNSIGNED NOT NULL,
  `tipoConexDuscoD` int(11) NOT NULL,
  `marcaDiscoD` int(11) NOT NULL,
  `capacidadDiscoD` int(11) NOT NULL,
  `estadoSolDiscoD` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `disco_duro`
--

INSERT INTO `disco_duro` (`discoDuroId`, `tipoConexDuscoD`, `marcaDiscoD`, `capacidadDiscoD`, `estadoSolDiscoD`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL),
(2, 2, 2, 2, 2, NULL, NULL),
(3, 1, 1, 1, 1, NULL, NULL),
(4, 2, 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco_duro_conexion`
--

CREATE TABLE `disco_duro_conexion` (
  `conexiondiscoduro_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `disco_duro_conexion`
--

INSERT INTO `disco_duro_conexion` (`conexiondiscoduro_id`, `nombre`) VALUES
(1, 'IDE'),
(2, 'SATA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco_duro_marca`
--

CREATE TABLE `disco_duro_marca` (
  `marcasdiscoduro_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `disco_duro_marca`
--

INSERT INTO `disco_duro_marca` (`marcasdiscoduro_id`, `nombre`) VALUES
(1, 'HITACHI'),
(2, 'WESTERN DIGITAL'),
(3, 'SAMSUNG'),
(4, 'TOSHIBA'),
(5, 'SEAGATE'),
(6, 'INTEL'),
(7, 'MAXTOR'),
(8, 'UNKNOWN'),
(9, 'WESTER DIGITAL CORPORATION'),
(10, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `equipoId` bigint(20) UNSIGNED NOT NULL,
  `tipoEquipoId` int(11) NOT NULL,
  `datosEquipo` int(11) NOT NULL,
  `hardwareEquipo` int(11) NOT NULL,
  `softwareEquipo` int(11) NOT NULL,
  `ubicacionEquipo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`equipoId`, `tipoEquipoId`, `datosEquipo`, `hardwareEquipo`, `softwareEquipo`, `ubicacionEquipo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 1, 1, 1, NULL, NULL),
(3, 3, 1, 1, 1, 1, NULL, NULL),
(4, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_adquisicion`
--

CREATE TABLE `equipo_adquisicion` (
  `adquisicionId` int(11) NOT NULL,
  `nombreAdquisicion` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_adquisicion`
--

INSERT INTO `equipo_adquisicion` (`adquisicionId`, `nombreAdquisicion`, `created_at`, `updated_at`) VALUES
(1, 'LEASING', '2020-02-25 15:05:01', NULL),
(2, 'COMPRADO', '2020-02-25 15:05:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_marca`
--

CREATE TABLE `equipo_marca` (
  `marcaId` int(11) NOT NULL,
  `nombreMarca` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_marca`
--

INSERT INTO `equipo_marca` (`marcaId`, `nombreMarca`, `created_at`, `updated_at`) VALUES
(1, 'DELL', '2020-02-25 15:21:23', NULL),
(2, 'LENOVO', '2020-02-25 15:21:23', NULL),
(3, 'HP', '2020-02-25 15:21:23', NULL),
(4, 'SONY', '2020-02-25 15:21:23', NULL),
(5, 'GENIUS', '2020-02-25 15:21:23', NULL),
(6, 'COMPAQ', '2020-02-25 15:21:23', NULL),
(7, 'HP COMPAQ', '2020-02-25 15:21:23', NULL),
(8, 'OPTIPLEX GX5 20', '2020-02-25 15:21:23', NULL),
(9, 'COMPUMAX', '2020-02-25 15:21:23', NULL),
(10, 'NO APLICA', '2020-02-25 15:21:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_modelo`
--

CREATE TABLE `equipo_modelo` (
  `modeloId` int(11) NOT NULL,
  `nombreModelo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_modelo`
--

INSERT INTO `equipo_modelo` (`modeloId`, `nombreModelo`, `created_at`, `updated_at`) VALUES
(1, 'V520S-08IKL', NULL, '2020-02-25 03:47:45'),
(2, 'INSPIRION 620S', NULL, NULL),
(3, 'COMPAQ PRO 6300 SFF', NULL, NULL),
(4, 'COMPAQ LE1711\r\n', NULL, NULL),
(5, 'PRODESK 600 G1 SFF', NULL, NULL),
(6, 'PRO 6300', NULL, NULL),
(7, 'PROBOOK 440 G2', NULL, NULL),
(8, 'HP Prodesk 800 G1SFF', NULL, NULL),
(9, 'LATITUDE E6440', NULL, NULL),
(10, 'PROBOOK 4440SS', NULL, '2020-02-25 03:55:56'),
(11, 'COMPAQ DC5800 SMALL', NULL, NULL),
(12, 'LATITUDE E5420', NULL, NULL),
(13, 'COMPAQ DC5700 SMALL', NULL, NULL),
(14, ' PROBOOK 6470B ', NULL, NULL),
(15, ' OPTIPLEX GX520', NULL, NULL),
(16, 'PROBOOK 440 G3ASDA', NULL, '2020-02-25 03:42:19'),
(17, 'PRODESK 600 G1', NULL, NULL),
(18, 'VOSTRO 430 ', NULL, NULL),
(19, 'OPTIPLEX 9020 ', NULL, NULL),
(20, ' OPTIPLEX 390 ', NULL, NULL),
(21, 'OPTIPLEX 9900', NULL, '2020-02-25 03:48:00'),
(22, 'COMPAQ 6300 SMAL', NULL, '2020-02-25 03:42:11'),
(25, 'NO APLICA', '2020-02-24 22:32:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_tipo`
--

CREATE TABLE `equipo_tipo` (
  `tipoId` int(11) NOT NULL,
  `nombreTipo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo_tipo`
--

INSERT INTO `equipo_tipo` (`tipoId`, `nombreTipo`, `created_at`, `updated_at`) VALUES
(1, 'TODO EN UNO', '2020-02-24 19:10:51', '2020-02-24 19:11:18'),
(2, 'LAPTOP', '2020-02-24 19:10:51', '2020-02-24 19:11:18'),
(9, 'PC', '2020-02-24 22:20:32', '2020-02-24 22:20:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardware`
--

CREATE TABLE `hardware` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tecladoHard` int(11) DEFAULT NULL,
  `mouseHard` int(11) DEFAULT NULL,
  `monitorHard` int(11) DEFAULT NULL,
  `torreHard` int(11) DEFAULT NULL,
  `procesadorHard` int(11) NOT NULL,
  `ramHard` int(11) NOT NULL,
  `discoDuroHard` int(11) NOT NULL,
  `unidadOpHard` int(11) NOT NULL,
  `tarjetaExpanHard` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hardware`
--

INSERT INTO `hardware` (`id`, `tecladoHard`, `mouseHard`, `monitorHard`, `torreHard`, `procesadorHard`, `ramHard`, `discoDuroHard`, `unidadOpHard`, `tarjetaExpanHard`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(3, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, NULL, NULL),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresora_red`
--

CREATE TABLE `impresora_red` (
  `redimpr_id` int(11) NOT NULL,
  `nombrered` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `impresora_red`
--

INSERT INTO `impresora_red` (`redimpr_id`, `nombrered`) VALUES
(1, 'RED IP'),
(2, 'RED LOCAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `mantId` bigint(20) UNSIGNED NOT NULL,
  `tipoMantId` int(11) NOT NULL,
  `usuMantId` int(11) NOT NULL,
  `tecnicoMantId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacionMant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaMant` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`mantId`, `tipoMantId`, `usuMantId`, `tecnicoMantId`, `observacionMant`, `fechaMant`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', 'Actualización office', '2020-02-25 10:18:21', NULL, '2020-02-25 15:18:27'),
(2, 1, 2, '2', 'antivirus ', '2020-02-25 10:18:21', '2020-02-25 15:18:21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_tipo`
--

CREATE TABLE `mantenimiento_tipo` (
  `id` int(11) NOT NULL,
  `nombreMant` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mantenimiento_tipo`
--

INSERT INTO `mantenimiento_tipo` (`id`, `nombreMant`, `created_at`, `updated_at`) VALUES
(1, 'PREVENTIVO', '2020-02-25 15:08:16', NULL),
(2, 'CORRECTIVO', '2020-02-25 15:08:16', NULL),
(3, 'PREDICTIVO', '2020-02-25 15:08:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_02_153454_create_detalles_table', 1),
(2, '2019_12_02_154300_create_municipios_table', 1),
(3, '2019_12_02_154316_create_sedes_table', 1),
(4, '2019_12_02_154333_create_responsables_table', 1),
(5, '2019_12_02_155611_create_mantenimientos_table', 1),
(6, '2019_12_02_155649_create_copia_seguridads_table', 1),
(7, '2019_12_02_161454_create_datos_generales_table', 1),
(8, '2019_12_02_161525_create_teclados_table', 1),
(9, '2019_12_02_161538_create_monitors_table', 1),
(10, '2019_12_02_161556_create_procesadors_table', 1),
(11, '2019_12_02_161607_create_rams_table', 1),
(12, '2019_12_02_161622_create_disco_duros_table', 1),
(13, '2019_12_02_161638_create_unidad_opticas_table', 1),
(14, '2019_12_02_161658_create_tarjeta_expansions_table', 1),
(15, '2019_12_02_161725_create_hardware_table', 1),
(16, '2019_12_02_191437_create_software_table', 1),
(17, '2019_12_02_191504_create_configuracion_reds_table', 1),
(18, '2019_12_02_191541_create_software_reds_table', 1),
(19, '2019_12_02_191604_create_ubicacion_actuals_table', 1),
(20, '2019_12_02_192456_create_equipos_table', 1),
(21, '2019_12_02_192747_create_datos_table', 1),
(22, '2020_01_07_225242_inventarioeh', 1),
(23, '2014_10_12_000000_create_users_table', 2),
(24, '2014_10_12_100000_create_password_resets_table', 2),
(25, '2019_08_19_000000_create_failed_jobs_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE `monitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marcaMonitor` int(11) NOT NULL,
  `tecnologiaMonitor` int(11) NOT NULL,
  `placaMonitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialMonitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fPlacaMonitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fSerialMonitor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montr_tecnologia`
--

CREATE TABLE `montr_tecnologia` (
  `tecnologiaId` int(11) NOT NULL,
  `nombreTecnologia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `montr_tecnologia`
--

INSERT INTO `montr_tecnologia` (`tecnologiaId`, `nombreTecnologia`) VALUES
(1, 'LCD'),
(3, 'HPL1706'),
(4, 'NO APLICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mouse`
--

CREATE TABLE `mouse` (
  `mouseId` bigint(20) UNSIGNED NOT NULL,
  `marcaMouse` int(11) NOT NULL,
  `tipoEntraMouse` int(11) NOT NULL,
  `placaMouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialMouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fPlacaMouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fSerialMouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mouse`
--

INSERT INTO `mouse` (`mouseId`, `marcaMouse`, `tipoEntraMouse`, `placaMouse`, `serialMouse`, `fPlacaMouse`, `fSerialMouse`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(2, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(3, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(4, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `municipioId` int(11) UNSIGNED NOT NULL,
  `nombreMunicipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`municipioId`, `nombreMunicipio`, `created_at`, `updated_at`) VALUES
(2, 'NEIVA', NULL, NULL),
(3, 'PALERMO', NULL, NULL),
(4, 'YAGUARA', NULL, NULL),
(5, 'CAMPOALEGRE', NULL, NULL),
(6, 'RIVERA', NULL, NULL),
(7, 'LA PLATA', NULL, NULL),
(8, 'GARZON', NULL, NULL),
(12, 'IQUIRA', NULL, NULL),
(13, 'PAICOL', NULL, NULL),
(14, 'ALGECIRAS', NULL, NULL),
(15, 'TESALIA', NULL, NULL),
(16, 'AIPE', NULL, NULL),
(17, 'PITAL', NULL, NULL),
(18, 'PITALITO', NULL, NULL),
(19, 'ISNOS', NULL, NULL),
(20, 'ARGENTINA', NULL, NULL),
(21, 'COLOMBIA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prcsdor_arquitecura`
--

CREATE TABLE `prcsdor_arquitecura` (
  `arquitecturaId` int(11) NOT NULL,
  `nombreArquitec` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prcsdor_arquitecura`
--

INSERT INTO `prcsdor_arquitecura` (`arquitecturaId`, `nombreArquitec`) VALUES
(1, 'X32'),
(2, 'X64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prcsdor_marca`
--

CREATE TABLE `prcsdor_marca` (
  `marcaId` int(11) NOT NULL,
  `nombreMarca` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prcsdor_marca`
--

INSERT INTO `prcsdor_marca` (`marcaId`, `nombreMarca`) VALUES
(1, 'INTEL'),
(2, 'AMD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prcsdor_tecnologia`
--

CREATE TABLE `prcsdor_tecnologia` (
  `tecnologiaId` int(11) NOT NULL,
  `nombreTecnologia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prcsdor_tecnologia`
--

INSERT INTO `prcsdor_tecnologia` (`tecnologiaId`, `nombreTecnologia`) VALUES
(1, 'CORE 2 DUO'),
(2, 'CORE I3'),
(3, 'CORE I5'),
(4, 'CORE I7'),
(5, 'PENTIUM 4'),
(6, 'PENTIUM DUAL'),
(7, 'PENTIUM'),
(8, 'DUAL CORE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesador`
--

CREATE TABLE `procesador` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arquitecturaProc` int(11) NOT NULL,
  `marcaProc` int(11) NOT NULL,
  `tecnologiaProc` int(11) NOT NULL,
  `velocidadProc` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `procesador`
--

INSERT INTO `procesador` (`id`, `arquitecturaProc`, `marcaProc`, `tecnologiaProc`, `velocidadProc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `ramId` bigint(20) UNSIGNED NOT NULL,
  `tecnologiaRam` int(11) NOT NULL,
  `marcaRam` int(11) NOT NULL,
  `calidadRam` int(11) NOT NULL,
  `capacidadToRam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`ramId`, `tecnologiaRam`, `marcaRam`, `calidadRam`, `capacidadToRam`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL),
(2, 1, 1, 1, 1, NULL, NULL),
(3, 1, 1, 1, 1, NULL, NULL),
(4, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram_marca`
--

CREATE TABLE `ram_marca` (
  `marcaId` int(11) NOT NULL,
  `nombreMarca` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ram_marca`
--

INSERT INTO `ram_marca` (`marcaId`, `nombreMarca`, `created_at`, `updated_at`) VALUES
(1, 'KINGSTON', '2020-02-25 15:38:52', NULL),
(2, 'HITACHI', '2020-02-25 15:38:52', NULL),
(3, 'SAMSUNG', '2020-02-25 15:38:52', NULL),
(4, 'MICRON', '2020-02-25 15:38:52', NULL),
(5, '8502', '2020-02-25 15:38:52', NULL),
(6, 'HYNIX/HYUNDAY', '2020-02-25 15:38:52', NULL),
(7, 'HYUNDI', '2020-02-25 15:38:52', NULL),
(8, 'INFINEON', '2020-02-25 15:38:52', NULL),
(9, 'JEDEC', '2020-02-25 15:38:52', NULL),
(10, 'PATRIOT MEMORY', '2020-02-25 15:38:52', NULL),
(11, 'TRASCEND-KRETON', '2020-02-25 15:38:52', NULL),
(12, 'HYUNDAI', '2020-02-25 15:38:52', NULL),
(13, 'SKHYNIX', '2020-02-25 15:38:52', NULL),
(14, 'MUSHKIN', '2020-02-25 15:38:52', NULL),
(15, 'NO APLICA', '2020-02-25 15:38:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram_tecnologia`
--

CREATE TABLE `ram_tecnologia` (
  `tecnologiaId` int(11) NOT NULL,
  `nombreTecnologia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ram_tecnologia`
--

INSERT INTO `ram_tecnologia` (`tecnologiaId`, `nombreTecnologia`, `created_at`, `updated_at`) VALUES
(1, 'DDR1', '2020-02-25 15:39:56', NULL),
(2, 'DDR2', '2020-02-25 15:39:56', NULL),
(3, 'DDR3', '2020-02-25 15:39:56', NULL),
(4, 'DDR4', '2020-02-25 15:39:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `responsId` bigint(20) UNSIGNED NOT NULL,
  `nombreRespons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailRespons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sedeRespons` int(11) NOT NULL,
  `dependRespons` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`responsId`, `nombreRespons`, `emailRespons`, `sedeRespons`, `dependRespons`, `created_at`, `updated_at`) VALUES
(8, 'asd', 'joseluis@gmail.com', 1, 2, '2020-02-14 09:50:30', '2020-01-21 17:20:42'),
(9, 'ASSA', 'luisfernando@gmail.com', 2, 2, '2020-02-14 09:50:53', '2020-01-21 17:23:46'),
(10, 'ASSA', 'oskarruiz@gmail.com', 2, 1, '2020-02-14 09:51:10', '2020-01-21 17:24:28'),
(12, 's', 'ivangutierrez@gmail.com', 1, 1, '2020-02-14 09:51:54', '2020-01-22 17:03:35'),
(13, 'asd', 'daimercuellar@gmail.com', 1, 2, '2020-02-14 09:51:51', '2020-01-22 17:36:00'),
(14, 's', 'sebas@gmail.com', 1, 2, '2020-02-14 09:52:07', '2020-01-22 17:41:03'),
(15, 'd', 'guillermo@gmail.com', 12, 2, '2020-02-14 09:52:29', '2020-01-22 17:41:30'),
(16, 's', 'diego@gmail.com', 2, 1, '2020-02-14 09:52:38', '2020-01-22 17:44:36'),
(17, '2', 'alfredo@gmail.com', 2, 2, '2020-02-14 09:52:46', '2020-01-22 17:45:36'),
(18, 'asd', 'marcos@gmail.com', 2, 2, '2020-02-14 09:52:55', '2020-01-22 17:46:40'),
(19, 'sa', 'mariajose@gmail.com', 2, 2, '2020-02-14 09:53:09', '2020-01-22 17:48:15'),
(20, 'sd', 'laura@gmail.com', 2, 1, '2020-02-14 09:53:15', '2020-01-22 17:49:20'),
(21, 'as', 'jimena@gmail.com', 2, 2, '2020-02-14 09:53:22', '2020-01-22 17:50:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `sedeId` bigint(20) UNSIGNED NOT NULL,
  `nombreSede` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccionSede` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipioSede` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`sedeId`, `nombreSede`, `direccionSede`, `municipioSede`, `created_at`, `updated_at`) VALUES
(1, 'SAIRE', 'calle 8 N° 7-54', 1, NULL, NULL),
(2, 'COMPLEJO ECOLOGICO EL BOTE', 'KM 1 VÍA PALERMO ', 1, NULL, NULL),
(3, 'OFICINA ZONA CENTRO ', 'CALLE 8 N°. 7-54 GARZÓN ', 2, NULL, NULL),
(4, 'OFICINA ZONA OCCIDENTE', 'CALLE 10 N° 5-26 LA PLATA', 3, NULL, NULL),
(5, 'OFICINA ZONA SUR', 'CALLE 19 N° 3-05 PITALITO', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede_dependencia`
--

CREATE TABLE `sede_dependencia` (
  `dependenciaId` int(11) NOT NULL,
  `sedeId` int(11) DEFAULT NULL,
  `nombredepend` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sede_dependencia`
--

INSERT INTO `sede_dependencia` (`dependenciaId`, `sedeId`, `nombredepend`) VALUES
(1, 1, 'DIVISIÓN FINANCIERA'),
(2, 2, 'GERENCIA GENERAL'),
(3, 1, 'SUBGERENCIA ADMINISTRATIVA Y FINANCIERA'),
(4, 3, 'DIVISIÓN INGENIERÍA DE PROYECTOS'),
(5, 1, 'OFICINA DE SISTEMAS Y ORGANIZACIÓN'),
(6, 3, 'SUBGERENCIA DE DISTRIBUCIÓN'),
(7, 2, 'SECRETARIA GENERAL'),
(8, 1, 'OFICINA GESTIÓN EMPRESARIAL'),
(9, 2, 'OFICINA RESPONSABILIDAD SOCIAL Y AMBIENTAL'),
(10, 3, 'DIVISIÓN CARTERA'),
(11, 2, 'DIVISIÓN PÉRDIDAS'),
(12, 3, 'OFICINA DE PLANEACIÓN CORPORATIVA'),
(13, 4, 'DIVISIÓN GESTIÓN COMERCIAL'),
(14, 3, 'DIVISIÓN FACTURACIÓN REGULADA'),
(15, 2, 'SUBGERENCIA COMERCIAL'),
(16, 3, 'DIVISIÓN SERVICIOS ADMINISTRATIVOS'),
(17, 2, 'DIVISIÓN RECURSOS HUMANOS'),
(18, 2, 'OFICINA DE CONTROL INTERNO'),
(19, 1, 'DIVISIÓN PETICIONES QUEJAS Y RECURSOS'),
(20, 3, 'DIVISIÓN OPERACIÓN Y MANTENIMIENTO'),
(21, 1, 'SECRETARÍA GENERAL Y ASESORÍA LEGAL'),
(22, 2, 'DIVISIÓN ZONA SUR'),
(23, 2, 'DIVISIÓN ZONA CENTRO'),
(24, 2, 'DIVISIÓN ZONA NORTE'),
(25, 1, 'DIVISIÓN ZONA OCCIDENTE'),
(26, 2, 'CONTRALORIA'),
(27, 3, 'DIVISIÓN OPERACIÓN Y MANTENIMIENTO (TELECOMUNICACIONES)'),
(28, 2, 'SERVICIOS ADMINISTRATIVOS (CAD)'),
(29, 1, 'OFICINA ASESORES'),
(30, 2, 'DIVISIÓN COMERCIAL'),
(31, 2, 'PORTERIA MUNICIPAL'),
(32, 1, 'OFICINA DE RESPONSABILIDAD SOCIAL'),
(33, 2, 'OFICINA DE PLANEACIÓN'),
(34, 3, 'SAIRE (PQR)'),
(35, 2, 'SAIRE (ALMACEN)'),
(36, 1, 'PQR'),
(37, 2, 'SAIRE PQR (CONTACT CENTER)'),
(38, 2, 'SAIRE PQR (AU)'),
(39, 1, 'SAIRE PQR (EDIFICIO)'),
(40, 2, 'SALUD OCUPACIONAL'),
(41, 3, 'SAIRE ZONA NORTE (PÉRDIDAS)'),
(42, 2, 'SAIRE ZONA NORTE (CAD)'),
(43, 3, 'SALUD OCUPACIONAL NORTE (PÉRDIDAS)'),
(44, 2, 'SERVICIOS ADMINISTRATIVOS'),
(45, 1, 'SERVICIOS ADMINISTRATIVOS (CAD ARCHIVOS)'),
(46, 2, 'FACTURACIÓN'),
(47, 3, 'SUBGERENCIA ADMINISTRATIVA'),
(48, 2, 'SALA DE CAPACITACIÓN'),
(49, 1, 'CUENTAS NUEVAS'),
(50, 2, 'SAIRE ZONA NORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sftw_conexion`
--

CREATE TABLE `sftw_conexion` (
  `conexionsftwr_id` int(11) NOT NULL,
  `nombreconexion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'sistema operativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sftw_conexion`
--

INSERT INTO `sftw_conexion` (`conexionsftwr_id`, `nombreconexion`) VALUES
(1, 'WINDOWS 7'),
(2, 'WINDOWS 8'),
(3, 'WINDOWS 8.1'),
(4, 'WINDOWS 10'),
(5, 'WINDOWS XP'),
(6, 'WINDOWS 10 PRO'),
(7, 'WINDOWS 10 PROFESSIONAL'),
(8, 'WINDOWS 8.1 PROFESSIONAL'),
(9, 'WINDOWS 8 PROFESSIONAL'),
(10, 'WINDOWS 8.1 PRO'),
(11, 'WINDOWS VISTA '),
(12, 'WINDOWS VISTA BUSSINES'),
(13, 'WINDOWS XP PROFESSIONAL'),
(14, 'WINDOWS 7 PROFESSIONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `softwareId` bigint(20) UNSIGNED NOT NULL,
  `sistemaOperSoft` int(11) NOT NULL,
  `arquitecturaSoft` int(11) NOT NULL,
  `antivirusSoft` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`softwareId`, `sistemaOperSoft`, `arquitecturaSoft`, `antivirusSoft`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 2, 2, 2, NULL, NULL),
(3, 1, 1, 1, NULL, NULL),
(4, 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_antivirus`
--

CREATE TABLE `software_antivirus` (
  `antvrus_sftware_id` int(11) NOT NULL,
  `nombreantivirus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `software_antivirus`
--

INSERT INTO `software_antivirus` (`antvrus_sftware_id`, `nombreantivirus`) VALUES
(1, 'ESET Endpoint Antivirus'),
(2, 'ESET ENDPOINT SECURITY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_arquitectura`
--

CREATE TABLE `software_arquitectura` (
  `arqtra_sftware_id` int(11) NOT NULL,
  `nombrearqtra` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `software_arquitectura`
--

INSERT INTO `software_arquitectura` (`arqtra_sftware_id`, `nombrearqtra`) VALUES
(1, 'X32'),
(2, 'X64');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_red`
--

CREATE TABLE `software_red` (
  `redId` bigint(20) UNSIGNED NOT NULL,
  `softwareId` int(11) NOT NULL,
  `configRedId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `software_red`
--

INSERT INTO `software_red` (`redId`, `softwareId`, `configRedId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_expansion`
--

CREATE TABLE `tarjetas_expansion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipoId` int(11) NOT NULL,
  `tarjetaExpanId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarjetas_expansion`
--

INSERT INTO `tarjetas_expansion` (`id`, `equipoId`, `tarjetaExpanId`, `created_at`, `updated_at`) VALUES
(48, 1, 2, '2020-02-21 20:40:27', NULL),
(49, 1, 3, '2020-02-21 20:40:27', NULL),
(50, 1, 2, '2020-02-21 20:53:15', NULL),
(51, 1, 3, '2020-02-21 20:53:15', NULL),
(52, 1, 2, '2020-02-21 21:23:28', NULL),
(53, 1, 3, '2020-02-21 21:23:28', NULL),
(54, 1, 2, '2020-02-21 21:24:54', NULL),
(55, 1, 3, '2020-02-21 21:24:54', NULL),
(56, 1, 1, '2020-02-21 21:39:28', NULL),
(57, 1, 2, '2020-02-21 21:39:28', NULL),
(58, 1, 3, '2020-02-21 21:39:28', NULL),
(59, 1, 1, '2020-02-21 22:49:45', NULL),
(60, 1, 2, '2020-02-21 22:49:45', NULL),
(61, 1, 3, '2020-02-21 22:49:45', NULL),
(62, 1, 1, '2020-02-21 22:50:24', NULL),
(63, 1, 2, '2020-02-21 22:50:24', NULL),
(64, 1, 3, '2020-02-21 22:50:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_e_tipo`
--

CREATE TABLE `tarjeta_e_tipo` (
  `tarjetaId` int(11) NOT NULL,
  `nombreTarjeta` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tarjeta_e_tipo`
--

INSERT INTO `tarjeta_e_tipo` (`tarjetaId`, `nombreTarjeta`, `created_at`, `updated_at`) VALUES
(1, 'AUDIO', '2020-02-25 15:55:17', NULL),
(2, 'VIDEO', '2020-02-25 15:55:17', NULL),
(3, 'RED', '2020-02-25 15:55:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teclado`
--

CREATE TABLE `teclado` (
  `tecladoId` bigint(20) UNSIGNED NOT NULL,
  `marcaTeclado` int(11) NOT NULL,
  `tipoEntraTeclado` int(11) NOT NULL,
  `placaTeclado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialTeclado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fPlacaTeclado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fSerialTeclado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teclado`
--

INSERT INTO `teclado` (`tecladoId`, `marcaTeclado`, `tipoEntraTeclado`, `placaTeclado`, `serialTeclado`, `fPlacaTeclado`, `fSerialTeclado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SADA', 'DSA2131', '2019_JUNIO.jpg', '2019_JUNIO.jpg', NULL, NULL),
(2, 1, 1, 'DAWDD', 'AS2123', '2019_JUNIO.jpg', '2019_JUNIO.jpg', NULL, NULL),
(3, 1, 1, 'SADA', 'DSA2131', '2019_JUNIO.jpg', '2019_JUNIO.jpg', NULL, NULL),
(4, 1, 1, 'DAWDD', 'AS2123', '2019_JUNIO.jpg', '2019_JUNIO.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `tecnicoId` int(11) NOT NULL,
  `nombreTecnico` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoTecnico` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`tecnicoId`, `nombreTecnico`, `apellidoTecnico`) VALUES
(1, 'juan pablo ', 'cordoba cabrera'),
(2, 'sebastian ', 'paredes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entrada`
--

CREATE TABLE `tipo_entrada` (
  `entradaId` int(11) NOT NULL,
  `nombreEnt` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_entrada`
--

INSERT INTO `tipo_entrada` (`entradaId`, `nombreEnt`, `created_at`, `updated_at`) VALUES
(1, 'PS2', NULL, '2020-02-24 20:31:36'),
(2, 'USB', NULL, '0000-00-00 00:00:00'),
(6, 'INALAMBRICO', '2020-02-24 16:25:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_red`
--

CREATE TABLE `tip_red` (
  `id` int(11) NOT NULL,
  `nombrered` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tip_red`
--

INSERT INTO `tip_red` (`id`, `nombrered`) VALUES
(1, 'ETHERNET'),
(2, 'INALAMBRICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torre`
--

CREATE TABLE `torre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marcaTorre` int(11) NOT NULL,
  `tipoEntraTorre` int(11) NOT NULL,
  `placaTorre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serialTorre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fPlacaTorre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fSerialTorre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `torre`
--

INSERT INTO `torre` (`id`, `marcaTorre`, `tipoEntraTorre`, `placaTorre`, `serialTorre`, `fPlacaTorre`, `fSerialTorre`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(2, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(3, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL),
(4, 1, 1, 'VVRTHAS', 'DASDS12312', '20199921_asda', '20199921_asda', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_actual`
--

CREATE TABLE `ubicacion_actual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `responsable_id` int(11) NOT NULL,
  `dependenciaUbica` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_actual`
--

INSERT INTO `ubicacion_actual` (`id`, `responsable_id`, `dependenciaUbica`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 1, NULL, NULL),
(4, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_optica`
--

CREATE TABLE `unidad_optica` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipoUnidadOpt` int(11) NOT NULL,
  `marcaUnidadOpt` int(11) NOT NULL,
  `serialUnidadOpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_optica_conexion`
--

CREATE TABLE `unidad_optica_conexion` (
  `conexuoptica_id` int(11) NOT NULL,
  `nombreconex` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `unidad_optica_conexion`
--

INSERT INTO `unidad_optica_conexion` (`conexuoptica_id`, `nombreconex`) VALUES
(1, 'DVD-ROM'),
(2, 'DVD-RW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_optica_marca`
--

CREATE TABLE `unidad_optica_marca` (
  `marcasuoptica_id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `unidad_optica_marca`
--

INSERT INTO `unidad_optica_marca` (`marcasuoptica_id`, `nombre`) VALUES
(1, 'HP'),
(2, 'LG'),
(3, 'TSST CORP'),
(4, 'HL-DT'),
(5, 'HL-DT-ST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'freimanuribe15@gmail.com', NULL, '$2y$10$bQQDUcanBpg4B6uB5xp5vODZck0ffT1M15ai1FioepbE33eGG/Z1u', 'e4bAbKXouRyqTBLu6Be1CITxqNDy82DtZe2MyZpKgW71taNVs2vqUiEdYdfG', '2020-02-11 20:42:45', '2020-02-11 20:42:45'),
(6, 'Daimer Jerith Cuellar Morales', 'daimercuellar@gmail.com', NULL, '$2y$10$WSsHKzAJhysa71WOIBy5gO4kRbvdif3ryElR9Y/1Mcc7aytWLD.yG', NULL, '2020-02-19 20:54:31', '2020-02-19 20:54:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuId` int(11) NOT NULL,
  `nombreUsu` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `equipoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuId`, `nombreUsu`, `equipoId`) VALUES
(1, 'Adriana penagos', 0),
(2, 'daimer cuellar ', 0),
(3, 'Adriana penagos', 0),
(4, 'daimer cuellar ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permisos`
--

CREATE TABLE `usuario_permisos` (
  `id` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `permisoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion_red`
--
ALTER TABLE `configuracion_red`
  ADD PRIMARY KEY (`confRedId`);

--
-- Indices de la tabla `copias_seguridad`
--
ALTER TABLE `copias_seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dato`
--
ALTER TABLE `dato`
  ADD PRIMARY KEY (`datoId`);

--
-- Indices de la tabla `dato_general`
--
ALTER TABLE `dato_general`
  ADD PRIMARY KEY (`datoId`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disco_duro`
--
ALTER TABLE `disco_duro`
  ADD PRIMARY KEY (`discoDuroId`);

--
-- Indices de la tabla `disco_duro_conexion`
--
ALTER TABLE `disco_duro_conexion`
  ADD PRIMARY KEY (`conexiondiscoduro_id`);

--
-- Indices de la tabla `disco_duro_marca`
--
ALTER TABLE `disco_duro_marca`
  ADD PRIMARY KEY (`marcasdiscoduro_id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`equipoId`);

--
-- Indices de la tabla `equipo_adquisicion`
--
ALTER TABLE `equipo_adquisicion`
  ADD PRIMARY KEY (`adquisicionId`);

--
-- Indices de la tabla `equipo_marca`
--
ALTER TABLE `equipo_marca`
  ADD PRIMARY KEY (`marcaId`);

--
-- Indices de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  ADD PRIMARY KEY (`modeloId`);

--
-- Indices de la tabla `equipo_tipo`
--
ALTER TABLE `equipo_tipo`
  ADD PRIMARY KEY (`tipoId`);

--
-- Indices de la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresora_red`
--
ALTER TABLE `impresora_red`
  ADD PRIMARY KEY (`redimpr_id`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`mantId`);

--
-- Indices de la tabla `mantenimiento_tipo`
--
ALTER TABLE `mantenimiento_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `montr_tecnologia`
--
ALTER TABLE `montr_tecnologia`
  ADD PRIMARY KEY (`tecnologiaId`);

--
-- Indices de la tabla `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`mouseId`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`municipioId`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `prcsdor_arquitecura`
--
ALTER TABLE `prcsdor_arquitecura`
  ADD PRIMARY KEY (`arquitecturaId`);

--
-- Indices de la tabla `prcsdor_marca`
--
ALTER TABLE `prcsdor_marca`
  ADD PRIMARY KEY (`marcaId`);

--
-- Indices de la tabla `prcsdor_tecnologia`
--
ALTER TABLE `prcsdor_tecnologia`
  ADD PRIMARY KEY (`tecnologiaId`);

--
-- Indices de la tabla `procesador`
--
ALTER TABLE `procesador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`ramId`);

--
-- Indices de la tabla `ram_marca`
--
ALTER TABLE `ram_marca`
  ADD PRIMARY KEY (`marcaId`);

--
-- Indices de la tabla `ram_tecnologia`
--
ALTER TABLE `ram_tecnologia`
  ADD PRIMARY KEY (`tecnologiaId`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`responsId`),
  ADD UNIQUE KEY `emailRespons` (`emailRespons`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`sedeId`);

--
-- Indices de la tabla `sede_dependencia`
--
ALTER TABLE `sede_dependencia`
  ADD PRIMARY KEY (`dependenciaId`);

--
-- Indices de la tabla `sftw_conexion`
--
ALTER TABLE `sftw_conexion`
  ADD PRIMARY KEY (`conexionsftwr_id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`softwareId`);

--
-- Indices de la tabla `software_antivirus`
--
ALTER TABLE `software_antivirus`
  ADD PRIMARY KEY (`antvrus_sftware_id`);

--
-- Indices de la tabla `software_arquitectura`
--
ALTER TABLE `software_arquitectura`
  ADD PRIMARY KEY (`arqtra_sftware_id`);

--
-- Indices de la tabla `software_red`
--
ALTER TABLE `software_red`
  ADD PRIMARY KEY (`redId`);

--
-- Indices de la tabla `tarjetas_expansion`
--
ALTER TABLE `tarjetas_expansion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta_e_tipo`
--
ALTER TABLE `tarjeta_e_tipo`
  ADD PRIMARY KEY (`tarjetaId`);

--
-- Indices de la tabla `teclado`
--
ALTER TABLE `teclado`
  ADD PRIMARY KEY (`tecladoId`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`tecnicoId`);

--
-- Indices de la tabla `tipo_entrada`
--
ALTER TABLE `tipo_entrada`
  ADD PRIMARY KEY (`entradaId`);

--
-- Indices de la tabla `tip_red`
--
ALTER TABLE `tip_red`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `torre`
--
ALTER TABLE `torre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion_actual`
--
ALTER TABLE `ubicacion_actual`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_optica`
--
ALTER TABLE `unidad_optica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_optica_conexion`
--
ALTER TABLE `unidad_optica_conexion`
  ADD PRIMARY KEY (`conexuoptica_id`);

--
-- Indices de la tabla `unidad_optica_marca`
--
ALTER TABLE `unidad_optica_marca`
  ADD PRIMARY KEY (`marcasuoptica_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuId`);

--
-- Indices de la tabla `usuario_permisos`
--
ALTER TABLE `usuario_permisos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion_red`
--
ALTER TABLE `configuracion_red`
  MODIFY `confRedId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `copias_seguridad`
--
ALTER TABLE `copias_seguridad`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `datoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dato_general`
--
ALTER TABLE `dato_general`
  MODIFY `datoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `disco_duro`
--
ALTER TABLE `disco_duro`
  MODIFY `discoDuroId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `disco_duro_conexion`
--
ALTER TABLE `disco_duro_conexion`
  MODIFY `conexiondiscoduro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `disco_duro_marca`
--
ALTER TABLE `disco_duro_marca`
  MODIFY `marcasdiscoduro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `equipoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipo_adquisicion`
--
ALTER TABLE `equipo_adquisicion`
  MODIFY `adquisicionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `equipo_marca`
--
ALTER TABLE `equipo_marca`
  MODIFY `marcaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `equipo_modelo`
--
ALTER TABLE `equipo_modelo`
  MODIFY `modeloId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `equipo_tipo`
--
ALTER TABLE `equipo_tipo`
  MODIFY `tipoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `hardware`
--
ALTER TABLE `hardware`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `impresora_red`
--
ALTER TABLE `impresora_red`
  MODIFY `redimpr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `mantId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantenimiento_tipo`
--
ALTER TABLE `mantenimiento_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `montr_tecnologia`
--
ALTER TABLE `montr_tecnologia`
  MODIFY `tecnologiaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mouse`
--
ALTER TABLE `mouse`
  MODIFY `mouseId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `municipioId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `prcsdor_arquitecura`
--
ALTER TABLE `prcsdor_arquitecura`
  MODIFY `arquitecturaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prcsdor_marca`
--
ALTER TABLE `prcsdor_marca`
  MODIFY `marcaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prcsdor_tecnologia`
--
ALTER TABLE `prcsdor_tecnologia`
  MODIFY `tecnologiaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `procesador`
--
ALTER TABLE `procesador`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ram`
--
ALTER TABLE `ram`
  MODIFY `ramId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ram_marca`
--
ALTER TABLE `ram_marca`
  MODIFY `marcaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ram_tecnologia`
--
ALTER TABLE `ram_tecnologia`
  MODIFY `tecnologiaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `responsId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `sedeId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sede_dependencia`
--
ALTER TABLE `sede_dependencia`
  MODIFY `dependenciaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `sftw_conexion`
--
ALTER TABLE `sftw_conexion`
  MODIFY `conexionsftwr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `softwareId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `software_antivirus`
--
ALTER TABLE `software_antivirus`
  MODIFY `antvrus_sftware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `software_arquitectura`
--
ALTER TABLE `software_arquitectura`
  MODIFY `arqtra_sftware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `software_red`
--
ALTER TABLE `software_red`
  MODIFY `redId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjetas_expansion`
--
ALTER TABLE `tarjetas_expansion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `tarjeta_e_tipo`
--
ALTER TABLE `tarjeta_e_tipo`
  MODIFY `tarjetaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `teclado`
--
ALTER TABLE `teclado`
  MODIFY `tecladoId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `tecnicoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_entrada`
--
ALTER TABLE `tipo_entrada`
  MODIFY `entradaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tip_red`
--
ALTER TABLE `tip_red`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `torre`
--
ALTER TABLE `torre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicacion_actual`
--
ALTER TABLE `ubicacion_actual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad_optica`
--
ALTER TABLE `unidad_optica`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad_optica_conexion`
--
ALTER TABLE `unidad_optica_conexion`
  MODIFY `conexuoptica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidad_optica_marca`
--
ALTER TABLE `unidad_optica_marca`
  MODIFY `marcasuoptica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario_permisos`
--
ALTER TABLE `usuario_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
