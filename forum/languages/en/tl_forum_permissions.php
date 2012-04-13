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
$GLOBALS['TL_LANG']['tl_forum_permissions']['member_group'] = array('Member group', 'Group for which this permissions apply');

$GLOBALS['TL_LANG']['tl_forum_permissions']['user_permissions'] = 'Permission for user';

$GLOBALS['TL_LANG']['tl_forum_permissions']['u'] = array('User', 'Permission for the object group User');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_f'] = 'User-Forum';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f'] = array('User-Forum', 'Permission for the object group User-Forum');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_f_a'] = 'User-Forum-Access';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a'] = array('User-Forum-Access', 'Allows the user to get the forum listed and access it');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_l'] = array('User-Forum-Access-List', 'Allows the user to get this forum listed');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_r'] = array('User-Forum-Access-Read', 'Allows the user to read this forum');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t'] = 'User-Thread';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t'] = array('User-Thread', 'Allows the user to access, create and edit threads');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a'] = 'User-Thread-Access';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a'] = array('User-Thread-Access', 'Allows the user to access threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a_m'] = 'User-Thread-Access-Own threads';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m'] = array('User-Thread-Access-Own threads', 'Allows the user to access own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_n'] = array('User-Thread-Access-Own threads-Normal', 'Allows the user to read own normal threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_b'] = array('User-Thread-Access-Own threads-Broadcast', 'Allows the user to read own broadcasts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_s'] = array('User-Thread-Access-Own threads-Special', 'Allows the user to read own special threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_l'] = array('User-Thread-Access-Own threads-Locked', 'Allows the user to read own locked threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_a'] = array('User-Thread-Access-Own threads-Announcement', 'Allows the user to read own announcements');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a_o'] = 'User-Thread-Access-Others threads';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o'] = array('User-Thread-Access-Others threads', 'Allows the user to access others threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_n'] = array('User-Thread-Access-Others threads-Normal', 'Allows the user to read others normal threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_b'] = array('User-Thread-Access-Others threads-Broadcast', 'Allows the user to read others broadcasts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_s'] = array('User-Thread-Access-Others threads-Special', 'Allows the user to read others special threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_l'] = array('User-Thread-Access-Others threads-Locked', 'Allows the user to read others locked threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_a'] = array('User-Thread-Access-Others threads-Announcement', 'Allows the user to read others announcements');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_c'] = 'User-Thread-Create';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c'] = array('User-Thread-Create', 'Allows the user to create threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_t'] = array('User-Thread-Create-Normal', 'Allows the user to create a new normal thread');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_s'] = array('User-Thread-Create-Special', 'Allows the user to create a new special thread');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_a'] = array('User-Thread-Create-Announcement', 'Allows the user to create a new announcement thread');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_b'] = array('User-Thread-Create-Broadcast', 'Allows the user to create a new broadcast thread');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_l'] = array('User-Thread-Create-Locked', 'Allows the user to create a new locked thread');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e'] = 'User-Thread-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e'] = array('User-Thread-Edit', 'Allows the user to change threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m'] = 'User-Thread-Edit-Own threads';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m'] = array('User-Thread-Edit-Own threads', 'Allows the user to change own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_h'] = array('User-Thread-Edit-Own threads-Title', 'Allows the user to change the title of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_d'] = array('User-Thread-Edit-Own threads-Text', 'Allows the user to change the text of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_t'] = 'User-Thread-Edit-Own threads-Type';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('User-Thread-Edit-Own threads-Type', 'Allows the user to change the thread type of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('User-Thread-Edit-Own threads-Type-Normal', 'Allows the user to change the thread type of own threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('User-Thread-Edit-Own threads-Type-Broadcast', 'Allows the user to change the thread type of own threads to broadcast');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_a'] = array('User-Thread-Edit-Own threads-Type-Announcement', 'Allows the user to change the thread type of own threads to announcement');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_s'] = 'User-Thread-Edit-Own threads-Special';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s'] = array('User-Thread-Edit-Own threads-Special', 'Allows the user to change the special indicator of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_s'] = array('User-Thread-Edit-Own threads-Special-Special', 'Allows the user to change the special indicator of own threads to special');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_u'] = array('User-Thread-Edit-Own threads-Special-Normal', 'Allows the user to change the special indicator of own threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_l'] = 'User-Thread-Edit-Own threads-Locked';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('User-Thread-Edit-Own threads-Locked', 'Allows the user to change the locked indicator of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('User-Thread-Edit-Own threads-Locked-Locked', 'Allows the user to change the locked indicator of own threads to locked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('User-Thread-Edit-Own threads-Locked-Unlocked', 'Allows the user to change the locked of own threads to unlocked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_d'] = 'User-Thread-Edit-Own threads-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('User-Thread-Edit-Own threads-Deleted', 'Allows the user to change the deleted flag of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('User-Thread-Edit-Own threads-Deleted-Deleted', 'Allows the user to change the deleted flag of own threads to deleted');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('User-Thread-Edit-Own threads-Deleted-Normal', 'Allows the user to change the deleted flag of own threads to deleted');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p'] = 'User-Post';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p'] = array('User-Post', 'Allows the user to access, create and edit posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c'] = 'User-Post-Create';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c'] = array('User-Post-Create', 'Allows the user to create posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_r'] = 'User-Post-Create-Reply';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r'] = array('User-Post-Create-Reply', 'Allows the user to reply to posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_m'] = array('User-Post-Create-Reply-Own posts', 'Allows the user to reply to own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_o'] = array('User-Post-Create-Reply-Others posts', 'Allows the user to reply to others posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_q'] = 'User-Post-Create-Quote';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q'] = array('User-Post-Create-Quote', 'Allows the user to quote posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_m'] = array('User-Post-Create-Quote-Own posts', 'Allows the user to quote to own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_o'] = array('User-Post-Create-Quote-Others posts', 'Allows the user to quote to others posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_a'] = 'User-Post-Create-Answer';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a'] = array('User-Post-Create-Answer', 'Allows the user to answer to posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_m'] = array('User-Post-Create-Answer-Own posts', 'Allows the user to answer to own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_o'] = array('User-Post-Create-Answer-Others posts', 'Allows the user to answer to others posts');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e'] = 'User-Post-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e'] = array('User-Post-Edit', 'Allows the user to edit posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e_m'] = 'User-Post-Edit-My posts';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m'] = array('User-Post-Edit-My posts', 'Allows the user to edit own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_h'] = array('User-Post-Edit-My posts-Title', 'Allows the user to edit the title of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_t'] = array('User-Post-Edit-My posts-Text', 'Allows the user to edit the text of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e_m_d'] = 'User-Post-Edit-My posts-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d'] = array('User-Post-Edit-My posts-Delted', 'Allows the user to edit the deleted flag of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_d'] = array('User-Post-Edit-My posts-Deleted-Deleted', 'Allows the user to delete own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_u'] = array('User-Post-Edit-My posts-Deleted-Undeleted', 'Allows the user to undelete own posts');

$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['A'] = 'Allow';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['D'] = 'Deny';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['N'] = 'Never';

$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['A'] = 'Allow all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['D'] = 'Deny all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['N'] = 'Never all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['C'] = 'Custom';


/**
 * Reference
 */


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_permissions']['new']    = array('New permission', 'Add permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['edit']   = array('Edit permission', 'Edit this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['copy']   = array('Copy permission', 'Copy this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['delete'] = array('Delete permission', 'Delete this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['show']   = array('Show permission', 'Show this permission');

?>