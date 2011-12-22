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
$GLOBALS['TL_LANG']['tl_forum_threads']['title'] = array('Titel', 'Titel des Themas');

$GLOBALS['TL_LANG']['tl_forum_threads']['forum_creator_information'] = 'Forum - Erstellerinformationen';
$GLOBALS['TL_LANG']['tl_forum_threads']['created_by'] = array('Ertellt von', 'Benutzer, der dieses Thema erstellt hat');
$GLOBALS['TL_LANG']['tl_forum_threads']['created_date'] = array('Erstellungsdatum', 'Datum der Erstellung');
$GLOBALS['TL_LANG']['tl_forum_threads']['created_time'] = array('Erstellungsuhrzeit', 'Uhrzeit der Erstellung');

$GLOBALS['TL_LANG']['tl_forum_threads']['forum_additional_settings'] = 'Forum - Erweiterte Einstellugnen';
$GLOBALS['TL_LANG']['tl_forum_threads']['deleted'] = array('Gel&ouml;scht', 'Anklicken, wenn das Thema gel&ouml;scht wurde');
$GLOBALS['TL_LANG']['tl_forum_threads']['locked'] = array('Gesperrt', 'Anklicken, wenn das Thema gesperrt ist. Gesperrte Themen k&ouml;nnen nicht beantwortet werden');
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type'] = array('Thementyp', 'Legt den Typ des Themas fest');
/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['N']='Normal';
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['A']='Ank&uuml;digung';
$GLOBALS['TL_LANG']['tl_forum_threads']['thread_type']['B']='Bekanntmachung';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_threads']['new']    = array('Neues Thema', 'Thema hinzuf&uuml;gen');
$GLOBALS['TL_LANG']['tl_forum_threads']['edit']   = array('Thema bearbeiten', 'Thema bearbeiten');
$GLOBALS['TL_LANG']['tl_forum_threads']['copy']   = array('Thema kopieren', 'Thema kopieren');
$GLOBALS['TL_LANG']['tl_forum_threads']['delete'] = array('Thema l&ouml;schen', 'Thema l&ouml;schen');
$GLOBALS['TL_LANG']['tl_forum_threads']['show']   = array('Thema anzeigen', 'Thema anzeigen');
$GLOBALS['TL_LANG']['tl_forum_threads']['posts']   = array('Beitr&auml;ge verwalten', 'Beitr&auml;ge verwalten');

?>