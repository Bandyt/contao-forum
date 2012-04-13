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
  `forum_type` char(1) NOT NULL default 'F',
  `title` varchar(255) NOT NULL default '',
  `forum_redirect_threadreader` int(10) unsigned NOT NULL default '0',
  `forum_redirect_threadeditor` int(10) unsigned NOT NULL default '0',
  `forum_redirect_forumlist` int(10) unsigned NOT NULL default '0',
  `forum_redirect_posteditor` int(10) unsigned NOT NULL default '0',
  `forum_redirect_moderator_panel` int(10) unsigned NOT NULL default '0',
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
  `answered_post` int(10) unsigned NOT NULL default '0',
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
-- Table `tl_forum_permissions`
-- 

CREATE TABLE `tl_forum_permissions` (
	`id` int(10) unsigned NOT NULL auto_increment,
	`pid` int(10) unsigned NOT NULL default '0',
	`sorting` int(10) unsigned NOT NULL default '0',
	`tstamp` int(10) unsigned NOT NULL default '0',
	`member_group` int(10) unsigned NOT NULL default '0',
	`u` char(1) NOT NULL default '',
	`u_f` char(1) NOT NULL default '',
	`u_f_a` char(1) NOT NULL default '',
	`u_f_a_l` char(1) NOT NULL default '',
	`u_f_a_r` char(1) NOT NULL default '',
	`u_t` char(1) NOT NULL default '',
	`u_t_a` char(1) NOT NULL default '',
	`u_t_a_m` char(1) NOT NULL default '',
	`u_t_a_m_n` char(1) NOT NULL default '',
	`u_t_a_m_b` char(1) NOT NULL default '',
	`u_t_a_m_s` char(1) NOT NULL default '',
	`u_t_a_m_l` char(1) NOT NULL default '',
	`u_t_a_m_a` char(1) NOT NULL default '',
	`u_t_a_o` char(1) NOT NULL default '',
	`u_t_a_o_n` char(1) NOT NULL default '',
	`u_t_a_o_b` char(1) NOT NULL default '',
	`u_t_a_o_s` char(1) NOT NULL default '',
	`u_t_a_o_l` char(1) NOT NULL default '',
	`u_t_a_o_a` char(1) NOT NULL default '',
	`u_t_c` char(1) NOT NULL default '',
	`u_t_c_t` char(1) NOT NULL default '',
	`u_t_c_s` char(1) NOT NULL default '',
	`u_t_c_a` char(1) NOT NULL default '',
	`u_t_c_b` char(1) NOT NULL default '',
	`u_t_c_l` char(1) NOT NULL default '',
	`u_t_e` char(1) NOT NULL default '',
	`u_t_e_m` char(1) NOT NULL default '',
	`u_t_e_m_h` char(1) NOT NULL default '',
	`u_t_e_m_t` char(1) NOT NULL default '',
	`u_t_e_m_t_n` char(1) NOT NULL default '',
	`u_t_e_m_t_b` char(1) NOT NULL default '',
	`u_t_e_m_t_a` char(1) NOT NULL default '',
	`u_t_e_m_s` char(1) NOT NULL default '',
	`u_t_e_m_s_s` char(1) NOT NULL default '',
	`u_t_e_m_s_u` char(1) NOT NULL default '',
	`u_t_e_m_l` char(1) NOT NULL default '',
	`u_t_e_m_l_l` char(1) NOT NULL default '',
	`u_t_e_m_l_u` char(1) NOT NULL default '',
	`u_t_e_m_d` char(1) NOT NULL default '',
	`u_t_e_m_d_d` char(1) NOT NULL default '',
	`u_t_e_m_d_u` char(1) NOT NULL default '',
	`u_p` char(1) NOT NULL default '',
	`u_p_c` char(1) NOT NULL default '',
	`u_p_c_r` char(1) NOT NULL default '',
	`u_p_c_r_m` char(1) NOT NULL default '',
	`u_p_c_r_o` char(1) NOT NULL default '',
	`u_p_c_q` char(1) NOT NULL default '',
	`u_p_c_q_m` char(1) NOT NULL default '',
	`u_p_c_q_o` char(1) NOT NULL default '',
	`u_p_c_a` char(1) NOT NULL default '',
	`u_p_c_a_m` char(1) NOT NULL default '',
	`u_p_c_a_o` char(1) NOT NULL default '',
	`u_p_e` char(1) NOT NULL default '',
	`u_p_e_m` char(1) NOT NULL default '',
	`u_p_e_m_h` char(1) NOT NULL default '',
	`u_p_e_m_t` char(1) NOT NULL default '',
	`u_p_e_m_d` char(1) NOT NULL default '',
	`u_p_e_m_d_d` char(1) NOT NULL default '',
	`u_p_e_m_d_u` char(1) NOT NULL default '',
	`u_p_e_o` char(1) NOT NULL default '',
	`u_p_e_o_h` char(1) NOT NULL default '',
	`u_p_e_o_t` char(1) NOT NULL default '',
	`u_p_e_o_d` char(1) NOT NULL default '',
	`u_p_e_o_d_d` char(1) NOT NULL default '',
	`u_p_e_o_d_u` char(1) NOT NULL default '',
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
  `object` varchar(255) NOT NULL default '',
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
-- Table `tl_forum_change_log`
-- 

CREATE TABLE `tl_forum_change_log` (
  `thread` int(10) unsigned NOT NULL default '0',
  `post` int(10) unsigned NOT NULL default '0',
  `committer` int(10) unsigned NOT NULL default '0',
  `change_time` int(10) unsigned NOT NULL default '0',
  `change_ip` varchar(255) NOT NULL default '',
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
  `forum_use_fixed_forum` char(1) NOT NULL default '',
  `forum_use_fixed_thread` char(1) NOT NULL default '',
  `forum_fixed_forum` int(10) unsigned NOT NULL default '0',
  `forum_fixed_thread` int(10) unsigned NOT NULL default '0',
  `forum_forum_root` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
