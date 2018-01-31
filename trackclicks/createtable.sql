CREATE TABLE `tracking_table` (
`recid` int(11) unsigned NOT NULL AUTO_INCREMENT,
`rec_use_page` varchar(220) DEFAULT NULL,
`rec_use_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`recid`)
);