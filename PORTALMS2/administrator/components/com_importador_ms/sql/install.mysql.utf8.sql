CREATE TABLE IF NOT EXISTS `#__importador_ms_importar` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`created_by` INT(11)  NOT NULL ,
`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`categoria_antiga` INT NOT NULL ,
`categoria_nova` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

