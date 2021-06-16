CREATE TABLE `books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radio_1` int(11) NOT NULL COMMENT 'radio-1',
  `radio_2` int(11) NOT NULL COMMENT 'radio-2',
  `check_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'check_1',
  `check_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'check_2',
  `date_1` date DEFAULT NULL COMMENT 'date_1',
  `date_2` date DEFAULT NULL COMMENT 'date_2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
