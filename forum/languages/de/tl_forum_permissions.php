<?php if (!defined('TL_ROOT')) die('You cannot Zugriff this file directly!');

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
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group'] = array('Benutzergruppe', 'Legt den Typ Benutzer fest f&uuml;r den diese Berechtigung gilt');
$GLOBALS['TL_LANG']['tl_forum_permissions']['member_group'] = array('Mitgliedergruppe', 'Gruppe f&uml;r die diese Berechtigung gilt');

$GLOBALS['TL_LANG']['tl_forum_permissions']['Benutzer_permissions'] = 'Benutzer-Rechte';

$GLOBALS['TL_LANG']['tl_forum_permissions']['u'] = array('Benutzer', 'Erlaubt dem Anwender alle Benutzerrechte');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_f'] = 'Benutzer-Forum';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f'] = array('Benutzer-Forum', 'Erlaubt dem Anwender dieses Forum aufgelistet und angezeigt zu bekommen');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_f_a'] = 'Benutzer-Forum-Zugriff';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a'] = array('Benutzer-Forum-Zugriff', 'Erlaubt dem Anwender dieses Forum aufgelistet und angezeigt zu bekommen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_l'] = array('Benutzer-Forum-Zugriff-Auflistung', 'Erlaubt dem Anwender dieses Forum aufgelistet zu bekommen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_r'] = array('Benutzer-Forum-Zugriff-Lesen', 'Erlaubt dem Anwender auf dieses Forum zuzugreifen');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t'] = 'Benutzer-Thema';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t'] = array('Benutzer-Thema', 'Erlaubt dem Anwender den Zugriff, das Erstellen und das Bearbeiten von Themen');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a'] = 'Benutzer-Thema-Zugriff';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a'] = array('Benutzer-Thema-Zugriff', 'Erlaubt dem Anwender Zugriff auf alle Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a_m'] = 'Benutzer-Thema-Zugriff-Eigene Themen';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m'] = array('Benutzer-Thema-Zugriff-Eigene Themen', 'Erlaubt dem Anwender Zugriff auf alle seine Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_n'] = array('Benutzer-Thema-Zugriff-Eigene Themen-Normal', 'Erlaubt dem Anwender Zugriff auf alle seine normalen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_b'] = array('Benutzer-Thema-Zugriff-Eigene Themen-Bekanntmachung', 'Erlaubt dem Anwender Zugriff auf alle seine Bekanntmachungen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_s'] = array('Benutzer-Thema-Zugriff-Eigene Themen-Besonders', 'Erlaubt dem Anwender Zugriff auf alle seine besonderen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_l'] = array('Benutzer-Thema-Zugriff-Eigene Themen-Gesperrt', 'Erlaubt dem Anwender Zugriff auf alle seine gesperrten Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_a'] = array('Benutzer-Thema-Zugriff-Eigene Themen-Ank&uuml;ndigung', 'Erlaubt dem Anwender Zugriff auf alle seine Ank&uuml;digungen');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_a_o'] = 'Benutzer-Thema-Zugriff-Andere Themen';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o'] = array('Benutzer-Thema-Zugriff-Andere Themen', 'Erlaubt dem Anwender Zugriff auf alle Themen von anderen Usern');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_n'] = array('Benutzer-Thema-Zugriff-Andere Themen-Normal', 'Erlaubt dem Anwender Zugriff auf alle normalen Themen von anderen Usern');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_b'] = array('Benutzer-Thema-Zugriff-Andere Themen-Bekanntmachung', 'Erlaubt dem Anwender Zugriff auf Bekanntmachungen von anderen Usern');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_s'] = array('Benutzer-Thema-Zugriff-Andere Themen-Besonders', 'Erlaubt dem Anwender Zugriff auf alle besonderen Themen von anderen Usern');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_l'] = array('Benutzer-Thema-Zugriff-Andere Themen-Gesperrt', 'Erlaubt dem Anwender Zugriff auf alle gesperrten Themen von anderen Usern');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_a'] = array('Benutzer-Thema-Zugriff-Andere Themen-Ank&uuml;digung', 'Erlaubt dem Anwender Zugriff auf alle Ank&uuml;digungen von anderen Usern');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_c'] = 'Benutzer-Thema-Erstellen';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c'] = array('Benutzer-Thema-Erstellen', 'Erlaubt dem Anwender das Erstellen von allen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_t'] = array('Benutzer-Thema-Erstellen-Normal', 'Erlaubt dem Anwender das Erstellen von normalen Themen');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e'] = 'Benutzer-Thema-Bearbeiten';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e'] = array('Benutzer-Thema-Bearbeiten', 'Erlaubt dem Anwender das &Auml;ndern von Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m'] = 'Benutzer-Thema-Bearbeiten-Eigene Themen';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen', 'Erlaubt dem Anwender das &Auml;ndern von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_h'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-&Uuml;berschrift', 'Erlaubt dem Anwender das &Auml;ndern der &Uuml;berschrift von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_d'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Text', 'Erlaubt dem Anwender das &Auml;ndern des Textes von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_t'] = 'Benutzer-Thema-Bearbeiten-Eigene Themen-Typ';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Typ', 'Erlaubt dem Anwender das &Auml;ndern des Typs von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Typ-Normal', 'Erlaubt dem Anwender das &Auml;ndern des Typs von eigenen Themen auf Normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Typ-Bekanntmachung', 'Erlaubt dem Anwender das &Auml;ndern des Typs von eigenen Themen auf Bekanntmachung');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_a'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Typ-Ank&uuml;ndigung', 'Erlaubt dem Anwender das &Auml;ndern des Typs von eigenen Themen auf Ank&uuml;ndigung');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_s'] = 'Benutzer-Thema-Bearbeiten-Eigene Themen-Besonders';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Besonders', 'Erlaubt dem Anwender das &Auml;ndern des Besonders-Kennzeichens von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_s'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Besonders-Besonders', 'Erlaubt dem Anwender das &Auml;ndern des Besonders-Kennzeichens von eigenen Themen auf Besonders');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_u'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Besonders-Normal', 'Erlaubt dem Anwender das &Auml;ndern des Besonders-Kennzeichens von eigenen Themen auf Normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_l'] = 'Benutzer-Thema-Bearbeiten-Eigene Themen-Gesperrt';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gesperrt', 'Erlaubt dem Anwender das &Auml;ndern des Gesperrt-Kennzeichens von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gesperrt-Gesperrt', 'Erlaubt dem Anwender das &Auml;ndern des Gesperrt-Kennzeichens von eigenen Themen auf Gesperrt');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gesperrt-Normal', 'Erlaubt dem Anwender das &Auml;ndern des Gesperrt-Kennzeichens von eigenen Themen auf Normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_t_e_m_d'] = 'Benutzer-Thema-Bearbeiten-Eigene Themen-Gel&ouml;scht';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gel&ouml;scht', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gel&ouml;scht-Gel&ouml;scht', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Themen auf Gel&ouml;scht');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'] = array('Benutzer-Thema-Bearbeiten-Eigene Themen-Gel&ouml;scht-Normal', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Themen auf Normal');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p'] = 'Benutzer-Beitrag';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p'] = array('Benutzer-Beitrag', 'Erlaubt dem Benutzer das Erstellen und &Auml;ndern von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c'] = 'Benutzer-Beitrag-Erstellen';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c'] = array('Benutzer-Beitrag-Erstellen', 'Erlaubt dem Benutzer das Erstellen von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_r'] = 'Benutzer-Beitrag-Erstellen-Neuer Beitrag';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r'] = array('Benutzer-Beitrag-Erstellen-Neuer Beitrag', 'Erlaubt dem Benutzer das Erstellen von neuen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_m'] = array('Benutzer-Beitrag-Erstellen-Neuer Beitrag-Eigene Themen', 'Erlaubt dem Benutzer das Erstellen von Beitr&auml;gen zu eigenen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_o'] = array('Benutzer-Beitrag-Erstellen-Neuer Beitrag-Andere Themen', 'Erlaubt dem Benutzer das Erstellen von Beitr&auml;gen zu anderen Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_q'] = 'Benutzer-Beitrag-Erstellen-Zitat';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q'] = array('Benutzer-Beitrag-Erstellen-Zitat', 'Erlaubt dem Benutzer das Zitieren von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_m'] = array('Benutzer-Beitrag-Erstellen-Zitat-Eigene Beitr&auml;ge', 'Erlaubt dem Benutzer das Zitieren von eigenen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_o'] = array('Benutzer-Beitrag-Erstellen-Zitat-Andere Beitr&auml;ge', 'Erlaubt dem Benutzer das Zitieren von anderen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_c_a'] = 'Benutzer-Beitrag-Erstellen-Antwort';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a'] = array('Benutzer-Beitrag-Erstellen-Antwort', 'Erlaubt dem Benutzer das Antworten auf Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_m'] = array('Benutzer-Beitrag-Erstellen-Antwort-Eigene Beitr&auml;ge', 'Erlaubt dem Benutzer das Antworten auf eigene Beitr&auml;ge');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_o'] = array('Benutzer-Beitrag-Erstellen-Antwort-Andere Beitr&auml;ge', 'Erlaubt dem Benutzer das Antworten auf andere Beitr&auml;ge');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e'] = 'Benutzer-Beitrag-Bearbeiten';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e'] = array('Benutzer-Beitrag-Bearbeiten', 'Erlaubt dem Benutzer das Bearbeiten von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e_m'] = 'Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge', 'Erlaubt dem Benutzer das Bearbeiten von eigenen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_h'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Title', 'Erlaubt dem Benutzer das Bearbeiten des Titels von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_t'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Text', 'Erlaubt dem Benutzer das Bearbeiten des Textes von Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_u_p_e_m_d'] = 'Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Gel&ouml;scht';
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Gel&ouml;scht', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_d'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Gel&ouml;scht-Gel&ouml;scht', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_u'] = array('Benutzer-Beitrag-Bearbeiten-Meine Beitr&auml;ge-Gel&ouml;scht-Normal', 'Erlaubt dem Anwender das &Auml;ndern des Gel&ouml;scht-Kennzeichens von eigenen Beitr&auml;gen');


$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m'] = 'Moderator-Rechte';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m'] = array('Moderator-Rechte', 'Erteilt dem Anwender alle Moderatorenrechte');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te'] = 'Moderator-Thema-Bearbeiten';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te'] = array('Moderator-Thema-Bearbeiten', 'Erlaubt dem Benutzer das Bearbeiten aller Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_h'] = array('Moderator-Thema-Bearbeiten-Titel', 'Erlaubt dem Benutzer das Bearbeiten des Titels aller Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t'] = array('Moderator-Thema-Bearbeiten-Text', 'Erlaubt dem Benutzer das Bearbeiten des Textes aller Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_t'] = 'Moderator-Thema-Bearbeiten-Typ';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t'] = array('Moderator-Thema-Bearbeiten-Typ', 'Erlaubt dem Benutzer das Bearbeiten des Typs aller Themen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_n'] = array('Moderator-Thema-Bearbeiten-Typ-Normal', 'Erlaubt dem Benutzer das Bearbeiten des Typs aller Themen auf Normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_b'] = array('Moderator-Thema-Bearbeiten-Typ-Bekanntmachung', 'Erlaubt dem Benutzer das Bearbeiten des Typs aller Themen auf Bekanntmachung');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_a'] = array('Moderator-Thema-Bearbeiten-Typ-Ank&uuml;ndigung', 'Erlaubt dem Benutzer das Bearbeiten des Typs aller Themen auf Ank&uuml;ndigung');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_s'] = 'Moderator-Thema-Bearbeiten-Besonders';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s'] = array('Moderator-Thema-Bearbeiten-Besonders', 'Allows the user to change the Besonders indicator of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_s'] = array('Moderator-Thema-Bearbeiten-Besonders-Besonders', 'Allows the user to change the Besonders indicator of all threads to Besonders');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_u'] = array('Moderator-Thema-Bearbeiten-Besonders-Normal', 'Allows the user to change the Besonders indicator of all threads to normal');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_l'] = 'Moderator-Thema-Bearbeiten-Gesperrt';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l'] = array('Moderator-Thema-Bearbeiten-Gesperrt', 'Allows the user to change the Gesperrt indicator of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_l'] = array('Moderator-Thema-Bearbeiten-Gesperrt-Gesperrt', 'Allows the user to change the Gesperrt indicator of all threads to Gesperrt');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_u'] = array('Moderator-Thema-Bearbeiten-Gesperrt-UnGesperrt', 'Allows the user to change the Gesperrt of all threads to unGesperrt');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_te_d'] = 'Moderator-Thema-Bearbeiten-Gel&ouml;scht';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d'] = array('Moderator-Thema-Bearbeiten-Gel&ouml;scht', 'Allows the user to change the Gel&ouml;scht flag of all threads');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_d'] = array('Moderator-Thema-Bearbeiten-Gel&ouml;scht-Gel&ouml;scht', 'Allows the user to change the Gel&ouml;scht flag of all threads to Gel&ouml;scht');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_u'] = array('Moderator-Thema-Bearbeiten-Gel&ouml;scht-Normal', 'Allows the user to change the Gel&ouml;scht flag of all threads to Gel&ouml;scht');

$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_pe'] = 'Moderator-Post-Bearbeiten';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe'] = array('Moderator-Post-Bearbeiten', 'Erlaubt dem Benutzer das Bearbeiten aller Beitr&auml;ge');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_h'] = array('Moderator-Post-Bearbeiten-Titel', 'Erlaubt dem Benutzer das Bearbeiten der Titel aller Beitr&auml;ge');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_t'] = array('Moderator-Post-Bearbeiten-Text', 'Erlaubt dem Benutzer das Bearbeiten des Textes aller Beitr&auml;ge');
$GLOBALS['TL_LANG']['tl_forum_permissions']['lbl_m_pe_d'] = 'Moderator-Post-Bearbeiten-Gel&ouml;scht';
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d'] = array('Moderator-Post-Bearbeiten-Gel&ouml;schft', 'Erlaubt dem Benutzer das Bearbeiten des Löschkennzeichens aller Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_d'] = array('Moderator-Post-Bearbeiten-Gel&ouml;scht-Gel&ouml;scht', 'Erlaubt dem Benutzer das Setzen des Löschkennzeichens aller Beitr&auml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_u'] = array('Moderator-Post-Bearbeiten-Gel&ouml;scht-UnGel&ouml;scht', 'Erlaubt dem Benutzer das R&uuml;cknehmen des Löschkennzeichens aller Beitr&auml;gen');



/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['G'] = 'G&auml;ste';
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['B'] = 'Bots';
$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference']['C'] = 'Mitgliedergruppe';

$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['A'] = 'Erlaubt';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['D'] = 'Verboten';
$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference']['N'] = 'Nie';

$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['A'] = 'Erlaubt, alle';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['D'] = 'Verboten, alle';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['N'] = 'Nie, alle';
$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference']['C'] = 'Benutzerdefiniert';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_forum_permissions']['new']    = array('Berechtigung hinzuf&uuml;gen', 'Berechtigung hinzuf&uuml;gen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['edit']   = array('Berechtigung bearbeiten', 'Diese Berechtigung bearbeiten');
$GLOBALS['TL_LANG']['tl_forum_permissions']['copy']   = array('Berechtigung kopieren', 'Diese Berechtigung kopieren');
$GLOBALS['TL_LANG']['tl_forum_permissions']['delete'] = array('Berechtigung l&ouml;schen', 'Diese Berechtigung l&ouml;schen');
$GLOBALS['TL_LANG']['tl_forum_permissions']['show']   = array('Berechtigung anzeigen', 'Diese Berechtigung anzeigen');

?>