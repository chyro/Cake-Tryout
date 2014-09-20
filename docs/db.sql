CREATE DATABASE cake_test CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL ON cake_test.* TO 'cake_test'@'localhost' IDENTIFIED BY 'cake_test';

-- Class: CardNumber
DROP TABLE IF EXISTS `mmc_card_numbers`;
CREATE TABLE `mmc_card_numbers` (
  `number` bigint(13) unsigned zerofill NOT NULL auto_increment,
  `created` datetime default NULL,
  PRIMARY KEY  (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- Class: User
DROP TABLE IF EXISTS `mmc_users`;
CREATE TABLE `mmc_users` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(64) NOT NULL,
  `password` char(64) default NULL,
  `email` varchar(256) default NULL,
  `card_number` bigint(13) unsigned zerofill default NULL,
  `first_name` varchar(64) default NULL,
  `last_name` varchar(64) default NULL,
  `gender` char(1) default NULL,
  `age` smallint(6) default NULL,
  `marital_status` char(1) default NULL,
  `children` smallint(6) default NULL,
  `address` text,
  `country` varchar(64) default NULL,
  `created` datetime default NULL,
  `last_login_date` datetime default NULL,
  `last_login_ip` varchar(15) default NULL,
  `mail_needs_confirm` varchar(64) default NULL,
  `role` varchar(64) default NULL,
  -- `level_points` int(11) default '0',
  -- `points_balance` int(11) default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*
-- TODO: Allow changing emails, allow going back to former email, don't
-- allow using an email used now or previously by another account.
mmc_used_emails {
  `id`,
  `user_id`,
  `email`
}
*/

DROP TABLE IF EXISTS `mmc_winners`;
CREATE TABLE `mmc_winners` (
  `id` int(11) NOT NULL auto_increment,
  `date` date default NULL,
  `name` varchar(256) default NULL,
  `user_id` int default NULL,
  `prize` varchar(256) default NULL,
  `logo` varchar(256) default NULL,
  `sponsor` varchar(256) default NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `mmc_users` (`id`) ON DELETE SET NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
