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
$GLOBALS['TL_LANG']['tl_forum_posts']['title'] = array('Title', 'Title of the post');
$GLOBALS['TL_LANG']['tl_forum_posts']['text'] = array('Text', 'Text of the post');

$GLOBALS['TL_LANG']['tl_forum_posts']['forum_creator_information'] = 'Forum - Creator information';
$GLOBALS['TL_LANG']['tl_forum_posts']['created_by'] = array('Created by', 'User which created this post');
$GLOBALS['TL_LANG']['tl_forum_posts']['created_date'] = array('Date of creation', 'Date this post was created');
$GLOBALS['TL_LANG']['tl_forum_posts']['created_time'] = array('Time of creation', 'Time this post was created');
$GLOBALS['TL_LANG']['tl_forum_posts']['created_ip'] = array('IP', 'IP address of the creator');

$GLOBALS['TL_LANG']['tl_forum_posts']['forum_additional_settings'] = 'Forum - Additional settings';
$GLOBALS['TL_LANG']['tl_forum_posts']['changed'] = array('Changed', 'Check if this post has been changed after creation');
$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_by'] = array('Last changed by', 'User which changed this post the last time');
$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_date'] = array('Date of last change', 'Date this post was changed the last time');
$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_time'] = array('Time of last change', 'Time this post was changed the last time');
$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_reason'] = array('Reason', 'Reason for the last change');
$GLOBALS['TL_LANG']['tl_forum_posts']['deleted'] = array('Deleted', 'Check if this post has been deleted');
/**
 * Reference
 */


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_posts']['new']    = array('New post', 'Add post');
$GLOBALS['TL_LANG']['tl_forum_posts']['edit']   = array('Edit post', 'Edit post');
$GLOBALS['TL_LANG']['tl_forum_posts']['copy']   = array('Copy post', 'Copy post');
$GLOBALS['TL_LANG']['tl_forum_posts']['delete'] = array('Delete post', 'Delete post');
$GLOBALS['TL_LANG']['tl_forum_posts']['show']   = array('Show post', 'Show post');

?>