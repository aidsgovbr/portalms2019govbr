CREATE TABLE IF NOT EXISTS `#__plg_pwtseo` (
  `id` INT(11) UNSIGNED AUTO_INCREMENT,
  `context` VARCHAR(255) NOT NULL DEFAULT '',
  `context_id` INT(11) UNSIGNED NOT NULL,
  `focus_word` VARCHAR(255) NOT NULL DEFAULT '',
  `pwtseo_score` INT(11) UNSIGNED DEFAULT 0,
  `facebook_title` VARCHAR(255) NOT NULL DEFAULT '',
  `facebook_description` VARCHAR(255) NOT NULL DEFAULT '',
  `facebook_image` VARCHAR(255) NOT NULL DEFAULT '',
  `twitter_title` VARCHAR(255) NOT NULL DEFAULT '',
  `twitter_description` VARCHAR(255) NOT NULL DEFAULT '',
  `twitter_image` VARCHAR(255) NOT NULL DEFAULT '',
  `google_title` VARCHAR(255) NOT NULL DEFAULT '',
  `google_description` VARCHAR(255) NOT NULL DEFAULT '',
  `google_image` VARCHAR(255) NOT NULL DEFAULT '',
  `adv_open_graph` LONGTEXT NOT NULL,
  `override_page_title` TINYINT(1) DEFAULT 0,
  `expand_og` TINYINT(1) DEFAULT 0,
  `page_title` VARCHAR(255) NOT NULL DEFAULT '',
  `override_canonical` TINYINT(1) DEFAULT 0,
  `canonical` VARCHAR(255) NOT NULL DEFAULT '',
  `version` VARCHAR(25) NOT NULL DEFAULT '1.0.2',
  `flag_outdated` TINYINT(1) DEFAULT 0,

  PRIMARY KEY (`id`)
);