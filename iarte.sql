-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2017 a las 22:15:42
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iarte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_muerte` date DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci,
  `biografia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `pais_nacimiento_id` int(10) UNSIGNED NOT NULL,
  `pais_muerte_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `portada` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1.jpg',
  `bg_biografia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '42.jpg',
  `bg_habilidades` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10.jpg',
  `visitas` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `fecha_nacimiento`, `fecha_muerte`, `telefono`, `direccion`, `biografia`, `status_id`, `genero_id`, `pais_nacimiento_id`, `pais_muerte_id`, `tipo`, `foto`, `portada`, `bg_biografia`, `bg_habilidades`, `visitas`, `created_at`, `updated_at`) VALUES
(1, 'michael rondon', '1993-02-27', '1969-12-31', NULL, NULL, '<p><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: normal; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique vitae metus vitae varius. Ut semper sem ut ligula sollicitudin rhoncus. Etiam dictum augue at dui dictum aliquam. Integer blandit id nibh mattis commodo. Proin tristique nisi at libero pellentesque pharetra. Nulla ligula lorem, porttitor vitae maximus sit amet, pellentesque eget urna. Donec elementum pulvinar dolor non euismod. Proin nec metus dui. Sed eget lacinia urna. Phasellus sed risus bibendum, cursus nunc vitae, laoreet orci. Etiam dolor tellus, cursus vel ipsum ut, scelerisque posuere ligula. Suspendisse id lobortis lacus. Morbi arcu mi, mattis sit amet blandit sed, volutpat ac nulla. Sed vel ligula posuere, pulvinar ex non, varius augue. Nullam lacinia blandit rutrum. Morbi venenatis sodales lacus ut feugiat.</span></p>', 4, 2, 190, NULL, '0', '1/1505938071.jpeg', '1/1507210222.jpg', '1/1507039919.jpg', '10.jpg', 1242, '2017-09-20 20:07:51', '2017-10-04 20:26:46'),
(2, 'daniel pereira', '1993-02-27', '1969-12-31', NULL, NULL, '<p><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: normal; text-align: justify;">Pellentesque consectetur orci id arcu ornare sodales. In vehicula in erat a dictum. Suspendisse sit amet eleifend tellus. Nunc a dolor arcu. Integer lobortis ante ac justo ornare convallis. Nunc venenatis lorem quis lacus consectetur rhoncus. Mauris mollis dapibus odio et rutrum. Vivamus at porta purus. Donec non velit convallis tellus euismod pulvinar eu eget sem. Praesent gravida non urna ut pulvinar. Mauris eget nisl pulvinar enim vulputate pretium eu et nulla. Integer ligula diam, rutrum quis ullamcorper id, aliquet nec sem. Proin sed scelerisque felis. Suspendisse rutrum metus tortor, sit amet pretium arcu suscipit sed.</span></p>', 4, 2, 190, NULL, '0', 'default.png', '2/1507036251.png', '42.jpg', '10.jpg', 0, '2017-09-29 18:49:01', '2017-09-29 18:49:01'),
(4, 'david rondon', '1996-10-25', '1969-12-31', NULL, NULL, 'ffasfasfas', 4, 2, 190, NULL, '0', '4/1507061591.png', '1.jpg', '42.jpg', '10.jpg', 0, '2017-10-03 20:13:11', '2017-10-03 20:13:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo`
--

CREATE TABLE `artista_catalogo` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `artista_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo`
--

INSERT INTO `artista_catalogo` (`id`, `titulo`, `descripcion`, `visitas`, `artista_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', 'p{p{jhjtjgn&nbsp; d lonj s0iopmposdmpom posdmop mdopsmfpomgpomsdopmgopd mspom gopdmopm pom gpomspomg pomgopms dopmos´m´gs m´p gshfshsgh', 0, 1, 3, '2017-10-04 20:28:52', '2017-10-05 18:04:48'),
(2, 'dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '<p>b fnsadkj nm,dasmdv jkvndm,s dmsvkdsnmds,mdas vkxmd,sp´da kvjxdm,od apskflvjxlmo,dposk cvlxco,cd csklvxcmv,ocvl cxkmvocpk cjxvkmovpsakl</p>', 0, 1, 3, '2017-10-04 20:32:27', '2017-10-04 20:32:27'),
(3, 'gsgsgsdgsdgsdg', '<p>b fnsadkj nm,dasmdv jkvndm,s dmsvkdsnmds,mdas vkxmd,sp´da kvjxdm,od apskflvjxlmo,dposk cvlxco,cd csklvxcmv,ocvl cxkmvocpk cjxvkmovpsakl</p>', 0, 1, 3, '2017-10-05 14:55:20', '2017-10-05 14:55:20'),
(5, 'fddfhdfg gdfsdf s', '<p>b fnsadkj nm,dasmdv jkvndm,s dmsvkdsnmds,mdas vkxmd,sp´da kvjxdm,od apskflvjxlmo,dposk cvlxco,cd csklvxcmv,ocvl cxkmvocpk cjxvkmovpsakl</p>', 0, 1, 3, '2017-10-05 15:14:36', '2017-10-05 15:14:36'),
(6, 'hdjfdjdgjdgj', '<p>b fnsadkj nm,dasmdv jkvndm,s dmsvkdsnmds,mdas vkxmd,sp´da kvjxdm,od apskflvjxlmo,dposk cvlxco,cd csklvxcmv,ocvl cxkmvocpk cjxvkmovpsakl</p>', 0, 1, 3, '2017-10-05 15:17:07', '2017-10-05 15:17:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo_disciplina`
--

CREATE TABLE `artista_catalogo_disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_catalogo_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo_disciplina`
--

INSERT INTO `artista_catalogo_disciplina` (`id`, `artista_catalogo_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 2, 7, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 3, 3, NULL, NULL),
(7, 5, 2, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 6, 3, NULL, NULL),
(11, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_catalogo_imagen`
--

CREATE TABLE `artista_catalogo_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `artista_catalogo_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_catalogo_imagen`
--

INSERT INTO `artista_catalogo_imagen` (`id`, `imagen`, `nombre`, `descripcion`, `artista_catalogo_id`, `status_id`, `created_at`, `updated_at`) VALUES
(2, '1/catalogo/2/1507233214.jpg', 'aaaaaaaaaaa', 'jhgj', 2, 3, '2017-10-05 19:53:34', '2017-10-05 19:53:34'),
(3, '1/catalogo/2/1507233301.png', 'bbbbbbbbbbb', '', 2, 3, '2017-10-05 19:55:01', '2017-10-05 19:55:01'),
(5, '1/catalogo/2/1507304823.jpg', 'fhfghffhhgf', NULL, 2, 3, '2017-10-06 15:47:03', '2017-10-06 15:47:03'),
(6, '1/catalogo/2/1507304840.jpeg', 'uiyiyukuyk', NULL, 2, 3, '2017-10-06 15:47:20', '2017-10-06 15:47:20'),
(7, '1/catalogo/1/1507305373.jpg', 'fffeerfr', NULL, 1, 3, '2017-10-06 15:56:13', '2017-10-06 15:56:13'),
(8, '1/catalogo/3/1507305394.jpeg', 'ggrg', NULL, 3, 3, '2017-10-06 15:56:34', '2017-10-06 15:56:34'),
(9, '1/catalogo/5/1507305420.jpg', 'frefre', NULL, 5, 3, '2017-10-06 15:57:00', '2017-10-06 15:57:00'),
(10, '1/catalogo/6/1507305437.jpg', 'freferfre', NULL, 6, 3, '2017-10-06 15:57:17', '2017-10-06 15:57:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_disciplina`
--

CREATE TABLE `artista_disciplina` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `disciplina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_disciplina`
--

INSERT INTO `artista_disciplina` (`id`, `artista_id`, `disciplina_id`, `created_at`, `updated_at`) VALUES
(3, 2, 7, NULL, NULL),
(4, 2, 4, NULL, NULL),
(7, 4, 7, NULL, NULL),
(8, 4, 3, NULL, NULL),
(10, 1, 7, NULL, NULL),
(11, 1, 3, NULL, NULL),
(12, 1, 5, NULL, NULL),
(13, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_profesion`
--

CREATE TABLE `artista_profesion` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `profesion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_profesion`
--

INSERT INTO `artista_profesion` (`id`, `artista_id`, `profesion_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(4, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_red_social`
--

CREATE TABLE `artista_red_social` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `red_social_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista_user`
--

CREATE TABLE `artista_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `artista_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artista_user`
--

INSERT INTO `artista_user` (`id`, `artista_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2017-09-27 15:27:06', '2017-09-27 15:27:06'),
(3, 1, 2, NULL, NULL),
(4, 1, 3, NULL, NULL),
(5, 2, 1, NULL, NULL),
(7, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `disciplina` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `disciplina`, `created_at`, `updated_at`) VALUES
(1, 'plastilina', '2017-09-20 19:34:46', '2017-09-20 19:34:46'),
(2, 'arcilla', '2017-09-20 19:35:10', '2017-09-20 19:35:10'),
(3, 'graffiti', '2017-09-20 19:35:14', '2017-09-20 19:35:14'),
(4, 'musica', '2017-09-22 13:25:39', '2017-09-22 13:25:39'),
(5, 'instrumentos', '2017-09-22 13:26:36', '2017-09-22 13:26:36'),
(7, 'escultura', '2017-09-22 13:43:25', '2017-09-22 13:43:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `etiqueta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `etiqueta`, `created_at`, `updated_at`) VALUES
(1, 'sucesos', '2017-09-25 13:45:30', '2017-09-25 13:45:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`, `created_at`, `updated_at`) VALUES
(1, 'Femenino', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(2, 'Masculino', '2017-09-20 13:21:33', '2017-09-20 13:21:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `icons`
--

INSERT INTO `icons` (`id`, `icon`, `name`, `created_at`, `updated_at`) VALUES
(1, '<i class="fa fa-dropbox" aria-hidden="true"></i>', 'dropbox', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(2, '<i class="fa fa-drupal" aria-hidden="true"></i>', 'drupal', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(3, '<i class="fa fa-facebook" aria-hidden="true"></i>', 'facebook', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(4, '<i class="fa fa-facebook-f" aria-hidden="true"></i>', 'facebook-f', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(5, '<i class="fa fa-facebook-official" aria-hidden="true"></i>', 'facebook-official', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(6, '<i class="fa fa-facebook-square" aria-hidden="true"></i>', 'facebook-square', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(7, '<i class="fa fa-foursquare" aria-hidden="true"></i>', 'foursquare', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(8, '<i class="fa fa-google" aria-hidden="true"></i>', 'google', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(9, '<i class="fa fa-google-plus" aria-hidden="true"></i>', 'google-plus', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(10, '<i class="fa fa-google-plus-official" aria-hidden="true"></i>', 'google-plus-official', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(11, '<i class="fa fa-google-plus-square" aria-hidden="true"></i>', 'google-plus-square', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(12, '<i class="fa fa-instagram" aria-hidden="true"></i>', 'instagram', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(13, '<i class="fa fa-linkedin" aria-hidden="true"></i>', 'linkedin', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(14, '<i class="fa fa-linkedin-square" aria-hidden="true"></i>', 'linkedin-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(15, '<i class="fa fa-pinterest" aria-hidden="true"></i>', 'pinterest', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(16, '<i class="fa fa-pinterest-p" aria-hidden="true"></i>', 'pinterest-p', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(17, '<i class="fa fa-reddit" aria-hidden="true"></i>', 'reddit', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(18, '<i class="fa fa-reddit-alien" aria-hidden="true"></i>', 'reddit-alien', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(19, '<i class="fa fa-reddit-square" aria-hidden="true"></i>', 'reddit-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(20, '<i class="fa fa-skype" aria-hidden="true"></i>', 'skype', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(21, '<i class="fa fa-snapchat" aria-hidden="true"></i>', 'snapchat', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(22, '<i class="fa fa-snapchat-ghost" aria-hidden="true"></i>', 'snapchat-ghost', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(23, '<i class="fa fa-snapchat-square" aria-hidden="true"></i>', 'snapchat-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(24, '<i class="fa fa-telegram" aria-hidden="true"></i>', 'telegram', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(25, '<i class="fa fa-tumblr" aria-hidden="true"></i>', 'tumblr', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(26, '<i class="fa fa-tumblr-square" aria-hidden="true"></i>', 'tumblr-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(27, '<i class="fa fa-twitter" aria-hidden="true"></i>', 'twitter', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(28, '<i class="fa fa-twitter-square" aria-hidden="true"></i>', 'twitter-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(29, '<i class="fa fa-vimeo" aria-hidden="true"></i>', 'vimeo', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(30, '<i class="fa fa-vimeo-square" aria-hidden="true"></i>', 'vimeo-square', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(31, '<i class="fa fa-vine" aria-hidden="true"></i>', 'vine', '2017-09-20 13:21:42', '2017-09-20 13:21:42'),
(32, '<i class="fa fa-vk" aria-hidden="true"></i>', 'vk', '2017-09-20 13:21:43', '2017-09-20 13:21:43'),
(33, '<i class="fa fa-whatsapp" aria-hidden="true"></i>', 'whatsapp', '2017-09-20 13:21:43', '2017-09-20 13:21:43'),
(34, '<i class="fa fa-youtube" aria-hidden="true"></i>', 'youtube', '2017-09-20 13:21:43', '2017-09-20 13:21:43'),
(35, '<i class="fa fa-youtube-play" aria-hidden="true"></i>', 'youtube-play', '2017-09-20 13:21:43', '2017-09-20 13:21:43'),
(36, '<i class="fa fa-youtube-square" aria-hidden="true"></i>', 'youtube-square', '2017-09-20 13:21:43', '2017-09-20 13:21:43');

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
(15, '2014_05_21_173602_CreateStatusTable', 1),
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2017_05_21_173823_CreatePerfilesTable', 1),
(19, '2017_05_21_175216_CreatePaisesTable', 1),
(20, '2017_05_21_175516_CreateGenerosTable', 1),
(21, '2017_05_21_180051_CreateArtistasTable', 1),
(22, '2017_05_21_181730_CreateProfesionesTable', 1),
(23, '2017_05_29_172205_CreateDisciplinaTable', 1),
(24, '2017_05_29_184802_CreateIconsTable', 1),
(25, '2017_05_30_182715_CreateRedesSocialesTable', 1),
(26, '2017_07_06_210344_CreateEtiquetasTable', 1),
(27, '2017_08_28_105300_CreateRegistrosEventosTable', 1),
(28, '2017_09_19_145957_CreateTiposMuseos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(2, 'Albania', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(3, 'Alemania', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(4, 'Andorra', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(5, 'Angola', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(6, 'Antigua y Barbuda', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(7, 'Arabia Saudita', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(8, 'Argelia', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(9, 'Argentina', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(10, 'Armenia', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(11, 'Australia', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(12, 'Austria', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(13, 'Azerbaiyán', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(14, 'Bahamas', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(15, 'Bahrein', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(16, 'Bangladesh', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(17, 'Barbados', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(18, 'Bélgica', '2017-09-20 13:21:33', '2017-09-20 13:21:33'),
(19, 'Belice', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(20, 'Bielorrusia', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(21, 'Benín', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(22, 'Birmania', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(23, 'Bolivia', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(24, 'Bosnia', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(25, 'Botsuana', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(26, 'Brasil', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(27, 'Brunéi', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(28, 'Bulgaria', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(29, 'Burkina Faso', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(30, 'Burundi', '2017-09-20 13:21:34', '2017-09-20 13:21:34'),
(31, 'Bután', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(32, 'Cabo Verde', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(33, 'Camboya', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(34, 'Camerún', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(35, 'Canadá', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(36, 'Catar', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(37, 'República Centroafricana', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(38, 'Chad', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(39, 'República Checa', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(40, 'Chile', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(41, 'China', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(42, 'Chipre', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(43, 'Colombia', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(44, 'Comoras', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(45, 'República del Congo', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(46, 'República Democrática del Congo', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(47, 'Corea del Norte', '2017-09-20 13:21:35', '2017-09-20 13:21:35'),
(48, 'Corea del Sur', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(49, 'Costa de Marfil', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(50, 'Costa Rica', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(51, 'Croacia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(52, 'Cuba', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(53, 'Dinamarca', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(54, 'Dominica', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(55, 'República Dominicana', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(56, 'Ecuador', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(57, 'Egipto', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(58, 'El Salvador', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(59, 'Emiratos Árabes Unidos', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(60, 'Eritrea', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(61, 'Eslovaquia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(62, 'Eslovenia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(63, 'España', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(64, 'Estados Unidos', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(65, 'Estonia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(66, 'Etiopía', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(67, 'Filipinas', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(68, 'Finlandia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(69, 'Fiyi', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(70, 'Francia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(71, 'Gabón', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(72, 'Gambia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(73, 'Georgia', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(74, 'Ghana', '2017-09-20 13:21:36', '2017-09-20 13:21:36'),
(75, 'Granada', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(76, 'Grecia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(77, 'Guatemala', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(78, 'Guinea', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(79, 'Guinea-Bisáu', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(80, 'Guinea Ecuatorial', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(81, 'Guyana', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(82, 'Haití', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(83, 'Honduras', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(84, 'Hungría', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(85, 'India', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(86, 'Indonesia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(87, 'Irak', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(88, 'Irán', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(89, 'Irlanda', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(90, 'Islandia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(91, 'Israel', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(92, 'Italia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(93, 'Jamaica', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(94, 'Japón', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(95, 'Jordania', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(96, 'Kazajistán', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(97, 'Kenia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(98, 'Kirguistán', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(99, 'Kiribati', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(100, 'Kuwait', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(101, 'Laos', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(102, 'Lesoto', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(103, 'Letonia', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(104, 'Líbano', '2017-09-20 13:21:37', '2017-09-20 13:21:37'),
(105, 'Liberia', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(106, 'Libia', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(107, 'Liechtenstein', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(108, 'Lituania', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(109, 'Luxemburgo', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(110, 'Macedonia ', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(111, 'Madagascar', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(112, 'Malasia', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(113, 'Malaui', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(114, 'Maldivas', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(115, 'Malí', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(116, 'Malta', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(117, 'Marruecos', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(118, 'Islas Marshall', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(119, 'Mauricio', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(120, 'Mauritania', '2017-09-20 13:21:38', '2017-09-20 13:21:38'),
(121, 'México', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(122, 'Micronesia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(123, 'Moldavia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(124, 'Mónaco', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(125, 'Mongolia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(126, 'Montenegro', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(127, 'Mozambique', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(128, 'Namibia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(129, 'Nauru', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(130, 'Nepal', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(131, 'Nicaragua', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(132, 'Níger', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(133, 'Nigeria', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(134, 'Noruega', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(135, 'Nueva Zelanda', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(136, 'Omán', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(137, 'Países Bajos', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(138, 'Pakistán', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(139, 'Palaos', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(140, 'Palestina', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(141, 'Panamá', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(142, 'Papúa Nueva Guinea', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(143, 'Paraguay', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(144, 'Perú', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(145, 'Polonia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(146, 'Portugal', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(147, 'Reino Unido', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(148, 'Ruanda', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(149, 'Rumania', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(150, 'Rusia', '2017-09-20 13:21:39', '2017-09-20 13:21:39'),
(151, 'Islas Salomón', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(152, 'Samoa', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(153, 'San Cristóbal y Nieves', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(154, 'San Marino', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(155, 'San Vicente y las Granadinas', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(156, 'Santa Lucía', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(157, 'Santo Tomé y Príncipe', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(158, 'Senegal', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(159, 'Serbia', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(160, 'Seychelles', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(161, 'Sierra Leona', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(162, 'Singapur', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(163, 'Siria', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(164, 'Somalia', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(165, 'Sri Lanka', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(166, 'Suazilandia', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(167, 'Sudáfrica', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(168, 'Sudán', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(169, 'Sudán del sur', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(170, 'Suecia', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(171, 'Suiza', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(172, 'Surinam', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(173, 'Tailandia', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(174, 'Tanzania', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(175, 'Tayikistán', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(176, 'Timor Oriental', '2017-09-20 13:21:40', '2017-09-20 13:21:40'),
(177, 'Togo', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(178, 'Tonga', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(179, 'Trinidad y Tobago', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(180, 'Túnez', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(181, 'Turkmenistán', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(182, 'Turquía', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(183, 'Tuvalu', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(184, 'Ucrania', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(185, 'Uganda', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(186, 'Uruguay', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(187, 'Uzbekistán', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(188, 'Vanuatu', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(189, 'Vaticano', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(190, 'Venezuela', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(191, 'Vietnam', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(192, 'Yemen', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(193, 'Yibuti', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(194, 'Zambia', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(195, 'Zimbabue', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(196, 'Kosovo', '2017-09-20 13:21:41', '2017-09-20 13:21:41'),
(197, 'Taiwán', '2017-09-20 13:21:41', '2017-09-20 13:21:41');

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
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `perfil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `perfil`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(2, 'Artista', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(3, 'Auditor', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(4, 'Publicista', '2017-09-20 13:21:32', '2017-09-20 13:21:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_user`
--

CREATE TABLE `perfil_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `perfil_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfil_user`
--

INSERT INTO `perfil_user` (`id`, `user_id`, `perfil_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `profesion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `profesion`, `created_at`, `updated_at`) VALUES
(1, 'Pintor', '2017-09-20 19:58:49', '2017-09-20 19:58:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id` int(10) UNSIGNED NOT NULL,
  `red_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id`, `red_social`, `icon_id`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 5, '2017-09-25 14:54:41', '2017-09-25 14:54:41'),
(2, 'instagram', 12, '2017-09-25 18:42:35', '2017-09-25 18:42:35'),
(3, 'twitter', 27, '2017-09-25 19:07:12', '2017-09-25 19:07:12'),
(4, 'youtube', 34, '2017-09-25 19:07:22', '2017-09-25 19:07:22'),
(5, 'vine', 31, '2017-09-25 20:02:23', '2017-09-25 20:02:23'),
(7, 'google', 8, '2017-09-25 20:15:01', '2017-09-25 20:15:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`id`, `evento`, `ip`, `operacion`, `usuario`, `created_at`, `updated_at`) VALUES
(1, 'Creo el tipo de museo arte', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:25:42', '2017-09-20 13:25:42'),
(2, 'Creo el tipo de museo antropologico', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:25:50', '2017-09-20 13:25:50'),
(3, 'Creo el tipo de museo historia', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:25:58', '2017-09-20 13:25:58'),
(4, 'Creo el tipo de museo ciencias', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:26:02', '2017-09-20 13:26:02'),
(5, 'Creo el tipo de museo tecnologia', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:26:05', '2017-09-20 13:26:05'),
(6, 'Creo el tipo de museo deporte', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:44:15', '2017-09-20 13:44:15'),
(7, 'Creo el tipo de museo musica', '192.168.9.25', 'INSERT', '1', '2017-09-20 13:53:33', '2017-09-20 13:53:33'),
(8, 'Edito el tipo de museo historia', '192.168.9.25', 'UPDATE', '1', '2017-09-20 14:19:00', '2017-09-20 14:19:00'),
(9, 'Edito el tipo de museo antropologico', '192.168.9.25', 'UPDATE', '1', '2017-09-20 14:19:51', '2017-09-20 14:19:51'),
(10, 'Edito el tipo de museo lil uzi vert', '192.168.9.25', 'UPDATE', '1', '2017-09-20 14:20:07', '2017-09-20 14:20:07'),
(11, 'Edito el tipo de museo antropologico', '192.168.9.25', 'UPDATE', '1', '2017-09-20 14:20:16', '2017-09-20 14:20:16'),
(12, 'Creo el tipo de museo trap niggas', '192.168.9.25', 'INSERT', '1', '2017-09-20 14:27:39', '2017-09-20 14:27:39'),
(13, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 14:29:12', '2017-09-20 14:29:12'),
(14, 'Creo el tipo de museo trap niggas', '192.168.9.25', 'INSERT', '1', '2017-09-20 14:47:49', '2017-09-20 14:47:49'),
(15, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 14:47:53', '2017-09-20 14:47:53'),
(16, 'Creo el tipo de museo trap niggas', '192.168.9.45', 'INSERT', '1', '2017-09-20 14:53:49', '2017-09-20 14:53:49'),
(17, 'Edito el tipo de museo trap niggas brandon', '192.168.9.45', 'UPDATE', '1', '2017-09-20 14:54:04', '2017-09-20 14:54:04'),
(18, 'Edito el tipo de museo trap niggas brandons', '192.168.9.45', 'UPDATE', '1', '2017-09-20 14:54:17', '2017-09-20 14:54:17'),
(19, 'Elimino el tipo de museo ', '192.168.9.45', 'DELETE', '1', '2017-09-20 14:54:26', '2017-09-20 14:54:26'),
(20, 'Creo el tipo de museo brandon', '192.168.9.45', 'INSERT', '1', '2017-09-20 14:55:17', '2017-09-20 14:55:17'),
(21, 'Edito el tipo de museo brandons', '192.168.9.45', 'UPDATE', '1', '2017-09-20 14:56:18', '2017-09-20 14:56:18'),
(22, 'Edito el tipo de museo brandons', '192.168.9.45', 'UPDATE', '1', '2017-09-20 14:56:29', '2017-09-20 14:56:29'),
(23, 'Elimino el tipo de museo ', '192.168.9.45', 'DELETE', '1', '2017-09-20 14:56:40', '2017-09-20 14:56:40'),
(24, 'Creo el tipo de museo trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 15:42:35', '2017-09-20 15:42:35'),
(25, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 15:42:40', '2017-09-20 15:42:40'),
(26, 'Creo el tipo de museo trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 15:43:06', '2017-09-20 15:43:06'),
(27, 'Edito el tipo de museo trap', '192.168.9.25', 'UPDATE', '1', '2017-09-20 15:48:03', '2017-09-20 15:48:03'),
(28, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 15:48:10', '2017-09-20 15:48:10'),
(29, 'Creo el tipo de museo trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 15:52:28', '2017-09-20 15:52:28'),
(30, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 15:52:38', '2017-09-20 15:52:38'),
(31, 'Creo el tipo de museo trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 18:04:28', '2017-09-20 18:04:28'),
(32, 'Edito el tipo de museo trap', '192.168.9.25', 'UPDATE', '1', '2017-09-20 18:04:39', '2017-09-20 18:04:39'),
(33, 'Elimino el tipo de museo ', '192.168.9.25', 'DELETE', '1', '2017-09-20 18:04:42', '2017-09-20 18:04:42'),
(34, 'Creo la disciplina plastilina', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:34:46', '2017-09-20 19:34:46'),
(35, 'Creo la disciplina arcilla', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:35:10', '2017-09-20 19:35:10'),
(36, 'Creo la disciplina graffiti', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:35:14', '2017-09-20 19:35:14'),
(37, 'Creo la disciplina trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:35:25', '2017-09-20 19:35:25'),
(38, 'Edito la disciplina preveral', '192.168.9.25', 'UPDATE', '1', '2017-09-20 19:36:29', '2017-09-20 19:36:29'),
(39, 'Elimino la disciplina preveral', '192.168.9.25', 'DELETE', '1', '2017-09-20 19:36:57', '2017-09-20 19:36:57'),
(40, 'Creo la disciplina trap', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:40:21', '2017-09-20 19:40:21'),
(41, 'Elimino la disciplina trap', '192.168.9.25', 'DELETE', '1', '2017-09-20 19:40:24', '2017-09-20 19:40:24'),
(42, 'Creo el país aaaaaaa', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:57:08', '2017-09-20 19:57:08'),
(43, 'Edito el país aaaaaaabbbb', '192.168.9.25', 'UPDATE', '1', '2017-09-20 19:57:14', '2017-09-20 19:57:14'),
(44, 'Elimino el país aaaaaaabbbb', '192.168.9.25', 'DELETE', '1', '2017-09-20 19:57:21', '2017-09-20 19:57:21'),
(45, 'Creo el país aaaaaaaa', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:57:30', '2017-09-20 19:57:30'),
(46, 'Elimino el país aaaaaaaa', '192.168.9.25', 'DELETE', '1', '2017-09-20 19:57:39', '2017-09-20 19:57:39'),
(47, 'Edito el país Armenia', '192.168.9.25', 'UPDATE', '1', '2017-09-20 19:57:47', '2017-09-20 19:57:47'),
(48, 'Creo el profesión Pintor', '192.168.9.25', 'INSERT', '1', '2017-09-20 19:58:49', '2017-09-20 19:58:49'),
(49, 'Creo el artista michael rondon', '192.168.9.25', 'INSERT', '1', '2017-09-20 20:07:51', '2017-09-20 20:07:51'),
(50, 'Creo la disciplina musica', '192.168.9.25', 'INSERT', '1', '2017-09-22 13:25:40', '2017-09-22 13:25:40'),
(51, 'Creo la disciplina instrumentos', '192.168.9.25', 'INSERT', '1', '2017-09-22 13:26:36', '2017-09-22 13:26:36'),
(52, 'Creo la disciplina cantante', '192.168.9.25', 'INSERT', '1', '2017-09-22 13:42:42', '2017-09-22 13:42:42'),
(53, 'Creo la disciplina escultura', '192.168.9.25', 'INSERT', '1', '2017-09-22 13:43:25', '2017-09-22 13:43:25'),
(54, 'Creo la disciplina iksafdefdas', '192.168.9.25', 'INSERT', '1', '2017-09-22 13:43:59', '2017-09-22 13:43:59'),
(55, 'Creo la disciplina jytjhytjjyjyt', '192.168.9.25', 'INSERT', '1', '2017-09-22 14:57:07', '2017-09-22 14:57:07'),
(56, 'Creo la disciplina kkiukiukiukiu', '192.168.9.25', 'INSERT', '1', '2017-09-22 14:58:15', '2017-09-22 14:58:15'),
(57, 'Creo la disciplina lil uzi vert', '192.168.9.25', 'INSERT', '1', '2017-09-22 15:24:38', '2017-09-22 15:24:38'),
(58, 'Creo la disciplina bfbfdbdfb', '192.168.9.25', 'INSERT', '1', '2017-09-22 18:36:55', '2017-09-22 18:36:55'),
(59, 'Creo la disciplina bfbfdbdfbutyuytutyu', '192.168.9.25', 'INSERT', '1', '2017-09-22 18:37:07', '2017-09-22 18:37:07'),
(60, 'Edito la disciplina bfbfdbdfb', '192.168.9.25', 'UPDATE', '1', '2017-09-22 19:43:59', '2017-09-22 19:43:59'),
(61, 'Edito la disciplina bfbfdbdfb', '192.168.9.25', 'UPDATE', '1', '2017-09-22 19:44:22', '2017-09-22 19:44:22'),
(62, 'Edito la disciplina wfgwegfe', '192.168.9.25', 'UPDATE', '1', '2017-09-22 20:55:44', '2017-09-22 20:55:44'),
(63, 'Elimino la disciplina bfbfdbdfb', '::1', 'DELETE', '1', '2017-09-25 13:41:37', '2017-09-25 13:41:37'),
(64, 'Elimino la disciplina cantante', '::1', 'DELETE', '1', '2017-09-25 13:41:40', '2017-09-25 13:41:40'),
(65, 'Elimino la disciplina wfgwegfe', '::1', 'DELETE', '1', '2017-09-25 13:41:43', '2017-09-25 13:41:43'),
(66, 'Edito el profesión Pintor', '::1', 'UPDATE', '1', '2017-09-25 13:44:33', '2017-09-25 13:44:33'),
(67, 'Creo la etiqueta sucesos', '::1', 'INSERT', '1', '2017-09-25 13:45:30', '2017-09-25 13:45:30'),
(68, 'Creo la red social facebook', '::1', 'INSERT', '1', '2017-09-25 14:54:41', '2017-09-25 14:54:41'),
(69, 'Creo la red social instagram', '::1', 'INSERT', '1', '2017-09-25 18:42:35', '2017-09-25 18:42:35'),
(70, 'Creo la red social twitter', '::1', 'INSERT', '1', '2017-09-25 19:07:12', '2017-09-25 19:07:12'),
(71, 'Creo la red social youtube', '::1', 'INSERT', '1', '2017-09-25 19:07:22', '2017-09-25 19:07:22'),
(72, 'Creo la red social vine', '::1', 'INSERT', '1', '2017-09-25 20:02:23', '2017-09-25 20:02:23'),
(73, 'Creo la red social drupal', '::1', 'INSERT', '1', '2017-09-25 20:13:26', '2017-09-25 20:13:26'),
(74, 'Creo la red social google', '::1', 'INSERT', '1', '2017-09-25 20:15:01', '2017-09-25 20:15:01'),
(75, 'Edito la red social facebook', '::1', 'UPDATE', '1', '2017-09-25 20:18:04', '2017-09-25 20:18:04'),
(76, 'Creo la red social foursquare', '::1', 'INSERT', '1', '2017-09-25 20:26:07', '2017-09-25 20:26:07'),
(77, 'Elimino la red social drupal', '::1', 'DELETE', '1', '2017-09-25 20:28:35', '2017-09-25 20:28:35'),
(78, 'Elimino la red social foursquare', '::1', 'DELETE', '1', '2017-09-25 20:28:39', '2017-09-25 20:28:39'),
(79, 'Creo la disciplina gdsgsdfgdsgds', '::1', 'INSERT', '1', '2017-09-26 12:20:02', '2017-09-26 12:20:02'),
(80, 'Edito la disciplina sdhggnfgngfnfg', '::1', 'UPDATE', '1', '2017-09-26 12:20:09', '2017-09-26 12:20:09'),
(81, 'Elimino la disciplina sdhggnfgngfnfg', '::1', 'DELETE', '1', '2017-09-26 12:20:14', '2017-09-26 12:20:14'),
(82, 'Creo al usuario yperez@gmail.com', '::1', 'INSERT', '1', '2017-09-26 14:15:18', '2017-09-26 14:15:18'),
(83, 'Creo al usuario dpereira@gmail.com', '::1', 'INSERT', '1', '2017-09-26 20:40:16', '2017-09-26 20:40:16'),
(84, 'Edito al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 15:21:14', '2017-09-27 15:21:14'),
(85, 'Edito al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 15:23:12', '2017-09-27 15:23:12'),
(86, 'Edito al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 15:27:01', '2017-09-27 15:27:01'),
(87, 'Edito al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 15:27:06', '2017-09-27 15:27:06'),
(88, 'Bloqueo al usuario dpereira@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:04:02', '2017-09-27 19:04:02'),
(89, 'Bloqueo al usuario yperez@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:04:10', '2017-09-27 19:04:10'),
(90, 'Bloqueo al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:04:15', '2017-09-27 19:04:15'),
(91, 'Desbloqueo al usuario dpereira@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:08:05', '2017-09-27 19:08:05'),
(92, 'Desbloqueo al usuario mrondon72@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:08:08', '2017-09-27 19:08:08'),
(93, 'Desbloqueo al usuario yperez@gmail.com', '::1', 'UPDATE', '1', '2017-09-27 19:08:10', '2017-09-27 19:08:10'),
(94, 'Creo el artista daniel pereira', '192.168.9.25', 'INSERT', '1', '2017-09-29 18:49:01', '2017-09-29 18:49:01'),
(95, 'Creo el artista daniel pereira', '192.168.9.25', 'INSERT', '1', '2017-09-29 18:49:54', '2017-09-29 18:49:54'),
(96, 'Desloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-09-29 19:27:18', '2017-09-29 19:27:18'),
(97, 'Bloqueo al usuario yperez@gmail.com', '192.168.9.25', 'UPDATE', '1', '2017-09-29 19:27:24', '2017-09-29 19:27:24'),
(98, 'Bloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-09-29 19:27:52', '2017-09-29 19:27:52'),
(99, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-02 18:42:17', '2017-10-02 18:42:17'),
(100, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-02 18:43:32', '2017-10-02 18:43:32'),
(101, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:04:29', '2017-10-03 13:04:29'),
(102, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:05:15', '2017-10-03 13:05:15'),
(103, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:05:15', '2017-10-03 13:05:15'),
(104, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:05:27', '2017-10-03 13:05:27'),
(105, 'Edito la foto de la portada del artista daniel pereira', '192.168.9.48', 'UPDATE', '1', '2017-10-03 13:10:51', '2017-10-03 13:10:51'),
(106, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:24:57', '2017-10-03 13:24:57'),
(107, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:27:09', '2017-10-03 13:27:09'),
(108, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:28:11', '2017-10-03 13:28:11'),
(109, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:28:32', '2017-10-03 13:28:32'),
(110, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:28:45', '2017-10-03 13:28:45'),
(111, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:30:36', '2017-10-03 13:30:36'),
(112, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:30:53', '2017-10-03 13:30:53'),
(113, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:31:47', '2017-10-03 13:31:47'),
(114, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:31:58', '2017-10-03 13:31:58'),
(115, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:32:15', '2017-10-03 13:32:15'),
(116, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:33:05', '2017-10-03 13:33:05'),
(117, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:33:15', '2017-10-03 13:33:15'),
(118, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:34:36', '2017-10-03 13:34:36'),
(119, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:35:10', '2017-10-03 13:35:10'),
(120, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:35:59', '2017-10-03 13:35:59'),
(121, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:38:16', '2017-10-03 13:38:16'),
(122, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:38:28', '2017-10-03 13:38:28'),
(123, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 13:38:35', '2017-10-03 13:38:35'),
(124, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:05:13', '2017-10-03 14:05:13'),
(125, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:07:43', '2017-10-03 14:07:43'),
(126, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:08:20', '2017-10-03 14:08:20'),
(127, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:09:56', '2017-10-03 14:09:56'),
(128, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:10:11', '2017-10-03 14:10:11'),
(129, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:10:38', '2017-10-03 14:10:38'),
(130, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:10:45', '2017-10-03 14:10:45'),
(131, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:10:52', '2017-10-03 14:10:52'),
(132, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:10:59', '2017-10-03 14:10:59'),
(133, 'Edito la foto de la biografia del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:11:59', '2017-10-03 14:11:59'),
(134, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:12:06', '2017-10-03 14:12:06'),
(135, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-03 14:12:12', '2017-10-03 14:12:12'),
(136, 'Creo el artista david rondon', '192.168.9.25', 'INSERT', '1', '2017-10-03 20:13:12', '2017-10-03 20:13:12'),
(137, 'Desloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-10-04 13:08:55', '2017-10-04 13:08:55'),
(138, 'Bloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-10-04 13:08:59', '2017-10-04 13:08:59'),
(139, 'Desloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-10-04 13:09:02', '2017-10-04 13:09:02'),
(140, 'Bloqueo al público el artista daniel pereira', '192.168.9.25', 'UPDATE', '1', '2017-10-04 13:09:03', '2017-10-04 13:09:03'),
(141, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 13:37:17', '2017-10-04 13:37:17'),
(142, 'Desbloqueo al usuario yperez@gmail.com', '192.168.9.25', 'UPDATE', '1', '2017-10-04 15:07:20', '2017-10-04 15:07:20'),
(143, 'Bloqueo al usuario dpereira@gmail.com', '192.168.9.25', 'UPDATE', '1', '2017-10-04 15:09:01', '2017-10-04 15:09:01'),
(144, 'Desbloqueo al usuario dpereira@gmail.com', '192.168.9.25', 'UPDATE', '1', '2017-10-04 15:09:03', '2017-10-04 15:09:03'),
(145, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 19:36:03', '2017-10-04 19:36:03'),
(146, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:22:50', '2017-10-04 20:22:50'),
(147, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:23:14', '2017-10-04 20:23:14'),
(148, 'Edito el artista michael rondonc', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:23:59', '2017-10-04 20:23:59'),
(149, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:24:05', '2017-10-04 20:24:05'),
(150, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:26:29', '2017-10-04 20:26:29'),
(151, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:26:46', '2017-10-04 20:26:46'),
(152, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-04 20:26:58', '2017-10-04 20:26:58'),
(153, 'Creo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-04 20:28:52', '2017-10-04 20:28:52'),
(154, 'Creo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-04 20:32:27', '2017-10-04 20:32:27'),
(155, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-05 13:29:54', '2017-10-05 13:29:54'),
(156, 'Edito el artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-05 13:30:03', '2017-10-05 13:30:03'),
(157, 'Edito la foto de la portada del artista michael rondon', '192.168.9.25', 'UPDATE', '1', '2017-10-05 13:30:22', '2017-10-05 13:30:22'),
(158, 'Creo el catalogo gsgsgsdgsdgsdg', '192.168.9.25', 'INSERT', '1', '2017-10-05 14:55:20', '2017-10-05 14:55:20'),
(159, 'Creo el catalogo jghkghkhgkghk', '192.168.9.25', 'INSERT', '1', '2017-10-05 14:57:45', '2017-10-05 14:57:45'),
(160, 'Bloqueo el catalogo jghkghkhgkghk', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:00:54', '2017-10-05 15:00:54'),
(161, 'Desbloqueo el catalogo jghkghkhgkghk', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:01:20', '2017-10-05 15:01:20'),
(162, 'Elimino el catalogo jghkghkhgkghk', '192.168.9.25', 'DELETE', '1', '2017-10-05 15:01:25', '2017-10-05 15:01:25'),
(163, 'Creo el catalogo fddfhdfg gdfsdf s', '192.168.9.25', 'INSERT', '1', '2017-10-05 15:14:36', '2017-10-05 15:14:36'),
(164, 'Bloqueo el catalogo fddfhdfg gdfsdf s', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:15:25', '2017-10-05 15:15:25'),
(165, 'Creo el catalogo hdjfdjdgjdgj', '192.168.9.25', 'INSERT', '1', '2017-10-05 15:17:08', '2017-10-05 15:17:08'),
(166, 'Bloqueo el catalogo hdjfdjdgjdgj', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:27:31', '2017-10-05 15:27:31'),
(167, 'Desbloqueo el catalogo hdjfdjdgjdgj', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:28:14', '2017-10-05 15:28:14'),
(168, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:30:32', '2017-10-05 15:30:32'),
(169, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:30:43', '2017-10-05 15:30:43'),
(170, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:31:11', '2017-10-05 15:31:11'),
(171, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:31:23', '2017-10-05 15:31:23'),
(172, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:31:39', '2017-10-05 15:31:39'),
(173, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:33:25', '2017-10-05 15:33:25'),
(174, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:34:12', '2017-10-05 15:34:12'),
(175, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:34:45', '2017-10-05 15:34:45'),
(176, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:35:03', '2017-10-05 15:35:03'),
(177, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:35:16', '2017-10-05 15:35:16'),
(178, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:35:27', '2017-10-05 15:35:27'),
(179, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:35:35', '2017-10-05 15:35:35'),
(180, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:36:17', '2017-10-05 15:36:17'),
(181, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:37:07', '2017-10-05 15:37:07'),
(182, 'Bloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:38:01', '2017-10-05 15:38:01'),
(183, 'Desbloqueo el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 15:38:42', '2017-10-05 15:38:42'),
(184, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:01:58', '2017-10-05 18:01:58'),
(185, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:02:45', '2017-10-05 18:02:45'),
(186, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:04:38', '2017-10-05 18:04:38'),
(187, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:04:41', '2017-10-05 18:04:41'),
(188, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:04:44', '2017-10-05 18:04:44'),
(189, 'Edito el catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 18:04:48', '2017-10-05 18:04:48'),
(190, 'Agrego la imagen kirykhjyjyrjkyuk al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-05 18:23:02', '2017-10-05 18:23:02'),
(191, 'Agrego la imagen asdsadasdasdsa al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-05 19:53:34', '2017-10-05 19:53:34'),
(192, 'Agrego la imagen hrehrh al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-05 19:55:01', '2017-10-05 19:55:01'),
(193, 'Edito la imagen kirykhjyjyrjkyuk al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 20:27:50', '2017-10-05 20:27:50'),
(194, 'Edito la imagen aqweaweaweaw al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-05 20:27:59', '2017-10-05 20:27:59'),
(195, 'Edito la imagen aqweaweaweaw al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-06 13:19:30', '2017-10-06 13:19:30'),
(196, 'Agrego la imagen gdfgdsgdgadg al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-06 13:21:57', '2017-10-06 13:21:57'),
(197, 'Edito la imagen aqweaweaweawasdasdas al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'UPDATE', '1', '2017-10-06 13:27:05', '2017-10-06 13:27:05'),
(198, 'Elimino la imagen aqweaweaweawasdasdas al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'DELETE', '1', '2017-10-06 14:03:52', '2017-10-06 14:03:52'),
(199, 'Elimino la imagen ccccccccccc al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'DELETE', '1', '2017-10-06 15:46:44', '2017-10-06 15:46:44'),
(200, 'Agrego la imagen fhfghffhhgf al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:47:03', '2017-10-06 15:47:03'),
(201, 'Agrego la imagen uiyiyukuyk al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:47:20', '2017-10-06 15:47:20'),
(202, 'Agrego la imagen fffeerfr al catalogo dfbvncm,dsmfnjkkd,spqcmdkj ckmx,.', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:56:13', '2017-10-06 15:56:13'),
(203, 'Agrego la imagen ggrg al catalogo gsgsgsdgsdgsdg', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:56:34', '2017-10-06 15:56:34'),
(204, 'Desbloqueo el catalogo fddfhdfg gdfsdf s', '192.168.9.25', 'UPDATE', '1', '2017-10-06 15:56:47', '2017-10-06 15:56:47'),
(205, 'Agrego la imagen frefre al catalogo fddfhdfg gdfsdf s', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:57:00', '2017-10-06 15:57:00'),
(206, 'Agrego la imagen freferfre al catalogo hdjfdjdgjdgj', '192.168.9.25', 'INSERT', '1', '2017-10-06 15:57:18', '2017-10-06 15:57:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(2, 'Inactivo', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(3, 'Disponible', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(4, 'Restringido', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(5, 'Bloqueado', '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(6, 'Pendiente', '2017-09-20 13:21:32', '2017-09-20 13:21:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_museos`
--

CREATE TABLE `tipos_museos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_museo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_museos`
--

INSERT INTO `tipos_museos` (`id`, `tipo_museo`, `created_at`, `updated_at`) VALUES
(1, 'arte', '2017-09-20 13:25:42', '2017-09-20 13:25:42'),
(2, 'antropologico', '2017-09-20 13:25:50', '2017-09-20 14:20:16'),
(3, 'historia', '2017-09-20 13:25:58', '2017-09-20 13:25:58'),
(4, 'ciencias', '2017-09-20 13:26:01', '2017-09-20 13:26:01'),
(5, 'tecnologia', '2017-09-20 13:26:05', '2017-09-20 13:26:05'),
(6, 'deporte', '2017-09-20 13:44:15', '2017-09-20 13:44:15'),
(7, 'musica', '2017-09-20 13:53:33', '2017-09-20 13:53:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `foto`, `remember_token`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Michael Rondon', 'mrondon72@gmail.com', '$2y$10$N2Ihiqp4UMBVWR610kbUI.nuJ2yeOIMhxj.Gaw4WpDY19k3MKQpjW', 'default.jpg', 'fOLkkP3l4IXRZ4KEUj5bL4pqjxUznRxkXq7UAoGFvc1yGr8FkGJzfGXQxIv5', 1, '2017-09-20 13:21:32', '2017-09-20 13:21:32'),
(2, 'yoismer perez', 'yperez@gmail.com', '$2y$10$rD9UgDfs66pbiqcuwSswuO4dXLJJ06r6n37sR2UpuXaqW5wZU1nWu', 'default.jpg', NULL, 1, '2017-09-26 14:15:18', '2017-09-26 14:15:18'),
(3, 'daniel pereira', 'dpereira@gmail.com', '$2y$10$9RyHsyprOI2fypI4vLqEyubtOhlc9ClbBRpOGztZDjtraEECL2faS', 'default.jpg', NULL, 1, '2017-09-26 20:40:15', '2017-09-26 20:40:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artistas_status_id_foreign` (`status_id`),
  ADD KEY `artistas_genero_id_foreign` (`genero_id`),
  ADD KEY `artistas_pais_nacimiento_id_foreign` (`pais_nacimiento_id`),
  ADD KEY `artistas_pais_muerte_id_foreign` (`pais_muerte_id`);

--
-- Indices de la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_catalogo_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_disciplina_artista_catalogo_id_foreign` (`artista_catalogo_id`),
  ADD KEY `artista_catalogo_disciplina_disciplina_id_foreign` (`disciplina_id`);

--
-- Indices de la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_catalogo_imagen_artista_catalogo_id_foreign` (`artista_catalogo_id`),
  ADD KEY `artista_catalogo_imagen_status_id_foreign` (`status_id`);

--
-- Indices de la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_disciplina_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_disciplina_disciplina_id_foreign` (`disciplina_id`);

--
-- Indices de la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_profesion_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_profesion_profesion_id_foreign` (`profesion_id`);

--
-- Indices de la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_red_social_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_red_social_red_social_id_foreign` (`red_social_id`);

--
-- Indices de la tabla `artista_user`
--
ALTER TABLE `artista_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artista_user_artista_id_foreign` (`artista_id`),
  ADD KEY `artista_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_user_user_id_foreign` (`user_id`),
  ADD KEY `perfil_user_perfil_id_foreign` (`perfil_id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redes_sociales_icon_id_foreign` (`icon_id`);

--
-- Indices de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_museos`
--
ALTER TABLE `tipos_museos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_status_id_foreign` (`status_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `artista_user`
--
ALTER TABLE `artista_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipos_museos`
--
ALTER TABLE `tipos_museos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_genero_id_foreign` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `artistas_pais_muerte_id_foreign` FOREIGN KEY (`pais_muerte_id`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `artistas_pais_nacimiento_id_foreign` FOREIGN KEY (`pais_nacimiento_id`) REFERENCES `paises` (`id`),
  ADD CONSTRAINT `artistas_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_catalogo`
--
ALTER TABLE `artista_catalogo`
  ADD CONSTRAINT `artista_catalogo_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_catalogo_disciplina`
--
ALTER TABLE `artista_catalogo_disciplina`
  ADD CONSTRAINT `artista_catalogo_disciplina_artista_catalogo_id_foreign` FOREIGN KEY (`artista_catalogo_id`) REFERENCES `artista_catalogo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_disciplina_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_catalogo_imagen`
--
ALTER TABLE `artista_catalogo_imagen`
  ADD CONSTRAINT `artista_catalogo_imagen_artista_catalogo_id_foreign` FOREIGN KEY (`artista_catalogo_id`) REFERENCES `artista_catalogo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_catalogo_imagen_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `artista_disciplina`
--
ALTER TABLE `artista_disciplina`
  ADD CONSTRAINT `artista_disciplina_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_disciplina_disciplina_id_foreign` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_profesion`
--
ALTER TABLE `artista_profesion`
  ADD CONSTRAINT `artista_profesion_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_profesion_profesion_id_foreign` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `artista_red_social`
--
ALTER TABLE `artista_red_social`
  ADD CONSTRAINT `artista_red_social_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_red_social_red_social_id_foreign` FOREIGN KEY (`red_social_id`) REFERENCES `redes_sociales` (`id`);

--
-- Filtros para la tabla `artista_user`
--
ALTER TABLE `artista_user`
  ADD CONSTRAINT `artista_user_artista_id_foreign` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artista_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD CONSTRAINT `perfil_user_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perfil_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD CONSTRAINT `redes_sociales_icon_id_foreign` FOREIGN KEY (`icon_id`) REFERENCES `icons` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
