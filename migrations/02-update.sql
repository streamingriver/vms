ALTER TABLE  `channels` ADD  `image` VARCHAR( 255 ) NULL;

ALTER TABLE  `clients` ADD  `seen` DATETIME NULL , ADD  `addr` VARCHAR( 255 ) NULL , ADD  `ch` VARCHAR( 255 )  NULL;

CREATE TABLE IF NOT EXISTS `settings` (
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

