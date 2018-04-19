CREATE TABLE IF NOT EXISTS `#__registration_contact_form`
( `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  `email` VARCHAR(50) NOT NULL ,
  `object` VARCHAR(50) NOT NULL ,
  `message` TEXT NOT NULL ,
  `accept` INT(1) NOT NULL ,
  `timestamp` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `server` TEXT NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;
