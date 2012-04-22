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
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group'] = array('User group', 'Defines for which type of user this permissions apply');
$GLOBALS['TL_LANG']['tl_forum_permissions']['member_group'] = array('Member group', 'Member group for which this permissions apply');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u'] = 'User rights';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u'] = array('User rights', 'Grantes the user all user rights');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_fa'] = 'User-Forum-Access';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa'] = array('User-Forum-Access', 'Allows the user to get the forum listed and access it');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa_l'] = array('User-Forum-Access-List', 'Allows the user to get this forum listed');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa_r'] = array('User-Forum-Access-Read', 'Allows the user to read this forum');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_ta'] = 'User-Thread-Access';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta'] = array('User-Thread-Access', 'Allows the user to access threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_ta_m'] = 'User-Thread-Access-Own threads';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m'] = array('User-Thread-Access-Own threads', 'Allows the user to access own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_n'] = array('User-Thread-Access-Own threads-Normal', 'Allows the user to read own normal threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_b'] = array('User-Thread-Access-Own threads-Broadcast', 'Allows the user to read own broadcasts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_s'] = array('User-Thread-Access-Own threads-Special', 'Allows the user to read own special threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_l'] = array('User-Thread-Access-Own threads-Locked', 'Allows the user to read own locked threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_a'] = array('User-Thread-Access-Own threads-Announcement', 'Allows the user to read own announcements');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_tc'] = 'User-Thread-Create';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_tc'] = array('User-Thread-Create', 'Allows the user to create threads');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te'] = 'User-Thread-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te'] = array('User-Thread-Edit', 'Allows the user to change threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te_m'] = 'User-Thread-Edit-Own threads';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m'] = array('User-Thread-Edit-Own threads', 'Allows the user to change own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_h'] = array('User-Thread-Edit-Own threads-Title', 'Allows the user to change the title of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d'] = array('User-Thread-Edit-Own threads-Text', 'Allows the user to change the text of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te_m_t'] = 'User-Thread-Edit-Own threads-Type';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t'] = array('User-Thread-Edit-Own threads-Type', 'Allows the user to change the thread type of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_n'] = array('User-Thread-Edit-Own threads-Type-Normal', 'Allows the user to change the thread type of own threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_b'] = array('User-Thread-Edit-Own threads-Type-Broadcast', 'Allows the user to change the thread type of own threads to broadcast');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_a'] = array('User-Thread-Edit-Own threads-Type-Announcement', 'Allows the user to change the thread type of own threads to announcement');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te_m_s'] = 'User-Thread-Edit-Own threads-Special';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s'] = array('User-Thread-Edit-Own threads-Special', 'Allows the user to change the special indicator of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s_s'] = array('User-Thread-Edit-Own threads-Special-Special', 'Allows the user to change the special indicator of own threads to special');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s_u'] = array('User-Thread-Edit-Own threads-Special-Normal', 'Allows the user to change the special indicator of own threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te_m_l'] = 'User-Thread-Edit-Own threads-Locked';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l'] = array('User-Thread-Edit-Own threads-Locked', 'Allows the user to change the locked indicator of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l_l'] = array('User-Thread-Edit-Own threads-Locked-Locked', 'Allows the user to change the locked indicator of own threads to locked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l_u'] = array('User-Thread-Edit-Own threads-Locked-Unlocked', 'Allows the user to change the locked of own threads to unlocked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_te_m_d'] = 'User-Thread-Edit-Own threads-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d'] = array('User-Thread-Edit-Own threads-Deleted', 'Allows the user to change the deleted flag of own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d_d'] = array('User-Thread-Edit-Own threads-Deleted-Deleted', 'Allows the user to change the deleted flag of own threads to deleted');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d_u'] = array('User-Thread-Edit-Own threads-Deleted-Normal', 'Allows the user to change the deleted flag of own threads to undeleted');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pc'] = 'User-Post-Create';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc'] = array('User-Post-Create', 'Allows the user to create posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pc_r'] = 'User-Post-Create-Reply';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r'] = array('User-Post-Create-Reply', 'Allows the user to reply to posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r_m'] = array('User-Post-Create-Reply-Own threads', 'Allows the user to reply to own threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r_o'] = array('User-Post-Create-Reply-Others threads', 'Allows the user to reply to others threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pc_q'] = 'User-Post-Create-Quote';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q'] = array('User-Post-Create-Quote', 'Allows the user to quote posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q_m'] = array('User-Post-Create-Quote-Own posts', 'Allows the user to quote to own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q_o'] = array('User-Post-Create-Quote-Others posts', 'Allows the user to quote to others posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pc_a'] = 'User-Post-Create-Answer';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a'] = array('User-Post-Create-Answer', 'Allows the user to answer to posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a_m'] = array('User-Post-Create-Answer-Own posts', 'Allows the user to answer to own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a_o'] = array('User-Post-Create-Answer-Others posts', 'Allows the user to answer to others posts');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pe'] = 'User-Post-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe'] = array('User-Post-Edit', 'Allows the user to edit posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pe_m'] = 'User-Post-Edit-My posts';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m'] = array('User-Post-Edit-My posts', 'Allows the user to edit own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_h'] = array('User-Post-Edit-My posts-Title', 'Allows the user to edit the title of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_t'] = array('User-Post-Edit-My posts-Text', 'Allows the user to edit the text of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_pe_m_d'] = 'User-Post-Edit-My posts-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d'] = array('User-Post-Edit-My posts-Delted', 'Allows the user to edit the deleted flag of own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d_d'] = array('User-Post-Edit-My posts-Deleted-Deleted', 'Allows the user to delete own posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d_u'] = array('User-Post-Edit-My posts-Deleted-Undeleted', 'Allows the user to undelete own posts');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m'] = 'Moderator rights';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m'] = array('Moderator rights', 'Grantes the user all moderator rights');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te'] = 'Moderator-Thread-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te'] = array('Moderator-Thread-Edit', 'Allows the user to change all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_h'] = array('Moderator-Thread-Edit-Title', 'Allows the user to change the title of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t'] = array('Moderator-Thread-Edit-Text', 'Allows the user to change the text of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_t'] = 'Moderator-Thread-Edit-Type';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t'] = array('Moderator-Thread-Edit-Type', 'Allows the user to change the thread type of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_n'] = array('Moderator-Thread-Edit-Type-Normal', 'Allows the user to change the thread type of all threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_b'] = array('Moderator-Thread-Edit-Type-Broadcast', 'Allows the user to change the thread type of all threads to broadcast');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_a'] = array('Moderator-Thread-Edit-Type-Announcement', 'Allows the user to change the thread type of all threads to announcement');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_s'] = 'Moderator-Thread-Edit-Special';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s'] = array('Moderator-Thread-Edit-Special', 'Allows the user to change the special indicator of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_s'] = array('Moderator-Thread-Edit-Special-Special', 'Allows the user to change the special indicator of all threads to special');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_u'] = array('Moderator-Thread-Edit-Special-Normal', 'Allows the user to change the special indicator of all threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_l'] = 'Moderator-Thread-Edit-Locked';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l'] = array('Moderator-Thread-Edit-Locked', 'Allows the user to change the locked indicator of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_l'] = array('Moderator-Thread-Edit-Locked-Locked', 'Allows the user to change the locked indicator of all threads to locked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_u'] = array('Moderator-Thread-Edit-Locked-Unlocked', 'Allows the user to change the locked of all threads to unlocked');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_d'] = 'Moderator-Thread-Edit-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d'] = array('Moderator-Thread-Edit-Deleted', 'Allows the user to change the deleted flag of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_d'] = array('Moderator-Thread-Edit-Deleted-Deleted', 'Allows the user to change the deleted flag of all threads to deleted');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_u'] = array('Moderator-Thread-Edit-Deleted-Normal', 'Allows the user to change the deleted flag of all threads to deleted');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_pe'] = 'Moderator-Post-Edit';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe'] = array('Moderator-Post-Edit', 'Allows the user to edit all posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_h'] = array('Moderator-Post-Edit-Title', 'Allows the user to edit the title of all posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_t'] = array('Moderator-Post-Edit-Text', 'Allows the user to edit the text of all posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_pe_d'] = 'Moderator-Post-Edit-Deleted';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d'] = array('Moderator-Post-Edit-Deleted', 'Allows the user to edit the deleted flag of all posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_d'] = array('Moderator-Post-Edit-Deleted-Deleted', 'Allows the user to delete all posts');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_u'] = array('Moderator-Post-Edit-Deleted-Undeleted', 'Allows the user to undelete all posts');


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['G'] = 'Guests';
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['B'] = 'Bots';
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['C'] = 'Member group';

$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['A'] = 'Allow';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['D'] = 'Deny';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['N'] = 'Never';

$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['A'] = 'Allow all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['D'] = 'Deny all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['N'] = 'Never all';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['C'] = 'Custom';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_permissions']['new']    = array('New permission', 'Add permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['edit']   = array('Edit permission', 'Edit this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['copy']   = array('Copy permission', 'Copy this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['delete'] = array('Delete permission', 'Delete this permission');
$GLOBALS['TL_LANG']['tl_forum_permissions']['show']   = array('Show permission', 'Show this permission');

?>