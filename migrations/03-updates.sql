ALTER TABLE  `clients` ADD  `type_id` INT NULL ,
ADD  `extra_text1` VARCHAR( 255 ) NULL ,
ADD  `extra_text2` VARCHAR( 255 ) NULL ,
ADD  `extra_text3` VARCHAR( 255 ) NULL ,
ADD  `extra_text4` VARCHAR( 255 ) NULL ,
ADD  `extra_text5` VARCHAR( 255 ) NULL ,
ADD INDEX (  `type_id` );


ALTER TABLE  `channels` ADD  `extra_text1` VARCHAR( 255 ) NULL ,
ADD  `extra_text2` VARCHAR( 255 ) NULL ,
ADD  `extra_text3` VARCHAR( 255 ) NULL ,
ADD  `extra_text4` VARCHAR( 255 ) NULL ,
ADD  `extra_text5` VARCHAR( 255 ) NULL;

