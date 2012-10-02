USE cards;
CREATE TABLE `accounts` (

 `account_id` int(11) NOT NULL auto_increment,
 `username` varchar(50) collate utf8_bin NOT NULL,
 `password` varchar(50) collate utf8_bin NOT NULL,
 `firstname` varchar(50) collate utf8_bin NOT NULL,
 `middlename` varchar(50) collate utf8_bin NOT NULL,
 `surname` varchar(50) collate utf8_bin NOT NULL,
 `contact_no` varchar(50) collate utf8_bin NOT NULL,
 `address` varchar(100) collate utf8_bin NOT NULL,
 `email` varchar(50) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`account_id`)
)