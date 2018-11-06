/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT /; /!40101 SET NAMES utf8 /; /!50503 SET NAMES utf8mb4 /; /!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 /; /!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para proyectosigv2 CREATE DATABASE IF NOT EXISTS proyectosigv2 /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */; USE proyectosigv2;

-- Volcando estructura para tabla proyectosigv2.migrations CREATE TABLE IF NOT EXISTS migrations ( id int(10) unsigned NOT NULL AUTO_INCREMENT, migration varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, batch int(11) NOT NULL, PRIMARY KEY (id) ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyectosigv2.migrations: ~2 rows (aproximadamente) /*!40000 ALTER TABLE migrations DISABLE KEYS /; INSERT INTO migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1), (2, '2014_10_12_100000_create_password_resets_table', 1); /!40000 ALTER TABLE migrations ENABLE KEYS */;

-- Volcando estructura para tabla proyectosigv2.password_resets CREATE TABLE IF NOT EXISTS password_resets ( email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, token varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, created_at timestamp NULL DEFAULT NULL, KEY password_resets_email_index (email) ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyectosigv2.password_resets: ~0 rows (aproximadamente) /*!40000 ALTER TABLE password_resets DISABLE KEYS /; /!40000 ALTER TABLE password_resets ENABLE KEYS */;

-- Volcando estructura para tabla proyectosigv2.users CREATE TABLE IF NOT EXISTS users ( id int(10) unsigned NOT NULL AUTO_INCREMENT, name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL, created_at timestamp NULL DEFAULT NULL, updated_at timestamp NULL DEFAULT NULL, PRIMARY KEY (id), UNIQUE KEY users_email_unique (email) ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla proyectosigv2.users: ~0 rows (aproximadamente) /*!40000 ALTER TABLE users DISABLE KEYS /; INSERT INTO users (id, name, email, password, remember_token, created_at, updated_at) VALUES (1, 'god', 'god@gmail.com', '$2y$10$U6zu7tL4WMtlSfR9Hrr5QuvOLgdIs/uN1KK1fRm4veTx6CWzguChG', 'eXmUvgE3SOq9mbLLdtPiPfoEz1ICpZPjfxXo5iM78ti1TE90uRYMYcSTcgce', '2018-10-25 08:39:30', '2018-10-25 08:39:30'); /!40000 ALTER TABLE users ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') /; /!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) /; /!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;