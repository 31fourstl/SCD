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

-- --------------------------------------------
-- Table: site_settings (key/value store)
-- --------------------------------------------
CREATE TABLE IF NOT EXISTS `site_settings` (
  `key`   VARCHAR(100) NOT NULL,
  `value` TEXT         DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default values (hero section & accent colors)
INSERT IGNORE INTO `site_settings` (`key`, `value`) VALUES
  ('hero_bg_image',      ''),
  ('hero_badge_1',       'Limited'),
  ('hero_badge_2',       'Premium'),
  ('hero_badge_3',       'Direct'),
  ('hero_heading_line1', 'BUILT FOR THE'),
  ('hero_heading_line2', 'SOUTH SIDE'),
  ('hero_subtext',       'Exclusive streetwear drops from the heart of St. Louis. Limited runs, no restocks, no compromises.'),
  ('hero_btn_primary',   'Shop Now'),
  ('hero_btn_secondary', 'View Drops'),
  ('hero_stat1_value',   '100%'),
  ('hero_stat1_label',   'Independent'),
  ('hero_stat2_value',   'STL'),
  ('hero_stat2_label',   'Based'),
  ('hero_stat3_value',   'Limited'),
  ('hero_stat3_label',   'Every Drop'),
  ('accent_color',       '#d61ca0'),
  ('accent_color_end',   '#f04cbc');
