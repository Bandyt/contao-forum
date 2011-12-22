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
  `last_post_date` int(10) unsigned NOT NULL default '0',
  `last_post_time` int(10) unsigned NOT NULL default '0',
  `last_change_date` int(10) unsigned NOT NULL default '0',
  `last_change_time` int(10) unsigned NOT NULL default '0',
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
  `last_change_date` int(10) unsigned NOT NULL default '0',
  `last_change_time` int(10) unsigned NOT NULL default '0',
  `last_post_date` int(10) unsigned NOT NULL default '0',
  `last_post_time` int(10) unsigned NOT NULL default '0',
  `deleted` char(1) NOT NULL default '',
  `locked` char(1) NOT NULL default '',
  `thread_type` char(1) NOT NULL default 'N',
  `special` char(1) NOT NULL default '',
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
  `created_ip` varchar(255) NOT NULL default '',
  `changed` char(1) NOT NULL default '',
  `last_change_by` int(10) unsigned NOT NULL default '0',
  `last_change_date` int(10) unsigned NOT NULL default '0',
  `last_change_time` int(10) unsigned NOT NULL default '0',
  `last_change_reason` varchar(255) NOT NULL default '',
  `quoted_post` int(10) unsigned NOT NULL default '0',
  `deleted` char(1) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `text` blob NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_forum_user_settings`
-- 

CREATE TABLE `tl_forum_user_settings` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `user` int(10) unsigned NOT NULL default '0',
  `signature` blob NULL,
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_forum_forum_tracker`
-- 

CREATE TABLE `tl_forum_forum_tracker` (
  `forum` int(10) unsigned NOT NULL default '0',
  `user` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table `tl_forum_thread_tracker`
-- 

CREATE TABLE `tl_forum_thread_tracker` (
  `thread` int(10) unsigned NOT NULL default '0',
  `user` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

-- 
-- Table `tl_forum_moderator_log`
-- 

CREATE TABLE `tl_forum_moderator_log` (
  `forum` int(10) unsigned NOT NULL default '0',
  `thread` int(10) unsigned NOT NULL default '0',
  `post` int(10) unsigned NOT NULL default '0',
  `user` int(10) unsigned NOT NULL default '0',
  `committer` int(10) unsigned NOT NULL default '0',
  `change_time` int(10) unsigned NOT NULL default '0',
  `change_ip` varchar(255) NOT NULL default '',
  `change_type` varchar(255) NOT NULL default '',
  `field` varchar(255) NOT NULL default '',
  `old_value` blob NULL,
  `new_value` blob NULL
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
  `forum_redirect_threadreader` int(10) unsigned NOT NULL default '0',
  `forum_redirect_threadeditor` int(10) unsigned NOT NULL default '0',
  `forum_redirect_forumlist` int(10) unsigned NOT NULL default '0',
  `forum_redirect_posteditor` int(10) unsigned NOT NULL default '0',
  `forum_redirect` int(10) unsigned NOT NULL default '0',
  `forum_use_fixed_forum` char(1) NOT NULL default '',
  `forum_use_fixed_thread` char(1) NOT NULL default '',
  `forum_fixed_forum` int(10) unsigned NOT NULL default '0',
  `forum_fixed_thread` int(10) unsigned NOT NULL default '0'
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
