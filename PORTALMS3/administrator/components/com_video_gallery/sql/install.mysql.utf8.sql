CREATE TABLE IF NOT EXISTS `#__video_gallery_lista` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`titulo` VARCHAR(255)  NOT NULL ,
`tipo_video` VARCHAR(255)  NOT NULL ,
`destaque` TINYINT(1)  NOT NULL ,
`link` VARCHAR(255)  NOT NULL ,
`categoria` INT(11)  NOT NULL ,
`descricao` TEXT NOT NULL ,
`created` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

