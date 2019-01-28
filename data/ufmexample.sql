CREATE TABLE IF NOT EXISTS `enikeishik_ufmexample_items` (
  `id` int(11) NOT NULL auto_increment,
  `disabled` tinyint(1) NOT NULL default '0',
  `marked` tinyint(1) NOT NULL default '0',
  `created_at` datetime NOT NULL default '1970-01-01 00:00:00',
  `marked_at` datetime DEFAULT NULL,
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
