CREATE TABLE `sendme_ask` (
`id` int(4) NOT NULL auto_increment,
`subject` varchar(255) NOT NULL default '',
`comment` longtext NOT NULL,
`name` varchar(65) NOT NULL default '',
`password` varchar(65) NOT NULL default '',
`upload` varchar(65) NOT NULL default '',
`email` varchar(65) NOT NULL default '',
`ip` varchar(100) NOT NULL default '',
`datetime` varchar(25) NOT NULL default '',
`view` int(4) NOT NULL default '0',
`reply` int(4) NOT NULL default '0',
active int(1) NOT NULL default '0',
PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=245 ;

CREATE TABLE `sendme_answer` (
`question_id` int(4) NOT NULL default '0',
`a_id` int(4) NOT NULL default '0',
`a_name` varchar(65) NOT NULL default '',
`a_email` varchar(65) NOT NULL default '',
`a_answer` longtext NOT NULL,
`a_datetime` varchar(25) NOT NULL default '',
KEY `a_id` (`a_id`)
) TYPE=MyISAM;

CREATE TABLE `sendme_copy` (
`id` int(4) NOT NULL auto_increment,
`name` varchar(255) NOT NULL default '',
`comment` longtext NOT NULL,
`subject` varchar(65) NOT NULL default '',
`email` varchar(65) NOT NULL default '',
`datetime` varchar(25) NOT NULL default '',
PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;