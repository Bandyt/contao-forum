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
$GLOBALS['TL_LANG']['tl_forum_threads']['title'] = array('Title', 'Title of the thread');

$GLOBALS['TL_LANG']['tl_forum_threads']['forum_creator_information'] = 'Forum - Creator information';
$GLOBALS['TL_LANG']['tl_forum_threads']['created_by'] = array('Created by', 'User which created this thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['created_date'] = array('Date of creation', 'Date this thread was created');
$GLOBALS['TL_LANG']['tl_forum_threads']['created_time'] = array('Time of creation', 'Time this thread was created');

$GLOBALS['TL_LANG']['tl_forum_threads']['forum_additional_settings'] = 'Forum - Additional settings';
$GLOBALS['TL_LANG']['tl_forum_threads']['deleted'] = array('Deleted', 'Check if this thread has been deleted');
$GLOBALS['TL_LANG']['tl_forum_threads']['locked'] = array('Locked', 'Check if this thread is locked. Locked threads cannot be answered');
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type'] = array('Thread type', 'Defines the type of thread');
/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['reference']['N']='Normal';
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['reference']['A']='Announcement';
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['reference']['B']='Broadcast';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_threads']['new']    = array('New thread', 'Add thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['edit']   = array('Edit thread', 'Edit thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['copy']   = array('Copy thread', 'Copy thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['delete'] = array('Delete thread', 'Delete thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['show']   = array('Show thread', 'Show thread');
$GLOBALS['TL_LANG']['tl_forum_threads']['posts']   = array('Manage posts', 'Manage posts');

?>