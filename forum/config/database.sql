-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_forum_forums`
-- 

CREATE TABLE `tl_forum_forums` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `forum_type` char(1) NOT NULL default 'f',
  `title` varchar(255) NOT NULL default '',
  `description` blob NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_forum_threads`
-- 

CREATE TABLE `tl_forum_threads` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `created_by` int(10) unsigned NOT NULL default '0',
  `created_date` int(10) unsigned NOT NULL default '0',
  `created_time` int(10) unsigned NOT NULL default '0',
  `deleted` char(1) NOT NULL default '',
  `locked` char(1) NOT NULL default '',
  `important_thread` char(1) NOT NULL default '',
  `global_thread` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_forum_posts`
-- 

CREATE TABLE `tl_forum_posts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `order_no` int(10) unsigned NOT NULL default '0',
  `created_by` int(10) unsigned NOT NULL default '0',
  `created_date` int(10) unsigned NOT NULL default '0',
  `created_time` int(10) unsigned NOT NULL default '0',
  `last_change_by` int(10) unsigned NOT NULL default '0',
  `last_change_date` int(10) unsigned NOT NULL default '0',
  `last_change_time` int(10) unsigned NOT NULL default '0',
  `deleted` char(1) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` blob NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `forum_redirect_thread` int(10) unsigned NOT NULL default '0',
  `forum_use_fixed_forum` char(1) NOT NULL default '',
  `forum_use_fixed_thread` char(1) NOT NULL default '',
  `forum_fixed_forum` int(10) unsigned NOT NULL default '0',
  `forum_fixed_thread` int(10) unsigned NOT NULL default '0'
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
