CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `epg1` varchar(255) NULL,
  `epg2` varchar(255) NULL,
  `epg3` varchar(255) NULL,
  `stream_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `channels_packages` (
  `channel_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  UNIQUE KEY `channel_id` (`channel_id`,`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `mac` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `package_id` int(11) NOT NULL,
  `active` BOOLEAN NULL DEFAULT TRUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
