<?php
$queries[] = "DELETE FROM `" . OPTIONS . "` WHERE `option_name` = 'ssl_enabled'";
$queries[] = "ALTER TABLE `" . BUDDY . "` ADD PRIMARY KEY (`buddy_id`), ADD KEY `buddy_id` (`buddy_id`);";
$queries[] = "ALTER TABLE `" . FLEETS . "` CHANGE `fleet_mess` `fleet_mess` TINYINT(1) NOT NULL DEFAULT '0';";
$queries[] = "RENAME TABLE `" . DB_PREFIX . "acs_fleets` TO `" . ACS . "`;";
$queries[] = "ALTER TABLE `" . ACS . "` CHANGE `acs_fleet_members` `acs_fleet_owner` INT(11) NOT NULL DEFAULT '0';";
$queries[] = "ALTER TABLE `" . ACS . "` ADD UNIQUE(`acs_fleet_name`);";
$queries[] = "CREATE TABLE `" . ACS_MEMBERS . "` (
`acs_member_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`acs_group_id` int(11) UNSIGNED NOT NULL,
`acs_user_id` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`acs_member_id`),
UNIQUE( `acs_group_id`, `acs_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
$queries[] = "ALTER TABLE `" . ACS . "` DROP `acs_fleet_fleets`, DROP `acs_fleet_invited`;";
$queries[] = "ALTER TABLE `" . ACS . "` CHANGE `acs_fleet_id` `acs_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT, CHANGE `acs_fleet_name` `acs_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, CHANGE `acs_fleet_owner` `acs_owner` INT(11) NOT NULL DEFAULT '0', CHANGE `acs_fleet_galaxy` `acs_galaxy` INT(2) NULL DEFAULT NULL, CHANGE `acs_fleet_system` `acs_system` INT(4) NULL DEFAULT NULL, CHANGE `acs_fleet_planet` `acs_planet` INT(2) NULL DEFAULT NULL, CHANGE `acs_fleet_planet_type` `acs_planet_type` TINYINT(1) NULL DEFAULT NULL;";
$queries[] = "CREATE TABLE `" . CHANGELOG . "` (
`changelog_id` int(11) UNSIGNED NOT NULL,
`changelog_lang_id` int(11) NOT NULL,
`changelog_version` varchar(16) NOT NULL,
`changelog_date` date NOT NULL,
`changelog_description` text NOT NULL,
PRIMARY KEY (`changelog_id`),
UNIQUE KEY `changelog_id` (`changelog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";  
$queries[] = "INSERT INTO `" . CHANGELOG . "` (`changelog_id`, `changelog_lang_id`, `changelog_version`, `changelog_date`, `changelog_description`) VALUES 
(1, '1', '3.0.0', '2013-05-13', '- Ejemplo 1'), 
(2, '1', '3.1.0', '2013-06-13', '- Ejemplo 2'), 
(3, '1', '3.2.0', '2013-11-08', '- Ejemplo 3'), 
(4, '2', '3.0.0', '2013-05-13', '- Example 1'), 
(5, '2', '3.1.0', '2013-06-13', '- Example 2'),
(6, '2', '3.2.0', '2013-11-08', '- Example 3');";
$queries[] = "CREATE TABLE `" . LANGUAGES . "` (
`language_id` int(11) NOT NULL,
`language_name` varchar(64) CHARACTER SET utf8 NOT NULL,
PRIMARY KEY (`language_id`),
UNIQUE KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$queries[] = "INSERT INTO `" . LANGUAGES . "` (`language_id`, `language_name`) VALUES
(1, 'Spanish'),
(2, 'English');";
$queries[] = "CREATE TABLE `" . PREFERENCES . "` (
`preference_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`preference_user_id` int(11) NOT NULL,
`preference_spy_probes` tinyint(2) NOT NULL DEFAULT '1',
`preference_planet_sort` tinyint(1) NOT NULL DEFAULT '0',
`preference_planet_sort_sequence` tinyint(1) NOT NULL DEFAULT '0',
`preference_vacation_mode` int(10) DEFAULT NULL,
`preference_delete_mode` int(10) DEFAULT NULL,
PRIMARY KEY (`preference_id`),
UNIQUE KEY `preference_user_id` (`preference_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
$queries[] = "DROP TABLE `" . DB_PREFIX . "settings`";