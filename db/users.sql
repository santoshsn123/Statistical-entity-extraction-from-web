-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_firstname` varchar(99) NOT NULL,
  `u_lastname` varchar(99) NOT NULL,
  `u_email` varchar(99) NOT NULL,
  `u_phone` varchar(99) NOT NULL,
  `u_username` varchar(99) NOT NULL,
  `u_password` varchar(99) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`u_id`, `u_firstname`, `u_lastname`, `u_email`, `u_phone`, `u_username`, `u_password`) VALUES
(1,	'fgh',	'hgfghfg',	'hfghfg',	'hfgh',	'admin',	'admin'),
(2,	'Santosh',	'Narwade',	'santosh@gmail.com',	'12845345',	'santosh',	'587c57365b54e8283fd6b1ac24acf29d');

-- 2018-07-03 12:58:21
