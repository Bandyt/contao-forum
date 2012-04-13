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
 * Table tl_forum_permissions 
 */
$GLOBALS['TL_DCA']['tl_forum_permissions'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'ptable'                      => 'tl_forum_forums'
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('member_group'),
			'headerFields'            => array('id','title'),
			'flag'                    => 11,
			'disableGrouping'		  => true,
			'child_record_callback'   => array('tl_forum_permissions', 'listPermissions'),
		),
		'label' => array
		(
			'fields'                  => array('group'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('u','u_f','u_t','u_p','u_f_a','u_t','u_t_a','u_t_c','u_t_e'),
		'default'                     => 'member_group;{user_permissions},u;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'u'				  	=> '',
		'u_A'			  	=> '',
		'u_D'			  	=> '',
		'u_N'			  	=> '',
		'u_C'			  	=> ';{lbl_u_f},u_f;{lbl_u_t},u_t;{lbl_u_p},u_p;',
		'u_f'			  	=> '',
		'u_f_A'			  	=> '',
		'u_f_D'			  	=> '',
		'u_f_N'			  	=> '',
		'u_f_C'			  	=> ';{lbl_u_f_a},u_f_a;',
		'u_f_a'			  	=> '',
		'u_f_a_A'			=> '',
		'u_f_a_D'			=> '',
		'u_f_a_N'			=> '',
		'u_f_a_C'			=> 'u_f_a_l,u_f_a_r;',
		'u_t'			  	=> '',
		'u_t_A'			  	=> '',
		'u_t_D'			  	=> '',
		'u_t_N'			  	=> '',
		'u_t_C'			  	=> ';{lbl_u_t_a},u_t_a;{lbl_u_t_c},u_t_c;{lbl_u_t_e},u_t_e;',
		'u_t_a'			  	=> '',
		'u_t_a_A'			=> '',
		'u_t_a_D'			=> '',
		'u_t_a_N'			=> '',
		'u_t_a_C'			=> ';{lbl_u_t_a_m},u_t_a_m;{lbl_u_t_a_o},u_t_a_o;',
	),

	// Fields
	'fields' => array
	(
		'member_group' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['member_group'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'foreignKey'			  => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>false, 'unique'=>true, 'doNotCopy'=>true)
		),
		'u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_f' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_f_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_f_a_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_f_a_r' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_f_a_r'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_m_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_m_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_a_o_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_a_o_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_c_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_c_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_t_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_t_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_t_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_t_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_s_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_s_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_s_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_l_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_l_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_l_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_l_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_t_e_m_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_t_e_m_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_r' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_r_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_r_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_r_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_q' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_q_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_q_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_q_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_a_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_c_a_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_c_a_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_m_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_m_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_p_e_o_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_p_e_o_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			)
	)
);

class tl_forum_permissions extends Backend
{	
	public function listPermissions($arrRow)
	{
		$objMembergroup = $this->Database->prepare("SELECT name FROM tl_member_group WHERE id=?")->execute($arrRow['member_group']);
		return '<div>' . $objMembergroup->name . '</div>';
	}
}
?>