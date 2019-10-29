CREATE TABLE IF NOT EXISTS `#__shortcode_file_download` (
  `id` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `see` int(11) NOT NULL DEFAULT 0,
  `liked` int(11) NOT NULL DEFAULT 0,
  `downloaded` int(11) NOT NULL DEFAULT 0,
  `liked_ip` text NOT NULL,
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
