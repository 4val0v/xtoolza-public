# MySQL-Front 3.2  (Build 6.25)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'latin1' */;

# Host: 127.0.0.1    Database: keywords
# ------------------------------------------------------
# Server version 5.0.45-community-nt

#
# Table structure for table exempts
#

DROP TABLE IF EXISTS `exempts`;
CREATE TABLE `exempts` (
  `Id` int(11) NOT NULL auto_increment,
  `word` varchar(255) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=cp1251;

#
# Dumping data for table exempts
#

/*!40101 SET NAMES cp1251 */;

INSERT INTO `exempts` VALUES (3,'не');
INSERT INTO `exempts` VALUES (4,'lcd');

/*!40101 SET NAMES latin1 */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
