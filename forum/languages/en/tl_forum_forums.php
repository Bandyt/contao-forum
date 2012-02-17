<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    forum 
 * @license    LGPL 
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_forum_forums']['pid'] = array('Parent forum', 'Parent forum of this forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['title'] = array('Title', 'Title of the forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['description'] = array('Description', 'Description of the forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_type'] = array('Type', 'Type of the forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_settings'] = 'Redirect settings';
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_threadreader'] = array('Thread reader', 'Page containing the thread reader');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_threadeditor'] = array('Thread editor', 'Page containing the thread editor');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_forumlist'] = array('Forum list', 'Page containing the forum list');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_posteditor'] = array('Post editor', 'Page containing the post editor');
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_moderator_panel'] = array('Moderator panel', 'Page containing the moderator panel');


$GLOBALS['TL_LANG']['tl_forum_forums']['dca_label'] = 'Available forums';
/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_type']['reference']['F']='Forum';
$GLOBALS['TL_LANG']['tl_forum_forums']['forum_type']['reference']['R']='Root of a forum';

$GLOBALS['TL_LANG']['tl_forum_forums']['logging']['reference']['L'] = 'Enabled'; 
$GLOBALS['TL_LANG']['tl_forum_forums']['logging']['reference']['N'] = 'Disabled';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_forums']['new']    = array('New forum', 'Add forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['edit']   = array('Edit forum', 'Edit forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['copy']   = array('Copy forum', 'Copy forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['delete'] = array('Delete forum', 'Delete forum');
$GLOBALS['TL_LANG']['tl_forum_forums']['show']   = array('Show forum', 'Show forum');

?>