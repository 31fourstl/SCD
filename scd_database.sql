-- ============================================
-- South City Degenerates — Database Setup
-- Import this file via phpMyAdmin
-- ============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------
-- Table: drops
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS `drops` (
  `id`                 INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
  `title`              VARCHAR(255)        NOT NULL,
  `description`        TEXT                DEFAULT NULL,
  `image_path`         VARCHAR(500)        DEFAULT NULL,
  `shopify_embed_code` TEXT                DEFAULT NULL,
  `drop_date`          DATETIME            DEFAULT NULL,
  `is_active`          TINYINT(1)          NOT NULL DEFAULT 1,
  `created_at`         DATETIME            DEFAULT NULL,
  `updated_at`         DATETIME            DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- Table: ci_sessions (CI4 database sessions)
-- Eliminates dependency on writable/session/ folder permissions
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id`         VARCHAR(128)  NOT NULL,
  `ip_address` VARCHAR(45)   NOT NULL,
  `timestamp`  TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data`       BLOB          NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------
-- Table: migrations (CI4 internal tracking)
-- Tells CodeIgniter the migration has already run
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS `migrations` (
  `id`        BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version`   VARCHAR(255)        NOT NULL,
  `class`     VARCHAR(255)        NOT NULL,
  `group`     VARCHAR(255)        NOT NULL,
  `namespace` VARCHAR(255)        NOT NULL,
  `time`      INT(11)             NOT NULL,
  `batch`     INT(11) UNSIGNED    NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`version`, `class`, `group`, `namespace`, `time`, `batch`)
VALUES ('2026-04-11-002749', 'App\\Database\\Migrations\\CreateDropsTable', 'default', 'App', UNIX_TIMESTAMP(), 1);
