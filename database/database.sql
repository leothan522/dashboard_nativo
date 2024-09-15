-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para dashboard_nativo
CREATE DATABASE IF NOT EXISTS `dashboard_nativo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dashboard_nativo`;

-- Volcando estructura para tabla dashboard_nativo.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabla_id` bigint DEFAULT NULL,
  `valor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rowquid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla dashboard_nativo.parametros: ~6 rows (aproximadamente)
INSERT INTO `parametros` (`id`, `nombre`, `tabla_id`, `valor`, `rowquid`, `created_at`, `updated_at`) VALUES
	(1, 'fecha_instalacion', NULL, '2024-09-04 20:05:35', 'UMVRrWL5xVt7lmtu', '2024-09-05 00:05:35', NULL),
	(2, 'hola', -1, NULL, '1z3E30D2CRG6YCOt', '2024-09-05 23:40:43', NULL),
	(3, 'numRowsPaginate', NULL, '2', 'uUDIeCiQgEumHZy6', '2024-09-06 00:20:00', '2024-09-06 00:20:00'),
	(4, 'prueba', -1, NULL, 'KilkG6oNRV8KU5js', '2024-09-07 17:40:27', '2024-09-07 17:40:27'),
	(6, 'Administrador', -2, '1', 'cD36x9d5FnGQtcJC', '2024-09-12 23:01:44', '2024-09-12 23:01:44'),
	(7, 'Público', -2, '0', 'PHEdU1M5fRztMgXw', '2024-09-12 23:01:44', '2024-09-12 23:03:10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
